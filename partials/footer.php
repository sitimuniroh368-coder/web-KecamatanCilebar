    </main>
    <?php
    $settingsStmt = $pdo->query("SELECT address, phone, email, whatsapp, instagram, facebook FROM settings LIMIT 1");
    $settings = $settingsStmt ? $settingsStmt->fetch() : null;
    $address = $settings['address'] ?? 'Jl. Cilebar No. 195, Kertamulya, Cilebar, Kabupaten Karawang, Jawa Barat 41351, Indonesia';
    // Fallback defaults when settings are empty
    $phoneNumber = $settings['phone'] ?? '085716174604';
    $emailAddr = $settings['email'] ?? 'kec.cilebar.id';
    $igHandle = $settings['instagram'] ?? '@KEC.CILEBAR';
    $fbHandle = $settings['facebook'] ?? '/kec.cilebar';
    $ytHandle = $settings['youtube'] ?? 'KecamatanCilebar';
    $ttHandle = $settings['tiktok'] ?? '@kec.cilebar';
    // Footer news
    $newsFooterStmt = $pdo->query("SELECT id, title FROM news ORDER BY created_at DESC LIMIT 5");
    $newsFooter = $newsFooterStmt ? $newsFooterStmt->fetchAll() : [];
    ?>
    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3>KECAMATAN CILEBAR</h3>
                    <h4>KABUPATEN KARAWANG</h4>
                    <div class="footer-address"><i class="fa-solid fa-location-dot"></i><span><?php echo e($address); ?></span></div>
                </div>
                <div class="footer-news">
                    <h4>Jam Layanan Kecamatan</h4>

                    <ul class="footer-service-hours">
                        <li>
                            <span class="day-label">Senin - Kamis</span>
                            <span class="hour-label">07:30 - 15:30 WIB</span>
                        </li>
                        <li>
                            <span class="day-label">Jumat</span>
                            <span class="hour-label">07:30 - 16:00 WIB</span>
                        </li>
                        <li>
                            <span class="day-label">Sabtu - Minggu</span>
                            <span class="hour-label">Tutup</span>
                        </li>
                    </ul>
                                   
                </div>
                <div class="footer-social">
                    <a href="tel:<?php echo e(preg_replace('/[^0-9]/', '', $phoneNumber)); ?>" class="social-item">
                        <span class="social-icon"><i class="fa-solid fa-phone"></i></span>
                        <span><?php echo e($phoneNumber); ?></span>
                    </a>
                    <a href="mailto:<?php echo e($emailAddr); ?>" class="social-item">
                        <span class="social-icon"><i class="fa-solid fa-envelope"></i></span>
                        <span><?php echo e($emailAddr); ?></span>
                    </a>
                    <a href="https://instagram.com/<?php echo e(str_replace(['@', 'https://instagram.com/', 'https://www.instagram.com/'], '', $igHandle)); ?>" class="social-item" target="_blank">
                        <span class="social-icon"><i class="fa-brands fa-instagram"></i></span>
                        <span><?php echo e($igHandle); ?></span>
                    </a>
                    <a href="<?php echo e(strpos($fbHandle, 'http') === 0 ? $fbHandle : 'https://facebook.com' . ltrim($fbHandle, '/')); ?>" class="social-item" target="_blank">
                        <span class="social-icon"><i class="fa-brands fa-facebook"></i></span>
                        <span><?php echo e($fbHandle); ?></span>
                    </a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>
                    &copy; <?php echo date('Y'); ?> <?php echo e(APP_NAME); ?>. Semua hak dilindungi.
                    <span class="sep">|</span>
                    <a href="<?php echo e(base_url('admin/login.php')); ?>">Admin</a>
                </p>
            </div>
        </div>
    </footer>
    <script src="<?php echo e(base_url('public/js/main.js')); ?>"></script>
    </body>

    </html>