@extends('layouts.public')

@section('content')
    <h2>Create Bar</h2>
    <form method="post" action="{{ route('admin.bars.store') }}">
        @csrf
        <select name="metal_type" required>
            <option value="gold">Gold</option>
            <option value="silver">Silver</option>
        </select>
        <input type="text" name="weight" placeholder="Weight (g)" value="100.000" required>
        <input type="text" name="purity" placeholder="Purity (optional)">
        <button type="submit">Create</button>
    </form>
@endsection
