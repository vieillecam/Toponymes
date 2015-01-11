<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/** FTP connection */
define('FTP_HOST', 'localhost');
define('FTP_BASE', '/Toponymie');
define('FTP_CONTENT_DIR', '/Toponymie/wp-content/');
define('FTP_PLUGIN_DIR ', '/Toponymie/wp-content/plugins/');
define('FTP_USER', 'daemon');
define('FTP_PASS', 'xampp');
define('FS_METHOD', 'ftpext');
#define('FTP_PUBKEY', '/home/username/.ssh/id_rsa.pub');
#define('FTP_PRIKEY', '/home/username/.ssh/id_rsa');
define('FTP_SSL', false);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',~|dl!d:02ZdtKYD`{3^v@#mMc]M84,]YE:)4G.1@e-dQ|C|#Qu*8G}&[9+5S @&');
define('SECURE_AUTH_KEY',  'e@q-,K_1NBGs9cQJ[J)u|XcAk.Cp-hh??dy|2l !,I<k~$VEF{6EBc7eHz=-r#K@');
define('LOGGED_IN_KEY',    'd>.>R aTlhdWoM(hE7;Rau0B}9chRkgVI!l<-]D|#->;7N@zL3Vg}dM`/~N|@#1D');
define('NONCE_KEY',        'HS=DuP^*z%~]~kvmaWE /}}T`/,C]x>1A0ffbgb?@^hugOL&z+m8vg-@1x3>|%S(');
define('AUTH_SALT',        '.t*eHH:+$Dw|BsJNVb3n&Pe49y n7!/V OJ0(i#h_q1J024[`(kO[w.! ~cs6,G_');
define('SECURE_AUTH_SALT', 'Ui_~#gvY-z*l+XUoidUl|p EYynLPiExBx%z-D%8:Q@|uBzCoc$+TZF+&SKISl|{');
define('LOGGED_IN_SALT',   'KP50M=G!PtJ5[K|} 8[?pc9i.VkDcpd2u_T[|[dn^qv>RE%f*O9gn_I<:dK/|a`v');
define('NONCE_SALT',       'jzE b*L#2+2|DD%G`(%(&3-@NP$f|PwL0qRaQ(+_NuFvZ+M)Q}c^UIpzf5#yI4ko');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

