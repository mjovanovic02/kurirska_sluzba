@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalji menadžera</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $menadzer->menadzer_id }}</p>
            <p><strong>Ime:</strong> {{ $menadzer->ime }}</p>
            <p><strong>Prezime:</strong> {{ $menadzer->prezime }}</p>
            <p><strong>Email:</strong> {{ $menadzer->email }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('menadzeri.index') }}" class="btn btn-secondary">
            Nazad
        </a>

        <form method="POST"
              action="{{ route('menadzeri.destroy', $menadzer->menadzer_id) }}"
              class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
                Obriši
            </button>
        </form>
    </div>
</div>
@endsection
