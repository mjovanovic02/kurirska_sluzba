<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    /** @use HasFactory<\Database\Factories\KurirFactory> */
    use HasFactory;
    protected $primaryKey = 'kurir_id'; // već si ovo stavio
    public $incrementing = true;
    protected $keyType = 'int';
protected $fillable = [
    'ime',
    'prezime',
    'lozinka',
    'broj_vozila',
    'status',
];


}
