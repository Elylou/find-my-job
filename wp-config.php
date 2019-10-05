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

// ** MySQL settings ** //
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
define('AUTH_KEY',         'l6l8iRJbfuNZCMxe0vG2e+EkDcZxGJbwVai19+k7aZf3I6Qg+aW9OYjRqE6t0dQbSjCPrsbh3fjzpvUvt1hJQg==');
define('SECURE_AUTH_KEY',  'KpYXU9TK+krSsMzH6ZKdAFfmUP/+vrdZ9844Ny6IS3UxNAOg2sm7Q5Bk1kMaAgrvgJI4SEDJFwj1kl2rpHQlaA==');
define('LOGGED_IN_KEY',    '3S4VnhIu52bLTaoQpq8/0fchORXL4O3Cx76EB6Fh1dGx2RmDTy56MkQSHbkeBE6/NkZZftdVTjxQBGUk4xE17g==');
define('NONCE_KEY',        '15KbPiZFgGzlpeh9Gn2EfcIb8ypM+eD41YNKXnDxzNxebWbj2LZjqXYFVyZpF6guj0Rb/RtczFcfb6ptYvkzag==');
define('AUTH_SALT',        '60vQ6KnlfAS9MCdfFXc2a7McqOA3W2gWyqvyOwwk8izlkbtyM1QPInrqhBwkSWgUyybYHf+iH04N072iGcZEhg==');
define('SECURE_AUTH_SALT', 'OXLgA3+BrZ2js/3AhB4tbd6bB2aSe0serzoaYB2cLHmgmGV6j7TtVwVQ6uYjXJrseA6o0tBxLbldTc0IsqODJg==');
define('LOGGED_IN_SALT',   'CT13XxmchCkFMykDSoYdkELRPEmFMy0Sr05cF6PywU+G5qdwP2r5Ail3ihJAIA4MHuX57VNwbGl+2CujvI2oJw==');
define('NONCE_SALT',       'XQS5w47qJQhM0aDqspysHJqA8BWGpzV30be15gZ4gZkmGGlCq6ZVSIorFh9ZS5iRJKZMnzdzqczU3EzhFvxU+g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
