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
define('DB_NAME', 'fashion_shop_wordpress');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|5* WIK0hSzP%_P6RI&%REV[vLIGdF@X9e%Qh2h[aU*`SB11#a#>Z]m^<XY/:QpO');
define('SECURE_AUTH_KEY',  'zF/Z02nmPK.%|;VVv*CGw/luKjg7OAl]PWPn2+ouv.2bGP.<CxLHzB8S64DLp1aT');
define('LOGGED_IN_KEY',    'QFEAul*s_u9Il>ru8wCpw)!}x^A`,&v<{iRmOq68aC3WyIEN(5[9StRHm)^NGs^^');
define('NONCE_KEY',        'Wmh};0|a]%}cS>1ZM,ZTJg`]A]QiunxoZ,6!xVxoR=>K>{ V6CV*m%m+@7*UBQV%');
define('AUTH_SALT',        'kn|iph~I:VjokJW7kb=&r9i5uG2EF^bR>pj[:]T=nEGIABej<pA)2x16+]~DMz2i');
define('SECURE_AUTH_SALT', '(4=uVvOZLtC?<4KZlqf+e-92YD^)Cs$6H$A23kMq1}Rh-Wm(Ac,FZOY#5k`wvPIs');
define('LOGGED_IN_SALT',   '*QQt6%s/pi/tT3&aziUM]#l6>t#..TZ8+vJOh_j7Kn[J+4u#[b{4g`Qo6:3}05KK');
define('NONCE_SALT',       'X_BMZ:k[`9T-lC&Y@Qxqn&I he-}YTOLFEXcT=Rr^wB e<f+:LjvDD)CA]+j.DM5');

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
