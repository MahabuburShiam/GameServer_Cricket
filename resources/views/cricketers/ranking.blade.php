@extends('layout')
@section('title', 'Cricketer Ranking')
@section('content')
<div class="container">
    <h1>Cricketer Ranking</h1>

    @if ($cricketers->count() > 0)
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
    @else
        <p>No cricketer data found.</p>
    @endif
</div>
@endsection
