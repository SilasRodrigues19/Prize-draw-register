<?php

function show_date($data) {
	$d = explode('-', $data);
	$write = $d[2] ."/" .$d[1] ."/" .$d[0];

	return $write;
}