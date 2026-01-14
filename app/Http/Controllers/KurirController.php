<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Kurir;
use Illuminate\Http\Request;

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
}
