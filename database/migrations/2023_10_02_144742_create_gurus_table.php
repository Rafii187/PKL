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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id('guru_id');
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('sekolah_id');
            $table->unsignedInteger("user_jab_id");
            $table->string('nama');
            $table->string('email');
            $table->string('nip');
            $table->string('alamat');
            $table->enum('status', ['Aktif', 'Non Aktif']);
            $table->string('no_telpon');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
