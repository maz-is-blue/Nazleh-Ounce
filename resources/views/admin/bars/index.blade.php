@extends('layouts.public')

@section('content')
    <h2>Admin - Bars</h2>

    <form method="get" action="{{ route('admin.bars.index') }}">
        <input type="text" name="public_id" placeholder="Public ID" value="{{ $filters['public_id'] ?? '' }}">
        <select name="status">
            <option value="">Any status</option>
            <option value="unsold" @selected(($filters['status'] ?? '') === 'unsold')>Unsold</option>
            <option value="sold" @selected(($filters['status'] ?? '') === 'sold')>Sold</option>
        </select>
        <button type="submit">Search</button>
        <a href="{{ route('admin.bars.create') }}">Create Bar</a>
    </form>

    <h3 style="margin-top: 24px;">Batch Create</h3>
    <form method="post" action="{{ route('admin.bars.batch') }}">
        @csrf
        <input type="number" name="count" min="1" max="1000" value="10">
        <select name="metal_type">
            <option value="gold">Gold</option>
            <option value="silver">Silver</option>
        </select>
        <input type="text" name="weight" placeholder="Weight (g)" value="100.000">
        <input type="text" name="purity" placeholder="Purity (optional)">
        <button type="submit">Create Batch</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Label ID</th>
                <th>Public ID</th>
                <th>Metal</th>
                <th>Weight</th>
                <th>Status</th>
                <th>Owner</th>
                <th>Assign</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bars as $bar)
                <tr>
                    <td>{{ $bar->human_code ?? '—' }}</td>
                    <td>{{ $bar->public_id }}</td>
                    <td>{{ ucfirst($bar->metal_type) }}</td>
                    <td>{{ $bar->weight }}</td>
                    <td>{{ ucfirst($bar->status) }}</td>
                    <td>{{ $bar->owner?->name ?? 'Not assigned' }}</td>
                    <td>
                        <form method="post" action="{{ route('admin.bars.assign', $bar->public_id) }}">
                            @csrf
                            <input type="text" name="buyer_name" placeholder="Buyer name" required>
                            <input type="email" name="buyer_email" placeholder="Buyer email" required>
                            <label>
                                <input type="checkbox" name="force_reassign" value="1">
                                Force
                            </label>
                            <button type="submit">Assign</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bars->links() }}
@endsection
