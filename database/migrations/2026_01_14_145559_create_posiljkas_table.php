<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posiljkas', function (Blueprint $table) {
            $table->id('posiljka_id');
            $table->unsignedBigInteger('klijent_id');
            $table->unsignedBigInteger('kurir_id')->nullable();
            $table->unsignedBigInteger('menadzer_id');

            $table->string('primaoc_ime');
            $table->string('primaoc_adresa');
            $table->float('tezina', 8, 2);
            $table->string('broj_za_pracenje');
            $table->enum('status', ['kreirana','dodeljena','preuzeta','isporucena'])->default('kreirana');

            $table->timestamps();

            // Foreign keys
            $table->foreign('klijent_id')->references('klijent_id')->on('klijents')->onDelete('cascade');
            $table->foreign('kurir_id')->references('kurir_id')->on('kurirs')->onDelete('set null');
            $table->foreign('menadzer_id')->references('menadzer_id')->on('menadzers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posiljkas');
    }
};
