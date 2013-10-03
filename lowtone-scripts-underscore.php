<?php
/*
 * Plugin Name: Script Library: Underscore
 * Plugin URI: http://wordpress.lowtone.nl/scripts-underscore
 * Plugin Type: lib
 * Description: Include Underscore.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\scripts\underscore {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$GLOBALS["lowtone_scripts_underscore"] = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\scripts"),
			Package::INIT_SUCCESS => function() {
				return array(
						"registered" => \lowtone\scripts\register(__DIR__ . "/assets/scripts", array(), "1.5.2")
					);
			}
		));

	function registered() {
		global $lowtone_scripts_underscore;
		
		return isset($lowtone_scripts_underscore["registered"]) ? $lowtone_scripts_underscore["registered"] : false;
	}
	
}