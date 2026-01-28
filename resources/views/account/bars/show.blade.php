@extends('layouts.public')

@section('content')
    <h2>Bar Details</h2>
    <p><strong>Label ID:</strong> {{ $bar->human_code ?? '—' }}</p>
    <p><strong>Public ID:</strong> {{ $bar->public_id }}</p>
    <p><strong>Metal:</strong> {{ ucfirst($bar->metal_type) }}</p>
    <p><strong>Weight:</strong> {{ $bar->weight }} g</p>
    <p><strong>Purity:</strong> {{ $bar->purity ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($bar->status) }}</p>
    <p><strong>Sold At:</strong> {{ optional($bar->sold_at)->format('Y-m-d H:i') ?? 'N/A' }}</p>
@endsection
