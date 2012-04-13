<?php

// View funcs ....

defined('ACCESS') or die('Restricted access !');

function send($data){
	echo $data;
}

function death($data){
	if(strlen($data)>0) send($data);
	die();
}

function go2url($url){
	header("Location: $url");
	death();
}

/*sample for view */
function gen_download_list($arr){
	$html='<ul>';
	
	foreach($arr as $link){
		$html.="<li><a href='$link[url]'>$link[title]</a><span>$link[desc]</span></li>";
	}
	
	$html.='</ul>';
	return $html;
}

function gen_img($arr){
	foreach($arr as $img){
		$top=rand(20,300).'px';
		$right=rand(10,600).'px';
		$html .="<img src='$img[url]' class='$img[row]' id='$img[id_img]' style='top:$top;right:$right' />";		
	}
	return $html ;
}
function gen_place($arr){
	foreach($arr as $k =>$img)
	{	
		$rows[]=$img['row'] ;
		$cols[]=$img['col'];
	}
	$row=max($rows) ;
	$col=max($cols);
	
	for($i=1;$i<=$row;$i++){
		$html .="<div class=row_$i>";
		for($j=1;$j<=$col;$j++){
			$id=$i."_".$j."_p";
			$html .="<div id='$id'></div>" ;
		}
		$html .="</div>";
	}
	$html .="<script type='text/javascript'>dropable($row,$col);</script>";
		return $html;
}