@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj kurira</h1>

    <form method="POST" action="{{ route('kuriri.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Ime</label>
            <input type="text" name="ime" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prezime</label>
            <input type="text" name="prezime" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lozinka</label>
            <input type="password" name="lozinka" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Broj vozila</label>
            <input type="text" name="broj_vozila" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="aktivan">Aktivan</option>
                <option value="neaktivan">Neaktivan</option>
            </select>
        </div>

        <button class="btn btn-primary">Sačuvaj</button>
        <a href="{{ route('kuriri.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection
