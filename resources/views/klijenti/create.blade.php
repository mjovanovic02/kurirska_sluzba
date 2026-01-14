@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj Klijenta</h1>

    <form action="{{ route('klijenti.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Ime</label>
            <input type="text" name="ime" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Prezime</label>
            <input type="text" name="prezime" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telefon</label>
            <input type="text" name="telefon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lozinka</label>
            <input type="password" name="lozinka" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Adresa</label>
            <input type="text" name="adresa" class="form-control" required>
        </div>
        <button class="btn btn-success">Sačuvaj</button>
    </form>
</div>
@endsection
