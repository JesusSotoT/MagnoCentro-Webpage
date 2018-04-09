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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'h+m< *jG;&?orrlx)x=5-NFmxVEk_#H@YMRbNQnmwq<L~o^FCY0n/rdSrgk7Q_-^');
define('SECURE_AUTH_KEY',  '$1<3[:c7hEfufGLVE~rRs)AW}O7)McjItrurEXmopV`-e4~*Ut:>x.%SdH{0MGNS');
define('LOGGED_IN_KEY',    'M]:Ft!t3J UYd]!T]C>za8p||!NY96coT!0nZj]c/k/--#$4fEGxoLPv_6t_wn=.');
define('NONCE_KEY',        'it>5?<V@rj>AO-`UGQl[UMyI=^~Nxi?QyhK<oxLDQ/]MLXC8zg@Kxrf#{%L*Pa|*');
define('AUTH_SALT',        '`/a 7^2kJ7L@f!_CAlz;iXudq[~+3*=%P~6wZhHwE_~THJ`Q!Ry9]F!D3^5Rq@gk');
define('SECURE_AUTH_SALT', 'DL7);AGQ1Tk[$prF`0s-Lai&mVrPyd&*h_M;@%<G4rk`Le!o.XtfV>5jg~drDV x');
define('LOGGED_IN_SALT',   '^Zg;P.`m ]`A1B]lz(}86c]yxEQ=.pcz&Cv#2DN bm#Woz&eZCB!`R}`#eV%&:s|');
define('NONCE_SALT',       'CM<oB |A`/ijjTTMM=VLD59NzI.JYoWJb0T!Wh)sf#)TjR}hdLm+_GIe;L$f.699');

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
