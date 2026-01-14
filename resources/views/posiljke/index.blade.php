@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Moje pošiljke</h1>
    <a href="{{ route('posiljke.create') }}" class="btn btn-primary mb-3">Nova pošiljka</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Primaoc</th>
                <th>Adresa</th>
                <th>Težina</th>
                <th>Status</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posiljke as $posiljka)
            <tr>
                <td>{{ $posiljka->posiljka_id }}</td>
                <td>{{ $posiljka->primaoc_ime }}</td>
                <td>{{ $posiljka->primaoc_adresa }}</td>
                <td>{{ $posiljka->tezina }} kg</td>
                <td>{{ $posiljka->status }}</td>
                <td>
                    <a href="{{ route('posiljke.show', $posiljka) }}" class="btn btn-info btn-sm">Prikaži</a>
                    <form action="{{ route('posiljke.destroy', $posiljka) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Da li si siguran?')">Obriši</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
