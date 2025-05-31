<?php

namespace App\Http\Controllers;


use App\Models\Team;
use App\Models\User;
use App\Models\Match;
use App\Models\Cricketer;
use App\Models\CricketMatch;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class Authmanager extends Controller
{
    public function dashboard()
    {
        $cricketers = Cricketer::all();
        $currentlyPlayingMatches = CricketMatch::where('status', 'playing')->get();
        return view('dashboard', compact('cricketers', 'currentlyPlayingMatches'));
    }
    public function adminDashboard()
    {
        $cricketers = Cricketer::all();
        return view('admin.dashboard', compact('cricketers'));
    }

    public function listTeams()
    {
        $teams = Team::where('user_id', '!=', auth()->id())->with('user', 'cricketers')->get();
        return view('team.list', compact('teams'));
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($credentials['email'] === 'adminn@1234' && $credentials['password'] === '123456') {
            Auth::attempt($credentials); 
            return redirect()->route("admin.dashboard"); 
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard'); 
        }

        return redirect()->back()->withErrors(['login' => 'Invalid login credentials'])->withInput();
    }

    public function showLogin()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
{
    $response = HTTP::post('https://api.cricapi.com/v1/cricScore?apikey=64f08de9-f8e6-4c1d-be48-07db9019b441', [
        'apikey' => '64f08de9-f8e6-4c1d-be48-07db9019b441',
    ]);

    $score = $response->json(); 

    return view('index', ['score' => $score]);
}


    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with("error", "Login details are incorrect!");
    }

    public function register()
    {
        return view('register');
    }

    public function registerpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home')->with("success", "Registration successful!");
    }


    public function createTeam()
    {
        $cricketers = Cricketer::all();
        return view('team.create', compact('cricketers'));
    }
     
    
    public function ranking()
    {
        $cricketers = Cricketer::orderBy('innings', 'asc')->get();
    
        return view('cricketers.ranking', compact('cricketers'));
    }
    
    public function showCricketersByInnings()
    {
        $cricketers = Cricketer::orderBy('innings', 'desc')->get();
        return view('cricketers.by_innings', compact('cricketers'));
    }

    public function showCricketersByrunrate()
    {
        $cricketers = Cricketer::orderBy('run_rate', 'desc')->get();
    
        return view('cricketers.by_runrate', compact('cricketers'));
    }

    public function femalePlayers()
{
    $femalePlayers = Cricketer::where('gender', 'female')->get();
    return view('female_players', compact('femalePlayers'));
}
public function malePlayers()
{
    $malePlayers = Cricketer::where('gender', 'male')->get();
    return view('male_players', compact('malePlayers'));
}
public function fixtures()
{
    $upcomingMatches = CricketMatch::where('status', 'upcoming')->get();
    return view('fixtures', compact('upcomingMatches'));
}


public function storeTeam(Request $request)
{
    $request->validate([
        'team_name' => 'required|string|max:255',
        'user_id' => 'required|integer',
        'cricketers' => 'required|array|min:5|max:5', // Assuming 5 cricketers are required
    ]);

    $team = Team::create([
        'name' => $request->input('team_name'),
        'user_id' => $request->input('user_id'),
    ]);

    $selectedCricketers = $request->input('cricketers');
    $team->cricketers()->sync($selectedCricketers);

    return redirect()->route('team.list')->with('success', 'Team created successfully!');
}
public function showOtherTeams()
{
    $teams = Team::with('user', 'cricketers')->get();
    return view('other_teams', compact('teams'));
}
public function editCricketer(Cricketer $cricketer)
{
    return view('admin.edit', compact('cricketer'));
}

public function updateCricketer(Request $request, Cricketer $cricketer)
{
}


public function store(Request $request)
{
    $request->validate([
        'team_name' => 'required|string|max:255',
        'user_id' => 'required|integer',
        'cricketers' => 'required|array|min:5|max:5', 
    ]);

    $team = Team::create([
        'name' => $request->input('team_name'),
        'user_id' => $request->input('user_id'),
    ]);

    $selectedCricketers = $request->input('cricketers');
    $cricketersExist = Cricketer::whereIn('id', $selectedCricketers)->count();

    if ($cricketersExist === count($selectedCricketers)) {
        $team->cricketers()->sync($selectedCricketers);

        return redirect()->route('team.list')->with('success', 'Team created successfully!');
    } else {
        return back()->withErrors(['cricketers' => 'Invalid cricketer selected'])->withInput();
    }
}

}
