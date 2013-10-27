<?php

/*
	Plugin Name: Q2A Feed Widget
	Plugin URI: https://github.com/Towhidn/
	Plugin Description: lists latest RSS feeds
	Plugin Version: 1.0.0
	Plugin Date: 2013-7-27
	Plugin Author: QA-Themes
	Plugin Author URI: http://www.qa-themes.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version:
	Plugin Update Check URI:
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}


	qa_register_plugin_module('widget', 'qa-feed-widget.php', 'qa_feed_widget', 'Q2A Feed Widget');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/