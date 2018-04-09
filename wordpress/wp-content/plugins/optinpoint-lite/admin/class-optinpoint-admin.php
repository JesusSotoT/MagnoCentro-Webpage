<?php
/**
 * OptinPoint Lite - Advanced Subscription Hub For Wordpress
 *
 * @package   OptinPoint Lite - Advanced Subscription Hub For Wordpress
 * @author    Voltroid<care@voltroid.com>
 * @link      http://voltroid.com/optinpoint
 * @copyright 2017 Voltroid
 */

/**
 *
 * @package   OptinPoint Lite - Advanced Subscription Hub For Wordpress
 * @author    Voltroid<care@voltroid.com>
 *
 */
class OptinPoint_Lite_Assistant_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * @since     1.0.0
	 */
	private function __construct() {

		add_action( 'init', array( $this, 'load_plugin' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . 'optinpoint.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );

 		add_action('wp_ajax_optinpoint_lite_tab', array( $this, 'tab' ) );
 		add_action('wp_ajax_optinpoint_lite_prev', array( $this, 'preview' ) );
 		add_action('wp_ajax_optinpoint_lite_mailserv_connect', array( $this, 'mailserv_connect' ) );
 		add_action('wp_ajax_optinpoint_lite_mailserv_getlists', array( $this, 'mailserv_getlists' ) );
 		add_action('wp_ajax_optinpoint_lite_mailserv_getfields', array( $this, 'mailserv_getfields' ) );

		add_action('wp_ajax_optinpoint_lite_update', array( $this, 'update_options' ) );
		add_action('wp_ajax_optinpoint_lite_usync', array( $this, 'usync' ) );
		add_action('wp_ajax_optinpoint_lite_usync_add', array( $this, 'usync_add' ) );
		add_action('wp_ajax_optinpoint_lite_secure', array( $this, 'restorebackup' ) );
		add_action( 'admin_head', array( $this,'admin_css' ));

	}
	/*
	 * Call $plugin_slug from public plugin class.
	 *
	 * @TODO:
	 *
	 */
	public function load_plugin(){
		$this->plugin = OptinPoint_Lite_Assistant::get_instance();
		$this->plugin_slug = $this->plugin->get_plugin_slug();
		$this->settings = $this->plugin->settings;
	}
	/**
	 * Register and enqueue admin-specific style sheet.
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $this->plugin_screen_hook_suffix == $screen->id ) {
			wp_enqueue_style( $this->plugin_slug .'-admin-styles', OPPOINT_PLUGIN_URL. 'admin/assets/css/admin.css', array(), OptinPoint_Lite_Assistant::VERSION );
			wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Raleway|Roboto:300');
            wp_enqueue_style( 'googleFonts');
		}

	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_scripts() {

		
		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $this->plugin_screen_hook_suffix == $screen->id ) {

			$optinpoint = $this->settings;
			global $optinpoint_demoapi;
			if (isset($optinpoint_demoapi)){
				$optinpoint['cforms']=$optinpoint_demoapi['api']['cforms'];
				$optinpoint['cformi']=$optinpoint_demoapi['api']['cformi'];
				$optinpoint['fb_api']=$optinpoint_demoapi['api']['fb_api'];
				$optinpoint['gp_api']=$optinpoint_demoapi['api']['gp_api'];
				$optinpoint['ms_api']=$optinpoint_demoapi['api']['ms_api'];
				$optinpoint['mailserv']=$optinpoint_demoapi['api']['mailserv'];
			}
			$opt['mymail'] = ( function_exists( 'mailster' ) )?true:false;
			$opt['mailpoet'] = ( MAILPOET_VERSION !== null)?true:false;
			$opt['goog_fonts']=json_decode(file_get_contents(OPPOINT_PLUGIN_PATH.'src/google_fonts.json'),true);
			$opt['web_fonts']=$this->plugin->webfont();
			$opt['svglist']=$this->plugin->svglist();
			$opt['iconlist']=$this->plugin->iconlist();
			$opt['plug_url']=OPPOINT_PLUGIN_URL;
			wp_enqueue_script('jquery');
			wp_enqueue_script( $this->plugin_slug . '-admin-script', OPPOINT_PLUGIN_URL. 'admin/assets/js/admin.js', array( 'jquery'), OptinPoint_Lite_Assistant::VERSION );
			wp_localize_script( $this->plugin_slug . '-admin-script',  'optinpint_script', array( 'ajaxurl' =>admin_url('admin-ajax.php')));
			wp_localize_script( $this->plugin_slug . '-admin-script', 'optpointdata', $optinpoint );
			wp_localize_script( $this->plugin_slug . '-admin-script', 'optpointset', $opt );
			wp_register_script( 'angular-core', '//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js', OptinPoint_Lite_Assistant::VERSION );
			wp_register_script( 'angular-animate', '//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js', OptinPoint_Lite_Assistant::VERSION );
			wp_register_script( 'angular-route', '//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.min.js', OptinPoint_Lite_Assistant::VERSION );
			wp_enqueue_script('angular-core');
			wp_enqueue_script('angular-animate');
			wp_enqueue_script('angular-route');
			wp_enqueue_script( $this->plugin_slug . '-admin-script2', '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js', OptinPoint_Lite_Assistant::VERSION );
			wp_enqueue_media();
		}
	}
	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		$this->plugin_screen_hook_suffix = add_menu_page(
			'OptinPoint Lite',
			'OptinPoint Lite',
			'optinpoint_cap',
			$this->plugin_slug,
			array( $this, 'display_plugin_admin_page' ),
			'none' , 85
		);
		$role = get_role( 'administrator' );
		$role->add_cap( 'optinpoint_cap' );
		add_submenu_page($this->plugin_slug,$this->plugin_slug,$this->plugin_slug,'optinpoint_cap',$this->plugin_slug,array( $this, 'display_plugin_admin_page' ));
		remove_submenu_page( $this->plugin_slug, $this->plugin_slug );
		add_submenu_page( $this->plugin_slug,'General','General','optinpoint_cap',$this->plugin_slug.'#/general',array( $this, 'display_plugin_admin_page' ));
		add_submenu_page( $this->plugin_slug, 'Theme', 'Theme','optinpoint_cap', $this->plugin_slug.'#/theme',array( $this, 'display_plugin_admin_page' ));
		add_submenu_page( $this->plugin_slug, 'Lightbox', 'Lightbox','optinpoint_cap', $this->plugin_slug.'#/lightbox',array( $this, 'display_plugin_admin_page' ));
		add_submenu_page( $this->plugin_slug, 'Slider', 'Slider','optinpoint_cap', $this->plugin_slug.'#/slider',array( $this, 'display_plugin_admin_page' ));
		add_submenu_page( $this->plugin_slug, 'Widget', 'Widget','optinpoint_cap', $this->plugin_slug.'#/widget',array( $this, 'display_plugin_admin_page' ));
		add_submenu_page( $this->plugin_slug, 'Addon', 'Addon','optinpoint_cap', $this->plugin_slug.'#/addon',array( $this, 'display_plugin_admin_page' ));
		add_submenu_page( $this->plugin_slug, 'Advanced', 'Advanced','optinpoint_cap', $this->plugin_slug.'#/advanced',array( $this, 'display_plugin_admin_page' ));
	}
	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_slug ) . '">Settings</a>'
			),
			$links
		);

	}
	/**
	 * Render Preview of the requested theme
	 *
	 * @since    1.0.0
	 */
	public function preview(){
		if(!isset($_GET['type']) || !isset($_GET['theme']))die();
		$stype= array('slider', 'lightbox', 'addon', 'widget');
		$type = sanitize_text_field($_GET['type']);
		$stheme= array(0,1,8,9);
		$theme = intval($_GET['theme']);
		if(!in_array($type, $stype) || !in_array($theme, $stheme))die();
		include_once( 'includes/'.$_GET['type'].$_GET['theme'].'.php' );
		die();
	}
	/**
	 * Return tab content
	 *
	 * @since    1.0.0
	 */
	public function tab(){
		if(!isset($_GET['tab']))die();
		$stab = array('addon','advanced','general','lightbox','slider','theme','theme_opt','widget');
		$tab = sanitize_text_field($_GET['tab']);
		if(!in_array($tab, $stab))die();
		include_once( 'views/admin_'.$tab.'.php' );
		die();
	}
	public function mailserv_connect(){
		if(!isset($_GET['step']))die();
		$config = json_decode(file_get_contents("php://input"),true);
		if(json_last_error() !== JSON_ERROR_NONE)die();
		$serv = new OptinPoint_Lite_Service($config);
		$step = intval($_GET['step']);
		$serv->connect($step);
		die();
	}	
	public function mailserv_getlists(){
		$config = json_decode(file_get_contents("php://input"),true);
		if(json_last_error() !== JSON_ERROR_NONE)die();
		$serv = new OptinPoint_Lite_Service($config);
		$serv->getlists();
		die();
	}	
	public function mailserv_getfields(){
		$config = json_decode(file_get_contents("php://input"),true);
		if(json_last_error() !== JSON_ERROR_NONE)die();
		$serv = new OptinPoint_Lite_Service($config[0]);
		$serv->getfields($config[1]);
		die();
	}
	public function update_options(){
		$data = json_decode(file_get_contents("php://input"),true);
		if(json_last_error() !== JSON_ERROR_NONE)die();
		$json = array_filter($data,array($this , 'myFilter'));
		$optinpoint = $this->settings;
		/*if (function_exists('curl_init') && function_exists('curl_setopt')){
			$up=0;if(isset($json["get_email_update"])){if(!isset($optinpoint["get_email_update"]) || (isset($optinpoint["get_email_update"]) && $json["email_update"] != $optinpoint["email_update"])){$up=1;}}else{if(isset($optinpoint["get_email_update"])){$up=2;}}if($up>0){$curl = curl_init();curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1,CURLOPT_URL => 'http://voltroid.com/optinpoint/api.php',CURLOPT_REFERER => home_url(),CURLOPT_POST => 1));if($up==1)curl_setopt($curl, CURLOPT_POSTFIELDS, array('action' => 'subs','email' => $json["email_update"]));else curl_setopt($curl, CURLOPT_POSTFIELDS, array('action' => 'unsubs'));$res=curl_exec($curl);curl_close($curl);}
		}*/
		update_option('optinpoint_options',$json);
		die('1');
	}
	/**
	 * Ajax call for one Click Backup and Restore
	 * @since    1.0.0
	 *
	 */
	public function restorebackup(){
		if ( !is_super_admin()) die();
		if($_REQUEST['q']=='backup'){
			$optinpoint = $this->settings;
			header('Content-disposition: attachment; filename=OptinPoint_Backup-'.date('Y-m-d H:i:s').'.json');
			header('Content-Type: application/json');
			echo json_encode($optinpoint);
		}
		else if ($_REQUEST['q'] == 'restore'){
				$json = $_REQUEST['data'];
				update_option('optinpoint_options',$json);
		}
		else if ($_REQUEST['q'] == 'reset'){
			$json=json_decode(file_get_contents(OPPOINT_PLUGIN_PATH.'src/default.json'),true);
				update_option('optinpoint_options',$json);
		}
		die();
	}
	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Voltroid Control Panel Icon
	 * @since    1.0.0
	 *
	 */
public function admin_css() {
		?>
<style>
#toplevel_page_optinpoint-lite .wp-menu-image::before{
	content :'';
background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTBweCIgaGVpZ2h0PSI1MHB4Ij48cGF0aCBkPSJNNDUxLjIsNDIuNDAxYy02LjYsMC0xMiw1LjQtMTIsMTJ2MzE4LjVjMCwzMy43LTI3LjQsNjEtNjEsNjFIODVjLTMzLjcsMC02MS0yNy40LTYxLTYxdi0zNDMuNmgzNTEuM3YzMDkgICAgYzAsNi42LDUuNCwxMiwxMiwxMnMxMi01LjQsMTItMTJ2LTMyMWMwLTYuNi01LjQtMTItMTItMTJIMTJjLTYuNiwwLTEyLDUuNC0xMiwxMnYzNTUuNWMwLDQ2LjksMzguMSw4NSw4NSw4NWgyOTMuMSAgICBjNDYuOSwwLDg1LTM4LjEsODUtODV2LTMxOC40QzQ2My4yLDQ3LjgwMSw0NTcuOCw0Mi40MDEsNDUxLjIsNDIuNDAxeiIgZmlsbD0iI2EwYTVhYSIvPjxwYXRoIGQ9Ik0zMjkuMyw5OC41MDFjNi42LDAsMTItNS40LDEyLTEycy01LjQtMTItMTItMTJINjcuN2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMkgzMjkuM3oiIGZpbGw9IiNhMGE1YWEiLz48cGF0aCBkPSJNMzI5LjMsMzE5LjEwMUg2Ny43Yy02LjYsMC0xMiw1LjQtMTIsMTJzNS40LDEyLDEyLDEyaDI2MS41YzYuNiwwLDEyLTUuNCwxMi0xMlMzMzUuOSwzMTkuMTAxLDMyOS4zLDMxOS4xMDF6IiBmaWxsPSIjYTBhNWFhIi8+PHBhdGggZD0iTTMyOS4zLDM4MC42MDFIMTA5LjJjLTYuNiwwLTEyLDUuNC0xMiwxMnM1LjQsMTIsMTIsMTJoMjIwLjFjNi42LDAsMTItNS40LDEyLTEyUzMzNS45LDM4MC42MDEsMzI5LjMsMzgwLjYwMXoiIGZpbGw9IiNhMGE1YWEiLz48cGF0aCBkPSJNNTEuNywxNDAuNDAxdjEyOS44YzAsNi42LDUuNCwxMiwxMiwxMkgxOTRjNi42LDAsMTItNS40LDEyLTEydi0xMjkuOGMwLTYuNi01LjQtMTItMTItMTJINjMuNyAgICBDNTcuMSwxMjguNDAxLDUxLjcsMTMzLjgwMSw1MS43LDE0MC40MDF6IE03NS43LDE1Mi40MDFIMTgydjEwNS44SDc1LjdWMTUyLjQwMXoiIGZpbGw9IiNhMGE1YWEiLz48cGF0aCBkPSJNMzM1LjcsMTQwLjQwMWgtODYuM2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMmg4Ni4zYzYuNiwwLDEyLTUuNCwxMi0xMlMzNDIuNCwxNDAuNDAxLDMzNS43LDE0MC40MDF6IiBmaWxsPSIjYTBhNWFhIi8+PHBhdGggZD0iTTMzNS43LDE5NC42MDFoLTg2LjNjLTYuNiwwLTEyLDUuNC0xMiwxMnM1LjQsMTIsMTIsMTJoODYuM2M2LjYsMCwxMi01LjQsMTItMTJTMzQyLjQsMTk0LjYwMSwzMzUuNywxOTQuNjAxeiIgZmlsbD0iI2EwYTVhYSIvPjxwYXRoIGQ9Ik0zNDcuNywyNjQuMjAxYzAtNi42LTUuNC0xMi0xMi0xMmgtODYuM2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMmg4Ni4zICAgIEMzNDIuNCwyNzYuMjAxLDM0Ny43LDI3MC44MDEsMzQ3LjcsMjY0LjIwMXoiIGZpbGw9IiNhMGE1YWEiLz48L3N2Zz4=);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}
#toplevel_page_optinpoint-lite:hover .wp-menu-image::before{
background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTBweCIgaGVpZ2h0PSI1MHB4Ij48cGF0aCBkPSJNNDUxLjIsNDIuNDAxYy02LjYsMC0xMiw1LjQtMTIsMTJ2MzE4LjVjMCwzMy43LTI3LjQsNjEtNjEsNjFIODVjLTMzLjcsMC02MS0yNy40LTYxLTYxdi0zNDMuNmgzNTEuM3YzMDkgICAgYzAsNi42LDUuNCwxMiwxMiwxMnMxMi01LjQsMTItMTJ2LTMyMWMwLTYuNi01LjQtMTItMTItMTJIMTJjLTYuNiwwLTEyLDUuNC0xMiwxMnYzNTUuNWMwLDQ2LjksMzguMSw4NSw4NSw4NWgyOTMuMSAgICBjNDYuOSwwLDg1LTM4LjEsODUtODV2LTMxOC40QzQ2My4yLDQ3LjgwMSw0NTcuOCw0Mi40MDEsNDUxLjIsNDIuNDAxeiIgZmlsbD0iIzAwYjllYiIvPjxwYXRoIGQ9Ik0zMjkuMyw5OC41MDFjNi42LDAsMTItNS40LDEyLTEycy01LjQtMTItMTItMTJINjcuN2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMkgzMjkuM3oiIGZpbGw9IiMwMGI5ZWIiLz48cGF0aCBkPSJNMzI5LjMsMzE5LjEwMUg2Ny43Yy02LjYsMC0xMiw1LjQtMTIsMTJzNS40LDEyLDEyLDEyaDI2MS41YzYuNiwwLDEyLTUuNCwxMi0xMlMzMzUuOSwzMTkuMTAxLDMyOS4zLDMxOS4xMDF6IiBmaWxsPSIjMDBiOWViIi8+PHBhdGggZD0iTTMyOS4zLDM4MC42MDFIMTA5LjJjLTYuNiwwLTEyLDUuNC0xMiwxMnM1LjQsMTIsMTIsMTJoMjIwLjFjNi42LDAsMTItNS40LDEyLTEyUzMzNS45LDM4MC42MDEsMzI5LjMsMzgwLjYwMXoiIGZpbGw9IiMwMGI5ZWIiLz48cGF0aCBkPSJNNTEuNywxNDAuNDAxdjEyOS44YzAsNi42LDUuNCwxMiwxMiwxMkgxOTRjNi42LDAsMTItNS40LDEyLTEydi0xMjkuOGMwLTYuNi01LjQtMTItMTItMTJINjMuNyAgICBDNTcuMSwxMjguNDAxLDUxLjcsMTMzLjgwMSw1MS43LDE0MC40MDF6IE03NS43LDE1Mi40MDFIMTgydjEwNS44SDc1LjdWMTUyLjQwMXoiIGZpbGw9IiMwMGI5ZWIiLz48cGF0aCBkPSJNMzM1LjcsMTQwLjQwMWgtODYuM2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMmg4Ni4zYzYuNiwwLDEyLTUuNCwxMi0xMlMzNDIuNCwxNDAuNDAxLDMzNS43LDE0MC40MDF6IiBmaWxsPSIjMDBiOWViIi8+PHBhdGggZD0iTTMzNS43LDE5NC42MDFoLTg2LjNjLTYuNiwwLTEyLDUuNC0xMiwxMnM1LjQsMTIsMTIsMTJoODYuM2M2LjYsMCwxMi01LjQsMTItMTJTMzQyLjQsMTk0LjYwMSwzMzUuNywxOTQuNjAxeiIgZmlsbD0iIzAwYjllYiIvPjxwYXRoIGQ9Ik0zNDcuNywyNjQuMjAxYzAtNi42LTUuNC0xMi0xMi0xMmgtODYuM2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMmg4Ni4zICAgIEMzNDIuNCwyNzYuMjAxLDM0Ny43LDI3MC44MDEsMzQ3LjcsMjY0LjIwMXoiIGZpbGw9IiMwMGI5ZWIiLz48L3N2Zz4=);
}
#toplevel_page_optinpoint-lite.wp-menu-open .wp-menu-image::before{
background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTBweCIgaGVpZ2h0PSI1MHB4Ij48cGF0aCBkPSJNNDUxLjIsNDIuNDAxYy02LjYsMC0xMiw1LjQtMTIsMTJ2MzE4LjVjMCwzMy43LTI3LjQsNjEtNjEsNjFIODVjLTMzLjcsMC02MS0yNy40LTYxLTYxdi0zNDMuNmgzNTEuM3YzMDkgICAgYzAsNi42LDUuNCwxMiwxMiwxMnMxMi01LjQsMTItMTJ2LTMyMWMwLTYuNi01LjQtMTItMTItMTJIMTJjLTYuNiwwLTEyLDUuNC0xMiwxMnYzNTUuNWMwLDQ2LjksMzguMSw4NSw4NSw4NWgyOTMuMSAgICBjNDYuOSwwLDg1LTM4LjEsODUtODV2LTMxOC40QzQ2My4yLDQ3LjgwMSw0NTcuOCw0Mi40MDEsNDUxLjIsNDIuNDAxeiIgZmlsbD0iI2ZmZiIvPjxwYXRoIGQ9Ik0zMjkuMyw5OC41MDFjNi42LDAsMTItNS40LDEyLTEycy01LjQtMTItMTItMTJINjcuN2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMkgzMjkuM3oiIGZpbGw9IiNmZmYiLz48cGF0aCBkPSJNMzI5LjMsMzE5LjEwMUg2Ny43Yy02LjYsMC0xMiw1LjQtMTIsMTJzNS40LDEyLDEyLDEyaDI2MS41YzYuNiwwLDEyLTUuNCwxMi0xMlMzMzUuOSwzMTkuMTAxLDMyOS4zLDMxOS4xMDF6IiBmaWxsPSIjZmZmIi8+PHBhdGggZD0iTTMyOS4zLDM4MC42MDFIMTA5LjJjLTYuNiwwLTEyLDUuNC0xMiwxMnM1LjQsMTIsMTIsMTJoMjIwLjFjNi42LDAsMTItNS40LDEyLTEyUzMzNS45LDM4MC42MDEsMzI5LjMsMzgwLjYwMXoiIGZpbGw9IiNmZmYiLz48cGF0aCBkPSJNNTEuNywxNDAuNDAxdjEyOS44YzAsNi42LDUuNCwxMiwxMiwxMkgxOTRjNi42LDAsMTItNS40LDEyLTEydi0xMjkuOGMwLTYuNi01LjQtMTItMTItMTJINjMuNyAgICBDNTcuMSwxMjguNDAxLDUxLjcsMTMzLjgwMSw1MS43LDE0MC40MDF6IE03NS43LDE1Mi40MDFIMTgydjEwNS44SDc1LjdWMTUyLjQwMXoiIGZpbGw9IiNmZmYiLz48cGF0aCBkPSJNMzM1LjcsMTQwLjQwMWgtODYuM2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMmg4Ni4zYzYuNiwwLDEyLTUuNCwxMi0xMlMzNDIuNCwxNDAuNDAxLDMzNS43LDE0MC40MDF6IiBmaWxsPSIjZmZmIi8+PHBhdGggZD0iTTMzNS43LDE5NC42MDFoLTg2LjNjLTYuNiwwLTEyLDUuNC0xMiwxMnM1LjQsMTIsMTIsMTJoODYuM2M2LjYsMCwxMi01LjQsMTItMTJTMzQyLjQsMTk0LjYwMSwzMzUuNywxOTQuNjAxeiIgZmlsbD0iI2ZmZiIvPjxwYXRoIGQ9Ik0zNDcuNywyNjQuMjAxYzAtNi42LTUuNC0xMi0xMi0xMmgtODYuM2MtNi42LDAtMTIsNS40LTEyLDEyczUuNCwxMiwxMiwxMmg4Ni4zICAgIEMzNDIuNCwyNzYuMjAxLDM0Ny43LDI3MC44MDEsMzQ3LjcsMjY0LjIwMXoiIGZpbGw9IiNmZmYiLz48L3N2Zz4=);
}


