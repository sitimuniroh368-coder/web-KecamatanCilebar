@extends('layouts.app')

@section('content')
<section class="section">
    <h2 class="section-title" style="text-align: center !important;">Profil Kecamatan Cilebar</h2>
    <div class="profile-tabs">
        <nav class="profile-tablist" role="tablist" aria-label="Profil Tabs">
            <button class="profile-tab is-active" data-target="#overview" role="tab" aria-selected="true">Gambaran Umum</button>
            <button class="profile-tab" data-target="#visi-misi" role="tab" aria-selected="false">Visi &amp; Misi</button>
            <button class="profile-tab" data-target="#geografi" role="tab" aria-selected="false">Geografi</button>
            <button class="profile-tab" data-target="#tugas-fungsi" role="tab" aria-selected="false">Tugas &amp; Fungsi</button>
            <button class="profile-tab" data-target="#sejarah" role="tab" aria-selected="false">Sejarah Kecamatan</button>
            <button class="profile-tab" data-target="#struktur" role="tab" aria-selected="false">Struktur Organisasi</button>
            <button class="profile-tab" data-target="#pegawai" role="tab" aria-selected="false">Data Pegawai</button>
        </nav>

        <div class="profile-panels">
            <section id="overview" class="profile-panel is-active" role="tabpanel">
                <div class="card">
                    <div style="padding: 8px 2px;">
                        <img src="{{ asset('img/kecamatan-cilebar.jpg') }}" alt="Gedung Kantor Kecamatan Cilebar" style="width:100%;max-width:660px;display:block;margin:0 auto 26px auto;border-radius:14px;box-shadow:0 2px 12px rgba(2,6,23,.08);object-fit:cover;" loading="lazy" />
                        <h3 style="margin-top:0;">Gambaran Umum Kecamatan Cilebar</h3>
                        <p>Kecamatan Cilebar merupakan salah satu kecamatan yang berada di wilayah administratif Kabupaten Karawang, Provinsi Jawa Barat. Kecamatan ini dikenal sebagai wilayah dengan karakteristik agraris, di mana sebagian besar penduduknya bermata pencaharian di sektor pertanian dan perikanan tambak. Selain itu, Kecamatan Cilebar juga memiliki potensi sumber daya alam yang cukup besar, terutama pada hasil pertanian seperti padi, serta hasil perikanan air payau.</p>
                        <p>Secara geografis, Kecamatan Cilebar terletak di bagian utara Kabupaten Karawang, dengan topografi wilayah yang relatif datar dan didominasi oleh lahan sawah serta tambak. Kondisi ini sangat mendukung pengembangan sektor pertanian dan perikanan sebagai sumber ekonomi utama masyarakat setempat.</p>
                        <ul style="margin: 18px 0; padding-left: 20px;">
                            <li><strong>Pusat Pemerintahan:</strong> Kecamatan Cilebar</li>
                            <li><strong>Jumlah Desa:</strong> 10 (Kertamukti, Cikande, Mekarpohaci, Rawasari, Kosambibatu, Pusakajaya Utara, Pusakajaya Selatan, Sukaratu, Tanjungsari, Ciptamargi)</li>
                            <li><strong>Penduduk:</strong> Sekitar 35.000 jiwa (data estimasi 2024)</li>
                            <li><strong>Potensi Unggulan:</strong> Pertanian padi, hasil perikanan, UMKM kreatif, dan destinasi wisata lokal</li>
                        </ul>
                        <h4 style="font-size:17px; margin-top:28px;">Infrastruktur &amp; Pelayanan Publik</h4>
                        <p>Pemerintah Kecamatan Cilebar berkomitmen untuk terus meningkatkan kualitas infrastruktur, pelayanan publik, dan pemberdayaan masyarakat melalui program-program inovatif, sinergi lintas sektor, serta keterbukaan informasi.</p>
                        <h4 style="font-size:17px; margin-top:24px;">Masyarakat &amp; Budaya</h4>
                        <p>Masyarakat Cilebar terkenal akan semangat gotong royong serta kearifan lokalnya. Tradisi dan budaya lokal terus dijaga, menjadi fondasi kuat bagi pembangunan berkelanjutan di wilayah ini.</p>
                        @if ($profile && filled($profile->content))
                        <hr style="margin:30px 0;" />
                        <div>{!! nl2br(e($profile->content)) !!}</div>
                        @endif
                    </div>
                </div>
            </section>

            <section id="visi-misi" class="profile-panel" role="tabpanel" hidden>
                <div class="card">
                    <img src="{{ asset('img/kecamatan-cilebar.jpg') }}" alt="Gedung Kantor Kecamatan Cilebar" style="width:100%;max-width:660px;display:block;margin:0 auto 26px auto;border-radius:14px;box-shadow:0 2px 12px rgba(2,6,23,.08);object-fit:cover;" loading="lazy" />
                    <h3>Visi</h3>
                    <p>Karawang Maju, Berdaya Saing Tinggi dan Berkelanjutan.</p>
                    <h3 style="margin-top:16px;">Misi</h3>
                    <ul style="margin: 18px 0; padding-left: 20px;">
                        <li>Meningkatkan tata kelola pemerintahan yang transparan dan akuntabel.</li>
                        <li>Memperkuat perekonomian lokal berbasis potensi wilayah.</li>
                        <li>Meningkatkan kualitas infrastruktur dan pelayanan publik.</li>
                        <li>Memberdayakan masyarakat melalui pendidikan, kesehatan, dan sosial.</li>
                    </ul>
                </div>
            </section>

            <section id="geografi" class="profile-panel" role="tabpanel" hidden>
                <div class="card">
                    @if ($wilayah && $wilayah->map_iframe)
                    <div class="wilayah-map">{!! $wilayah->map_iframe !!}</div>
                    @else
                    <iframe class="wilayah-map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253889.97198623535!2d107.409075!3d-6.126556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697d8d564dc99b%3A0xc2661e75fca38827!2sKec.%20Cilebar%2C%20Karawang%2C%20Jawa%20Barat%2C%20Indonesia!5e0!3m2!1sid!2sus!4v1761791716317!5m2!1sid!2sus" width="600" height="450" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                    <div class="wilayah-description">
                        <h3>Kondisi Geografis Kecamatan Cilebar</h3>
                        <p>Secara geografis, Kecamatan Cilebar merupakan salah satu wilayah administratif yang terletak di bagian utara Kabupaten Karawang, Provinsi Jawa Barat. Kecamatan ini memiliki kondisi topografi yang relatif datar dengan ketinggian rata-rata sekitar 5–10 meter di atas permukaan laut, sehingga sangat mendukung kegiatan pertanian sawah dan perikanan tambak yang menjadi mata pencaharian utama masyarakatnya.</p>
                        <p>Kecamatan Cilebar memiliki luas wilayah kurang lebih 45,2 km², yang terdiri dari 10 desa, dengan sebagian besar wilayahnya berupa lahan pertanian, tambak, dan permukiman penduduk. Karakteristik geografis ini menjadikan Kecamatan Cilebar termasuk dalam kawasan dengan potensi agraris yang tinggi.</p>

                        <h4>Batas Wilayah Kecamatan Cilebar</h4>
                        <ul style="margin: 18px 0; padding-left: 20px;">
                            <li><strong>Sebelah Utara:</strong> Kecamatan Tempuran</li>
                            <li><strong>Sebelah Selatan:</strong> Kecamatan Pedes</li>
                            <li><strong>Sebelah Barat:</strong> Kecamatan Pakisjaya</li>
                            <li><strong>Sebelah Timur:</strong> Kecamatan Cilamaya Wetan</li>
                        </ul>

                        <h4>Letak Astronomis</h4>
                        <p>Secara astronomis, Kecamatan Cilebar terletak pada kisaran koordinat 5°59’ - 6°04’ Lintang Selatan dan 107°24’ - 107°32’ Bujur Timur. Letak ini membuat Kecamatan Cilebar beriklim tropis, dengan dua musim utama yaitu musim hujan dan musim kemarau, sebagaimana daerah lainnya di wilayah pesisir utara Jawa Barat.</p>

                        <h4>Kondisi Iklim dan Tanah</h4>
                        <p>Kecamatan Cilebar beriklim tropis dengan suhu udara berkisar antara 25°C – 33°C. Curah hujan rata-rata per tahun cukup tinggi, yaitu sekitar 2.000–2.500 mm, yang sangat mendukung aktivitas pertanian padi dan palawija. Jenis tanah di wilayah ini didominasi oleh tanah aluvial dan tanah liat, yang subur dan cocok untuk kegiatan pertanian, terutama sawah irigasi teknis.</p>

                        <h4>Kondisi Hidrologi</h4>
                        <p>Kecamatan Cilebar dilalui oleh beberapa saluran irigasi dan sungai kecil yang menjadi sumber air bagi lahan pertanian dan tambak. Sebagian wilayah pesisirnya juga mendapatkan pengaruh dari pasang surut air laut, sehingga masyarakat di beberapa desa mengembangkan usaha tambak udang dan ikan bandeng.</p>
                    </div>
                </div>
            </section>

            <section id="tugas-fungsi" class="profile-panel" role="tabpanel" hidden>
                <div class="card">
                    <h3>Tugas dan Fungsi Kecamatan Cilebar</h3>
                    @if(isset($profile) && filled($profile->tugas_fungsi))
                        <div>{!! nl2br(e($profile->tugas_fungsi)) !!}</div>
                    @else
                        <p>Berikut adalah tugas dan fungsi Kecamatan Cilebar secara umum:</p>
                        <ul style="margin: 12px 0 18px 20px;">
                            <li>Melaksanakan sebagian tugas pemerintahan daerah kabupaten di wilayah kecamatan.</li>
                            <li>Menyelenggarakan pelaksanaan pembangunan di tingkat kecamatan sesuai kebijakan daerah.</li>
                            <li>Mengkoordinasikan kegiatan pelayanan publik dan pemberdayaan masyarakat di desa-desa wilayah kecamatan.</li>
                            <li>Mengumpulkan data dan informasi untuk perencanaan dan evaluasi program daerah.</li>
                            <li>Melaksanakan tugas lain yang diberikan oleh Pemerintah Kabupaten sesuai ketentuan peraturan perundang-undangan.</li>
                        </ul>
                    @endif
                </div>
            </section>

            <section id="sejarah" class="profile-panel" role="tabpanel" hidden>
                <div class="card">
                    <h3>Sejarah Kecamatan Cilebar</h3>
                    @if(isset($profile) && filled($profile->sejarah))
                        <div>{!! nl2br(e($profile->sejarah)) !!}</div>
                    @else
                        <p>Kecamatan Cilebar memiliki sejarah panjang sebagai daerah agraris di Kabupaten Karawang. Sejak masa kolonial, wilayah ini dikenal sebagai pusat pertanian padi dan tambak yang menyuplai kebutuhan pangan lokal.</p>
                        <p>Perkembangan administratif Kecamatan Cilebar ditandai dengan pembentukan lembaga pemerintahan lokal yang terus berkembang untuk meningkatkan pelayanan publik. Seiring waktu, berbagai program pembangunan dan pemberdayaan masyarakat dilaksanakan untuk meningkatkan kesejahteraan warga.</p>
                    @endif
                </div>
            </section>

            <section id="struktur" class="profile-panel" role="tabpanel" hidden>
                <div class="card">
                    <img src="{{ asset('img/Struktur.png') }}" alt="Struktur Organisasi Kecamatan Cilebar" style="width:100%;max-width:720px;display:block;margin:0 auto;border-radius:12px;box-shadow:0 2px 12px rgba(2,6,23,.08);object-fit:contain;" loading="lazy" />
                </div>
            </section>

            <section id="pegawai" class="profile-panel" role="tabpanel" hidden>
                <div class="card" style="padding: 40px 20px 60px;">
                    <div class="pegawai-page-header">
                        <h1 class="pegawai-page-title">Data Pegawai Kecamatan</h1>
                        <p class="pegawai-page-subtitle">Struktur Organisasi &amp; Pegawai Kecamatan Cilebar</p>
                    </div>
                    @php
                        use App\Models\Employee;
                        if (!isset($employees)) {
                            $employees = Employee::orderBy('display_order')->orderBy('name')->get();
                        }
                        $groupedEmployees = $employees->groupBy(function ($employee) {
                            return $employee->division ?? 'Lainnya';
                        });
                    @endphp

                    @if ($groupedEmployees->isEmpty())
                        <div style="text-align: center; padding: 40px;">
                            <p class="muted">Data pegawai belum tersedia.</p>
                        </div>
                    @else
                        @foreach ($groupedEmployees as $division => $divisionEmployees)
                            @if ($division && $division !== 'Lainnya')
                                <div class="pegawai-division-section" style="margin-top: 30px; margin-bottom: 20px;">
                                    <h2 class="pegawai-division-title" style="font-size: 18px; font-weight: 600; margin: 0;">{{ $division }}</h2>
                                </div>
                            @endif

                            <div class="pegawai-grid">
                                @foreach ($divisionEmployees as $employee)
                                    <div class="pegawai-card">
                                        <div class="pegawai-photo-wrapper">
                                            @php
                                                $photoFilename = $employee->photo_path ? basename($employee->photo_path) : null;
                                                $photoPath = $photoFilename ? public_path('uploads/' . $photoFilename) : null;
                                            @endphp

                                            @if ($photoFilename && $photoPath && file_exists($photoPath))
                                                <img src="{{ asset('uploads/' . $photoFilename) }}" alt="{{ $employee->name }}" class="pegawai-photo" />
                                            @else
                                                <div class="pegawai-photo-placeholder">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="pegawai-info">
                                            <h3 class="pegawai-name">{{ $employee->name }}</h3>
                                            <p class="pegawai-position">{{ $employee->position }}</p>
                                            @if ($employee->phone || $employee->email)
                                                <div class="pegawai-contact">
                                                    @if ($employee->phone)
                                                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $employee->phone) }}" class="pegawai-contact-icon" title="Telepon">
                                                            <i class="fa-solid fa-phone"></i>
                                                        </a>
                                                    @endif
                                                    @if ($employee->email)
                                                        <a href="mailto:{{ $employee->email }}" class="pegawai-contact-icon" title="Email">
                                                            <i class="fa-solid fa-envelope"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </div>
</section>
@endsection