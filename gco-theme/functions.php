<?php
define('directoryUri',get_stylesheet_directory_uri() . '/assets/');

add_action('after-setup-theme','addSupportWoocommerce');
function addSupportWoocommerce(){
	add_theme_support('woocommerce');
}