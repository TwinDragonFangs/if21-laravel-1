<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id(); // Auto increment primary key
            $table->string('kode_mk', 10)->unique();
            $table->string('nama', 100);
            $table->char('prodi_id', 36); // Kolom untuk UUID dari tabel prodi
            $table->timestamps();

            // Foreign key ke tabel prodi.id
            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
