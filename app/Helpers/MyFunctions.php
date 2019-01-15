<?php

function random_id_pairs($x_objects, $y_objects){

	$result = [];
	
	$y_ids = $y_objects->pluck('id')->toArray();

	foreach($x_objects as $x){

	    $subset_values = [];

	    // N.B.: array_rand retrieves random "keys" not random "values".            
	    $subset_keys = array_rand($y_ids, rand(2,5));            

	    foreach($subset_keys as $key){
	        array_push($subset_values, $y_ids[$key]);
	    }

	    foreach($subset_values as $y_id){
	    	array_push($result, [$x->id, $y_id]);
	    }
	}

	return $result;
}