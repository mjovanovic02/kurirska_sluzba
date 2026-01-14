<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <--- ovo ti fali
use App\Models\Kurir;
use Illuminate\Http\Request;
use App\Models\Posiljka; // <--- ovo ti fali
class KurirController extends Controller
{
 public function index()
    {
        $kuriri = Kurir::all();
        return view('kuriri.index', compact('kuriri'));
    }

    public function create()
    {
        return view('kuriri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'lozinka' => 'required|string|min:6',
            'broj_vozila' => 'required|string|max:50',
            'status' => 'required|in:aktivan,neaktivan',
        ]);

        Kurir::create([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'lozinka' => Hash::make($request->lozinka),
            'broj_vozila' => $request->broj_vozila,
            'status' => $request->status,
        ]);

        return redirect()->route('kuriri.index')
            ->with('success', 'Kurir uspešno dodat');
    }

    public function show(Kurir $kuriri)
    {
        return view('kuriri.show', compact('kuriri'));
    }

    public function destroy(Kurir $kuriri)
    {
        $kuriri->delete();

        return redirect()->route('kuriri.index')
            ->with('success', 'Kurir obrisan');
    }
    // Prikaz liste pošiljki koje kurir može da preuzme
    public function listaZaPreuzimanje()
    {
        // Ovde bi dodao filtriranje po kuriru ako želiš
        $posiljke = Posiljka::where('kurir_id', null)->get();
        return view('kuriri.posiljke', compact('posiljke'));
    }

    // Metod za preuzimanje pošiljke
public function preuzmi($id)
{
    $posiljka = Posiljka::findOrFail($id);

    // označimo da je kurir preuzeo pošiljku
    $posiljka->preuzeto = true; 
    $posiljka->save();

    return redirect()->back()->with('success', 'Pošiljka je uspešno preuzeta.');
}
}