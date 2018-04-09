<div id="general" class="optpoint_box">
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>Connection Settings</h2>
		</div>
		<div ng-switch="mailserv.isConfig">
			<div ng-switch-when="0">
				<div class="optpoint_group conftext">
					Mail Service : {{mailserv.list[data.mailserv.id].name}}
					<div ng-show="data.mailserv.acc">Account : {{data.mailserv.acc}}</div>
				</div>
				<div class="optpoint_group">
					<button class="optpoint_button green material-design" ng-click="mailserv.proc()">Reconfigure</button>
				</div>
			</div>
			<div ng-switch-when="1">
				<div class="optpoint_group">
					<optsel optlab="Mailing Service" ng-head="mailserv.list[mailserv.config.id].name" opthead="'Not Selected'" ng-list="mailserv.list" ng-model="mailserv.config.id" optclk="k" optlname="v.name" optclass="{'drop-dis': v.disable}"></optsel>
				</div>
				<div class="optpoint_group">
					<button class="optpoint_button blue material-design" ng-click="mailserv.proc()">Next</button>
					<button class="optpoint_button red material-design" ng-click="mailserv.cancel()" ng-if="data.mailserv.id">Cancel</button>
				</div>
			</div>
			<div ng-switch-when="2">
				<div ng-switch="mailserv.config.id">
					<div ng-switch-when="cm">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
							</div>
							<div ng-switch-when="1">
								<optsel optlab="Select Client" ng-head="mailserv.templist[1].Name" opthead="'Not Selected'" ng-list="mailserv.templist[0]" ng-model="mailserv.templist[1]" optclk="v" optlname="v.Name"></optsel>
							</div>
						</div>
					</div>
					<div ng-switch-when="gr">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="ml">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="sg">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="ck">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
								<opttext ng-model="mailserv.config.key[1]" optlab="API Secret"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="dp">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<div class="optpoint_group">
									Click <a href="https://www.getdrip.com/user/edit" target="_blank">here</a> your for API Token.
								</div>
								<opttext ng-model="mailserv.config.key[0]" optlab="Account ID"></opttext>
								<opttext ng-model="mailserv.config.key[1]" optlab="API Token"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="hs">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="be">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="ic">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API-AppId"></opttext>
								<opttext ng-model="mailserv.config.key[1]" optlab="API-Username"></opttext>
								<opttext ng-model="mailserv.config.key[2]" optlab="API-Password"></opttext>
							</div>
							<div ng-switch-when="1">
								<optsel optlab="Select Campaign" ng-head="mailserv.templist[1].name" opthead="'Not Selected'" ng-list="mailserv.templist[0]" ng-model="mailserv.templist[1]" optclk="v" optlname="v.name"></optsel>
							</div>
						</div>
					</div>
					<div ng-switch-when="aw">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<div class="optpoint_group">
									Click <a href="https://auth.aweber.com/1.0/oauth/authorize_app/0af5f515" target="_blank">here</a> and Login to the OptinPoint App with your Aweber Account.
									On successful login, you will get an Authorization code. Copy paste the code below.
								</div>
								<opttext ng-model="mailserv.config.key[51]" optlab="Authorization Code"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="cc">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<div class="optpoint_group">
									<a href="https://constantcontact.mashery.com/member/register" target="_blank">Sign up</a> for a Mashery account or <a href="https://constantcontact.mashery.com/login" target="_blank">log in</a>. Confirm your account, if it's new - Check your inbox for a confirmation email from Mashery. <a href="https://constantcontact.mashery.com/apps/register" target="_blank">Register</a> an Application and Redirect URI field as "<?php echo OPPOINT_PLUGIN_URL;?>service/cc/redirect.php" Fill-in here the API Key assigned to your application.
								</div>
								<opttext ng-model="mailserv.config.key[0]" optlab="Mashery API Key"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="vr">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<div class="optpoint_group">
									<a href="http://developer.verticalresponse.com/member/register" target="_blank">Sign up</a> for a Mashery account or <a href="https://secure.mashery.com/login/developer.verticalresponse.com/" target="_blank">log in</a>. Confirm your account, if it's new - Check your inbox for a confirmation email from Mashery. <a href="https://constantcontact.mashery.com/apps/register" target="_blank">Register</a> an Application. Fill-in here the API Key and Secret assigned to your application.
								</div>
								<opttext ng-model="mailserv.config.key[0]" optlab="Mashery API Key"></opttext>
								<opttext ng-model="mailserv.config.key[1]" optlab="Mashery API Secret"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="mm">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API Key"></opttext>
								<opttext ng-model="mailserv.config.key[1]" optlab="Username"></opttext>
							</div>
						</div>
					</div>
					<div ng-switch-when="ac">
						<div ng-switch="mailserv.step">
							<div ng-switch-when="0">
								<opttext ng-model="mailserv.config.key[0]" optlab="API URL"></opttext>
								<opttext ng-model="mailserv.config.key[1]" optlab="API Key"></opttext>
							</div>
						</div>
					</div>
				</div>
				<div class="optpoint_group">
					<button class="optpoint_button blue material-design" ng-click="mailserv.proc()">Next</button>
					<button class="optpoint_button red material-design" ng-click="mailserv.cancel()" ng-if="data.mailserv.id">Cancel</button>
					<button class="optpoint_button green material-design" ng-click="mailserv.reset()">Reset</button>
				</div>
			</div>
			<div ng-switch-when="3">
				<div class="optpoint_group conftext">
					Mail Service : {{mailserv.list[mailserv.config.id].name}}
					<div ng-show="mailserv.config.acc">Account : {{mailserv.config.acc}}</div>
				</div>
				<div class="optpoint_group">
					<button class="optpoint_button blue material-design" ng-click="mailserv.proc()">Confirm</button>
					<button class="optpoint_button red material-design" ng-click="mailserv.cancel()" ng-if="data.mailserv.id">Cancel</button>
					<button class="optpoint_button green material-design" ng-click="mailserv.reset()">Reset</button>
				</div>
			</div>
		</div>
	</div>


