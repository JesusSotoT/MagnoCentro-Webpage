<div id="slider" class="optpoint_box">
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>Subscribe box in Slider</h2>
		</div>
		<div class="optpoint_group">
			<div class="paper-toggle">
				<input type="checkbox" id="slider_en" ng-model="data.slider" ng-true-value="'1'" class="optpoint_toggle">
				<label for="slider_en">Enable</label>
			</div>
			<span class="optpoint_hint" data-hint="Enable Slider"></span>
		</div>
		<div class="optpoint_group optpoint_dropc">
			<label>Custom Form</label>
			<div class="optpoint_drop">
				<div class="optpoint_drop_head"><div>{{getformbyid(data.slider_form).name || (data.cforms.length?'Select Form':'No Forms')}}</div>
				<div class="bar"></div>
				</div>
				<div class="optpoint_drop_body">
				<div ng-repeat="form in data.cforms" ng-click="data.slider_form = form.id">{{form.name}}</div>
				</div>
			</div>
			<button class="optpoint_button orange material-design ng-binding" ng-click="foredit.run(0,data.slider_form)" ng-show="data.slider_form">Edit Form</button>
		</div>
		<div class="optpoint_group optpoint_dropc">
			<label>Theme</label>
			<div class="optpoint_drop">
				<div class="optpoint_drop_head"><div>{{gettheme(data.slider_theme).name || (data.themes.length?'Select Theme':'No Themes')}}</div>
				<div class="bar"></div>
				</div>
				<div class="optpoint_drop_body">
				<div ng-repeat="theme in data.themes" ng-click="data.slider_theme = theme.id">{{theme.name}}</div>
				</div>
			</div>
			<button class="optpoint_button orange material-design ng-binding" ng-click="foredit.run(1,data.slider_theme)" ng-show="data.slider_theme">Edit Theme</button>
		</div>
	</div>
	<div class="optpoint_item">
		<div class="itemhead">
				<h2>Filter by Device</h2>
				<span class="optpoint_hint headhint" data-hint="Show Subscription form if the user visits from?"></span>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_desktop" ng-true-value="'1'">
				<div class="mcheckbox"></div>Desktop</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_tablet" ng-true-value="'1'">
				<div class="mcheckbox"></div>Tablet</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_mobile" ng-true-value="'1'">
				<div class="mcheckbox"></div>Mobile</label>
		</div>
	</div>
	<div class="optpoint_item">
		<div class="itemhead">
				<h2>Filter by Page type</h2>
				<span class="optpoint_hint headhint" data-hint="Show Subscription form if the user visits?"></span>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_homepage" ng-true-value="'1'">
				<div class="mcheckbox"></div>Home Page</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_blog" ng-true-value="'1'">
				<div class="mcheckbox"></div>Blog Page</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_page" ng-true-value="'1'">
				<div class="mcheckbox"></div>Pages</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_post" ng-true-value="'1'">
				<div class="mcheckbox"></div>Posts</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_category" ng-true-value="'1'">
				<div class="mcheckbox"></div>Categories/Archives</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_search" ng-true-value="'1'">
				<div class="mcheckbox"></div>Search</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-model="data.slider_404error" ng-true-value="'1'">
				<div class="mcheckbox"></div>404 Error</label>
		</div>
	</div>
	<div class="optpoint_item">
		<div class="itemhead">
				<h2>Behaviour</h2>
				<span class="optpoint_hint headhint" data-hint="Behaviour of the Slider"></span>
		</div>
		<div class="optpoint_group optpoint_cb">
			<label class="optpoint_para">Orientation</label>
			<div class="optpoint_compac p1">
				<input id="so1" type="radio" ng-model="data.slider_orient" value="left">
				<label for="so1">Left <div class="orientdemo lefto"></div></label>
			</div>
			<div class="optpoint_compac">
				<input id="so2" type="radio" ng-model="data.slider_orient" value="right">
				<label for="so2">Right <div class="orientdemo righto"></div></label>
			</div>
			<div style="clear:both"></div>
	 	</div>
		<div class="optpoint_group optpoint_txts optpoint_cb">
			<label>Appear after</label>
			<input type="text" class="optpoint_texts" ng-model="data.slider_behave_time">
			<span>seconds</span>
			<label><input type="checkbox" style="margin-left: 10px;" ng-model="data.slider_behave_time_inac" ng-true-value="'1'">
			<div class="mcheckbox"></div>of Inactivity</label>
		</div>
		<div class="optpoint_group optpoint_cb">
				<label><input type="checkbox" ng-true-value="'1'" ng-model="data.slider_close_bck">
				<div class="mcheckbox"></div>Close when Slider background is clicked</label>
				<span class="optpoint_hint" data-hint="If not selected, visitors need to click close button to exit the slider"></span>
		</div>
		<div class="optpoint_group optpoint_txts optpoint_cb">
			<label><input type="checkbox" ng-model="slider_trigger_scroll" ng-true-value="'1'">
			<div class="mcheckbox"></div>Trigger appear after</label>
			<input type="text" class="optpoint_texts" value="50" disabled>
			<span>% of the page scrolled</span>
		</div>
	</div>
</div>