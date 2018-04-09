<?php
/**
 * OptinPoint - Advanced Subscription Hub For Wordpress
 *
 * @package   OptinPoint - Advanced Subscription Hub For Wordpress
 * @author    Voltroid<care@voltroid.com>
 * @link      http://voltroid.com/optinpoint
 * @copyright 2017 Voltroid
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

if ( is_multisite() ) {

} else {
	
}