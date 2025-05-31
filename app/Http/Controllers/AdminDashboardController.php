<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Match;
use App\Models\Cricketer;
use App\Models\CricketMatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $cricketers = Cricketer::all();

        return view('admin.dashboard', ['cricketers' => $cricketers]);
    }
    
    public function index()
    {
        return view('admin.dashboard');
    }
    public function adminDashboard()
{    
    $cric = Cricketer::all();
    return view('admin.dashboard', compact('cric'));
}
public function edit()
{
    $editPlayers = Cricketer::where('gender', 'female')->get();
    return view('admin.edit', compact('editPlayers'));
}

public function api_test()
{
    $response = HTTP::post('https://api.cricapi.com/v1/currentMatches?apikey=64f08de9-f8e6-4c1d-be48-07db9019b441&offset=0', [
        'apikey'=> '64f08de9-f8e6-4c1d-be48-07db9019b441',
        'offset'=> 0,
    ])->json();
    return view('match', ['data' => $response]);
}


public function matchDetails()
{
    $apiData = Http::post('https://api.cricapi.com/v1/currentMatches?apikey=64f08de9-f8e6-4c1d-be48-07db9019b441&offset=0', [
        'apikey' => '64f08de9-f8e6-4c1d-be48-07db9019b441',
        'offset' => 0,
    ])->json();

    return view('match', ['data' => $apiData]);
}
public function comingmatch()
{
    $ponse = HTTP::post('https://api.cricapi.com/v1/matches?apikey=64f08de9-f8e6-4c1d-be48-07db9019b441&offset=0', [
        'apikey'=> '64f08de9-f8e6-4c1d-be48-07db9019b441',
        'offset'=> 0,
    ])->json();
    return view('comingmatch', ['data' => $ponse]);
}
}