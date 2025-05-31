@extends('homelay')

@section('title', 'Home')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">


<div class="container">
        <h1>CRIC ANALYSIS</h1>
    <p>Explore the world of cricket and stay updated with the latest news, scores, and more.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <!-- Display cricket match details -->
    <div class="container">
        <h2>Upcoming National Team Match Details</h2>
        <div class="row">
            @foreach ($score['data'] as $match)
                @if (strpos($match['t1'], '[') !== false && strpos($match['t2'], '[') !== false)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $match['t1'] }} vs {{ $match['t2'] }}
                        </div>
                        <div class="card-body">
                            <p>Date: {{ $match['dateTimeGMT'] }}</p>
                            <p>Match Type: {{ $match['matchType'] }}</p>
                            <p>Status: {{ $match['status'] }}</p>
                            @if (array_key_exists('t1img', $match))
                                <img src="{{ $match['t1img'] }}" alt="{{ $match['t1'] }} Logo" class="img-fluid">
                            @endif
                            @if (array_key_exists('t2img', $match))
                                <img src="{{ $match['t2img'] }}" alt="{{ $match['t2'] }} Logo" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    
</div>
@endsection
