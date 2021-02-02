<?php

/**
 * @package name-of-plugin
 * @version 1.0.0
 */
/*
Plugin Name: name of plugin
Plugin URI: -
Description:
Author:
Version: 1.0.1
Author URI:
*/

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

/** Start plugin */
require_once 'inc/setting/NameOfPlugin.php';
NameOfPlugin::make();

