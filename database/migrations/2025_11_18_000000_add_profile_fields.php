<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (!Schema::hasColumn('profile', 'tugas_fungsi')) {
                $table->mediumText('tugas_fungsi')->nullable()->after('content');
            }
            if (!Schema::hasColumn('profile', 'sejarah')) {
                $table->mediumText('sejarah')->nullable()->after('tugas_fungsi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (Schema::hasColumn('profile', 'sejarah')) {
                $table->dropColumn('sejarah');
            }
            if (Schema::hasColumn('profile', 'tugas_fungsi')) {
                $table->dropColumn('tugas_fungsi');
            }
        });
    }
};
<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (!Schema::hasColumn('profile', 'tugas_fungsi')) {
                $table->mediumText('tugas_fungsi')->nullable()->after('content');
            }
            if (!Schema::hasColumn('profile', 'sejarah')) {
                $table->mediumText('sejarah')->nullable()->after('tugas_fungsi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (Schema::hasColumn('profile', 'sejarah')) {
                $table->dropColumn('sejarah');
            }
            if (Schema::hasColumn('profile', 'tugas_fungsi')) {
                $table->dropColumn('tugas_fungsi');
            }
        });
    }
};
