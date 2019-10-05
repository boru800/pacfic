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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+dtVLixtZOcyvyX5uxatot5L0ubY0oMhWdsJoC0FeeArXibfUL/IPllllIy23RPrOkP4L/tU/8Tkrm36N7eklQ==');
define('SECURE_AUTH_KEY',  'HzXPtRfCObLW8qasrfRe9IBIfTup9B4RveFT/a5DENdrblLBl1AWKm0ob+/Vt3j9HtG7S5XHF7/0VNacMmq4iQ==');
define('LOGGED_IN_KEY',    'q3xd5di+jN1CbAreFivjoxqkAZfeqnbvBKTHKL3miuu8jXUuy4QHDXTGZJH+nLUERTj6Hu+Ya5ef6Byk9TgozQ==');
define('NONCE_KEY',        'x/kr40Vhgb2+NW/Q8IFUYERZ70qvw/rkIW4RHsgik9Q4rkRmdNume2mmr/Y+N1kbcgnMV1gj1bDV8Zk4w331hA==');
define('AUTH_SALT',        '69sj/EDCuUqiDpiNsRKgD3JkwHi7tniZNWzWRv8tLPXkfRWfsfjkyeDP3akkz0B/MR6VJXcpq/A8qUw1ViEcZg==');
define('SECURE_AUTH_SALT', 'sCSWYLx8Rn5oNef7nW6OzPjjvS2yvZ4ybgPo7+SFHanoR34XilWiIgtCCp9y6wo4oKqGiyxk/snTNe8juikRJQ==');
define('LOGGED_IN_SALT',   'pd0kktC1L8pyjVTD9soglnQk6N7Cp587Zm5FsPC+q0pUOiuThHj7Az0I24hgo4qOgu6UauxscCSVN4W+nepxig==');
define('NONCE_SALT',       'r4eXAlLLd4qIOOCEMqVditejGE3Y5frJY/nWlH31ah9S4pVh/4nw/3BcYBF+cJFrZbfW+Atu0XYcAqarxZG+8g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
