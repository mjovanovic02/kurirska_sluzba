@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kurir #{{ $kuriri->kurir_id }}</h1>

    <ul class="list-group">
        <li class="list-group-item">
            <strong>Ime:</strong> {{ $kuriri->ime }}
        </li>
        <li class="list-group-item">
            <strong>Email:</strong> {{ $kuriri->email }}
        </li>
        <li class="list-group-item">
            <strong>Telefon:</strong> {{ $kuriri->telefon }}
        </li>
    </ul>

    <a href="{{ route('kuriri.index') }}" class="btn btn-secondary mt-3">
        Nazad
    </a>
</div>
@endsection
