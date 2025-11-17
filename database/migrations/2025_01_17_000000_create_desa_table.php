<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('population')->nullable();
            $table->string('area')->nullable();
            $table->string('head_name')->nullable();
            $table->string('head_phone')->nullable();
            $table->string('head_email')->nullable();
            $table->string('village_office_phone')->nullable();
            $table->string('village_office_email')->nullable();
            $table->longText('description')->nullable();
            $table->json('statistics')->nullable();
            $table->longText('map_iframe')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};
