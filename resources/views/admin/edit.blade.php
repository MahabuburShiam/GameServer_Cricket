@extends('layout')

@section('title', 'Add Cricketer')

@section('content')
<div class="container">
    <h1>Add Cricketer</h1>

    <form action="{{ route('admin.cstore') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Cricketer Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="innings" class="form-label">Innings</label>
            <input type="number" name="innings" class="form-control" id="innings" min="0">
        </div>

        <div class="mb-3">
            <label for="run_rate" class="form-label">Run Rate</label>
            <input type="number" name="run_rate" class="form-control" id="run_rate" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="matches_played" class="form-label">Matches Played</label>
            <input type="number" name="matches_played" class="form-control" id="matches_played" min="0">
        </div>


        <div class="mb-3">
            <label for="other_details" class="form-label">Other Details</label>
            <textarea name="other_details" class="form-control" id="other_details" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-select" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Cricketer</button>
    </form>
</div>
@endsection
