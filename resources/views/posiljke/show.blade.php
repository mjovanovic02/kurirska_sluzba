@extends('layouts.app')

@section('title', 'Detalji pošiljke')

@section('content')
<h1 class="mb-3">Detalji pošiljke #{{ $posiljka->posiljka_id }}</h1>

<ul class="list-group">
    <li class="list-group-item"><strong>Primaoc:</strong> {{ $posiljka->primaoc_ime }}</li>
    <li class="list-group-item"><strong>Adresa:</strong> {{ $posiljka->primaoc_adresa }}</li>
    <li class="list-group-item"><strong>Težina:</strong> {{ $posiljka->tezina }}</li>
    <li class="list-group-item"><strong>Status:</strong> {{ $posiljka->status }}</li>
</ul>

<a href="{{ route('posiljke.index') }}" class="btn btn-secondary mt-3">Nazad na listu</a>
@endsection
