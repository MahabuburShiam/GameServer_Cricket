@extends('layout')

@section('title', 'Female Players')

@section('content')
<div class="container">
    <h1>Female Players List</h1>

    <table class="table">
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
            @foreach ($femalePlayers as $player)
            <tr>
                <td>{{ $player->name }}</td>
                <td>{{ $player->innings }}</td>
                <td>{{ $player->run_rate }}</td>
                <td>{{ $player->matches_played }}</td>
                <td>{{ $player->other_details }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
