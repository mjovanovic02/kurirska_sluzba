<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menadzers', function (Blueprint $table) {
            $table->id('menadzer_id');
            $table->string('ime');
            $table->string('prezime');
            $table->string('email')->unique();
            $table->string('lozinka');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menadzers');
    }
};
