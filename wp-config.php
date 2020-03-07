<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'infesto' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'infesto' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', 'infesto' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '_D&UsJZN?B?4;L4U`@vQ0L#/(P-?jXjRaM+/Un1[60[/bpawL_[5uKix-]D[96{k' );
define( 'SECURE_AUTH_KEY', '>Jo(+Qg $@@E<6W}TGm1s10Gj@$]>5m`d=F[M4R,v/<YFgiT}v(TcS&K023fkVol' );
define( 'LOGGED_IN_KEY', '()nuRsQH/6:;M;nz~u23/2H^~hR>`4H5w+m}yKB<^H6r5anD,]=ZA1ifGwWDO(oD' );
define( 'NONCE_KEY', 'hd@n$y4e#KQwY$<l1XNHK}P4$mp}q&{:@LRBh,01:N{QVNZ+^^7>uK*q+xU.@z?z' );
define( 'AUTH_SALT', '+h{a28]8 XX+/K{s#%5[k*1ewaO3_wWyRL>UHQ8t([EvQSroa/8E2+A&-7u9XY~d' );
define( 'SECURE_AUTH_SALT', 'iv%uL%/.EUppMRZw7CQ =*TszJ0LFaX~T5xn7{`hNv;i?nv @wMi~E==*dBpun@q' );
define( 'LOGGED_IN_SALT', '_Y9LCN?t 0Q(Lmd]&.FmRSdxda)Jh_)b72S9{79PI(oD[_} ,@<f1IkGIq}85~yV' );
define( 'NONCE_SALT', ':H{!KC.=JY q*H;LokY//f_/KYTKW_tPDYQz|2Cx2c^)K-g=GTu_@b37&RzRSA.s' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
