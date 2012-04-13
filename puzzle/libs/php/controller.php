<?php

// Main site controller and algorithm ....

defined('ACCESS') or die('Restricted access !');
if($caching_enabled){
	require_once('Cache/Lite.php');
}
require_once('module.php');
require_once('view.php');

$req = $_GET['req'];
if($req=='') go2url( SITE_PATH.'home.html');

$filename=strtolower( $_GET['filename'] );
$filetype=strtolower( $_GET['filetype'] );

initilize();

$page_title = ucwords( str_replace('-',' ',$req) );


/*sample module */ 
if( isset($_POST['reguser']) ){
	$caching_enabled=false;
	if( strlen($_POST['fname'])>2 && strlen($_POST['lname'])>2 && strlen($_POST['email'])>5 && strlen($_POST['pass'])>3 ){
		reg_user($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['pass']);
		go2url('login.html');
	}else{
		$err = "Error in data validation";
	}
	
}
check_cache();

if($req=='file'){
	if( $file = @file_get_contents("./libs/$filetype/$filename.$filetype") ){
		send($file);
		finilize();
	}else{
		$req = '404er';
		header('Content-Type: text/html');
	}
	
}/*sample view */
elseif($req=='downloads'){
	if( $downloads_arr = db_get_rows('downloads') ){
		$downloads_list = gen_download_list($downloads_arr);  // gen output
	}//end sample
}elseif($req=='home'){
	if($imgs_arr=db_get_rows('img')){
		$img_content=gen_img($imgs_arr);
		$img_place=gen_place($imgs_arr);
	}
}
include('template.php');

finilize();
