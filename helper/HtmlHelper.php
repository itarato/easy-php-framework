<?php
	

/**
 * Get a css include html tag
 *
 * @param string $css file name located in /public/css/___.css
 * @param string $media
 * @return string <link ... />
 */
function css($css, $media=NULL) {
	return '<link rel="stylesheet" '.(empty($media)?'':('media="'.$media.'"')).' href="'.HTML_PATH.'/public/css'.$css.'" type="text/css" />';
}

/**
 * Get a javasctipt include string
 *
 * @param String $file file name
 * @return String <... />
 */
function js($file) {
	return '<script type="text/javascript" src="'.HTML_PATH.'/public/js'.$file.'"></script>'."\n";
}

/**
 * Return a valid html img tag
 *
 * @param String $file image file name in public/images/ dir
 * @param Array $options html options
 * @return unknown
 */
function img($file, $options=NULL) {	
	return '<img src="'.HTML_PATH.'/public/images/'.$file.'" '.key_value_to_html_attribute($options).'/>';
}

/**
 * Create a url for this site
 * 
 * @example /user/list/Ohio => /WEBAPP/user/list/Ohio
 * @param String $url
 * @return String
 */
function link_to($url) {
	if (in_array(substr($url, 0, 4), array('www.', 'http'))) {
		// Absolute url
		return $url;
	} else {
		// Relative url
		return HTML_PATH.$url;
	}
}

function a($text, $link, $options=NULL) {
	return '<a href="'.link_to($link).'" '.key_value_to_html_attribute($options).'>'.$text.'</a>';
}

function input($type, $name, $value=NULL, $options=NULL) {
	return '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" '.key_value_to_html_attribute($options).'/>';
}

function textfield($name, $value=NULL, $options=NULL) {
	return input('text', $name, $value, $options);
}

function checkbox($name, $value=NULL, $options=NULL) {
	return input('checkbox', $name, $value, $options);
}

function hidden($name, $value=NULL) {
	return input('hidden', $name, $value);
}

function file_upload($name) {
	return '<input name="'.$name.'" type="file" />';
}

function password($name, $value=NULL, $options=NULL) {
	return input('password', $name, $value, $options);
}

function button($value, $options=NULL) {
	return '<button '.key_value_to_html_attribute($options).'>'.$value.'</button>';
}

function submit_button($value=NULL, $img='/silk/disk.png') {
	return button(
		(empty($img) ? '' : img($img).'&nbsp;&nbsp;').'<strong>'.$value.'</strong>', 
		array('type' => 'submit')
	);
}

function reset_button($value=NULL, $img='/silk/page_refresh.png') {
	return button(
		(empty($img) ? '' : img($img).'&nbsp;&nbsp;').'&nbsp;&nbsp;'.$value, 
		array('type' => 'reset')
	);
}

function link_button($value=NULL, $link=NULL, $img='/silk/door_in.png') {
	return button(
		(empty($img) ? '' : img($img).'&nbsp;&nbsp;').$value, 
		array('type' => 'button', 'onclick' => 'window.location.href=\''.link_to($link).'\';')
	);
}

function textarea($name, $value=NULL, $options=NULL) {
	return '<textarea name="'.$name.'" '.key_value_to_html_attribute($options).' >'.$value.'</textarea>';
}


?>
