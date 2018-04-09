<div id="theme" class="optpoint_box">
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>Themes</h2>
		</div>
		<div class="optpoint_group optpoint_table_cont">
			<div class="optpoint_table optpoint_tableth">
				<div class="optpoint_tablehg">
					<div class="optpoint_tabler">
						<div>No</div>
						<div>Theme</div>
						<div>Edit</div>
						<div></div>
					</div>
				</div>
				<div class="optpoint_tablerg">
					<div class="optpoint_tabler" ng-repeat="th in data.themes">
						<div>{{$index + 1}}</div>
						<div>
							{{th.name}}
						</div>
						<div>
							<div class="mul_ico mul_edit" ng-click="theme_ctrl.edit(th.id)"></div>
						</div>
						<div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="optpoint_edit"></div>
	<div ng-if="theme_ctrl.esel > -1" ng-include="theme_ctrl.econ"></div>
</div>