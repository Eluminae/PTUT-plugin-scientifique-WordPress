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
define('AUTH_KEY',         'Q_1a3%#sQ)ElE|U=WMPF) :=%XrF=J->ysHY`<)Qx0@s#G+cYhJt8+-6zs#A]nU#');
define('SECURE_AUTH_KEY',  'v<=[R+ [602k>RS(_ W1a.Pp-|{X/`-C1wq@dMTJI+j2V,v00q!t`<3p~c.v)Iz[');
define('LOGGED_IN_KEY',    '/&M a( FCZw?`rx0#.3%L(|aSCXKi2zH9.{8?hdlWt%A.-Lu^.3oJlTt&Xw{/!&p');
define('NONCE_KEY',        '[wrw5ke#`REbHu/O[j{UB@]q<HRu?$/&<g-4 RS(nu,,Q-I2R<5p0+C9`Jx1+J#!');
define('AUTH_SALT',        'y+%!$Y|[Qb3X_EAp+co%Op89c$C5|0$b@ken|Ib|(Jhht,kxao8}|Pl_~c;SN=~E');
define('SECURE_AUTH_SALT', 'Mn]/ ,DVDUhCzY*ludbz1fGd+hYG<z{^&x)~h4_R]oW]7YJ.Py82-x?=-J~`rs3_');
define('LOGGED_IN_SALT',   '!tYfep$e_u3fz1>&7GlOwF6F)c[;aEU^~{-JhAmPAeaKt.p[un&l8p%&osxvO13x');
define('NONCE_SALT',       'sFcO3teO9lqVPZS[utP+FHu*X l=dA[jL+{J@pNb4^-T<tc1J~<Vy;-5]Fv#QbOA');

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
