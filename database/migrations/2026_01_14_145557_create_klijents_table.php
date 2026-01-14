<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('klijents', function (Blueprint $table) {
            $table->id('klijent_id'); // unsigned big int
            $table->string('ime');
            $table->string('prezime');
            $table->string('email')->unique();
            $table->string('telefon');
            $table->string('lozinka');
            $table->string('adresa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klijents');
    }
};
