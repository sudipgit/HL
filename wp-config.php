<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/home1/mytempo/public_html/hairlibrary.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'mytempo_hairlibrary');

/** MySQL database username */
define('DB_USER', 'mytempo_library');

/** MySQL database password */
define('DB_PASSWORD', 'HL#d@fdf23');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'iyrgu_<|4@c|6L] oI{[m-see~<36s[;J~fm(uAL@&Df:f6W2YGS}Y5bG`r@MiYa');
define('SECURE_AUTH_KEY',  'pW[+|2y`x2n6]&a+v7Le%dn7Ylha{*4O|KQi~ oPTZ| zlG-b]Ey%SI|=l_}ureo');
define('LOGGED_IN_KEY',    'h^|KLf{{$!uEc^!4%i[QiM1_2P-]LOY#m1/xO0j0O=f&F/-YA!Cq2L73CV/r5?]!');
define('NONCE_KEY',        '.n#nZ8+-z2}CF{i#%ftU}u^+y2zy1|ZO?No$%/~3zdQYDac`J?%hKwY*E>)RDY&-');
define('AUTH_SALT',        '<Fm;geJZu:hK4iv@Xc/%=Ru0&*#@{tZpQkyUbU~IU%sbe)!o~*2?xQ,{E6xiE(r.');
define('SECURE_AUTH_SALT', 'PeM:hxG~^msV](Co6LNmX3]Q`FSd|v}pB-SGg>;XSp7rItk99}$G/%&msuYo2n<s');
define('LOGGED_IN_SALT',   'V}z~$:5-IfEE3mO(lmY9=RZJcK+cnQ,-?d?[}+^HA7=uwF#ZDgBA`$65!>M25g*m');
define('NONCE_SALT',       '!Cf{BvCV!Vy-o3_]i~ipnXdP!uZR[<l`np~3w;I}~jkq}nM8~6m]c}BO$Z8o,do/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
