@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pošiljke za preuzimanje</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($posiljke->isEmpty())
        <p>Nema pošiljki za preuzimanje.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Broj za praćenje</th>
                    <th>Primaoc</th>
                    <th>Adresa</th>
                    <th>Težina</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posiljke as $p)
                    <tr>
                        <td>{{ $p->broj_za_pracenje }}</td>
                        <td>{{ $p->primaoc_ime }}</td>
                        <td>{{ $p->primaoc_adresa }}</td>
                        <td>{{ $p->tezina }} kg</td>
                        <td>{{ $p->status }}</td>
                        <td>{{ $p->preuzeto ? 'Da' : 'Ne' }}</td>

                        <td>
                            <form action="{{ route('kurir.posiljke.preuzmi', $p->posiljka_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Preuzmi</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
