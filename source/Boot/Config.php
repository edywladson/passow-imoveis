<?php

/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "passow_imoveis");

/**
 * PROJECT URLs
 */
define('CONF_URL_BASE', 'https://www.passiowimoveis.com.br');
define('CONF_URL_TEST', 'https://www.localhost/passow-imoveis');

/**
 * SITE
 */
define('CONF_SITE_NAME', 'Passion Imóveis');
define('CONF_SITE_TITLE', 'Desafio Vista Software');
define('CONF_SITE_DESC', 'Este é um site feito para o desafio da Vista Software');
define('CONF_SITE_LANG', 'pt_BR');
define('CONF_SITE_DOMAIN', '');
define('CONF_SITE_ADDR_STREET', '');
define('CONF_SITE_ADDR_NUMBER', '');
define('CONF_SITE_ADDR_COMPLEMENT', '');
define('CONF_SITE_ADDR_CITY', '');
define('CONF_SITE_ADDR_STATE', '');
define('CONF_SITE_ADDR_ZIPCODE', '');

/**
 * SOCIAL
 */
define('CONF_SOCIAL_TWITTER_CREATOR', '@passow-imoveis');
define('CONF_SOCIAL_TWITTER_PUBLISHER', '@passow-imoveis');
define('CONF_SOCIAL_FACEBOOK_APP', '000000000000000');
define('CONF_SOCIAL_FACEBOOK_AUTHOR', 'passow-imoveis');
define("CONF_SOCIAL_FACEBOOK_PAGE", "passow-imoveis");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "passow-imoveis");
define("CONF_SOCIAL_YOUTUBE_PAGE", "passow-imoveis");
define('CONF_SOCIAL_GOOGLE_PAGE', '');
define('CONF_SOCIAL_GOOGLE_AUTHOR', '');

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "passowweb");
define("CONF_VIEW_ADMIN", "passowadmin");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

//VISTA API
define("CONF_VISTA_API_URL", "http://sandbox-rest.vistahost.com.br");
define("CONF_VISTA_API_KEY", "c9fdd79584fb8d369a6a579af1a8f681");
define("CONF_VISTA_BACK", CONF_URL_BASE . "/vista/callback");