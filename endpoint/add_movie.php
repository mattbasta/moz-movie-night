<?php

require("include.php");

if($cookie) {
	$movies = $db->get_table("movies");
	$movies->insert(
		array(
			"name"=>$_REQUEST["name"],
			"submitter"=>$cookie["uid"]
		)
	);
	header("Location: index.php");
}
