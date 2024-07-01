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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wtwvirmy_WPNSO');

/** MySQL database username */
define('DB_USER', 'wtwvirmy_WPNSO');

/** MySQL database password */
define('DB_PASSWORD', 'R:<r$^7F23t?&F%.>');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', 'f73e9832172910a2946fb71e546c34fc62ab7285095a8b1b991eadf5c891ec46');
define('SECURE_AUTH_KEY', '7192ef803c6a8fd8b3a997537448182d0f3eca07f5a38964d7ad56d2842ed11e');
define('LOGGED_IN_KEY', 'ba22a7ba667a36add6704dd9c576eb9972926b4c10098640230d3c5adb8ca54d');
define('NONCE_KEY', '8ab260932fb226907bbae699a82fbf184514ee1d5aabfc24983ef1cc56ee64b2');
define('AUTH_SALT', 'dc53e893fcab8c4e258bf021512b10aa8a7ec408dd21a505cdd3d9003b0f3458');
define('SECURE_AUTH_SALT', 'a853c6bb176cf2143f5b7cd2ae4883bb698c33ece9efe9c0cf4a6bd03eeab6df');
define('LOGGED_IN_SALT', '3198c6f89dd56a5bf2a53c35b6d4f9088886d1d84b7dd9718d718ade4540c664');
define('NONCE_SALT', '7d2e5c7beb43898f0efd383cd73ee2bf79de32d75f16358159b55fa8e49eaf2c');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'N12_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
