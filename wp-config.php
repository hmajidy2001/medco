<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_medco');

/** MySQL database username */
define('DB_USER', 'hamidm2_wp4');

/** MySQL database password */
define('DB_PASSWORD', 'A@ACaCT2H#73(~8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w8CD2MBTYlnNP90OhGtGRcs95iqozWAdDX36HeursXyFXu6Z8v3UcCipXqbXFEEP');
define('SECURE_AUTH_KEY',  'AAEWsD1y9RnHlbJpmvacqQe8LeGHQuErppTFwZNdV9n21eaCmuukaSA06CNFgHmc');
define('LOGGED_IN_KEY',    'FQzufYmO3L77DxbdqEBluigtLFwawFvSUjPP9CdEm0JRUKzalfJIHYee7xTig72Q');
define('NONCE_KEY',        'a68C88o9uZJNLGkOPhdxChiYdMysNZ6j7jAAMxR8m5TruCXS4SAosGeet6VxhzR0');
define('AUTH_SALT',        'SIGBLcXKfgbwR5TOq4TBsz7aPuAEiMufnIrXSSL0jWSLp67MZSyaZYjY38Mb8OG1');
define('SECURE_AUTH_SALT', 'NyEVTktuVkMdl8QTYuiHufmURQQvo2WgKCMy3ziTXbKqWMljLFkPgSAtSLnDjdHe');
define('LOGGED_IN_SALT',   '28qWep1LE7rxjQErmrAs7lHfoMfyzVIxXYS2ic09nltvOf4oTYBaLfQltLBr4ZXI');
define('NONCE_SALT',       'T1xRvmyI2jSY69icPrJNIuLWwwn2rMuytvSxi8luJNT3ryWqeh5vyEE3wMifo9M1');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
