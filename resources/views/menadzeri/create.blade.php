@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dodaj menadžera</h2>

    <form method="POST" action="{{ route('menadzeri.store') }}">
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
            <label>Lozinka</label>
            <input type="password" name="lozinka" class="form-control" required>
        </div>

        <button class="btn btn-success">Sačuvaj</button>
    </form>
</div>
@endsection
