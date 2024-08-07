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
define( 'DB_NAME', 'yh465455_db' );

/** Database username */
define( 'DB_USER', 'yh465455_db' );

/** Database password */
define( 'DB_PASSWORD', 'dRTUN2mW' );

/** Database hostname */
define( 'DB_HOST', 'yh465455.mysql.tools' );

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
define( 'AUTH_KEY',         'nDvzN9){m3o,F5;`RG,K:I ~GK*FdE~nv42XG^C1//ZIj:XKCve>1LxJTy!$l8{j' );
define( 'SECURE_AUTH_KEY',  '+P{HVx!!zYM^]#gyM=s@`6be4q*6Q9Pv>euQ[/:zF&-t/L~Xy]T?89.=QBn0DHC!' );
define( 'LOGGED_IN_KEY',    'AAqF/k%K :;ZqyF2${q]ZHj$1rn,xo:xC.ghL.eQeK}.%W-N>Zw-|*-CWMC8/Sw3' );
define( 'NONCE_KEY',        '/cA40]/u3]93jp![H$lXXwx<T}e|T{hsmCA@+d/_BC|hf^;y?o&/N)6No}Qgyu}V' );
define( 'AUTH_SALT',        'WyIU%s*PUo%|efTZLmu30vwC&,gaF%T#/tz_fn~(?%Yxf*LJV(!4[H^2yhX9!>T*' );
define( 'SECURE_AUTH_SALT', 'FHE{eDuVu.pl}qS$4J0r}`|p`Sn+#UDuQ!yAW-,38:PIDW8U*E`%_-8nvp:3#IyO' );
define( 'LOGGED_IN_SALT',   'J2&z}x%n$^ZMG#L!Lp!5oWqWef:k1@4oth.<y#X!*kvPDp: ?05[y3kr{L1RrQuG' );
define( 'NONCE_SALT',       '<D0#;[ag%A12&Uf-`u+5?1t^!n,  {_TF*c?NiyC<G42E;Fg!hN8$F+Teov4mQQd' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mriydiy_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

// urls & SSL
define( 'FORCE_SSL_ADMIN', true );

// theme
define( 'WP_DEFAULT_THEME', 'mriydiy' );

// general changes
define('WP_POST_REVISIONS', 0);
define('AUTOSAVE_INTERVAL', 3600);
define('EMPTY_TRASH_DAYS', 3600);

// disabling updates
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISALLOW_FILE_EDIT', true);
//define('DISALLOW_FILE_MODS', true);

// allow svg
define('ALLOW_UNFILTERED_UPLOADS', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
