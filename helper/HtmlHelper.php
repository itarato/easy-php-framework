<?php
	

/**
 * Get a css include string
 *
 * @param string $css file name (without .css)
 * @param string $media
 * @return string <link ... />
 */
function cssInclude($css, $media=NULL) {
	return '<link rel="stylesheet" '.(empty($media)?'':('media="'.$media.'"')).' href="'.HTML_PATH.'/public/css'.$css.'" type="text/css" />';
}

/**
 * Get a javasctipt include string
 *
 * @param String $file file name
 * @return String <... />
 */
function javascriptInclude($file) {
	return '<script type="text/javascript" src="'.HTML_PATH.'/public/js'.$file.'"></script>'."\n";
}

/**
 * Return a valid html img tag
 *
 * @param String $file image file name in public/images/ dir
 * @param Array $options html options
 * @return unknown
 */
function imgTag($file, $options=NULL) {	
	return '<img src="'.HTML_PATH.'/public/images/'.$file.'" '.kv2HtmlOptions($options).'/>';
}

/**
 * Create a url for this site
 * 
 * @example /user/list/Ohio => /WEBAPP/user/list/Ohio
 * @param String $url
 * @return String
 */
function linkTo($url) {
	return HTML_PATH.$url;
}

function inputField($type, $name, $value=NULL, $options=NULL) {
	return '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" '.kv2HtmlOptions($options).'/>';
}

function iText($name, $value=NULL, $options=NULL) {
	return inputField('text', $name, $value, $options);
}

function iCheckbox($name, $value=NULL, $options=NULL) {
	return inputField('checkbox', $name, $value, $options);
}

function iHidden($name, $value=NULL) {
	return inputField('hidden', $name, $value);
}

function iFile($name) {
	return '<input name="'.$name.'" type="file" />';
}

function iPassword($name, $value=NULL, $options=NULL) {
	return inputField('password', $name, $value, $options);
}

function iButton($value, $options=NULL) {
	return '<button '.kv2HtmlOptions($options).'>'.$value.'</button>';
}

function iSubmit($value=NULL) {
	return iButton(imgTag('/silk/disk.png').'&nbsp;&nbsp;<strong>'.$value.'</strong>', array('type' => 'submit'));
}

function iReset($value=NULL) {
	return iButton(imgTag('/silk/page_refresh.png').'&nbsp;&nbsp;'.$value, array('type' => 'reset'));
}

function iButtonLink($value=NULL, $link=NULL) {
	return iButton(imgTag('/silk/door_in.png').'&nbsp;&nbsp;'.$value, 
		array('type' => 'button', 'onclick' => 'window.location.href=\''.$link.'\';'));
}

function iTextArea($name, $value=NULL, $options=NULL) {
	return '<textarea name="'.$name.'" '.kv2HtmlOptions($options).' >'.$value.'</textarea>';
}

/**
 * Load template
 * 
 * @DEPRECATED - maybe not the best for templates that need php variables
 * @param String $path
 */
function view($path) {
	include BASE_PATH.'/view'.$path;
}

?>