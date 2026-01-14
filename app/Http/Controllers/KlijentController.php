<?php

namespace App\Http\Controllers;

use App\Models\Klijent;
use Illuminate\Http\Request;

class KlijentController extends Controller
{
    public function index()
    {
        $klijenti = Klijent::all();
        return view('klijenti.index', compact('klijenti'));
    }

    public function create()
    {
        return view('klijenti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'email' => 'required|email|unique:klijents,email',
            'telefon' => 'required|string|max:20',
            'lozinka' => 'required|string|min:6',
            'adresa' => 'required|string|max:255',
        ]);

        Klijent::create($request->all());

        return redirect()->route('klijenti.index')->with('success', 'Klijent dodat.');
    }

    public function show($id)
    {
        $klijent = Klijent::findOrFail($id);
        return view('klijenti.show', compact('klijent'));
    }

    public function destroy($id)
    {
        $klijent = Klijent::findOrFail($id);
        $klijent->delete();

        return redirect()->route('klijenti.index')->with('success', 'Klijent obrisan.');
    }
}
