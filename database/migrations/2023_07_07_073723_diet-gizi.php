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
        Schema::create('diet-gizi', function (Blueprint $table) {
            $table->id();
            $table->string('bed');
            $table->string('nama');
            $table->string('pasienID');
            $table->string('DPJP');
            $table->string('diet_pagi');
            $table->string('diet_pagi_konsistensi');
            $table->string('diet_siang');
            $table->string('diet_siang_konsistensi');
            $table->string('diet_sore');
            $table->string('diet_sore_konsistensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
