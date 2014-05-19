<?php

/*
	Plugin Name: Q2A Feed Widget
	Plugin URI: https://github.com/Towhidn/Q2A-feed-widget
	Plugin Description: lists latest RSS feeds
	Plugin Version: 1.2.0
	Plugin Date: 2014-5-19
	Plugin Author: QA-Themes
	Plugin Author URI: http://www.qa-themes.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version:
	Plugin Update Check URI: https://github.com/Towhidn/Q2A-feed-widget/raw/master/qa-plugin.php
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}


	qa_register_plugin_module('widget', 'qa-feed-widget.php', 'qa_feed_widget', 'Feed Widget');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/