<?php

namespace App\Http\Controllers;

use App\Mail\SendRegisteredUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user() ?? [];    
        return Inertia::render('Home/Index', [
            'title' => 'Welcome',
            'user' => $user
        ]);
    }

    public function login() {
        if(Auth::check()){
            return redirect('/');
        }
        
        $scopes = 'user-read-private user-read-email user-top-read user-read-recently-played';
        $redirect_uri = url('/').env('SPOTIFY_REDIRECT_URI');
     
        return redirect('https://accounts.spotify.com/authorize?response_type=code&client_id='.env('SPOTIFY_CLIENT_ID').'&scope='.urlencode($scopes).'&redirect_uri='.$redirect_uri);    
    }

    public function spotify(Request $request) {
        $callback_code = $request->toArray();
        $redirect_uri = url('/').env('SPOTIFY_REDIRECT_URI');
        $activate = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'authorization_code',
            'code' => $callback_code['code'],
            'redirect_uri' => $redirect_uri,
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        ])->json();
        
        $user = Http::withHeaders([
            'Authorization' => 'Bearer '. $activate['access_token'],
        ])->get('https://api.spotify.com/v1/me')->json();

        if($user == null) {
            return redirect('/')->with('error', 'Oops, something went wrong. If you already put your Spotify email please wait a few minutes, if not please put your Spotify email first by refreshing this page:)');
        }
        
        if(isset($user['error'])){
            dd($user);
        }
        
        $spotify_id = $user['id'];

        $spotify = User::updateOrCreate(
            ['spotify_id' => $spotify_id],
            [
                'name' => $user['display_name'] ?? null,
                'email' => $user['email'] ?? null,
                'spotify_avatar' => $user['images'][0]['url'] ?? null,
                'spotify_url' => $user['external_urls']['spotify'] ?? null,
                'spotify_followers' => $user['followers']['total'] ?? null,
                'spotify_type' => $user['type'] ?? null,
                'spotify_token' => $activate['access_token'],
                'spotify_refresh_token' => $activate['refresh_token'],
                'spotify_country' => $user['country'] ?? null,
                'spotify_product' => $user['product'] ?? null,
            ]
        );
        
        Auth::login($spotify);

        return redirect()->intended();
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

    public function addEmail(Request $request) {
        $request->validate([
            'email' => 'email:rfc,dns'
        ]);
        
        $whitelist = DB::table('whitelists')->where('email', $request->email)->first();

        if($whitelist == null) {
            DB::table('whitelists')->insert([
                'email' => $request->email,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            Mail::to('liesbutterfly@gmail.com')->send(new SendRegisteredUser($request->email));
            return true;
        } else {
            return false;
        }
    }
}
