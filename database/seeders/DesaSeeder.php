<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    public function run(): void
    {
        $desaData = [
            [
                'name' => 'Kertamukti',
                'slug' => 'kertamukti',
                'population' => 3500,
                'area' => '4.2 km²',
                'head_name' => 'Kepala Desa Kertamukti',
                'head_phone' => '0812345678',
                'head_email' => 'kepala@kertamukti.desa.id',
                'village_office_phone' => '0267123456',
                'village_office_email' => 'kantor@kertamukti.desa.id',
                'description' => 'Desa Kertamukti adalah salah satu desa di Kecamatan Cilebar dengan mayoritas penduduk bekerja di sektor pertanian dan perikanan.',
                'statistics' => [
                    'households' => 850,
                    'men' => 1750,
                    'women' => 1750,
                    'education' => ['SD' => 120, 'SMP' => 150, 'SMA' => 180, 'S1' => 50],
                    'occupation' => ['Petani' => 1200, 'Nelayan' => 600, 'Pedagang' => 400, 'Lainnya' => 300]
                ],
            ],
            [
                'name' => 'Cikande',
                'slug' => 'cikande',
                'population' => 3200,
                'area' => '4.0 km²',
                'head_name' => 'Kepala Desa Cikande',
                'head_phone' => '0812345679',
                'head_email' => 'kepala@cikande.desa.id',
                'village_office_phone' => '0267123457',
                'village_office_email' => 'kantor@cikande.desa.id',
                'description' => 'Desa Cikande memiliki potensi pertanian padi dan tambak udang yang berkembang pesat.',
                'statistics' => [
                    'households' => 780,
                    'men' => 1600,
                    'women' => 1600,
                    'education' => ['SD' => 110, 'SMP' => 140, 'SMA' => 160, 'S1' => 45],
                    'occupation' => ['Petani' => 1100, 'Nelayan' => 550, 'Pedagang' => 380, 'Lainnya' => 270]
                ],
            ],
            [
                'name' => 'Mekarpohaci',
                'slug' => 'mekarpohaci',
                'population' => 3100,
                'area' => '4.5 km²',
                'head_name' => 'Kepala Desa Mekarpohaci',
                'head_phone' => '0812345680',
                'head_email' => 'kepala@mekarpohaci.desa.id',
                'village_office_phone' => '0267123458',
                'village_office_email' => 'kantor@mekarpohaci.desa.id',
                'description' => 'Desa Mekarpohaci terletak di tepi perairan dan mengembangkan usaha perikanan.',
                'statistics' => [
                    'households' => 750,
                    'men' => 1550,
                    'women' => 1550,
                    'education' => ['SD' => 105, 'SMP' => 135, 'SMA' => 155, 'S1' => 40],
                    'occupation' => ['Petani' => 1050, 'Nelayan' => 600, 'Pedagang' => 350, 'Lainnya' => 250]
                ],
            ],
            [
                'name' => 'Rawasari',
                'slug' => 'rawasari',
                'population' => 3800,
                'area' => '4.8 km²',
                'head_name' => 'Kepala Desa Rawasari',
                'head_phone' => '0812345681',
                'head_email' => 'kepala@rawasari.desa.id',
                'village_office_phone' => '0267123459',
                'village_office_email' => 'kantor@rawasari.desa.id',
                'description' => 'Desa Rawasari adalah desa dengan populasi terbesar di Kecamatan Cilebar.',
                'statistics' => [
                    'households' => 920,
                    'men' => 1900,
                    'women' => 1900,
                    'education' => ['SD' => 130, 'SMP' => 160, 'SMA' => 190, 'S1' => 55],
                    'occupation' => ['Petani' => 1300, 'Nelayan' => 700, 'Pedagang' => 450, 'Lainnya' => 350]
                ],
            ],
            [
                'name' => 'Kosambibatu',
                'slug' => 'kosambibatu',
                'population' => 3400,
                'area' => '4.1 km²',
                'head_name' => 'Kepala Desa Kosambibatu',
                'head_phone' => '0812345682',
                'head_email' => 'kepala@kosambibatu.desa.id',
                'village_office_phone' => '0267123460',
                'village_office_email' => 'kantor@kosambibatu.desa.id',
                'description' => 'Desa Kosambibatu mengembangkan pertanian organik dan wisata lokal.',
                'statistics' => [
                    'households' => 820,
                    'men' => 1700,
                    'women' => 1700,
                    'education' => ['SD' => 115, 'SMP' => 145, 'SMA' => 170, 'S1' => 48],
                    'occupation' => ['Petani' => 1150, 'Nelayan' => 580, 'Pedagang' => 400, 'Lainnya' => 290]
                ],
            ],
            [
                'name' => 'Pusakajaya Utara',
                'slug' => 'pusakajaya-utara',
                'population' => 2800,
                'area' => '3.9 km²',
                'head_name' => 'Kepala Desa Pusakajaya Utara',
                'head_phone' => '0812345683',
                'head_email' => 'kepala@pusakajayautara.desa.id',
                'village_office_phone' => '0267123461',
                'village_office_email' => 'kantor@pusakajayautara.desa.id',
                'description' => 'Desa Pusakajaya Utara fokus pada pengembangan infrastruktur dan pendidikan.',
                'statistics' => [
                    'households' => 680,
                    'men' => 1400,
                    'women' => 1400,
                    'education' => ['SD' => 95, 'SMP' => 125, 'SMA' => 145, 'S1' => 35],
                    'occupation' => ['Petani' => 950, 'Nelayan' => 450, 'Pedagang' => 300, 'Lainnya' => 250]
                ],
            ],
            [
                'name' => 'Pusakajaya Selatan',
                'slug' => 'pusakajaya-selatan',
                'population' => 2900,
                'area' => '4.0 km²',
                'head_name' => 'Kepala Desa Pusakajaya Selatan',
                'head_phone' => '0812345684',
                'head_email' => 'kepala@pusakajayaselatan.desa.id',
                'village_office_phone' => '0267123462',
                'village_office_email' => 'kantor@pusakajayaselatan.desa.id',
                'description' => 'Desa Pusakajaya Selatan berkembang sebagai pusat perdagangan lokal.',
                'statistics' => [
                    'households' => 700,
                    'men' => 1450,
                    'women' => 1450,
                    'education' => ['SD' => 100, 'SMP' => 130, 'SMA' => 150, 'S1' => 38],
                    'occupation' => ['Petani' => 1000, 'Nelayan' => 480, 'Pedagang' => 330, 'Lainnya' => 270]
                ],
            ],
            [
                'name' => 'Sukaratu',
                'slug' => 'sukaratu',
                'population' => 3600,
                'area' => '4.3 km²',
                'head_name' => 'Kepala Desa Sukaratu',
                'head_phone' => '0812345685',
                'head_email' => 'kepala@sukaratu.desa.id',
                'village_office_phone' => '0267123463',
                'village_office_email' => 'kantor@sukaratu.desa.id',
                'description' => 'Desa Sukaratu adalah sentra UMKM dengan produk kerajinan lokal.',
                'statistics' => [
                    'households' => 870,
                    'men' => 1800,
                    'women' => 1800,
                    'education' => ['SD' => 125, 'SMP' => 155, 'SMA' => 180, 'S1' => 52],
                    'occupation' => ['Petani' => 1200, 'Nelayan' => 600, 'Pedagang' => 420, 'Lainnya' => 310]
                ],
            ],
            [
                'name' => 'Tanjungsari',
                'slug' => 'tanjungsari',
                'population' => 2400,
                'area' => '3.8 km²',
                'head_name' => 'Kepala Desa Tanjungsari',
                'head_phone' => '0812345686',
                'head_email' => 'kepala@tanjungsari.desa.id',
                'village_office_phone' => '0267123464',
                'village_office_email' => 'kantor@tanjungsari.desa.id',
                'description' => 'Desa Tanjungsari terletak di ujung utara dengan akses ke laut.',
                'statistics' => [
                    'households' => 580,
                    'men' => 1200,
                    'women' => 1200,
                    'education' => ['SD' => 80, 'SMP' => 110, 'SMA' => 130, 'S1' => 30],
                    'occupation' => ['Petani' => 800, 'Nelayan' => 650, 'Pedagang' => 250, 'Lainnya' => 200]
                ],
            ],
            [
                'name' => 'Ciptamargi',
                'slug' => 'ciptamargi',
                'population' => 2700,
                'area' => '3.6 km²',
                'head_name' => 'Kepala Desa Ciptamargi',
                'head_phone' => '0812345687',
                'head_email' => 'kepala@ciptamargi.desa.id',
                'village_office_phone' => '0267123465',
                'village_office_email' => 'kantor@ciptamargi.desa.id',
                'description' => 'Desa Ciptamargi memiliki program pemberdayaan masyarakat yang kuat.',
                'statistics' => [
                    'households' => 650,
                    'men' => 1350,
                    'women' => 1350,
                    'education' => ['SD' => 90, 'SMP' => 120, 'SMA' => 140, 'S1' => 32],
                    'occupation' => ['Petani' => 900, 'Nelayan' => 530, 'Pedagang' => 320, 'Lainnya' => 250]
                ],
            ],
        ];

        foreach ($desaData as $desa) {
            Desa::create($desa);
        }
    }
}
