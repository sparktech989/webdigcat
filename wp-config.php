<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webdigcat' );

/** Database username */
define( 'DB_USER', 'websitecat' );

/** Database password */
define( 'DB_PASSWORD', 'DjM2IEk4LW-lMxVL' );

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
define( 'AUTH_KEY',         'hTv1ys=cSNEoYm|Q=#E`ig}v6%]xnQq,!ux1ZiZ/*F&twD1xn]xrQiO~>&~Y&J]R' );
define( 'SECURE_AUTH_KEY',  'IT&H`ZYU#=uOp?8;gjj)Rp.8#XBg|y]l%dC;yGjK?N8}qAXc>^/1CwacyfK}`Gfy' );
define( 'LOGGED_IN_KEY',    '[qjTuY!Be lm%B9yis;`ju?#X]!lj)^QPoVt7X}N`&@^J:q[3voHsI;[f=.(sm-z' );
define( 'NONCE_KEY',        '7saq1e$tD8{h<{<bVdjE-5(G_:xEVtC;8;gixtSNm=d*KjR<}qj(lNti]FZuV=8R' );
define( 'AUTH_SALT',        'qm7@K^$v,~x{xL,<bl2(F{]<v6[)L?mPG#myWSMBw(/F2ILmKr9{ $qsLVv VZjE' );
define( 'SECURE_AUTH_SALT', 'exyz$ncczq(V+:oTL2)m+vUlD;Nts{`z{xhU]PDg,yHuAhui~8Q%UK.GD-0$Xut#' );
define( 'LOGGED_IN_SALT',   '>oSnp_|_&6cpfKPV~Y^v,ymkM=G6X){wip#DZ,VcIuEo5RHDMJswfb^j>I& +;nf' );
define( 'NONCE_SALT',       ')<4HRTpGEC~:s@]LEWG?:K,)zBvv?Yt2n?!jL#[x;UyGHNQ?I#b>$(k@0}YvLZ_A' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'ed_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
