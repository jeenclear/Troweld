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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'troweld' );

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
define( 'AUTH_KEY',         '<,l+Ec MNF|TdfWBs)(t3$~JOn8Di-+#Q:CjkI0y4w76p<(!Xr!wS/JbN1nIT,pd' );
define( 'SECURE_AUTH_KEY',  'TS.JP&Q~[{x1wzgsCE%OOtBjjjT.Q2*, ;m[oJgf&=>w<;hhI|Z;sy@N6fd%,-J^' );
define( 'LOGGED_IN_KEY',    '9U>{^;yh!eAJX#-rH2%D|Z&$,N7IhCh6WbV$VB)w2i-$!2jw]K]2:R*|rV9#FdYe' );
define( 'NONCE_KEY',        ' {*{8@/a3+S1E4_dQ0uvi+^5XAZBXD1@EN!M&B1FK>3xF?cyHLLa%/d.8F`|Fm.9' );
define( 'AUTH_SALT',        'm+r%_@_2|g@o%Ml)IvT(v/3Ll{=G=a!^:N?X*C7y$YwW:+Mlv/s13BLkj9e$U[n<' );
define( 'SECURE_AUTH_SALT', '2u}Cco:jb&e8]27%:;wQC;LcZt8&,~HytHIzC,{42k}WY*Llw,NkJ=:r%fRDvp+X' );
define( 'LOGGED_IN_SALT',   '~gpzSAALrxv7[qjIGIvP;i1|Kc5:h0%{9uw:dYC&G[@q/GM@Z||AMk:6Wn~y0jA<' );
define( 'NONCE_SALT',       'xEQu:s4XZc/.o@,^c_w4q SuTV[g4_i=[Qsez(d<Cyp,cMJ;%58(1{vJt;b[,psY' );

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
