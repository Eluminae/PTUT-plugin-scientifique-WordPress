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
define('DB_NAME', 'DB_WordPress');

/** MySQL database username */
define('DB_USER', 'WordPress');

/** MySQL database password */
define('DB_PASSWORD', 'rE3F73SZw1Fl0hK');

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
define('AUTH_KEY',         '8%^!m|O!_SO|!a*`S.GmKFw9VCz64wMCxNNT>emMI /r>yU|1|9.!4V;B#G$<I$f');
define('SECURE_AUTH_KEY',  '|?14rrED9hEvzy8-/a;M[luG+/}s0s;1&^!mlOH!o:mq|M^)nF)R+[n<(T@%DL2L');
define('LOGGED_IN_KEY',    '=(`u5*4- FN/d[IM3^P9OkN{Ufn>/yIjA=+>J((2+Z7?$Eb[/~OOP]dC0OO,JxAG');
define('NONCE_KEY',        'h|O|itQoFf>TA`KQ+vd H<%!ZR7CgM_P%T,l?rf9jEhvlT1Cx51w5P.<w9|{x|[Z');
define('AUTH_SALT',        '>5KXp4`<{uh2BrQ.5ECvk8|Z)Wf%9G/Xm$HIi7- s`DN-Tlm1VMdeVL^h|6F8#=<');
define('SECURE_AUTH_SALT', 'KgsyzdxYG^2v-+ss[#}DRXf,#@N~^IR_Qy^j+w=sx_!0bV&O*^yPTlRrwWJv=_2%');
define('LOGGED_IN_SALT',   ')`bzH(=+[U8y4*cgbww{-$e!N Z]SpgL-0tt356B~._Bg-`#1&`N,9C5_Cv(#^VI');
define('NONCE_SALT',       '1wjh1B=ox?3P[78^Sk393[k8e~9o^0(mXCm/#8iKm%bq!gJTeloH-yOrB^NjZp|D');

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
