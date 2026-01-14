@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kuriri</h1>

    <a href="{{ route('kuriri.create') }}" class="btn btn-success mb-3">
        + Dodaj kurira
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Broj vozila</th>
                <th>Status</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kuriri as $kurir)
                <tr>
                    <td>{{ $kurir->ime }}</td>
                    <td>{{ $kurir->prezime }}</td>
                    <td>{{ $kurir->broj_vozila }}</td>
                    <td>{{ $kurir->status }}</td>
                    <td>
                        <a href="{{ route('kuriri.show', $kurir->kurir_id) }}" class="btn btn-sm btn-info">Pregled</a>

                        <form method="POST" action="{{ route('kuriri.destroy', $kurir->kurir_id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
