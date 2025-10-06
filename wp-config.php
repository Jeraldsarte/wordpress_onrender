<?php
// ======================================================
// Database Settings
// ======================================================
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') ?: 'wordpress' );
define( 'DB_USER', getenv('WORDPRESS_DB_USER') ?: 'root' );
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') ?: '' );
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') ?: 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ======================================================
// WordPress URLs - Force HTTPS
// ======================================================
$site_domain = 'wordpress-onrender.onrender.com'; // your Render domain

define( 'WP_HOME', 'https://' . $site_domain );
define( 'WP_SITEURL', 'https://' . $site_domain );

// Force HTTPS behind Render proxy/load balancer
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// ======================================================
// Other Settings
// ======================================================
$table_prefix = 'wp_';
define( 'WP_DEBUG', false );

// ======================================================
// Bootstrap WordPress
// ======================================================
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
