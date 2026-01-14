<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posiljka extends Model
{
    /** @use HasFactory<\Database\Factories\PosiljkaFactory> */
    use HasFactory;
    protected $primaryKey = 'posiljka_id'; // već si ovo stavio
    public $incrementing = true;
    protected $keyType = 'int';
        // Ovde dodaj sve kolone koje želiš da možeš masovno upisivati
    protected $fillable = [
        'klijent_id',
        'kurir_id',
        'menadzer_id',
        'primaoc_ime',
        'primaoc_adresa',
        'tezina',
        'broj_za_pracenje',
        'status',
    ];
}
