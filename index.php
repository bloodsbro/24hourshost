<?php

mb_internal_encoding("UTF-8");
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set("Europe/Moscow");

define('MODULE_DIR', dirname(__FILE__) . '/www/');
define('TMP_DIR', dirname(__FILE__) . '/tmp/');
define('ENGINE_DIR', dirname(__FILE__) . '/engine/');
define('APPLICATION_DIR', dirname(__FILE__) . '/application/');
define('REQUEST_START_TIME', microtime());

require_once(ENGINE_DIR . 'main/controller.php');
require_once(ENGINE_DIR . 'main/model.php');

require_once(ENGINE_DIR . 'main/registry.php');
require_once(ENGINE_DIR . 'main/game_settings.php');
require_once(ENGINE_DIR . 'main/request.php');
require_once(ENGINE_DIR . 'main/session.php');
require_once(ENGINE_DIR . 'main/response.php');
require_once(ENGINE_DIR . 'main/document.php');
require_once(ENGINE_DIR . 'main/db.php');
require_once(ENGINE_DIR . 'main/user.php');
require_once(ENGINE_DIR . 'main/load.php');
require_once(ENGINE_DIR . 'main/module.php');
require_once(ENGINE_DIR . 'main/action.php');
require_once(ENGINE_DIR . 'main/cookie.php');
require_once(ENGINE_DIR . 'main/notify.php');

$registry = new Registry();

$config = new Config();
$registry->config = $config;

$game_settings = new Game_settings();
$registry->game_settings = $game_settings;

$request = new Request();
$registry->request = $request;

$session = new Session();
$registry->session = $session;

$response = new Response();
$registry->response = $response;

$document = new Document();
$registry->document = $document;

$cookie = new Cookie();
$registry->cookie = $cookie;

$db = new DB($config->db_type, $config->db_hostname, $config->db_username, $config->db_password, $config->db_database);
$registry->db = $db;

$notify = new Notify($registry);
$registry->notify = $notify;

$user = new User($registry);
$registry->user = $user;

$load = new Load($registry);
$registry->load = $load;

$action = new Action($registry);
$registry->action = $action;
$actionString = parse_url($request->server["REQUEST_URI"], PHP_URL_PATH);
if ($actionString == '/') {
	$actionString = '';
}

if(!empty($actionString)) {
	$action->make($actionString);
} else {
	$action->make('main/index');
}

$response->output($action->go());
?>
