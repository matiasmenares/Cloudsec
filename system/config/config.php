<?php
/* <CONFIGURACIÓN> */	
define('TITULO', 'CloudSec');

define('URL_FRONTEND', 'http://192.168.1.101/cloudsec/');	
define('TEMPLATE', 'view/template/');	
define('URL_VIEW', URL_FRONTEND.TEMPLATE);		
	
define('URL_FOTOS', 'image/');
define('DIR_APLICACION', '/var/www/html/');
define('DIR_UPLOAD','../image/');
define('DIR_UPLOAD_OPENCART','../image/'); //CAMBIAR EN BASE A UBICACIÓN PROPIA
define('FOTO_RUTA_ABSOLUTA',''); //CAMBIAR EN BASE A UBICACIÓN PROPIA
define('DIR_FOTOS_BAJAS', 'low-resolution/');

define('IDIOMA', 'espanol/');

define('SESSION_NAME', 'ClodSec');

define('VIEW_DIR', 'view/');
define('CONTROLLER_DIR', 'controller/');
define('MODEL_DIR', 'model/');

/* CONFIGURACIÓN */

define('DEBUG','TRUE');
date_default_timezone_set("America/Santiago");
define('ERROR_REPORTING', "0");

/* ERRORES */

define('ERROR_404', 'error/404/');
define('ERROR_CONEXION_BD', 'conexion/');

/* ERRORES */


/* ADMIN */
define('ADMIN_REPORT', "");

/*

/* ADMIN */

/* BASE DE DATOS */

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'cloudsec');
define('PORT', '3306');


/* BASE DE DATOS OPENCART*/



?>