<?php


/* Custom Functions */

/**
 * 
 * @Define path
 *
 */

define("THEME_DIR"	, get_stylesheet_directory()); //don't use get_template_directory_uri()
define("THEME_URL"	, get_stylesheet_directory_uri());
define("FUNC_DIR"	, THEME_DIR . '/functions');
define("JS_URL"		, THEME_URL . '/js');

include_once FUNC_DIR . '/functions.class.php';
include_once FUNC_DIR . '/ajax.class.php';
