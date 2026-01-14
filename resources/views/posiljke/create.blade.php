@extends('layouts.app')

@section('title', 'Kreiraj pošiljku')

@section('content')
<h1 class="mb-3">Kreiraj novu pošiljku</h1>

<form action="{{ route('posiljke.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Primaoc ime</label>
        <input type="text" name="primaoc_ime" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Primaoc adresa</label>
        <input type="text" name="primaoc_adresa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Težina</label>
        <input type="number" step="0.01" name="tezina" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Kreiraj</button>
    <a href="{{ route('posiljke.index') }}" class="btn btn-secondary">Nazad</a>
</form>
@endsection
