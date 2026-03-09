<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class SpotifyChartController extends Controller
{
    public function index()
    {
        
        $topStreams = DB::table('spotify_streams') 
            ->select('track_name', 'streams_count')
            ->orderBy('streams_count', 'desc')
            ->limit(5)
            ->get();

        $labels = $topStreams->pluck('track_name')->toArray();
        $data = $topStreams->pluck('streams_count')->toArray();

        return view('spotify.chart', compact('labels', 'data'));
    }
}