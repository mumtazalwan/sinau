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
        Schema::create('rangkuman_materi', function (Blueprint $table) {
            $table->id();
            $table->string('rangkuman_pdf');
            $table->string('judul_rangkuman');
            $table->text('deskripsi');
            $table->integer('author_id');
            $table->integer('mapel_id');
            $table->integer('kelas_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rangkuman_materi');
    }
};
