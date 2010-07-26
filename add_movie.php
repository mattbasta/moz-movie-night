<?php

require("include.php");

if($cookie) {
	$movies = $db->get_table("movies");
	$movies->insert_row(
		0,
		array(
			"name"=>$_REQUEST["name"],
			"submitter"=>$cookie["uid"]
		)
	);
	header("Location: /projects/movies/");
}
