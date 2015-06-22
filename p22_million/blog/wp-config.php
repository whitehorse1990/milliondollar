<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dbname');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('URL', 'http://dev.vskytech.com/p22_milliondolar/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zo.U-&UVxmZ_ymGJ{6{:$m-vOv<2[6hT&ZgQ]TG$J;p,*L8aLf-|`2XnVPA:.+#&');
define('SECURE_AUTH_KEY',  ']oY{U^wh?6+kk0;s2>?g.uvGtP|0.ZKZD=+&;-y8bikmpdacioI)8N2jO>c%%ily');
define('LOGGED_IN_KEY',    '+$iV-UU76r]QWW,?D75E@h@A=TnLz+|$/?,P?R8XF#mi[o]}naX9w=>n-yiyr>C@');
define('NONCE_KEY',        '+}FHs&|`-K&*fevjPV~g/<L p_Tn?GVwC!iBH[];OH!yF,g|sJzgKuTk^*p-qp9t');
define('AUTH_SALT',        'Mr2K~Nsyl]|YK{E@bX^KOh+|6<7-AE57dN>*F|/{Dw{t~&9QY}E<[y29se@X,!zd');
define('SECURE_AUTH_SALT', '=p/vFbRP^XM]])62*%-zn$Qw4w3#gyF0|z%t,#[FY*K+xYJ@t_*oZmk5qupGVN9g');
define('LOGGED_IN_SALT',   'i}BvHi0J(3.33&#S0L99=R;PZ,vki*;-7B{^t[[Cxz08?1K+OJO!,v{jN9-<t8_/');
define('NONCE_SALT',       ')-&| x0s^-+QALD=u]U+ R#fbls+^8ROs)NXB)CBWW0^:`2C8,.BglAhmGD<]POt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
