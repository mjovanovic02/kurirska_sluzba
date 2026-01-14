<?php

namespace App\Http\Controllers;

use App\Models\Posiljka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosiljkaController extends Controller
{
    // Lista pošiljki ulogovanog klijenta
    public function index()
    {
        $posiljke = Posiljka::where('klijent_id', Auth::id())->get();
        return view('posiljke.index', compact('posiljke'));
    }

    // Forma za novu pošiljku
    public function create()
    {
        return view('posiljke.create');
    }

    // Čuvanje nove pošiljke
    public function store(Request $request)
    {
        $request->validate([
            'primaoc_ime' => 'required|string|max:255',
            'primaoc_adresa' => 'required|string|max:255',
            'tezina' => 'required|numeric',
        ]);

        $posiljka = Posiljka::create([
            'klijent_id' => Auth::id(),
            'kurir_id' => null,
            'menadzer_id' => 1, // privremeni menadzer
            'primaoc_ime' => $request->primaoc_ime,
            'primaoc_adresa' => $request->primaoc_adresa,
            'tezina' => $request->tezina,
            'broj_za_pracenje' => 'PSL' . rand(1000, 9999),
            'status' => 'kreirana',
        ]);

        return redirect()->route('posiljke.show', $posiljka->posiljka_id);
    }

    // Prikaz pošiljke
    public function show(string $id)
    {
        $posiljka = Posiljka::findOrFail($id);
        return view('posiljke.show', compact('posiljka'));
    }

    // Forma za edit
    public function edit(string $id)
    {
        $posiljka = Posiljka::findOrFail($id);
        return view('posiljke.edit', compact('posiljka'));
    }

    // Update pošiljke
    public function update(Request $request, string $id)
    {
        $posiljka = Posiljka::findOrFail($id);

        $request->validate([
            'primaoc_ime' => 'required|string|max:255',
            'primaoc_adresa' => 'required|string|max:255',
            'tezina' => 'required|numeric',
        ]);

        $posiljka->update($request->only('primaoc_ime', 'primaoc_adresa', 'tezina'));

        return redirect()->route('posiljke.show', $posiljka->posiljka_id);
    }

    // Brisanje pošiljke
    public function destroy(string $id)
    {
        $posiljka = Posiljka::findOrFail($id);
        $posiljka->delete();

        return redirect()->route('posiljke.index');
    }

    // ---- Special use cases ----

    public function kreiraj(Request $request)
    {
        // Primer: dodatna logika kreiranja
        return $this->store($request);
    }

    public function preuzmi($id)
    {
        $posiljka = Posiljka::findOrFail($id);
        $posiljka->status = 'preuzeta';
        $posiljka->kurir_id = Auth::id();
        $posiljka->save();

        return redirect()->route('posiljke.show', $id);
    }

    public function dostavi($id)
    {
        $posiljka = Posiljka::findOrFail($id);
        $posiljka->status = 'dostavljena';
        $posiljka->save();

        return redirect()->route('posiljke.show', $id);
    }

    public function dodeli($id)
    {
        $posiljka = Posiljka::findOrFail($id);
        // Primer: dodeli kurira na osnovu neke logike
        $posiljka->kurir_id = 2; // fiksno za test
        $posiljka->save();

        return redirect()->route('posiljke.show', $id);
    }
}
