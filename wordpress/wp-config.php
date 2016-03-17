<?php
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ptutDb');

/** MySQL database username */
define('DB_USER', 'ptutUser');

/** MySQL database password */
define('DB_PASSWORD', 'bonjour');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'S_[|/V#!.G4+-Ac>/<~.wx+I5)w3l[T:.%-ktqZk(QZcj-i+pp|qWM~cus-=+h:B');
define('SECURE_AUTH_KEY',  '9IEl&wfh2Hw^:E!q%e$ihwj|iN@}e6.v6LS.}PHdO#J-Bv]=u_qo#1Y]a]7j>Wpk');
define('LOGGED_IN_KEY',    'W`7Udwd$8V|K|sh]g!p>V;fpSPa =LWT2x-Lt5wqOvlDIHV@h7d50Bv6O YC-|07');
define('NONCE_KEY',        '$++r$UOp*|qEs3qZXZNuhliEsZ1Utf+/?9Y.PKgYy1Sl$beXE3Te9e3bdq.#7WHJ');
define('AUTH_SALT',        ' E=>1fNjZ(3e-|AM?22R;&KVY]-JH%9Z*|6{Cq5{R-|nS^UH2WWM7SY9t]+Jj4o{');
define('SECURE_AUTH_SALT', 'ST|>S%R&UPo2R:/Kz%XMr*N>>xaKIEt,o1)=5_&Lw`R,b[n?<uG--7++l)=#je&/');
define('LOGGED_IN_SALT',   '<[+}5~[*Hf)tK+.-B[(F,X.BpP]Kx<c-Xj061R APKjy:a-px/?u8LFT`A!(_8+J');
define('NONCE_SALT',       'OMma-r4Dn(m+^s~j<L4nYyEUn~K~JV4AmYLr*yN0*}``P.3V!.K[&.A77fS}V}9B');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
