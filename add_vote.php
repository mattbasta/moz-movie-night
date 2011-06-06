<?php

require("include.php");

if($cookie) {
	$votes = $db->get_table("votes");
	$data = array(
		"movie"=>(int)$_REQUEST["movie"],
		"voter"=>$cookie["uid"],
		"value"=>(isset($_REQUEST["up"]) ? 1 : -1)
	);
	$condit = array(
		'voter'=>$cookie['uid'],
		'movie'=>(int)$_REQUEST["movie"]
	);
	if($votes->fetch_exists($condit))
		$votes->update(
			$condit,
			$data
		);
	else
		$votes->insert($data);
	header("Location: index.php");
}
