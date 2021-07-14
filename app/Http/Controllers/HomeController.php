<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
        
        $scopes = 'user-read-private user-read-email user-top-read user-read-recently-played playlist-read-private';
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

        $spotify = User::updateOrCreate(
            ['spotify_id' => $user['id']],
            [
                'name' => $user['display_name'],
                'spotify_avatar' => $user['images'][0]['url'],
                'spotify_email' => $user['email'],
                'spotify_url' => $user['external_urls']['spotify'],
                'spotify_followers' => $user['followers']['total'],
                'spotify_type' => $user['type'],
                'spotify_token' => $activate['access_token'],
                'spotify_refresh_token' => $activate['refresh_token'],
                'spotify_country' => $user['country'],
                'spotify_product' => $user['product'],
            ]
        );
        
        Auth::login($spotify, true);

        // $recently_played = Http::withHeaders([
        //     'Authorization' => 'Bearer '.$spotify->spotify_token,
        // ])->get('https://api.spotify.com/v1/me/player/recently-played')->json();

        // dd($recently_played);

        return redirect('/');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
