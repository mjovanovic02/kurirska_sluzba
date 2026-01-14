@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Menadžeri</h2>

    <a href="{{ route('menadzeri.create') }}" class="btn btn-primary mb-3">
        + Novi menadžer
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menadzeri as $menadzer)
                <tr>
                    <td>{{ $menadzer->menadzer_id }}</td>
                    <td>{{ $menadzer->ime }}</td>
                    <td>{{ $menadzer->prezime }}</td>
                    <td>{{ $menadzer->email }}</td>
                    <td>
                        <!-- DETALJI -->
                        <a href="{{ route('menadzeri.show', $menadzer->menadzer_id) }}"
                           class="btn btn-sm btn-info">
                            Detalji
                        </a>

                        <!-- DELETE -->
                        <form method="POST"
                              action="{{ route('menadzeri.destroy', $menadzer->menadzer_id) }}"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Obrisati menadžera?')">
                                Obriši
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
