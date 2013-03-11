<?php
session_start();

require('functions.php');


#########################################################
#### INIT System Data
#########################################################
$in  = array();
$va  = array();
$trs = array();
$usr = array();
$sys = array();
$cfg = array();
$tpl = array();
$cses= array();
$error= array();

define('DATE_FORMAT_LONG', '%A %d %B, %Y');

######################################################
##### Configuration File
######################################################
$cfg_folder  = '/home/barcenasadame/admin.productosnatura.com.mx/cgi-bin/nat_admin/common/';

if($local != 'puppis.dreamhost.com'){
      $cfg_folder        = '/home/www/domains_hypermedia/naturadmin/cgi-bin/nat_admin/common/';
}

load_sys_data(); //Load $sys

// System Data
$tpl['pagetitle'] = $cfg['app_title'];
$ck_name  =  $cfg['ckname'];
$sid='';
$cfg['cd'] = 1;  //Debug Mode

######################################################
##### Load Paths and URLs ############################
######################################################
//print_r($cfg);
// Connect Persistent to DB
mysql_pconnect ($cfg['dbi_host'], $cfg['dbi_user'], $cfg['dbi_pw']) or die('Error 0000000001 ');
mysql_select_db ($cfg['dbi_db']) or die('Error 0000000002 ');


// Load Data
foreach ($_GET as $key=>$value ) {
	if (array_key_exists(strtolower($key), $in)){
		$in[strtolower($key)] .= "|$value";
	}else{
		$in[strtolower($key)] = $value;
	}
}

foreach ($_POST as $key=>$value ) {
	if (array_key_exists(strtolower($key), $in)){
		$in[strtolower($key)] .= '|' . $value;
	}else{
		$in[strtolower($key)] = $value;
	}
}

$in['fullquery'] = getenv('QUERY_STRING');

## Templates por defecto
$tpl['nsMaxHits']  = 20;
$tpl['skel'] = 'default.html';
$tpl['filename']   = 'content/home.html';
$tpl['page_title'] = $cfg['app_title'];

if (array_key_exists("cmd", $in)){
	
	if ($in['cmd'] == 'log_off'){
		log_off();
	}
	verifica_sesion();
	require($cfg['path_templates'] . 'menu.html');
		
	if ($in['cmd'] == 'login'){
	
		require('cmd_login.php');
	
	}elseif ($in['cmd'] == 'lineas'){
	
		if (array_key_exists("action",$in)){
			require('cmd_lineas_'. $in['action'] .'.php');	
		}else{
			require('cmd_lineas.php');
		}
	}elseif ($in['cmd'] == 'sublineas'){
	
		if (array_key_exists("action",$in)){
			require('cmd_sublineas_'. $in['action'] .'.php');	
		}else{
			require('cmd_sublineas.php');
		}
	}elseif ($in['cmd'] == 'productos'){
	
		if (array_key_exists("action",$in)){
			require('cmd_productos_'. $in['action'] .'.php');	
		}else{
			require('cmd_productos.php');
		}
	}elseif ($in['cmd'] == 'ciclos'){
	
		if (array_key_exists("action",$in)){
			require('cmd_ciclos_'. $in['action'] .'.php');	
		}else{
			require('cmd_ciclos.php');
		}
	}elseif ($in['cmd'] == 'catalogo'){
	
		if (array_key_exists("action",$in)){
			require('cmd_catalogo_'. $in['action'] .'.php');	
		}else{
			require('cmd_catalogo.php');
		}
	}elseif ($in['cmd'] == 'promociones'){
	
		if (array_key_exists("action",$in)){
			require('cmd_promociones_'. $in['action'] .'.php');	
		}else{
			require('cmd_promociones.php');
		}
	}elseif ($in['cmd'] == 'usuario'){
			require('cmd_usuario.php');
	}
	exit;
}

require($cfg['path_templates'] . 'login.html');


	
?>