<?php

/**
 * Make html attributes from an array
 * 
 * @param array $options
 * @return string
 */
function key_value_to_html_attribute($options) {
	if (empty($options)) {
		return '';
	}
	
	$out = ' ';
	foreach ((array)$options as $k => $v) {
		$out .= $k.'="'.$v.'" ';
	}
	
	return $out;
}

?>