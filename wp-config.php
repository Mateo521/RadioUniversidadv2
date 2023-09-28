<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'b18_34896438_radiounsl' );

/** Database username */
define( 'DB_USER', 'b18_34896438' );

/** Database password */
define( 'DB_PASSWORD', 'candelaygatu123' );

/** Database hostname */
define( 'DB_HOST', 'sql203.byethost18.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'B~qanoWW!1NTD3PyAAkB8Q}41~3/[,]N+)h>6cQl0u_15TE1(#0_;Tl1gyBa<jQd' );
define( 'SECURE_AUTH_KEY',  '~3mW,wgw*|5Ik`uzdkhU3z@-%)]5K>M-Rd(gu:1RDsO}8M%9bMk$RW}L3^6!owLd' );
define( 'LOGGED_IN_KEY',    'CA;&cb19anC ~Zwz]@Ac:K~I2s6!+L^f/GD~G,UsD{ZuoDe0upL#Jqv@0Mk)#Kmy' );
define( 'NONCE_KEY',        'G0Yl%0IkY64w.~vr+]e!* :%3Q:A`Pp=.f:C>0g%33E08o](E++kA9/$01RKI#@*' );
define( 'AUTH_SALT',        'eF[BsCCow*T]L3-y|!f_+/v1pxoYVZG;sw+YEbOSU-X[ez=^KFtQ|CeLzFhK8o2`' );
define( 'SECURE_AUTH_SALT', '7CVeSy]&4_<TMFB%HkLV:iWW7m1$Ak,:K2dZ[ze<r:1ZHX+rCq:w%>pzgxYlF,-(' );
define( 'LOGGED_IN_SALT',   'ety{8%{-i^WpuAO0{}1Pvqv-):1xW.=S2;1k&+2[~#-M*$VWH:ATx:D=Er7rbuoj' );
define( 'NONCE_SALT',       'j-RX/qe3/<qttfI6FAu9q;B|J4Y(Ok&NKG`tB!aHDxC+gp<Aa5!s?ksrTz,B3Vk8' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
