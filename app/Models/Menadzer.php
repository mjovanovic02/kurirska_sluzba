<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menadzer extends Model
{
    /** @use HasFactory<\Database\Factories\MenadzerFactory> */
    use HasFactory;
    protected $primaryKey = 'menadzer_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'ime',
        'prezime',
        'lozinka',
        'email',
    ];
}
