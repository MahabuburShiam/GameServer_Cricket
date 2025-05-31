@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1>Welcome to the Admin Dashboard</h1>

        <form action="{{ route('cricketers.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <label for="cricketer_id">Select Cricketer to delete:</label>
            <select name="cricketer_id" id="cricketer_id">
                <option value="">Select a Cricketer</option>
                @foreach ($cricketers as $cricketer)
                    <option value="{{ $cricketer->id }}">{{ $cricketer->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
        <h2><a href="{{ route('edit') }}" class="btn btn-primary">Add Players</a></h2>
    </div>
@endsection
