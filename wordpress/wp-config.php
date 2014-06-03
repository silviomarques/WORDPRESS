<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'silviomarq_3');

/** MySQL database username */
define('DB_USER', 'silviomarq_3');

/** MySQL database password */
define('DB_PASSWORD', 'AthAtvnrKx');

/** MySQL hostname */
define('DB_HOST', '187.17.103.158:');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'VjfLyLGW6zVeY8dNhzOQIE9iaEcShLkNd65rGiLcRtJocSISQ^ONoI$5XWY16qoM');
define('SECURE_AUTH_KEY',  '79%1i3kcGRn!q4txmzH%oKm$Y5ODJtRRW3cvansAxkimyXMGhuH35w3ox)gK3E!h');
define('LOGGED_IN_KEY',    'QPHu2M)!48WDsQ$YnY)aFJf7VbSOm4zRp(7^hPQex%suBmrb04Oy)uS(9yqktEv4');
define('NONCE_KEY',        'zYO#llsBrtziGsyaTzaWOouVJZztVg@o4#^W$zK8tkY&#E(LPjQd6jxj)hVSK(Mb');
define('AUTH_SALT',        'vN@KPBsIVe7A2w9W%7mQy&5eMvgZaczmjEgudDVdH9#%nb3W!t*GoMuZKdhnFHCr');
define('SECURE_AUTH_SALT', 'msn)%jc@Vk6ddroGrRey0FufQhvn1RWF3yvrUv2N62oiz4Z1dXArH71@%(CupLag');
define('LOGGED_IN_SALT',   'WZZ#bM3vITywskyt0u0d&C4(&YnHTm4QnSfzVcSuROU6Ea9zwS7!e@mGOIF$c5fT');
define('NONCE_SALT',       '$38Mrd(7VFBkHMZVAIk5aH6e)Dz*9z5hWmb3k6RKDihTKB#Sxt)PKyUKNjsQdYVO');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'apswp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'pt_BR');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
