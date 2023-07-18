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
            $table->string('diet');
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
