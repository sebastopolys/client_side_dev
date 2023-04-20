<?php
namespace ClSidDev;

use ClSidDev\updater\wpgithubupdater;
use ClSidDev\backend\backinit;
use ClSidDev\frontend\addmetacheckbox;
/**
 * @link              https://sebastopolys.com/
 * @since             0.0.2
 * @package           ClSidDev
 * Plugin Name:       Client Side Dev
 * Plugin URI:        https://sebastopolys.com/
 * Description:       Plugin made for testing WPWOO licencing system from the client side
 * Version:           0.0.8
 * Author:            Sebas Rossi
 * Text Domain:       clsidev
 */

 if(file_exists(__FILE__)&&__FILE__){
    require plugin_dir_path(__FILE__).'testupdaterAutoloader.php'; 
    require plugin_dir_path(__FILE__).'testupdaterCONFIG.php'; 
}

// Autoloader
if(class_exists('testupdaterAutoloader')&&class_exists('CONFIG')) {
    die('Class not found Error.<br/>Please deactivate WPWOO Licence system plugin');
}   
testupdaterAutoloader::start();

// Config file
$config = new CONFIG();

// backend
$back = new backinit($config);

// Product checkbox
$chkb = new addmetacheckbox();

// admin / backend
if(is_admin()){ 

    if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
		$config = array(
			'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
			'proper_folder_name' => 'plugin-name', // this is the name of the folder your plugin lives in
			'api_url' => 'https://api.github.com/repos/username/repository-name', // the GitHub API url of your GitHub repo
			'raw_url' => 'https://raw.github.com/username/repository-name/master', // the GitHub raw url of your GitHub repo
			'github_url' => 'https://github.com/username/repository-name', // the GitHub url of your GitHub repo
			'zip_url' => 'https://github.com/username/repository-name/zipball/master', // the zip url of the GitHub repo
			'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
			'requires' => '3.0', // which version of WordPress does your plugin require?
			'tested' => '3.3', // which version of WordPress is your plugin tested up to?
			'readme' => 'README.md', // which file to use as the readme for the version number
			'access_token' => '', // Access private repositories by authorizing under Plugins > GitHub Updates when this example plugin is installed
		);
		new wpgithubupdater($config);
	}

 }