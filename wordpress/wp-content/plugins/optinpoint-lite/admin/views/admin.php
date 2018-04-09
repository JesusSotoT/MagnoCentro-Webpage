<?php
/**
 * OptinPoint - Advanced Subscription Hub For Wordpress
 *
 * @package   OptinPoint - Advanced Subscription Hub For Wordpress
 * @author    Voltroid<care@voltroid.com>
 * @link      http://voltroid.com/optinpoint
 * @copyright 2017 Voltroid
 */

?>
<div class="wrap optpoint_home" ng-app="optpoint" id="optpointctlr" ng-controller="optpointctlr">
	<div class="optpoint_header">
		<div class="h_mid"></div>
	</div>
	<div class="optpoint_toolbar">
		<div class="optpoint_tabs">
			<ul>
				<li class="tabitem material-design" ng-class="{active: $route.current.activetab == 'general'}"><a href="#/general" data-title="general">GENERAL</a></li>
				<li class="tabitem material-design" ng-class="{active: $route.current.activetab == 'theme'}"><a href="#/theme" data-title="theme">THEME</a></li>
				<li class="tabitem material-design" ng-class="{active: $route.current.activetab == 'lightbox'}"><a href="#/lightbox" data-title="lightbox">LIGHTBOX</a></li>
				<li class="tabitem material-design" ng-class="{active: $route.current.activetab == 'slider'}"><a href="#/slider" data-title="slider">SLIDER</a></li>
				<li class="tabitem material-design" ng-class="{active: $route.current.activetab == 'widget'}"><a href="#/widget" data-title="widget">WIDGET</a></li>
				<li class="tabitem material-design" ng-class="{active: $route.current.activetab == 'addon'}"><a href="#/addon" data-title="addon">ADD-ON</a></li>
				<li class="tabitem material-design" ng-class="{active: $route.current.activetab == 'advanced'}"><a href="#/advanced" data-title="advanced">ADVANCED</a></li>
			</ul>
		</div>
		<button ng-click="update_options()" class="optpoint_button red material-design">Update Options</button>
		<div class="optpoint_loading_container">
			<div class="optpoint_spinner" ng-if="isLoading == 1">
				<svg class="circular">
					<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
				</svg>
			</div>
			<div class="optpoint_status optpoint_updated" ng-if="isLoading == 2"></div>
			<div class="optpoint_status optpoint_error" ng-if="isLoading == 3"></div>
		</div>
	</div>

	<div class="optpoint_content">
		<div ng-view></div>
	</div>
	<div id="errcont"></div>
</div>