<?php

function kv2HtmlOptions($options) {
	if (empty($options)) {
		return '';
	}
	
	$out = ' ';
	foreach ((array)$options as $k => $v) {
		$out .= $k.'="'.$v.'" ';
	}
	
	return $out;
}

function arrayDeleteIndex($idx, $array) {
	$out = array();
	foreach ((array)$array as $k => $v) {
		if ($k != $idx) {
			$out[$k] = $v;
		}
	}
	
	return $out;
}

?>