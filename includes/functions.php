<?php
require_once __DIR__ . '/../config/config.php';

function base_url(string $path = ''): string {
	$prefix = BASE_URL !== '' ? BASE_URL : '';
	if ($path === '') return $prefix;
	return rtrim($prefix, '/') . '/' . ltrim($path, '/');
}

function e(string $value): string {
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): void {
	header('Location: ' . base_url($path));
	exit;
}

function ensure_upload_dir(): void {
	if (!is_dir(UPLOAD_DIR)) {
		@mkdir(UPLOAD_DIR, 0775, true);
	}
}

function is_post(): bool {
	return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
}

function csrf_token(): string {
	if (session_status() !== PHP_SESSION_ACTIVE) session_start();
	if (empty($_SESSION['csrf_token'])) {
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	}
	return $_SESSION['csrf_token'];
}

function verify_csrf(): void {
	if (session_status() !== PHP_SESSION_ACTIVE) session_start();
	$token = $_POST['csrf_token'] ?? '';
	if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
		http_response_code(400);
		echo 'Invalid CSRF token';
		exit;
	}
}

function start_session(): void {
	if (session_status() !== PHP_SESSION_ACTIVE) session_start();
}

function is_logged_in(): bool {
	start_session();
	return isset($_SESSION['admin_id']);
}

function require_login(): void {
	if (!is_logged_in()) {
		redirect('admin/login.php');
	}
}

?>


