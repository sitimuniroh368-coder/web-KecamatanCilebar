<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (!Schema::hasColumn('profile', 'visi')) {
                $table->mediumText('visi')->nullable()->after('tugas_fungsi');
            }
            if (!Schema::hasColumn('profile', 'misi')) {
                $table->mediumText('misi')->nullable()->after('visi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (Schema::hasColumn('profile', 'misi')) {
                $table->dropColumn('misi');
            }
            if (Schema::hasColumn('profile', 'visi')) {
                $table->dropColumn('visi');
            }
        });
    }
};
