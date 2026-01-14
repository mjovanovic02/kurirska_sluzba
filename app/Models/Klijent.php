<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klijent extends Model
{
    /** @use HasFactory<\Database\Factories\KlijentFactory> */
    use HasFactory;
    protected $table = 'klijents'; // ovo je važno
        protected $primaryKey = 'klijent_id'; // već si ovo stavio
        public $incrementing = true;
        protected $keyType = 'int';
        protected $fillable = [
        'ime',
        'prezime',
        'email',
        'telefon',
        'lozinka',
        'adresa'
    ];
}
