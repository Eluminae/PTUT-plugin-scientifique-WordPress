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
define('AUTH_KEY',         'j/qJ,bk#nkcRxW|Af6M*Festl/u`z0V%jU2)BEl`^tO|h=MmLxAMzN;9&?HdVdhG');
define('SECURE_AUTH_KEY',  '3)g-6;B3dBX vlZrtU8TR`]V*x<6k)aODKyU 3fFcO<>&pa-Z5B[x],xA.JGm^qR');
define('LOGGED_IN_KEY',    '8Ft#w+FL-|ooS2SJapQF{*>VY+0cq:ZwM8fup$Yj4VKk< BIP<6q(ApZynuMa5|U');
define('NONCE_KEY',        'k#KeP+y;M-eAe[hT,vrtanhdU5++5I$}/GFQkbN_OSl1Ev>uAGq^Okstro|lg[x=');
define('AUTH_SALT',        'c^u-Bap+j-!%Y|z^)|Vdrd.UVc--YDPhF;N]oLOv>jh&CQCwBy>j:-3<v9C|ne&W');
define('SECURE_AUTH_SALT', 'M5TB8PHXEm*83/Zda$@].Mm{I)N_2(!6.v;f7-de$?a2:Unx*Eq_~lVy$4I~|E(w');
define('LOGGED_IN_SALT',   '5y,_LGVC&ccN DY@6Ga<QMnC+^I=)5a;?hu%[F:-^,;L),7C+|a$0N:6)q6. wqx');
define('NONCE_SALT',       'wH?-Yc>sW~=Shv{v{c&_lS-H:~i)#9G*!f!rc[f[~,S[pZqRENJDj,glgS-NB%C7');

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
