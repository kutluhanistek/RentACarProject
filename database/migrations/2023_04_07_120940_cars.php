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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('plaka')->unique();
            $table->string('marka');
            $table->string('model');
            $table->string('yakit_turu');
            $table->string('renk');
            $table->string('hasar_kaydi');
            $table->string('km');
            $table->string('vites');
            $table->string('koltuk_sayisi');
            $table->string('img_path');
            $table->boolean('isRent')->withComment('0 ise kiralanmamış 1 ise kiralanmış');
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
