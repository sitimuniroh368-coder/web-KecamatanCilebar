<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Setting;
use App\Models\WelcomeMessage;
use App\Models\WilayahInfo;
use Illuminate\Database\Seeder;

class InitialContentSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['id' => 1],
            ['content' => 'Selamat datang di Kecamatan Cilebar']
        );

        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_title' => 'Sistem Informasi Kecamatan Cilebar',
                'address' => 'Jl. Cilebar No. 270, Kecamatan Cilebar, Kabupaten Karawang, Jawa Barat 41384, Indonesia',
            ]
        );

        WelcomeMessage::updateOrCreate(
            ['id' => 1],
            [
                'camat_name' => 'H. Kurna, S.Sos, M.AP',
                'message' => 'Selamat datang di website resmi Kecamatan Cilebar. Website ini merupakan media informasi dan komunikasi antara Pemerintah Kecamatan Cilebar dengan masyarakat.',
            ]
        );

        WilayahInfo::updateOrCreate(
            ['id' => 1],
            [
                'content' => 'Kecamatan Cilebar merupakan salah satu kecamatan di Kabupaten Karawang yang memiliki potensi pertanian dan perikanan yang cukup besar.',
            ]
        );
    }
}

