<?php

// Module funcs ....

defined('ACCESS') or die('Restricted access !');

require_once('db.php');
if($caching_enabled){
$cache =  new Cache_Lite($cache_options);
$cache_id = str_replace('/','%',$_SERVER['REQUEST_URI']);
}
function initilize(){
	global $caching_enabled;
	session_start();
	send_header();
	ob_start();
	
	db_connect();
}

function send_header(){
	global $filetype;
	
	header ( 'Cache-Control: public' );
	header ( 'Pragma: public' );
	header_remove ( 'Expires' );
	
	if($filetype=='css'){
		header('Content-Type: text/css');
	}elseif($filetype=='js'){
		header('Content-Type: text/javascript');
	}else{
		header('Content-Type: text/html');
	}
}

function check_cache(){
	global $cache;
	global $cache_id;
	global $caching_enabled;
	
	if(!$caching_enabled) return false;
	
	if( $contents = $cache->get($cache_id) ){
		send($contents);
		finilize(false);
	}
}

function compress($contents,$compress_level=9){
	global $cache;
	global $cache_id;
	global $gzip_enabled;
	global $caching_enabled;
	
	
	if(!$gzip_enabled) return $contents;
	
	if (substr_count ( $_SERVER ['HTTP_ACCEPT_ENCODING'], 'deflate' )) {
		header ( "Content-Encoding: deflate" );
		$cache_newid=$cache_id.'deflate';
		if($caching_enabled && $data=$cache->get($cache_newid)){
			return $data;
		}else{
			$data = gzdeflate ( $contents, $compress_level );
			$cache->save($data);
			return $data;
		}
	} elseif (substr_count ( $_SERVER ['HTTP_ACCEPT_ENCODING'], 'gzip' )) {
		header ( "Content-Encoding: gzip" );
		$cache_newid=$cache_id.'gzip';
		if($caching_enabled && $data=$cache->get($cache_newid)){
			return $data;
		}else{
			$data = gzencode ( $contents, $compress_level );
			$cache->save($data);
			return $data;
		}
	}else{
		return $contents;
	}
}

function check_midified($contents){
	$etag = md5 ( $contents );
	if (trim ( $_SERVER ['HTTP_IF_NONE_MATCH'] ) == $etag) { // agare etag ghabli ba jadide barabar bood
		header ( "HTTP/1.1 304 Not Modified" );
		death ();
	}else{
		header("Etag: $etag");
	}
}

function finilize($cacheing=true){
	global $cache;
	global $caching_enabled;
	//database close
	// gzip ..
	$contents = ob_get_clean ();
	
	db_close();
	
	if($caching_enabled && $cacheing) $cache->save($contents);

	check_midified($contents);

	$contents = compress($contents);
	
	$len = strlen ( $contents );
	header ( "Content-length: $len" );

	death($contents);
	
}

/*sample for module */
function reg_user($fname,$lname,$email,$pass){
	$pass=md5($pass);
	db_query("INSERT INTO users VALUES('','$fname','$lname','$email','$pass')");
}
