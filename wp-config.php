<?php
//Begin Really Simple Security key
define('RSSSL_KEY', 'NwLevgBgLHibzmxS38VPzAjG8uZLfuNsEZ1imKuwZ3pkIICMIpN5PNQfCeQjKwLw');
//END Really Simple Security key
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wrblo_db' );

/** MySQL database username */
define( 'DB_USER', 'dev_wrblo' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wrbloRocks!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%%rQ#}CE-,c0_drbL&4P;F)9saw+06D@4Z^BI==+,6?_s+t/h@`L]1{{t|)rRATL');
define('SECURE_AUTH_KEY',  '?m7Gs`S_-NCWKWwYH]RW;76+-$M9CVQQSe@aU!i.kh{5Gy`S0I[%|p*vX3)=im&.');
define('LOGGED_IN_KEY',    'sqci+{u+- k*0@|9m)-e)aza_p3X9&^+e-F/M~t h-Lxd^=tR!5?M0-uVTn|)SFc');
define('NONCE_KEY',        'SA-<(Ij_t}AWWCYp|p5m{-kFsQYko/)8n+B-_LO-`{kV!{KXzGUpg@)3O[2u^y?2');
define('AUTH_SALT',        'i<GTk:N>m?Om~~=MI_S17+$!ar=SE^tNo)btL<>Mp+xy(ke0;|4[+6/Q-BBZDjf!');
define('SECURE_AUTH_SALT', '~2:yudba:/}l#=P-mdTHVilaeRjd`|L:neN2V9hBT:h-$q:bpMiVgc+;T|DmbI:v');
define('LOGGED_IN_SALT',   '.oa6Vpu6}}TQp:bV<hW*CG<1AVNI/D<FVft-9A3;Ju^HLn+0;1b:+iC)5sbk.ry+');
define('NONCE_SALT',       '<g5e?T7& %}t(i%0 EF*a(gEu3%!7y1u/Mo/+lJne>d5hb+CwUo.L]-]|;W]U[-7');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'AUTOMATIC_UPDATER_DISABLED', true );

define('FS_METHOD', 'direct');

// define('FTP_USER', 'ftp_wrblo');
// define('FTP_PASS', 'Fl@m1ng0');
// define('FTP_HOST', '77.68.82.177');
// define('FTP_SSL', false);



define( 'DUPLICATOR_AUTH_KEY', 'lqnaPBBLz~!cu9n1N@mh=L_>anAf!1: ;R 5AQW?D%]D=s3_}R3Jp[ +*2)]632O' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Enables page caching for Cache Enabler. */
if ( ! defined( 'WP_CACHE' ) ) {
	define( 'WP_CACHE', true );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
