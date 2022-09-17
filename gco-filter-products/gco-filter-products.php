<?php
/**
 * Plugin Name:GCO Filter Products
 * Plugin URI:
 * Author: gco
 * Author URI: https://gco.app
 * Version: 1.0
 */

define( 'GCOFP_VERSION', '1.0' );
define( 'GCOFP_PREFIX', 'gcoFP_' );
define( 'GCOFP_REST_VERSION', 'v1' );
define( 'GCOFP_URL', plugin_dir_url( __FILE__ ) );
define( 'GCOFP_PATH', plugin_dir_path( __FILE__ ) );

require_once plugin_dir_path(__FILE__) . "vendor/autoload.php";

new \GCOFILTERPRODUCTS\Controllers\HandleFilterProduct();
new \GCOFILTERPRODUCTS\Controllers\HandleProductContentController();