<div class="optpoint_item">
	<div class="itemhead">
		<h2>Custom Form</h2>
	</div>
	<div class="optpoint_formcont">
		<div class="optpoint_formcontin">
			<div class="optpoint_formbox">
				<div class="optpoint_group optpoint_table_cont">
					<div class="optpoint_table optpoint_tablefo">
						<div class="optpoint_tablehg">
							<div class="optpoint_tabler">
								<div>No</div>
								<div>Form</div>
								<div>Edit</div>
								<div></div>
							</div>
						</div>
						<div class="optpoint_tablerg">
							<div class="optpoint_tabler" ng-repeat="cform in data.cforms track by $index">
								<div>{{$index + 1}}</div>
								<div>
									{{cform.name}}
								</div>
								<div>
									<div class="mul_ico mul_edit" ng-click="form.edit(cform.id)"></div>
								</div>
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="optpoint_edit"></div>
			<div class="optpoint_formbox" ng-if="form.step==2 && mailserv.isConfig == 0">
				<div class="itemhead">
					<h2>Edit Form</h2>
				</div>
				<!-- Load List -->
				<div class="optpoint_group" ng-if="mailserv.list[data.mailserv.id].ltype <= 1">
					<optsel optlab="Select List" ng-head="form.tform.list.name" opthead="'Not Selected'" ng-list="edform.lists" ng-model="form.tform.list" optclk="v" optlname="v.name" optchange="listchange"></optsel>
				</div>
				<div class="optpoint_group" ng-if="mailserv.list[data.mailserv.id].ltype < 1">
					<button class="optpoint_button green material-design" ng-click="edform.loadfield()">Load Fields</button>
				</div>
				<!-- Load Fields -->
				<div ng-show="mailserv.list[data.mailserv.id].ltype >= 1 || edform.shf == 1">
					<div class="optpoint_group optpoint_table_cont">
						<div class="optpoint_table optpoint_tablefi">
							<div class="optpoint_tablehg">
								<div class="optpoint_tabler">
									<div></div>
									<div>No</div>
									<div>Field</div>
									<div>Options</div>
									<div></div>
								</div>
							</div>
							<div class="optpoint_tablerg" as-sortable="sortableOptions" ng-model="form.tform.fields">
								<div class="optpoint_tabler optpoint_tablefi" ng-repeat="cfield in form.tform.fields" as-sortable-item class="as-sortable-item mulfieldr">
									<div as-sortable-item-handle class="as-sortable-item-handle"></div>
									<div>{{$index + 1}}</div>
									<div>
										<div class="optpoint_drop optpoint_dropf">
											<div class="optpoint_drop_head"><div>{{cfield.name || (cfields.length?'Select Field':'No Field')}}</div>
												<div class="bar"></div>
											</div>
											<div class="optpoint_drop_body">
												<div ng-repeat="rfield in edform.fields" ng-click="field.selector($parent.$index,rfield)" ng-class="{'drop-dis': edform.chkfldexst(rfield)}">{{rfield.name}}({{rfield.typesel || rfield.type}})</div>
											</div>
										</div>
									</div>
									<div>
										<div class="mul_ico mul_del" ng-click="field.del.c($index)" ng-hide="cfield.req"></div>
										<div class="mul_ico mul_req" ng-show="cfield.req"></div>
										<div class="mul_ico mul_edit" ng-show="cfield.name" ng-click="field.edit($index)"></div>
									</div>
									<div class="optpoint_tablefed">
										<div class="optpoint_tablefed_box" ng-if="field.ed == $index">
											<div class="optpoint_tablefed_row" ng-if="cfield.type == 'text'">
												<label>Icon</label>
												<div class="optpoint_tablefed_col">
													<div class="ico_sel">
														<div class="optpoint_drop">
															<div class="optpoint_drop_head"><div ng-class="cfield.icon"></div>
																<div class="bar"></div>
															</div>
															<div class="optpoint_drop_body">
																<div class="longcell inone" ng-click="cfield.icon='inone'" ng-class="{'drop-sel': cfield.icon=='inone' }"></div>
																<div class="longcell idef" ng-click="cfield.icon='idef'" ng-class="{'drop-sel': cfield.icon=='idef' }"></div>
																<div ng-repeat="(k, v) in icons" ng-click="cfield.icon=k" class="{{k}}" ng-class="{'drop-sel': k == cfield.icon }"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="optpoint_tablefed_row" ng-if="cfield.noid">
												<label>Field ID</label>
												<div class="optpoint_tablefed_col">
													<input type="text" class="optpoint_tabtext" required ng-model="cfield.id">
													<div class="bar"></div>
												</div>
											</div>
											<div class="optpoint_tablefed_row">
												<label>Label</label>
												<div class="optpoint_tablefed_col">
													<input type="text" class="optpoint_tabtext" required ng-model="cfield.label">
													<div class="bar"></div>
												</div>
											</div>
											<!--<div class="optpoint_tablefed_row">
												<label>Type</label>
												<div class="optpoint_tablefed_col">{{cfield.type}}</div>
											</div>
											<div class="optpoint_tablefed_row">
												<label>Format</label>
												<div class="optpoint_tablefed_col">{{cfield.format}}</div>
											</div>-->
											<div class="optpoint_tablefed_row" ng-if="cfield.not || (cfield.typesel && cfield.typesel != 'text')">
												<label>Type</label>
												<div class="optpoint_tablefed_col">
													<div class="optpoint_drop optpoint_dropf">
														<div class="optpoint_drop_head"><div>{{cfield.type}}</div>
															<div class="bar"></div>
														</div>
														<div class="optpoint_drop_body">
															<div ng-click="cfield.type = 'text'" ng-show="cfield.not || cfield.typesel == 'text_box' || cfield.typesel == 'single'">text</div>
															<div ng-click="cfield.type = 'textarea'" ng-show="cfield.not || cfield.typesel == 'text_box' || cfield.typesel == 'single'">textarea</div>
															<div ng-click="cfield.type = 'checkbox'" ng-show="cfield.not || cfield.typesel == 'choice' || cfield.typesel == 'multi_select'">checkbox</div>
															<div ng-click="cfield.type = 'radio'" ng-show="cfield.not || cfield.typesel == 'choice' || cfield.typesel == 'single_select' || cfield.typesel == 'single'">radio</div>
															<div ng-click="cfield.type = 'select'" ng-show="cfield.not || cfield.typesel == 'choice' || cfield.typesel == 'single_select' || cfield.typesel == 'single'">select</div>
															<div ng-click="cfield.type = 'singlecheck'" ng-show="cfield.not || cfield.typesel == 'choice' || cfield.typesel == 'single_select' || cfield.typesel == 'single'">single checkbox</div>
															<div ng-click="cfield.type = 'multiselect'" ng-show="cfield.not || cfield.typesel == 'choice' || cfield.typesel == 'multi_select'">multiselect</div>
														</div>
													</div>
												</div>
											</div>
											<div class="optpoint_tablefed_row" ng-if="cfield.nof && cfield.type == 'text'">
												<label>Format</label>
												<div class="optpoint_tablefed_col">
													<div class="optpoint_drop optpoint_dropf">
														<div class="optpoint_drop_head"><div>{{cfield.format}}</div>
															<div class="bar"></div>
														</div>
														<div class="optpoint_drop_body">
															<div ng-click="cfield.format = 'text'">text</div>
															<div ng-click="cfield.format = 'email'">email</div>
															<div ng-click="cfield.format = 'number'">number</div>
															<div ng-click="cfield.format = 'date'">date</div>
															<div ng-click="cfield.format = 'url'">url</div>
														</div>
													</div>
												</div>
											</div>
											<div class="optpoint_tablefed_row" ng-if="(field.extra.fill() || cfield.type == 'singlecheck') && ['checkbox','radio','select','multiselect','singlecheck'].indexOf(cfield.type) >= 0">
												<label>Options</label>
												<div class="optpoint_tablefed_col">
													<div class="optpoint_tablefed_opt" ng-repeat="(k,v) in cfield.extras track by k">
														<div ng-if="field.extra.fill() || cfield.type == 'singlecheck'">
															<input type="text" class="optpoint_tabtext" required ng-model="cfield.extras[k].label" ng-if="cfield.extras[k].label">
															<input type="text" class="optpoint_tabtext" required ng-model="cfield.extras[k].name" ng-if="!cfield.extras[k].label">
															<div class="bar"></div>
															<div class="fed_ico mul_del" ng-click="field.extra.del($parent.$parent.$index, $index)" ng-if="cfield.type !== 'singlecheck'"></div>
														</div>
														<div ng-if="!field.extra.fill() && cfield.type !== 'singlecheck'">
														{{cfield.extras[k].label || cfield.extras[k].name}}
														</div>
													</div>
													<div class="optpoint_tablefed_optadd" ng-click="field.extra.add($parent.$index)" ng-if="field.extra.fill() || (cfield.extras.length == 0 && cfield.type == 'singlecheck')"></div>
													<div ng-if="!cfield.extras || cfield.extras.length == 0" class="optpoint_tablefed_optemp">Empty</div>
												</div>
											</div>
											<div class="optpoint_tablefed_row" ng-hide="cfield.req">
												<div class="optpoint_tablefed_col optpoint_cm">
													<label class="mcheckbox">
														<input type="checkbox" ng-model="cfield.foreq" ng-true-value="true">
														<div>Required Field</div>
													</label>
												</div>
											</div>
											<div class="optpoint_tablefed_row" ng-if="cfield.id != 'email' && cfield.type=='text'">
												<div class="optpoint_tablefed_col optpoint_cm">
													<label class="mcheckbox">
														<input type="checkbox" ng-model="cfield.eft" ng-true-value="true" ng-change="field.eftchange($index)">
														<div>Extra Field for Topbar other than email</div>
													</label>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="optpoint_table_foot">
							<div class="optpoint_conbox blue add" ng-click="field.add()"></div>
							<div class="optpoint_conbox ok" ng-click="field.ok()"></div>
							<div class="optpoint_conbox cancel" ng-click="field.cancel()"></div>
							<div style="clear:both"></div>
						</div>
					</div>
					<div class="optpoint_group selcon" ng-show="field.sel>-1">
						<div class="selconmsg">Are you sure you want to delete {{form.tform.fields[field.sel].name}}?</div>
						<div class="optpoint_conbox confirm" ng-click="field.del.y()"></div>
						<div class="optpoint_conbox decline" ng-click="field.del.n()"></div>
						<div style="clear:both"></div>
					</div>
				</div>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>


	<div class="optpoint_item">
		<div class="itemhead">
			<h2>On Successful Subscription</h2>
			<span class="optpoint_hint headhint" data-hint="What do on Successful Subscription?"></span>
		</div>
		<optrad ng-model="data.suc_sub" optlab="" optval="suc_msg"></optrad>
		<opttext ng-model="data.suc_msg" optlab="Success Message" opthint="Enter a Message to Show Up"></opttext>
		<optrad ng-model="data.suc_sub" optlab="" optval="suc_url"></optrad>
		<opttext ng-model="data.suc_url" optlab="Redirect to URL" opthint="Enter a URL to redirect"></opttext>
		<div class="optpoint_group optpoint_cb p3">
			<label><input type="checkbox" ng-true-value="'1'" ng-model="data.suc_url_tab">
			<div class="mcheckbox"></div>Open in new tab</label>
		</div>
	</div>
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>Error Messages</h2>
			<span class="optpoint_hint headhint" data-hint="Set Respective Error Messages"></span>
		</div>
		<opttext ng-model="data.errorrf" optlab="Required Field"></opttext>
		<opttext ng-model="data.errorfe" optlab="Invalid Entry"></opttext>
		<opttext ng-model="data.erroras" optlab="Already subscribed" ng-hide="data.mailserv.id == 'cm'"></opttext>
		<opttext ng-model="data.errorue" optlab="Unknown error"></opttext>
	</div>

	<div class="optpoint_item">
		<div class="itemhead">
			<h2>User Status</h2>
			<span class="optpoint_hint headhint" data-hint="Show Subscription form if the user is?"></span>
		</div>
		<optchk ng-model="data.loggedin" optlab="Logged-In"></optchk>
		<optchk ng-model="data.notloggedin" optlab="Not Logged-In"></optchk>
		<optchk ng-model="data.commented" optlab="Commented"></optchk>
		<optchk ng-model="data.notcommented" optlab="Not Commented"></optchk>
	</div>
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>Social API Keys</h2>
			<span class="optpoint_hint headhint" data-hint="Set Social API Keys for Subscribe with Social Logins(wherever applicable)"></span>
		</div>
		<opttext ng-model="data.fb_api" optlab="Facebook App ID"></opttext>
		<opttext ng-model="data.gp_api" optlab="Google App Client ID for Web"></opttext>
		<opttext ng-model="data.ms_api" optlab="Microsoft App Client ID" opttext="Please provide the Redirect URI while creating a Microsoft App as :<br><?php echo OPPOINT_PLUGIN_URL. 'assets/ms-oauth.php';?>"></opttext>
	</div>


	<div class="optpoint_item">
		<div class="itemhead">
			<h2>Referrer</h2>
			<span class="optpoint_hint headhint" data-hint="Only a visitor from those selected website categories, can view the Lightbox/Slider"></span>
			<span class="opt_notice">* RECOMMENDED FOR ADVANCED USERS ONLY :<br> If enabled, the lightbox/slider will not appear if website is accessed directly</span>
		</div>
		<optchk ng-model="data.searchengine" optlab="Search Engine"></optchk>
	</div>
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>User Sync</h2>
			<span class="optpoint_hint headhint" data-hint="Sync users from Website"></span>
		</div>
		<optchk ng-model="data.usyn_com" optlab="Comment based Sync"></optchk>
		<div class="optpoint_group optpoint_dropc">
			<label>Custom Form</label>
			<div class="optpoint_drop">
				<div class="optpoint_drop_head"><div>{{getformbyid(data.usyn_coml).name || (data.cforms.length?'Select Form':'No Forms')}}</div>
				<div class="bar"></div>
				</div>
				<div class="optpoint_drop_body">
				<div ng-repeat="form in data.cforms" ng-click="data.usyn_coml = form.id">{{form.name}}</div>
				</div>
			</div>
		</div>
		<div class="optpoint_group optpoint_cb p2" ng-show="data.usyn_com == 1">
			<label><input type="radio" value="1" ng-model="data.usyn_comp">
					With User's permission</label>
			<span class="optpoint_hint" data-hint="Insert Checkbox near the Comment box"></span>
		</div>
		<opttext ng-model="data.usyn_compt" optlab="Permission Text" optclass="p3" opthint="Text for Checkbox" ng-show="data.usyn_com == 1"></opttext>

		<div class="optpoint_group optpoint_cb p2" ng-show="data.usyn_com == 1">
			<label><input type="radio" value="0" ng-model="data.usyn_comp">
					Without User's permission</label>
			<span class="optpoint_hint" data-hint="Add to list directly"></span>
		</div>
		<div class="optpoint_group optpoint_proggroup" ng-class="{'optprogon':usync.sync == 1}">
			<button class="optpoint_button green material-design optpoint_usync" ng-click="usync.process(1,data.usyn_coml)">Sync Existing</button>
			<span class="optpoint_hint" data-hint="Sync currently commented users to list"></span>
			<div class="optprogress" optval="{{(usync.done/usync.tot)*100 || 0 | number : 0}}%">
				<div class="optprogressbar" style="transform: scale({{usync.done/usync.tot || 0}},1)"></div>
			</div>
		</div>
		<optchk ng-model="data.usyn_reg" optlab="Registration based Sync"></optchk>
		<div class="optpoint_group optpoint_dropc">
			<label>Custom Form</label>
			<div class="optpoint_drop">
				<div class="optpoint_drop_head"><div>{{getformbyid(data.usyn_regl).name || (data.cforms.length?'Select Form':'No Forms')}}</div>
				<div class="bar"></div>
				</div>
				<div class="optpoint_drop_body">
				<div ng-repeat="form in data.cforms" ng-click="data.usyn_regl = form.id">{{form.name}}</div>
				</div>
			</div>
		</div>
		<div class="optpoint_group optpoint_cb p2" ng-show="data.usyn_reg == 1">
			<label><input type="radio" value="1" ng-model="data.usyn_regp">
					With User's permission</label>
			<span class="optpoint_hint" data-hint="Insert Checkbox near the Sign-up box"></span>
		</div>
		<opttext ng-model="data.usyn_regpt" optlab="Permission Text" optclass="p3" opthint="Text for Checkbox" ng-show="data.usyn_reg == 1"></opttext>
		<div class="optpoint_group optpoint_cb p2" ng-show="data.usyn_reg == 1">
			<label><input type="radio" value="0" ng-model="data.usyn_regp">
					Without User's permission</label>
			<span class="optpoint_hint" data-hint="Add to list directly"></span>
		</div>
		<div class="optpoint_group p2">
			<select id="usync_role" ng-model="data.usync_role" ng-multi-select multiple="multiple" ng-multi-select-placeholder="User roles" ng-multi-select-filter="false" ng-multi-select-width="300px">
	<?php
	global $wp_roles;
	$all_roles = $wp_roles->roles;
	foreach ($all_roles as $key => $value) {
	echo '<option value="'.$key.'">'.$value['name'].'</option>';
	} ?>
		</select>
		</div>
		<div class="optpoint_group optpoint_proggroup" ng-class="{'optprogon':usync.sync == 2}">
			<button class="optpoint_button green material-design usyn_reg" ng-click="usync.process(2,data.usyn_regl,data.usync_role)">Sync Existing</button>
			<span class="optpoint_hint" data-hint="Sync currently registered users to list"></span>
			<div class="optprogress" optval="{{(usync.done/usync.tot)*100 || 0 | number : 0}}%">
				<div class="optprogressbar" style="transform: scale({{usync.done/usync.tot || 0}},1)"></div>
			</div>
		</div>
	</div>
	<div class="optpoint_item">
		<div class="itemhead">
			<h2>News and Updates</h2>
			<span class="optpoint_hint headhint" data-hint="Get Product Update &amp; News. It's secure and spam free..."></span>
		</div>
		<optchk ng-model="data.get_email_update" optlab="Get Email Updates"></optchk>
		<opttext ng-model="data.email_update" optlab="Email Address"></opttext>
		<!--<optchk ng-model="data.share_text" optlab="Keep Share Text Link enabled to make us happy :)" opthint="You can disable it if you wish :("></optchk>-->
	</div>
</div>