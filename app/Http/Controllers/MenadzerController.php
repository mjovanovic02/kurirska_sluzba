<?php

namespace App\Http\Controllers;

use App\Models\Menadzer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenadzerController extends Controller
{
    public function index()
    {
        $menadzeri = Menadzer::all();
        return view('menadzeri.index', compact('menadzeri'));
    }

    public function create()
    {
        return view('menadzeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'email' => 'required|email|unique:menadzers,email',
            'lozinka' => 'required|string|min:6',
        ]);

        Menadzer::create([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'email' => $request->email,
            'lozinka' => Hash::make($request->lozinka),
        ]);

        return redirect()->route('menadzeri.index')
            ->with('success', 'Menadžer uspešno dodat');
    }

    public function destroy($id)
    {
        Menadzer::findOrFail($id)->delete();

        return redirect()->route('menadzeri.index')
            ->with('success', 'Menadžer obrisan');
    }
    public function show($id)
{
    $menadzer = Menadzer::findOrFail($id);
    return view('menadzeri.show', compact('menadzer'));
}

}
