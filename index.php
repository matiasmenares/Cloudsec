<?php

/************************************************************************************
*																					*
*  Code by:																			*
*      ___           ___         ___                     ___           ___     		*
*     /  /\         /  /\       /  /\        ___        /  /\         /  /\    		*
*    /  /::\       /  /::\     /  /::\      /  /\      /  /:/_       /  /:/    		*
*   /  /:/\:\     /  /:/\:\   /  /:/\:\    /  /:/     /  /:/ /\     /  /:/     		*
*  /  /:/~/::\   /  /:/~/:/  /  /:/~/:/   /  /:/     /  /:/ /:/_   /  /:/  ___ 		*
* /__/:/ /:/\:\ /__/:/ /:/  /__/:/ /:/   /  /::\    /__/:/ /:/ /\ /__/:/  /  /\		*
* \  \:\/:/__\/ \  \:\/:/   \  \:\/:/   /__/:/\:\   \  \:\/:/ /:/ \  \:\ /  /:/		*
*  \  \::/       \  \::/     \  \::/    \__\/  \:\   \  \::/ /:/   \  \:\  /:/ 		*
*   \  \:\        \  \:\      \  \:\         \  \:\   \  \:\/:/     \  \:\/:/  		*
*    \  \:\        \  \:\      \  \:\         \__\/    \  \::/       \  \::/   		*
*     \__\/         \__\/       \__\/                   \__\/         \__\/    		*
*																					*
*													|    FrameWork 2.1	|	     	*
*																					*
*************************************************************************************/



	if($_SERVER['HTTP_HOST'] == 'localhost' ){	
		
		include_once("system/config/config_local.php");

	}else{
		
		include_once("system/config/config.php");
	
	}
	
	session_name(SESSION_NAME);
	session_start();

	//Registry
	
	include_once("system/core/registry.php");

	$registry = new Registry();
	//System
	
	include_once("system/core/system.php");
	
	$system = new Sys();
	
	$registry->set('system', $system);
	//Secure
	include_once("system/core/secure.php");
	
	$secure = new Secure();
	
	$registry->set('secure', $secure);
	//Request
	
	include_once("system/core/request_copia.php");

	$request = new Request();
	
	$registry->set('request', $request);
	//Send
	
	include_once("system/library/send.php");

	$send = new Send();
	
	$registry->set('send', $send);
	//Session
	
	include_once("system/core/session.php");

	$session = new Session();
	
	$registry->set('session', $session);
	//Loader
	
	include_once("system/core/loader.php");

	$loader = new Loader($registry);
	
	$registry->set('load', $loader);
	//CSS
	include_once("system/library/css.php");
	
	$Css = new Css();
	
	$registry->set('css', $Css);

	//DataBase
	
	include_once("system/database/mysql.php");
	
	$db = new Conectar();
	
	$registry->set('db', $db);
	//Controller
	
	include_once("system/core/controller.php");
	
	$controller = new Controller($registry);
	
	$registry->set('controller', $controller);

	//Dispacher
	include_once("system/core/dispatcher.php");
	
	$dispatcher = new Dispatcher($registry);
	
	$registry->set('dispatcher', $dispatcher);

		
	//Response
	include_once("system/library/response.php");

	$response = new Response($registry);
	
	$registry->set('response', $response);
	//Notification
	
	include_once("system/library/notification.php");
	
	$notification = new Notification($registry);
	
	$registry->set('notification', $notification);

	//Model
	include_once("system/core/model.php");

	$model = new Model($registry);
	
	$registry->set('model', $model);

	$controller->invocar();	
?>
