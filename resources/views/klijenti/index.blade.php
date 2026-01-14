@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Klijenti</h1>
    <a href="{{ route('klijenti.create') }}" class="btn btn-primary mb-3">Dodaj Klijenta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Adresa</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            @foreach($klijenti as $k)
            <tr>
                <td>{{ $k->ime }}</td>
                <td>{{ $k->prezime }}</td>
                <td>{{ $k->email }}</td>
                <td>{{ $k->telefon }}</td>
                <td>{{ $k->adresa }}</td>
                <td>
                    <a href="{{ route('klijenti.show', $k->klijent_id) }}" class="btn btn-info btn-sm">Prikaži</a>
                    <form action="{{ route('klijenti.destroy', $k->klijent_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni?')">Obriši</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
