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
define('DB_NAME', 'tcolabs8_wp85');

/** MySQL database username */
define('DB_USER', 'antgar59');

/** MySQL database password */
define('DB_PASSWORD', 'banana@2018');

/** MySQL hostname */
define('DB_HOST', 'mysql.tcolabs.org');

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
define('AUTH_KEY',         'xylexvbpe33cs0m6bmlgtxri05kfnbpv3d94ma4zcjttlazeoyqpbbdsc8n2vuw6');
define('SECURE_AUTH_KEY',  '4jw7fuc9miffhnlbo7xnoixi0rdoyvyv3vrxg8scujmhzdwqan5iikfu7rgdnxnz');
define('LOGGED_IN_KEY',    'ltvv3luwnk648qq2jpyt2zv5p1fzxe4pbrm90jfpb0styz29pfy9suafs56cg4lz');
define('NONCE_KEY',        '4q6lbfxmt6erzd8xra8nbdnc6xqvtztqi0vdce9mgo1etjcd2ec82fopdllpmdnw');
define('AUTH_SALT',        'd7g2e5eqjizwfehq1thommiqlin2yfxv0iikamslilhr9jyfsm0julysx8zkviwo');
define('SECURE_AUTH_SALT', 'gnhgasdidjqljj9urpmfmyj1zzsxh0wah4qfveryxgk11l0myfbn6juraik0sg2r');
define('LOGGED_IN_SALT',   'bmd5wzmrfcp6jc1lv3hzpvvysbd8pc9x9rmihttvwhqbkybwllqfgijtehcjjw0v');
define('NONCE_SALT',       'zkztmyzdk3nge2ota2njrjyjkxzgiymjflotawnje2yjm4ymi3njc1ntu5mdq3nw');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
