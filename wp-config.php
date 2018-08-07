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
define('DB_NAME', 'applekitch');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_general_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's,z6k-_%Y9c#2&KK2H;$+)Pi_)K5T(NxOy-FtcT:kjp5ew*9@p]d6=.#7B2L2I!g');
define('SECURE_AUTH_KEY',  ' QZ(<zwe;,jC^y=2ExYrdGuG4o<-Jd#{hx+[-]qh^=Wb#`:{<jJqlm+?Xf-%!E? ');
define('LOGGED_IN_KEY',    'E=e 4}j+-5cDec<+21wCUQ)+l#Su~vKh7_)e:D,;H[ILF+]phF2_<`2G61>5~?y&');
define('NONCE_KEY',        'HHNuw3!RQ$j2S!NHGoF+;^ws/E?M|J@}GG6R%gt2D4:6nmQ`w]t{oL%!)&&KP03-');
define('AUTH_SALT',        '.:%CHZzS-v{bmixV[D{m~SjdRj.5reFU-I/_lmM{ rvo0;K)kP!KUfQms3|>K+ig');
define('SECURE_AUTH_SALT', '*Uq4,*bQ-ESXOa|rY`vq9|{8gsu3yXB ]3Ye+sEZ.Zgek9LL@HxDY*-h:$4;z[Kr');
define('LOGGED_IN_SALT',   '!,iN<}-lY22|wu$DA`v-O]F],Me!x5oH]U)8f(!)_g;JTlvMxFLM4xpu m]/(C#o');
define('NONCE_SALT',       'U!]3ux1,NN?hwQ:~#J2;Y&37G|gCM|4su7U:Z;@EyWV|CWccMaYha/+]fsTWd$<+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'applekitch_';

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
