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
define('DB_NAME', 'thanhnga');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bM$C>$?HB d{0n2z;#F~ny4s^;:>5~4rBLem-uq}|pn0+Nxn)+j!mY(,TXN-_B,=');
define('SECURE_AUTH_KEY',  '[E:8vTH^ 3+pG ;86a^Qb{25n%%n4b-~=~~yJ2mnS#s+u]JC5#Ui#n7gw|I,;e_8');
define('LOGGED_IN_KEY',    '8%v#WA8FQr)_Mx<Y&]%Vd1tPHz+d0n,lq^#Xf92Kl.ZT{HvlF,6(r=a]a@@w.f*_');
define('NONCE_KEY',        '_c,a ]vgwR|WN[>_{UA<8}0nA=4xS-|@A;SP@5J|f@OUh8eD:#B-cYgG{l-8P_o3');
define('AUTH_SALT',        'sDZN+3_!e en=p[R<Ni~hYw?.(DcCD=(-SudkyTPAmSNE4HxDg6+d%|V~<i,Ri%0');
define('SECURE_AUTH_SALT', 'kn.x*bYa_kh]6Kc0f()<xyAwuNO3Yr*:=B|nX+v1?hDD-fYWC7Vk!G>(1[.1SiGO');
define('LOGGED_IN_SALT',   '1,AXuW](`-%}.sD-B-_#vqv_q% %FaDd *GI^#+^HMxRr;KZj7qS.|-I-8AT.-=$');
define('NONCE_SALT',       'e[2wk-oZX~?:!)/JwrU08aV1qs5}?SX:k}[81iG/NPQ{GA{0P.>@C9&+?x7!i:$q');

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
