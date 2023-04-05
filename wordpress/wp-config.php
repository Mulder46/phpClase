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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'Pusp?fnR+*v-zj[Adr^kE1T$L#Sq6{8PO`gcDH#aN>=Ufky-oC-;><&<3[=?z>N?' );
define( 'SECURE_AUTH_KEY',  '0}X(k8cx%L@0ma}aUTZY:Xm}#.c+J}>kScbF*ki)8IB&ODn?LTeSEo11T/4X=Ow2' );
define( 'LOGGED_IN_KEY',    '11z$q!fK_{OjGdx,u9(G8D8z3lYO<pqY}:Lf6px`]9&* )hrKu3#-eDG9!G!J#=A' );
define( 'NONCE_KEY',        '37%xd13*^e[5wOkq5GOk nD]vm~J^rIs7rWIa-u@w:-]0*as+&m8H2)U]nP{&j)h' );
define( 'AUTH_SALT',        '%/TxHsO-_(]#cd~xQ)nkf;2+zZ%Tv]Otj`#e<u@U)_sd&0YU[?hRH0HK*Ud!.uO ' );
define( 'SECURE_AUTH_SALT', ' ]>7 OF;s|.#<NN%^,2NV;1onrFOx(%?5z|7_tc[#tSA=W}b{r14?t-)}HBMKm}K' );
define( 'LOGGED_IN_SALT',   'XycZ)+f{Q;k#LQ=7DE_k{~f} U2@t$U4fvVzc[n,cI9Oi8:]:l$^!bU*Lk<5 4P!' );
define( 'NONCE_SALT',       'J@>02SRcXi}O,;)0E6GvA_)rsY8jn$cFqEG..xi`~f=ta4;Mn0ADgs9toar[DG~O' );

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
