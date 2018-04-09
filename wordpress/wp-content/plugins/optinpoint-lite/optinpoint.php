<?php
/**
 *
 * @package   OptinPoint Lite - Advanced Subscription Hub For Wordpress
 * @author    Voltroid<care@voltroid.com>
 * @license   GPL-2.0+
 * @link      http://voltroid.com/optinpoint
 * @copyright 2017 Voltroid
 *
 * @wordpress-plugin
 * Plugin Name:       OptinPoint Lite - Advanced Subscription Hub For Wordpress
 * Plugin URI:        http://voltroid.com/optinpoint
 * Description:       All-in-one Subscription Plugin
 * Version:           1.0.5
 * Author:            Voltroid
 * Author URI:        http://voltroid.com
 * Text Domain:       optin-point
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'OPPOINT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'OPPOINT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once( plugin_dir_path( __FILE__ ) . 'public/class-optinpoint.php' );

if(isset($_GET['optinpoint_lite_service']))
	require_once( plugin_dir_path( __FILE__ ) . 'service/optinpoint-service.php' );


register_activation_hook( __FILE__, array( 'OptinPoint_Lite_Assistant', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'OptinPoint_Lite_Assistant', 'deactivate' ) );


add_action( 'plugins_loaded', array( 'OptinPoint_Lite_Assistant', 'get_instance' ) );

if ( is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-optinpoint-admin.php' );
	add_action( 'plugins_loaded', array( 'OptinPoint_Lite_Assistant_Admin', 'get_instance' ) );
}


require_once( plugin_dir_path( __FILE__ ) . 'widget/class-optinpoint-widget.php' );