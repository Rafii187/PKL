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
        Schema::table('gurus', function (Blueprint $table) {
            // Definisi foreign key
            $table->foreign('mapel_id')->references('mapel_id')->on('mapels')->onDelete('cascade');
            $table->foreign('user_jab_id')->references('jab_id')->on('jabatans')->onDelete('cascade');
            $table->foreign('sekolah_id')->references('sekolah_id')->on('sekolahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            //
        });
    }
};
