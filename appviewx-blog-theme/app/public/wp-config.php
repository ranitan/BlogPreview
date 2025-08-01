<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'k+!^*mGBx=54#;,5KEln#iWIe*^aU`x.4[-@I2VC@`*yjW0) SekIkO_Vum9O9xu' );
define( 'SECURE_AUTH_KEY',   'xi?Wth]LfS%Z%Ih*B#OZRe,`Pl`]!f6vix>/`KW{G*{P)_yrA8Rsjl*A)7 ecV]t' );
define( 'LOGGED_IN_KEY',     'gWjIagyg%=4r!dtemL!|4L?]W.z:j$8radX|@GKl,Cwd?}x0%ii2e7Hl~.}sETUf' );
define( 'NONCE_KEY',         'jKYNVs[`[0(%$CZ!p^u5%d,x8M!YOQyDJ_*qr9=mjo!=wLjvj_gB4N?}y/:g4yd1' );
define( 'AUTH_SALT',         'KL; r.f_~vm,F~Q?iWcw5(j9c|oPDX;S%O3+{Vd_,Ez#.k6_YOoBL-o;9uLp@eE:' );
define( 'SECURE_AUTH_SALT',  '$X7gvQs7mf069Q)/YmOMwB#G{9-@4ZQbTQ.c05p=pL.+ZZOZ.D,NW7lI{I3c?(tj' );
define( 'LOGGED_IN_SALT',    'F :#l&k/vk%v{@-QaJ`<u|E[auXw.y))qh1W}{~8q1~Ar@pD./+aBe6TdLfFPqO1' );
define( 'NONCE_SALT',        'd^z}A1xI,LAA]S65<Z$B,2RhiD8rEhy*!H,$).G=U!mu?}.!2}.S!+^E$p3w9jwl' );
define( 'WP_CACHE_KEY_SALT', 'DEm%vd#j$6b?!*>)S+2->[)Ak$]A=MdvB&7^`sjrG{F}ZgFoAh2vQxW-18Bb8~|&' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
