<?php
/**
 * --------------------------------------------------------------------------
 * RÜYA Modest Luxury - Automated Deployment Webhook Script for Shared Hosting
 * Target Host: https://demo.hasanarofid.site
 * --------------------------------------------------------------------------
 * Script ini digunakan untuk menarik perubahan (git pull) otomatis ke Shared Hosting
 * cPanel / DirectAdmin Anda.
 * 
 * Cara Penggunaan:
 * 1. Panggil melalui browser / cron / webhook URL:
 *    https://demo.hasanarofid.site/deploy.php?token=ruya_luxury_deploy_2026_xyz
 * 
 * 2. Atau pasang di GitHub Webhook:
 *    - Payload URL: https://demo.hasanarofid.site/deploy.php?token=ruya_luxury_deploy_2026_xyz
 *    - Content type: application/json
 *    - Events: Just the push event
 */

// Ganti token ini dengan string rahasia yang unik dan aman
define('DEPLOY_SECRET_TOKEN', 'ruya_luxury_deploy_2026_xyz');

// Branch yang ingin ditarik
define('DEPLOY_BRANCH', 'main');

// Path root Laravel (satu level di atas public)
$basePath = realpath(__DIR__ . '/..');

// Nonaktifkan buffering untuk streaming output langsung
if (ob_get_level()) {
    ob_end_clean();
}

// 1. Verifikasi Keamanan Token
$requestToken = $_GET['token'] ?? $_SERVER['HTTP_X_DEPLOY_TOKEN'] ?? null;

if (!$requestToken || !hash_equals(DEPLOY_SECRET_TOKEN, $requestToken)) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    echo "===========================================\n";
    echo " 403 FORBIDDEN: Akses Ditolak!\n";
    echo " Token deployment tidak valid atau belum diisi.\n";
    echo " Host Target: demo.hasanarofid.site\n";
    echo "===========================================\n";
    exit;
}

// 2. Proteksi Lock File (Cegah Eksekusi Ganda Bersamaan)
$lockFile = $basePath . '/storage/framework/deploy.lock';
if (file_exists($lockFile) && (time() - filemtime($lockFile) < 180)) {
    http_response_code(429);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Deployment sedang berlangsung oleh proses lain. Silakan tunggu beberapa saat.";
    exit;
}

touch($lockFile);
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deploying RÜYA Modest Fashion...</title>
    <style>
        body {
            background-color: #3D0716;
            color: #FAF7F2;
            font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
            padding: 30px;
            margin: 0;
            font-size: 13px;
            line-height: 1.6;
        }
        .header {
            border-bottom: 2px solid #6B1D2F;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .badge {
            display: inline-block;
            background: #F4D6DC;
            color: #530A1E;
            padding: 3px 8px;
            font-weight: bold;
            border-radius: 4px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .command {
            color: #F7E7EB;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        .output {
            background: rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(244, 214, 220, 0.15);
            padding: 10px 14px;
            border-radius: 6px;
            white-space: pre-wrap;
            word-break: break-all;
            color: #F7E7EB;
        }
        .success {
            color: #F4D6DC;
            font-weight: bold;
            margin-top: 25px;
            padding: 15px;
            background: rgba(83, 10, 30, 0.6);
            border: 1px solid #A85165;
            border-radius: 6px;
        }
        .error {
            color: #ff8e8e;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="header">
    <span class="badge">RÜYA Deployment Engine</span>
    <h2 style="margin: 8px 0 0 0; color: #FAF7F2; font-family: serif; letter-spacing: 0.04em;">RÜYA Haute Modest Fashion — Auto Deployer</h2>
    <div style="font-size: 11px; opacity: 0.85; margin-top: 4px;">Host: <strong>demo.hasanarofid.site</strong> | Waktu Server: <?= date('Y-m-d H:i:s') ?> | Root: <?= htmlspecialchars($basePath) ?></div>
</div>

<?php
flush();

// Cek ketersediaan fungsi exec
if (!function_exists('exec') && !function_exists('shell_exec')) {
    echo '<div class="error">❌ ERROR: Fungsi exec() atau shell_exec() dinonaktifkan oleh shared hosting di php.ini.</div>';
    echo '<div>Silakan aktifkan fungsi exec melalui cPanel > Select PHP Version > Options (hapus exec dari disable_functions).</div>';
    unlink($lockFile);
    exit;
}

// Daftar perintah deployment otomatis
$commands = [
    'Git Status' => 'git status --short',
    'Menarik Perubahan Terbaru (Git Pull)' => 'git pull origin ' . DEPLOY_BRANCH . ' 2>&1',
    'Menjalankan Migrasi Database' => 'php artisan migrate --force 2>&1',
    'Membersihkan Cache Lama' => 'php artisan optimize:clear 2>&1',
    'Membuat Cache Konfigurasi Baru' => 'php artisan config:cache 2>&1',
    'Membuat Cache Rute Baru' => 'php artisan route:cache 2>&1',
    'Membuat Cache Tampilan Blade' => 'php artisan view:cache 2>&1',
];

$hasError = false;

foreach ($commands as $label => $cmd) {
    echo "<div class=\"command\">▶ {$label}: <span style=\"opacity: 0.75;\">({$cmd})</span></div>";
    
    // Pindah ke root folder lalu jalankan perintah
    $fullCommand = "cd {$basePath} && {$cmd}";
    $output = [];
    $exitCode = 0;
    
    exec($fullCommand, $output, $exitCode);
    
    $resultText = implode("\n", $output);
    if (empty(trim($resultText))) {
        $resultText = "[Berhasil dijalankan tanpa output]";
    }
    
    echo "<div class=\"output\">" . htmlspecialchars($resultText) . "</div>";
    
    if ($exitCode !== 0 && strpos($cmd, 'git pull') !== false) {
        $hasError = true;
        echo "<div class=\"error\">⚠️ Terjadi kendala saat git pull (exit code: {$exitCode}). Pastikan permission folder dan SSH/Git credential di cPanel sudah sesuai.</div>";
    }
    
    flush();
}

// Hapus lock file
if (file_exists($lockFile)) {
    unlink($lockFile);
}

if (!$hasError) {
    echo '<div class="success">✨ DEPLOYMENT SELESAI DENGAN SUKSES! Toko Online RÜYA pada https://demo.hasanarofid.site telah berhasil diperbarui.</div>';
} else {
    echo '<div class="error" style="margin-top: 20px;">⚠️ Deployment selesai dengan catatan peringatan. Silakan periksa log di atas.</div>';
}
?>

</body>
</html>
