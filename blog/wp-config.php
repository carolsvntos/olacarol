<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpres');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'carolsantos');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'patinho123');

/** nome do host do MySQL */
define('DB_HOST', 'mysql873.umbler.com');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'knE&~%A=F8p^9Y_4qY.DDpjQ7+7O56=;?$pkjy@h iw}1sb9}b1@[6TT7NT:A,f_');
define('SECURE_AUTH_KEY',  '+hwGO|jp|E7J#Z>=DnE~X>6:y-Vd^loK.O91Ey ^Q5Ifst0H(VA~l9!0 E~![G(Q');
define('LOGGED_IN_KEY',    'q!Auq-}[tw&aCZ:>lTP4H73U+24%;{+|G7a00<Xzc3?.[D@n5y.Ssuwwjc/!Y!4F');
define('NONCE_KEY',        '/IdEk6MJ=~/rI>}xHAF>u;>DD?gy~ym`~Oz@nmPaD#{`yC_4{+&Sc3eAVJNmRIh9');
define('AUTH_SALT',        '-,A?$m^Spf]}j=|S*3dW=VnE~&,btl1c~DXEHAxLQ^`Lq2;6gK8c3i&7=suweQD2');
define('SECURE_AUTH_SALT', 'qXP2FsMuY>tJ?kQ7%V]0!r1O<2V:;6vYt[AGcfLcVj2E2~dL.HwxUuGt(4~``%KY');
define('LOGGED_IN_SALT',   '03gk6Xa(A@T>~ag@<`u+V8bY[wG^Py,+HO/u68AN_i5z9?sge;x<5.I%/2(v%a$ ');
define('NONCE_SALT',       'lV9: rSM{l#HMZssFq,^&U~qW*Gdt4r5koew<L_{xb$cI23FX%Sf/~$^fd=fym29');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

define('FORCE_SSL_ADMIN', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
