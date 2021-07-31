<?php

namespace App\Http\Controllers;

use App\Models\Generated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class GeneratorController extends Controller
{
    public function generate()
    {
        $user = Auth::user() ?? []; 
        
        return Inertia::render('Home/Generator', [
            'title' => 'Generate yours',
            'user' => $user,
        ]);
    }

    public function doGenerate(Request $request)
    {
        
        $user = Auth::user();

        $spotify = Http::withHeaders([
            'Authorization' => 'Bearer '.$user->spotify_token
        ])->get('https://api.spotify.com/v1/me/top/tracks?time_range='. $request->time_range)->json();

        if(isset($spotify['error'])){
            Auth::logout();
            return redirect('/')->with('error', 'Oops, your Spotify session has expired! Don\'t worry just try it again :)');
        }

        if($request->time_range == 'long_term') {
            $time_frame = 'All Time';
        } else if ($request->time_range == 'medium_term') {
            $time_frame = 'Last 6 Months';
        } else {
            $time_frame = 'Last Month';
        }

        $formatted = [];
        $images = [];
        foreach($spotify['items'] as $key => $track){               
            $artist_name = '';
            foreach($track['artists'] as $artist) {
                $artist_name .= $artist['name'].', ';
            }
            $artist_name = substr($artist_name, 0, -2);
            $image = $track['album']['images'][0]['url'];

            $formatted[] = [
                'title' => $track['name'],
                'duration' => $this->formatDuration((round($track['duration_ms'] / 60000, 2))),
                'artists' => $artist_name,
                'image' => $image,
            ];

            if($key == 0){
                $images[] = $image;
            } else {
                if(!in_array($image, $images)){
                    $images[] = $image;
                }
            }

            if($key == 9) {
                break;
            }
        }

        Generated::create([
            'spotify_id' => $user->spotify_id,
            'time_range' => $request->time_range,
            'page' => 'generator',
        ]);

        if($request->template == 'template_1') {
            if(count($images) > 3) {
                $images = array_slice($images, 0, 3);
            }
    
            return Inertia::render('Home/Templates/Template1', [
                'user' => $user,
                'tracks' => $formatted,
                'images' => $images,
                'time_frame' => $time_frame,
            ]);
        }

        if($request->template == 'template_2') {
            return Inertia::render('Home/Templates/Template2', [
                'user' => $user,
                'tracks' => $formatted,
                'images' => $images,
                'time_frame' => $time_frame,
            ]);
        }

        if($request->template == 'template_3') {
            return Inertia::render('Home/Templates/Template3', [
                'user' => $user,
                'tracks' => $formatted,
                'images' => $images,
                'time_frame' => $time_frame,
            ]);
        }

    }

    public function formatDuration($duration)
    {
        $duration = str_replace('.', ':', $duration);
        $length = strlen($duration);
        if($length == 1){
            return $duration . ':00';
        }

        if($length == 3) {
            return $duration . '0';
        }

        return $duration;
    }

    public function topArtists(Request $request) {
        $user = Auth::user();

        if(!isset($request['t'])){
            $time_frame = 'short_term';
        } else if ($request['t'] == 'm') {
            $time_frame = 'medium_term';
        } else if ($request['t'] == 'l') {
            $time_frame = 'long_term';
        }

        $spotify = Http::withHeaders([
            'Authorization' => 'Bearer '.$user->spotify_token
        ])->get('https://api.spotify.com/v1/me/top/artists?time_range='.$time_frame.'&limit=50')->json();


        if(isset($spotify['error'])){
            Auth::logout();
            return redirect('/')->with('error', 'Oops, your Spotify session has expired! Don\'t worry just try it again :)');
        }

        Generated::create([
            'spotify_id' => $user->spotify_id,
            'time_range' => $time_frame,
            'page' => 'top-artists',
        ]);

        return Inertia::render('TopArtists/Index', [
            'title' => 'My Top Artists',
            'user' => $user,
            'data' => $spotify['items'],
            'page' => $time_frame,
        ]);
    }

    public function topTracks(Request $request) {
        $user = Auth::user();

        if(!isset($request['t'])){
            $time_frame = 'short_term';
        } else if ($request['t'] == 'm') {
            $time_frame = 'medium_term';
        } else if ($request['t'] == 'l') {
            $time_frame = 'long_term';
        }

        $spotify = Http::withHeaders([
            'Authorization' => 'Bearer '.$user->spotify_token
        ])->get('https://api.spotify.com/v1/me/top/tracks?time_range='.$time_frame.'&limit=50')->json();


        if(isset($spotify['error'])){
            Auth::logout();
            return redirect('/')->with('error', 'Oops, your Spotify session has expired! Don\'t worry just try it again :)');
        }

        $formatted = [];

        foreach($spotify['items'] as $track){               
            $artist_name = '';
            foreach($track['artists'] as $artist) {
                $artist_name .= $artist['name'].', ';
            }
            $artist_name = substr($artist_name, 0, -2);
            $image = $track['album']['images'][0]['url'];

            $formatted[] = [
                'title' => $track['name'],
                'duration' => $this->formatDuration((round($track['duration_ms'] / 60000, 2))),
                'artists' => $artist_name,
                'image' => $image,
            ];
        }

        Generated::create([
            'spotify_id' => $user->spotify_id,
            'time_range' => $time_frame,
            'page' => 'top-tracks',
        ]);

        return Inertia::render('TopTracks/Index', [
            'title' => 'My Top Tracks',
            'user' => $user,
            'data' => $formatted,
            'page' => $time_frame,
        ]);

    }

}
