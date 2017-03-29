<?php

/*
Plugin Name: trade_gothic #3308417
Plugin URI: http://www.myfonts.com
Description: MyFonts WordPress Plugin
Version: 0.1
Author: MyFonts Team
Author URI: http://www.myfonts.com
*/

require_once('installer.inc');
if(is_admin()) {require_once( 'mf-options.inc' ); }
add_action( 'admin_init', array('MyFontsInstaller_3308417','checkInstallation'));
add_action( 'wp_enqueue_scripts', array('MyFontsInstaller_3308417','mffonts_loadupWebfonts' ));