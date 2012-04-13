<?php

$db_con = 0;

function db_err(){
	$err_no = mysql_errno();
	$err_msg = mysql_error();
	death("DB Erro $err_no: $err_msg");
}

function  db_connect(){
	global $db_con;
	if($db_con) return false;
	
	$db_con = @mysql_connect(DB_SERVER,DB_USER,DB_PASS) or db_err();
	
	db_query("SET character_set_results = 'utf8',
					character_set_client = 'utf8',
					character_set_connection = 'utf8',
					character_set_database = 'utf8',
					character_set_server = 'utf8'");

	@mysql_select_db(DB_NAME,$db_con) or db_err();
}

function db_query($q){
	global $db_con;
	$res = @mysql_query($q,$db_con) or db_err();
	return $res;
}

function db_close(){
	global $db_con;
	if($db_con){
		@mysql_close($db_con) or db_err();
	}
}

function db_get_rows($table_name,$where=1){
	$res = db_query("SELECT * FROM $table_name WHERE $where");	
	return db_fetch2array($res);
}

function db_fetch2array($res){
	if( !@mysql_num_rows($res) ) return false;
	$rows = array();
	while($arr = mysql_fetch_array($res,MYSQL_ASSOC)){
		$rows[]=$arr;
	}
	return $rows;
}