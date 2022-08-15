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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'assessment' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'n}SkzTPf@yu7,{M@3C(+~{Dp!4@U~n]i}9~ 9A)vZxf,#y;2#>O9#hfs[hJ]Rd2Z' );
define( 'SECURE_AUTH_KEY',  'P^>545@bE{3jmNzXQB; 3b7V5as*~qWSVp^Jej]IoLTns-*wao;(n,KQRzVX_4w5' );
define( 'LOGGED_IN_KEY',    'oq~G<vJpCZ_)Ii=*_g>d$4LP1E511u6{MR#6k^[^CJV96+|KsX|EL2le>DFA(sv1' );
define( 'NONCE_KEY',        'La|2NCP9%4N5^ail*8=aK?_0dCW&X3.Sd4WIKj?o?isN]Yt[ezp-P!aZ?TY46q$d' );
define( 'AUTH_SALT',        'Ja=jD/1zsm`RxB-LYgKb!wF>U!y7{NUGC$$*Vk?HKCt1)m9M=vPm4}T/l4Fk}~ 4' );
define( 'SECURE_AUTH_SALT', 'DSz9#$Zs =*G?HV*Fil~c[kjM~*-=SKfLx+,%9&U7sZp%$>aFkM|It!0OJypT<#^' );
define( 'LOGGED_IN_SALT',   '-_A/bv4k ^aRXP|42N6bEv,YRq4X^kl;8=GHE_HcFf)daErt)GZLa|v?A-nsN-);' );
define( 'NONCE_SALT',       'C+*i)Y:&|-M_jX!geb6.1RTX`wJBLCW[IP(1,+Agub]h>/].,JQ~G0[4*`/1]BN]' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
