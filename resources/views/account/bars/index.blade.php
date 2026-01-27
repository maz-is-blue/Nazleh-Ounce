@extends('layouts.public')

@section('content')
    <h2>Your Bars</h2>
    @if ($bars->isEmpty())
        <p>You do not own any bars yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Public ID</th>
                    <th>Metal</th>
                    <th>Weight (g)</th>
                    <th>Status</th>
                    <th>Sold At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bars as $bar)
                    <tr>
                        <td>{{ $bar->public_id }}</td>
                        <td>{{ ucfirst($bar->metal_type) }}</td>
                        <td>{{ $bar->weight }}</td>
                        <td>{{ ucfirst($bar->status) }}</td>
                        <td>{{ optional($bar->sold_at)->format('Y-m-d') }}</td>
                        <td><a href="{{ route('account.bars.show', $bar->public_id) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
