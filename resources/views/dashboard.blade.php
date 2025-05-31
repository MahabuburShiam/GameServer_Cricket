@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row" aling="center">
        <div class="col-md-12 text-end">
            <a href="{{ route('team.create') }}" class="btn btn-primary">Create Team</a>
            <a href="{{ route('team.list') }}" class="btn btn-primary">Other Teams</a>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    See Ranking
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('cricketers.by.runrate') }}">Cricketer by Runrate</a>
                    <a class="dropdown-item" href="{{ route('cricketers.by.innings') }}">Cricketer by Innings</a>
                </div>
            </div>
            
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    See Players
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('female.players') }}">Female Players</a>
                    <a class="dropdown-item" href="{{ route('male.players') }}">Male Players</a>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Matches
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('match') }}">Current Matches</a>
                    <a class="dropdown-item" href="{{ route('comingmatch') }}">Upcoming Matches</a>
                </div>
            </div>
            
            
        </div>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Innings</th>
                <th>Run Rate</th>
                <th>Matches Played</th>
                <th>Other Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cricketers as $cricketer)
            <tr>
                <td>{{ $cricketer->name }}</td>
                <td>{{ $cricketer->innings }}</td>
                <td>{{ $cricketer->run_rate }}</td>
                <td>{{ $cricketer->matches_played }}</td>
                <td>{{ $cricketer->other_details }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
