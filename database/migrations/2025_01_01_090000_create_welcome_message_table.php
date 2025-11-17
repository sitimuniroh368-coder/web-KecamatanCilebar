<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('welcome_message', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary();
            $table->string('camat_name', 120);
            $table->string('camat_photo')->nullable();
            $table->mediumText('message');
            $table->string('sekretaris_name', 120)->nullable();
            $table->string('sekretaris_photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('welcome_message');
    }
};

