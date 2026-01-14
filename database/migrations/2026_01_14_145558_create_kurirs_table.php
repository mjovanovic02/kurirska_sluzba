<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kurirs', function (Blueprint $table) {
            $table->id('kurir_id');
            $table->string('ime');
            $table->string('prezime');
            $table->string('lozinka');
            $table->string('broj_vozila');
            $table->enum('status', ['aktivan', 'neaktivan'])->default('aktivan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kurirs');
    }
};