</style>

		<?php }
	/**
	 * Function to remove Null Value
	 * @since    1.0.0
	 *
	 */
	function myFilter($var){
	  return ($var !== NULL && $var !== FALSE && $var !== '');
	}
	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		
		include_once( 'views/admin.php' );
	}
	/**
	 * Sync users database to mail list
	 *
	 * @since    1.0.0
	 */
	public function usync(){
		$data = json_decode(file_get_contents("php://input"),true);
		if(json_last_error() !== JSON_ERROR_NONE)die();
		$emails = array();
		if($data['t'] == 1){
			foreach (get_comments() as $comment){
				array_push($emails, $comment->comment_author_email);
			}
		}
		else if ($data['t'] == 2){
			foreach ( get_users() as $user ) {
				if(isset($data['r']) && in_array($user->roles[0], $data['r']))
					array_push($emails, $user->user_email);
			}
		}
		echo json_encode(array_values(array_filter(array_unique($emails),array($this , 'myFilter'))));
		die('');
	}
	/**
	 * Sync individual users database to mail list
	 *
	 * @since    1.0.0
	 */
	public function usync_add(){
		$data = json_decode(file_get_contents("php://input"),true);
		if(json_last_error() !== JSON_ERROR_NONE)die();
		$settings=$this->settings;
		$form = $this->plugin->getformbyid($data['f']);
		$serv = new OptinPoint_Lite_Service($settings['mailserv']);
		$email = array(
			'email' => $data['e']
		);
		$r = $serv->subscribe($form,$email);
		echo $r;
		die('');
	}

}
