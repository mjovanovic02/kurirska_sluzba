@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Klijent</h1>
    <p><strong>Ime:</strong> {{ $klijent->ime }}</p>
    <p><strong>Prezime:</strong> {{ $klijent->prezime }}</p>
    <p><strong>Email:</strong> {{ $klijent->email }}</p>
    <p><strong>Telefon:</strong> {{ $klijent->telefon }}</p>
    <p><strong>Adresa:</strong> {{ $klijent->adresa }}</p>
    <a href="{{ route('klijenti.index') }}" class="btn btn-secondary">Nazad</a>
</div>
@endsection
