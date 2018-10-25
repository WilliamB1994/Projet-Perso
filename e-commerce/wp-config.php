<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'e-commerce');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9v5B-L&|_AItzql-0B=:C$Tdb.d9)Fn&Yhu>,4?NJtxe&!,&-w_S)P7C2tc,/{4%');
define('SECURE_AUTH_KEY',  'rc*}pa_mm,F>9eX!}#p`xZQ!xRZ@Kbw|~OZ@_>&,{`pkxg&.PT!g?$T+U2#b<G%&');
define('LOGGED_IN_KEY',    '-G@[vPGyS;9z>5avCY#1(bf;Xylj&=iY<6TDrW.(:^?VlUZZ*G#cG&!2%qg_0 + ');
define('NONCE_KEY',        'tug,gi-ZCb7?=/;cIFRQ()v[4Fj!/U;}WrD#30LTIBXe8e+Fz?wM4<Ra*SHh&/fM');
define('AUTH_SALT',        'oPYOMr,-wUe_C@5r/)Uckup_Ze;P`WK(2GHq/?GzMsWo7[nWHQDHjy)]^aL7=5=F');
define('SECURE_AUTH_SALT', '?zUG:>7og-^V>Q[V)sO0.es>|axMtcvbu6G5(vyJe-bjkbc[qr`}pz?#o[hAJtcw');
define('LOGGED_IN_SALT',   'FjqvS vK]JsINB9Cq2(Mg2<P!TeH`ap5eQ$68`g>kqYr>Ms7Bsdr^OV_tFu9f8<s');
define('NONCE_SALT',       '|c:bvKZ>[xXt!U-kub!*=0^;O|#ZEHo#?q]=T=k:Go/}J$]Dkm-5_tBePbSH` <s');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wpb_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');