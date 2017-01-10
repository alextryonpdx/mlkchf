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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/nfs/c11/h05/mnt/204962/domains/mlk-chf.org/html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'db204962_2016staging');

/** MySQL database username */
define('DB_USER', 'db204962_alex');

/** MySQL database password */
define('DB_PASSWORD', 'MLKchf2015!');

/** MySQL hostname */
define('DB_HOST', 'internal-db.s204962.gridserver.com');

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
define('AUTH_KEY',         '?nph[}E$l#|e]P)#h]pZX5lw,lZJ!B0 :TwqS]%mL`dEQs%!~R9Nv|P=o&f-oT&g');
define('SECURE_AUTH_KEY',  ')C-2VO!b?|QL?7f.f}RV,$ze.xXwOlb:A$4|`-jOWd+F|9}-t2W@Q#yGVo`e#Ywe');
define('LOGGED_IN_KEY',    '2S<|(DEL_-9c^HkMmu8H-*]`.Cx)3km`=?^9qw?*1VMG$m$ON|Ae}66@gO3f`J{R');
define('NONCE_KEY',        'Ty+G+AK3>AQe>Oc}PSr0JpuA-u{Ks1Z@s+%DL!m4$t7]P5L-|${7|J]#!:X!lEjt');
define('AUTH_SALT',        'xZ*Ol*ih:Yf*|MZ ;?+n17}(b`CH:[itLKq+e9+}wXE+Ng#SfD}E^(O>;-t{T@Xg');
define('SECURE_AUTH_SALT', 'E8$$;3DBg*uHz%y+Vx)Z#nX5!-r> z(+.1G.:|x9C-?v3tjVJ9.!nb`]_ODDY~Sz');
define('LOGGED_IN_SALT',   '-.p1$`q8cf{+-mZg@*/.=qIQ}#bf&]-fn<+n(~VD%edO4~b_`Z,F$)0Dh&h]7q+Y');
define('NONCE_SALT',       'HJ?]O+#rbCR>9&SG/OttJ?_hgBau$%T5}:![?XMpt@gk<:iu4p-8k2)y*gW%yBO3');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
