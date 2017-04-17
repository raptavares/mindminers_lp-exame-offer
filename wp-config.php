<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'lp-exame-offer');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'lp-exame-offer');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'lp-exame-offer2017');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%OB9-p*0@|=Eh=*{(~a/aEFJ$j&(C/{y2Es;E.9Ln@,li?S(J/pZI:?UvV!w16m$');
define('SECURE_AUTH_KEY',  ',yYi-(koK7/;8}kjb#dIV4XVF~(L*tj3QoSap^jsp,sR@% Q1hIlde7Wm8f(~cT+');
define('LOGGED_IN_KEY',    '0#Y]X*^+5weEBy3C_tb?{OufiN4eIm.HQh0w[{3@>)e g !HA1uo6I>nEK<*k>3^');
define('NONCE_KEY',        'WT[s,vX=+;<%;9XuIj^{o/DCs1|@-GtHoNg.Ocr@gdj!sISvt^If4cw]6o1]tl:u');
define('AUTH_SALT',        'Cb5~8VV;Z!7M&05|-pQp5@pm^8wWzD=DXLWHSc3r&E(sg6xza|&s45~qK-gFMCbO');
define('SECURE_AUTH_SALT', '{ hW<wC6lp#/oic>2+q-_WmV$ohj6v.e^V6OsdH>R>e.Wq (ZWWz#0Z.;hN)4NBT');
define('LOGGED_IN_SALT',   '%7i`EE>${L$@Wb2YG4QKimJc| cJ>$KBgmJv9P !P49WlIDC[74Z*a|6}0DJ.:^2');
define('NONCE_SALT',       'pe]xv,dSY8?D7Q@b^VAXeTpVSgd4@-kAo&-D{JYIScK3(O>0im}tM<DougxpZ-lb');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
