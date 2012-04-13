<?php

// template engine ....

defined('ACCESS') or die('Restricted access !');

include('inc/header.php');

if(! @include("$req.php") ){
	include("404.php");
	$caching_enabled=false;
}

include('inc/footer.php');
