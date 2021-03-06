<div id="widget" class="optpoint_box">
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>Subscribe box in Widget</h2>
		</div>
		<div class="optpoint_group">
			<div class="paper-toggle">
				<input type="checkbox" id="widget_en" ng-model="data.widget" ng-true-value="'1'" class="optpoint_toggle">
				<label for="widget_en">Enable</label>
			</div>
			<span class="optpoint_hint" data-hint="Enable Widget"></span>
		</div>
		<div class="optpoint_group optpoint_dropc">
			<label>Custom Form</label>
			<div class="optpoint_drop">
				<div class="optpoint_drop_head"><div>{{getformbyid(data.widget_form).name || (data.cforms.length?'Select Form':'No Forms')}}</div>
				<div class="bar"></div>
				</div>
				<div class="optpoint_drop_body">
				<div ng-repeat="form in data.cforms" ng-click="data.widget_form = form.id">{{form.name}}</div>
				</div>
			</div>
			<button class="optpoint_button orange material-design ng-binding" ng-click="foredit.run(0,data.widget_form)" ng-show="data.widget_form">Edit Form</button>
		</div>
		<div class="optpoint_group optpoint_dropc">
			<label>Theme</label>
			<div class="optpoint_drop">
				<div class="optpoint_drop_head"><div>{{gettheme(data.widget_theme).name || (data.themes.length?'Select Theme':'No Themes')}}</div>
				<div class="bar"></div>
				</div>
				<div class="optpoint_drop_body">
				<div ng-repeat="theme in data.themes" ng-click="data.widget_theme = theme.id">{{theme.name}}</div>
				</div>
			</div>
			<button class="optpoint_button orange material-design ng-binding" ng-click="foredit.run(1,data.widget_theme)" ng-show="data.widget_theme">Edit Theme</button>
		</div>
	</div>
</div>