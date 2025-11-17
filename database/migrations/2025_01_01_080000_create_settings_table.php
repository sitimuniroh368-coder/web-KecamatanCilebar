<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary();
            $table->string('site_title', 180)->default('Sistem Informasi Kecamatan Cilebar');
            $table->string('address', 240)->nullable();
            $table->string('phone', 60)->nullable();
            $table->string('email', 160)->nullable();
            $table->string('whatsapp', 60)->nullable();
            $table->string('instagram', 160)->nullable();
            $table->string('facebook', 160)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

