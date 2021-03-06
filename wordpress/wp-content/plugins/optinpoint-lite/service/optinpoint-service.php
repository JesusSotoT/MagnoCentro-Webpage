<?php
/**
 * OptinPoint - Advanced Subscription Hub For Wordpress
 *
 * @package   OptinPoint - Advanced Subscription Hub For Wordpress
 * @author    Voltroid<care@voltroid.com>
 * @link      http://voltroid.com/optinpoint
 * @copyright 2017 Voltroid
 */

/**
 *
 * @package   OptinPoint - Advanced Subscription Hub For Wordpress
 * @author    Voltroid<care@voltroid.com>
 *
 */
require_once 'cm/csrest_general.php';
require_once 'cm/csrest_clients.php';
require_once 'cm/csrest_lists.php';
require_once 'cm/csrest_subscribers.php';
require_once 'gr/GetResponseAPI3.class.php';
require_once 'ic/iContactApi.php';
require_once('aw/aweber_api.php');
require_once('cc/ConstantContact.class.php');
require_once('mm/MadMimi.class.php');
require_once('vr/VerticalResponse.class.php');
require_once('ck/ConvertKit.class.php');
require_once('ac/ActiveCampaign.class.php');
require_once('sg/SendGrid.php');
require_once('hs/Hubspot.php');
require_once('be/BenchmarkEmail.php');
require_once('ml/MailerLite.class.php');
require_once('dp/DripEmail.class.php');
require_once('zc/Zoho.class.php');
class OptinPoint_Lite_Service {

	function __construct($config){
		$this->config = $config;
		$this->configure();
	}
	function configure(){
		$this->args = array();
		if(isset($this->config['key']))
			$key = $this->config['key'];
		switch ($this->config['id']) {
			case 'aw':
				if(!isset($this->config['key'][51])){
					$aweber = new AWeberAPI($this->config['key'][0], $this->config['key'][1]);
					$this->wrap = $aweber->getAccount($this->config['key'][2], $this->config['key'][3]);
				}
				break;
			case 'cm':
				$this->auth = array('api_key' => $key[0]);
				break;
			case 'gr':
				$this->wrap = new GetResponse($key[0]);
				break;
			case 'sg':
				$this->wrap = new SendGrid($key[0]);
				break;
			case 'hs':
				$this->wrap = new Hubspot($key[0]);
				break;
			case 'be':
				$this->wrap = new benchmarkemail_api($key[0]);
				break;
			case 'ic':
				iContactApi::getInstance()->setConfig(array(
					'appId'			=> $key[0],
					'apiPassword'	=> $key[2],
					'apiUsername'	=> $key[1]
				));
				$this->wrap = iContactApi::getInstance();
				break;
			case 'cc':
				$this->wrap = new ConstantContact($key[0],$key[1]);
				break;
			case 'vr':
				$this->wrap = new VerticalResponse($key[0],$key[1],$key[2]);
				break;
			case 'mm':
				$this->wrap = new MadMimi($key[0],$key[1]);
				break;
			case 'ac':
				$this->wrap = new ActiveCampaign($key[0],$key[1]);
				break;
			case 'ck':
				$this->wrap = new ConvertKit($key[0],$key[1]);
				break;
			case 'dp':
				$this->wrap = new DripEmail($key[0],$key[1]);
				break;
			case 'ml':
				$this->wrap = new MailerLite($key[0]);
				break;
			case 'zc':
				$this->wrap = new ZohoCampaigns($key[0]);
				break;
			default:
				# code...
				break;
		}
	}
	function connect($step){
		switch ($step) {
			case 0:
				switch ($this->config['id']) {
					case 'aw':
						$credentials = AWeberAPI::getDataFromAweberID($this->config['key'][51]);
						list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = $credentials;
						echo json_encode($credentials);
						break;
					case 'cm':
						$this->wrap = new CS_REST_General($this->auth);
						echo json_encode( $result = $this->wrap->get_clients());
						break;
					case 'gr':
						echo json_encode($this->wrap->accounts());
						break;
					case 'sg':
						echo json_encode($this->wrap->test());
						break;
					case 'hs':
						echo json_encode($this->wrap->test());
						break;
					case 'be':
						echo json_encode($this->wrap->lists());
						break;
					case 'ic':
						echo json_encode($this->wrap->getCampaigns());
						break;
					case 'cc':
						echo json_encode($this->wrap->accounts());
						break;
					case 'vr':
						echo json_encode($this->wrap->getAccessToken());
						break;
					case 'ck':
						echo json_encode($this->wrap->getForms());
						break;
					case 'dp':
						echo json_encode($this->wrap->accounts());
						break;
					case 'ml':
						echo json_encode($this->wrap->account());
						break;
					case 'zc':
						echo json_encode($this->wrap->account());
						break;
					case 'mm':
						echo json_encode($this->wrap->getLists());
						break;
					case 'ac':
						if(!(int)$this->wrap->credentials_test())
							$resp=array('status' => 0);
						else{
							$resp=array('status' => 1,'data' => $this->wrap->api("account/view"));
						}
						echo json_encode($resp);
						break;
					default:
						break;
				}
				break;
			case 1:
				switch ($this->config['id']) {
					default:
						break;
				}
				break;
			default:
				# code...
				break;
		}
	}
	function getlists(){
		switch ($this->config['id']) {
			case 'aw':
				$t = $this->wrap->lists;
				$l = array();
				if($t->data['total_size'] > 0){
					foreach ($t->data['entries'] as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'cm':
				$this->wrap = new CS_REST_Clients($this->config['key'][1],$this->auth);
				$t = $this->wrap->get_lists();
				$l = array();
				if(count($t->response) > 0){
					foreach ($t->response as $v) {
						array_push($l, array(
							'id' => $v->ListID,
							'name' => $v->Name
						));
					}
				}
				echo json_encode($l);
				break;
			case 'gr':
				$t = (array) $this->wrap->getCampaigns();
				$l = array();
				if(!empty($t)){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v->campaignId,
							'name' => $v->name
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ic':
				$t = $this->wrap->getLists();
				$l = array();
				if(count($t) > 0){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v->listId,
							'name' => $v->name
						));
					}
				}
				echo json_encode($l);
				break;
			case 'sg':
				$t = $this->wrap->getLists()['lists'];
				$l = array();
				if(count($t) > 0){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'hs':
				$t = $this->wrap->getLists()['data']['lists'];
				$l = array();
				if(count($t) > 0){
					foreach ($t as $v) {
						if($v['dynamic'])continue;
						array_push($l, array(
							'id' => $v['listId'],
							'name' => $v['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'be':
				$t = $this->wrap->lists();
				$l = array();
				if(count($t) > 0){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['listname']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'cc':
				$t = (array) $this->wrap->getLists()->data;
				$l = array();
				if(count($t) > 0){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'vr':
				$t = (array) $this->wrap->getLists()->data['items'];
				$l = array();
				if(count($t) > 0){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['attributes']['id'],
							'name' => $v['attributes']['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'mm':
				$t = (array) $this->wrap->getLists()->data;
				$l = array();
				if(count($t) > 0){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ac':
				$t = $this->wrap->api("list/list?ids=all");
				$l = array();
				if($t->result_code){
					for ($i=0; isset($t->$i) ; $i++) {
						array_push($l, array(
							'id' => $t->$i->id,
							'name' => $t->$i->name
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ck':
				$t = $this->wrap->getForms()['data'];
				$l = array();
				if(count($t['forms']) > 0){
					foreach ($t['forms'] as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ml':
				$t = $this->wrap->getGroups()['data'];
				$l = array();
				if(!empty($t)){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'zc':
				$t = $this->wrap->getLists()['data']['list_of_details'];
				$l = array();
				if(!empty($t)){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['listkey'],
							'name' => $v['listname']
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ms':
				$l = array();
				if( function_exists( 'mailster' ) ){
					$t = mailster( 'lists' )->get();
					if(count($t) > 0){
						foreach ($t as $v) {
							array_push($l, array(
								'id' => $v->ID,
								'name' => $v->name
							));
						}
					}
				}
				echo json_encode($l);
				break;
			case 'mp':
				$l = array();
				if( MAILPOET_VERSION !== null){
					$mp = new MailPoet\API\MP\v1\API;
					$t = $mp::getLists();
					if(count($t) > 0){
						foreach ($t as $v) {
							array_push($l, array(
								'id' => $v['id'],
								'name' => $v['name']
							));
						}
					}
				}
				echo json_encode($l);
				break;
			default:
				break;
		}

	}
	function getfields($l){
		switch ($this->config['id']) {
			case 'aw':
				$t = $this->wrap->loadFromUrl('/accounts/'.$this->wrap->id.'/lists/'.$l.'/custom_fields');
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'name',
						'name'=>'name',
						'label'=>'Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if($t->data['total_size'] > 0){
					foreach ($t->data['entries'] as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name'],
							'label' => $v['name'],
							'type'=>'text',
							'format'=>'text',
							'icon'=>'idef',
							'not'=>1,
							'nof'=>1
						));
					}
				}
				echo json_encode($l);
				break;
			case 'cm':
				$this->wrap = new CS_REST_Lists($l,$this->auth);
				$t = $this->wrap->get_custom_fields();
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'name',
						'name'=>'name',
						'label'=>'Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if(count($t->response) > 0){
					foreach ($t->response as $v) {
						array_push($l, array(
							'id' => preg_replace("/[^A-Za-z0-9 ]/", '', $v->Key),
							'name' => $v->FieldName,
							'label' => $v->FieldName,
							'type' => $this->typesel('cm',strtolower($v->DataType)),
							'typesel' => $this->typesel('cm',strtolower($v->DataType)),
							'extras' => $this->extsel('cm',$v->FieldOptions),
							'icon'=>'idef',
							'format'=>'text',
							'nof'=>1
						));
					}
				}
				echo json_encode($l);
				break;
			case 'gr':
				$t = (array) $this->wrap->getCustomFields();
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'name',
						'name'=>'name',
						'label'=>'Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if(!empty($t)){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v->customFieldId,
							'name' => $v->name,
							'label' => $v->name,
							'type' => $this->typesel('gr',strtolower($v->type)),
							'format' => $v->valueType,
							'extras' => $this->extsel('gr',$v->values),
							'icon'=>'idef'
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ck':
				$t = (array) $this->wrap->getCustomFields()['data']['custom_fields'];
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'first name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if(!empty($t)){
					foreach ($t as $v) {
						if($v['key'] == 'email')continue;
						array_push($l, array(
							'id' => $v['key'],
							'name' => $v['label'],
							'label' => $v['label'],
							'type'=>'text',
							'format'=>'text',
							'icon'=>'idef',
							'not'=>1,
							'nof'=>1
						));
					}
				}
				echo json_encode($l);
				break;
			case 'dp':
				$t = $this->wrap->getCustomFields()['data']['custom_field_identifiers'];
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					)
				);
				if(!empty($t)){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v,
							'name' => $v,
							'label' => $v,
							'type'=>'text',
							'typesel'=>'single',
							'format'=>'text',
							'icon'=>'idef',
							'nof'=>1
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ml':
				$t = (array) $this->wrap->getCustomFields()['data'];
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'name',
						'name'=>'name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'last name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if(!empty($t)){
					foreach ($t as $v) {
						if(in_array($v['key'], array('email','name','last_name')))continue;
						array_push($l, array(
							'id' => $v['key'],
							'name' => $v['title'],
							'label' => $v['title'],
							'type'=>'text',
							'typesel'=>'single',
							'format'=>$this->formatsel('ml',$v['type']),
							'icon'=>'idef',
							'nof'=>1
						));
					}
				}
				echo json_encode($l);
				break;
			case 'zc':
				$t = (array) $this->wrap->getFields()['data']['response']['fieldnames']['fieldname'];
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'First Name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'Last name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if(!empty($t)){
					foreach ($t as $v) {
						if(in_array($v['FIELD_NAME'], array('Contact Email','First Name','Last Name')))continue;
						array_push($l, array(
							'id' => $v['DISPLAY_NAME'],
							'name' => $v['DISPLAY_NAME'],
							'label' => $v['DISPLAY_NAME'],
							'type'=> $this->typesel('zc',strtolower($v['UITYPE'])),
							'format'=> $this->formatsel('zc',$v['UITYPE']),
							'icon'=>'idef'
						));
					}
				}
				echo json_encode($l);
				break;
			case 'sg':
				$t = $this->wrap->getCustomFields()['custom_fields'];
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'first name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'last name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if(!empty($t)){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v['id'],
							'name' => $v['name'],
							'label' => $v['name'],
							'type' => 'text',
							'typesel'=>'single',
							'format' => $v['type'],
							'icon'=>'idef',
							'nof'=>1
						));
					}
				}
				echo json_encode($l);
				break;
			case 'hs':
				$t = $this->wrap->getCustomFields();
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'first name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'last name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if(!empty($t['data'])){
					foreach ($t['data'] as $v) {
						if(!$v['formField'] || in_array($v['name'], array('email','firstname','lastname')))continue;
						array_push($l, array(
							'id' => $v['name'],
							'name' => $v['label'],
							'label' => $v['label'],
							'type' => $v['fieldType'],
							'format' => $this->formatsel('hs',$v['type']),
							'extras' => $this->extsel('hs',$v['options']),
							'icon'=>'idef',
							'nof'=>1,
						));
					}
				}
				echo json_encode($l);
				break;
			case 'ic':
				$t = $this->wrap->getFields();
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'firstname',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'lastname',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic01',
						'name'=>'prefix',
						'label'=>'Prefix',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic02',
						'name'=>'suffix',
						'label'=>'Suffix',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic03',
						'name'=>'fax',
						'label'=>'Fax',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic04',
						'name'=>'phone',
						'label'=>'Phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic05',
						'name'=>'business',
						'label'=>'Business',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic06',
						'name'=>'address1',
						'label'=>'Address 1',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic07',
						'name'=>'address2',
						'label'=>'Address 2',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic08',
						'name'=>'city',
						'label'=>'City',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic09',
						'name'=>'state',
						'label'=>'State',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'ic10',
						'name'=>'zip',
						'label'=>'Zip',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					)
				);
				if(!empty($t)){
					foreach ($t as $v) {
						array_push($l, array(
							'id' => $v->customFieldId,
							'name' => $v->publicName,
							'label' => $v->publicName,
							'type' => $this->typesel('ic',strtolower($v->fieldType)),
							'typesel' => $this->typesel('ic',strtolower($v->fieldType)),
							'icon'=>'idef',
							'format' => $this->formatsel('ic',strtolower($v->fieldType))
						));
					}
				}
				echo json_encode($l);
				break;
			case 'cc':
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'First Name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'middle_name',
						'name'=>'Middle Name',
						'label'=>'Middle Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'Last Name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'prefix_name',
						'name'=>'Prefix Name',
						'label'=>'Prefix Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'job_title',
						'name'=>'Job Title',
						'label'=>'Job Title',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'company_name',
						'name'=>'Company Name',
						'label'=>'Company Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'home_phone',
						'name'=>'Home Phone',
						'label'=>'Home Phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					),
					array(
						'id'=>'work_phone',
						'name'=>'Work Phone',
						'label'=>'Work Phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					),
					array(
						'id'=>'cell_phone',
						'name'=>'Cell Phone',
						'label'=>'Cell Phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					)
				);
				for ($i=1; $i <= 15; $i++) {
					array_push($l, array(
						'id' => 'custom_field_'.$i,
						'name' => 'custom_field_'.$i,
						'label' => 'CustomField'.$i,
						'type' => 'text',
						'typesel'=>'single',
						'format' => 'text',
						'icon'=>'idef',
						'nof'=>1
					));
				}
				echo json_encode($l);
				break;
			case 'vr':
				$t = $this->wrap->getCustomFields();
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'first_name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'last_name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'birthdate',
						'name'=>'birthdate',
						'label'=>'Birth Date',
						'type'=>'text',
						'format'=>'date',
						'icon'=>'idef'
					),
					array(
						'id'=>'gender',
						'name'=>'gender',
						'label'=>'Gender',
						'type'=>'select',
						'typesel'=>'single_select',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'marital_status',
						'name'=>'marital_status',
						'label'=>'Marital Status',
						'type'=>'select',
						'typesel'=>'single_select',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'company',
						'name'=>'company',
						'label'=>'Company',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'title',
						'name'=>'title',
						'label'=>'Title',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'website',
						'name'=>'website',
						'label'=>'Website',
						'type'=>'text',
						'format'=>'url',
						'icon'=>'idef'
					),
					array(
						'id'=>'street_address',
						'name'=>'street_address',
						'label'=>'Street Address',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'extended_address',
						'name'=>'extended_address',
						'label'=>'Extended Address',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'city',
						'name'=>'city',
						'label'=>'City',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'region',
						'name'=>'region',
						'label'=>'Region',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'country',
						'name'=>'country',
						'label'=>'Country',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'home_phone',
						'name'=>'home_phone',
						'label'=>'Home phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					),
					array(
						'id'=>'mobile_phone',
						'name'=>'mobile_phone',
						'label'=>'Mobile phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					),
					array(
						'id'=>'work_phone',
						'name'=>'work_phone',
						'label'=>'Work Phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					),
					array(
						'id'=>'fax',
						'name'=>'fax',
						'label'=>'Fax',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					)
				);
				if(count($t->data['items']) > 0){
					foreach ($t->data['items'] as $v) {
						array_push($l, array(
							'id' => $v['attributes']['name'],
							'name' => $v['attributes']['name'],
							'label' => $v['attributes']['name'],
							'type' => 'text',
							'typesel'=>'single',
							'format' => 'text',
							'icon'=>'idef',
							'nof'=>1
						));
					}
				}
				echo json_encode($l);
				break;
			case 'mm':
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'name',
						'name'=>'name',
						'label'=>'Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'customfield',
						'name'=>'custom field',
						'label'=>'Custom Field',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'noid'=>1,
						'nof'=>1
					)
				);
				echo json_encode($l);
				break;
			case 'ms':
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'first name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'last name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'customfield',
						'name'=>'custom field',
						'label'=>'Custom Field',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'noid'=>1,
						'not'=>1,
						'nof'=>1
					)
				);
				echo json_encode($l);
				break;
			case 'mp':
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'First Name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'Last Name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					)
				);
				if( MAILPOET_VERSION !== null){
					$mp_cf = new MailPoet\Models\CustomField;
				    $col = $mp_cf::orderByAsc('created_at')->findMany();
				    $t = array_map(function($custom_field) {
				      return $custom_field->asArray();
				    }, $col);
					if(count($t) > 0){
						foreach ($t as $v) {
							array_push($l, array(
								'id' => 'cf_' . $v['id'],
								'name' => $v['name'],
								'label' => $v['params']['label'],
								'type'=>$this->typesel('mp',$v['type']),
								'format'=>$this->formatsel('mp',$v['type']),
								'extras' => $this->extsel('mp',$v['params']['values'],$v['type']),
								'req'=> ($v['params']['required'])?1:0,
								'icon'=>'idef',
								'nof'=>1
							));
						}
					}
				}
				echo json_encode($l);
				break;
			case 'be':
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'first name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'last name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'middlename',
						'name'=>'middle name',
						'label'=>'Middle Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'field1',
						'name'=>'address',
						'label'=>'Address',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field2',
						'name'=>'city',
						'label'=>'City',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field3',
						'name'=>'state',
						'label'=>'State',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field4',
						'name'=>'zip',
						'label'=>'Zip',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field5',
						'name'=>'country',
						'label'=>'Country',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field6',
						'name'=>'phone',
						'label'=>'Phone',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field7',
						'name'=>'fax',
						'label'=>'Fax',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field8',
						'name'=>'cell phone',
						'label'=>'Cell Phone',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field9',
						'name'=>'company name',
						'label'=>'Company Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field10',
						'name'=>'job title',
						'label'=>'Job Title',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field11',
						'name'=>'business phone',
						'label'=>'Business Phone',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field12',
						'name'=>'business fax',
						'label'=>'Business Fax',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field13',
						'name'=>'business address',
						'label'=>'Business Address',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field14',
						'name'=>'business city',
						'label'=>'Business City',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field15',
						'name'=>'business state',
						'label'=>'Business State',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field16',
						'name'=>'business zip',
						'label'=>'Business Zip',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field17',
						'name'=>'business country',
						'label'=>'Business Country',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field18',
						'name'=>'notes',
						'label'=>'Notes',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field19',
						'name'=>'date 1',
						'label'=>'Date 1',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field20',
						'name'=>'date 2',
						'label'=>'Date 2',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field21',
						'name'=>'extra 3',
						'label'=>'Extra 3',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field22',
						'name'=>'extra 4',
						'label'=>'Extra 4',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field23',
						'name'=>'extra 5',
						'label'=>'Extra 5',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					),
					array(
						'id'=>'field24',
						'name'=>'extra 6',
						'label'=>'Extra 6',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef',
						'typesel'=>'single',
						'nof'=>1
					)
				);
				echo json_encode($l);
				break;
			case 'ac':
				$t = $this->wrap->api("list/field/view?ids=all");
				$l = array(
					array(
						'id'=>'email',
						'name'=>'email',
						'label'=>'Email Address',
						'type'=>'text',
						'format'=>'email',
						'req'=>1,
						'icon'=>'idef'
					),
					array(
						'id'=>'fname',
						'name'=>'First Name',
						'label'=>'First Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'lname',
						'name'=>'Last Name',
						'label'=>'Last Name',
						'type'=>'text',
						'format'=>'text',
						'icon'=>'idef'
					),
					array(
						'id'=>'phone',
						'name'=>'Phone',
						'label'=>'Phone',
						'type'=>'text',
						'format'=>'number',
						'icon'=>'idef'
					)
				);
				if($t->result_code){
					for ($i=0; isset($t->$i) ; $i++) {
						array_push($l, array(
							'id' => $t->$i->id,
							'name' => $t->$i->title,
							'label' => $t->$i->title,
							'type' => $this->typesel('ac',$t->$i->element),
							'format' => $this->formatsel('ac',$t->$i->element),
							'extras' => $this->extsel('ac',$t->$i->options),
							'icon'=>'idef',
							'nof' => ($t->$i->element == 'date' ? 0 : 1)
						));
					}
				}
				echo json_encode($l);
				break;
			default:
				break;
		}

	}
	function typesel($s,$t){
		switch ($s) {
			case 'cm':
				switch ($t) {
					case 'number':
					case 'date':return 'text';
						break;
					case 'multiselectone':return 'single_select';
						break;
					case 'multiselectmany':return 'multi_select';
						break;
					case 'text':return 'text_box';
						break;
					default:
						break;
				}
				break;
			case 'gr':
				switch ($t) {
					case 'date':
					case 'phone':
					case 'url':
					case 'text':return 'text';
						break;
					case 'single_select':return 'select';
						break;
					case 'multi_select':return 'multiselect';
						break;
					default:return $t;
						break;
				}
				break;
			case 'ic':
				switch ($t) {
					case 'text':return 'text_box';
						break;
					case 'checkbox':return 'choice';
						break;
					default:return 'text';
						break;
				}
				break;
			case 'ac':
				switch ($t) {
					case 'date':
					case 'hidden':return 'text';
						break;
					default:return $t;
						break;
				}
				break;
			case 'zc':
				switch ($t) {
					case 'email':
					case 'integer':
					case 'phone':
					case 'date':
					case 'datetime':
					case 'percent':
					case 'decimal':
					case 'longinteger':
					case 'url':return 'text';
						break;
					case 'picklist':return 'select';
						break;
					case 'radiobutton':return 'radio';
						break;
					default:return $t;
						break;
				}
				break;
			case 'mp':
				switch ($t) {
					case 'date':return 'text';
						break;
					case 'checkbox':return 'singlecheck';
						break;
					default:return $t;
						break;
				}
				break;
			default:
				break;
		}
	}
	function formatsel($s,$t){
		switch ($s) {
			case 'ic':
				switch ($t) {
					case 'checkbox':return 'text';
						break;
					default:return $t;
						break;
				}
				break;
			case 'ac':
				switch ($t) {
					case 'date':return 'date';
						break;
					default:return 'text';
						break;
				}
				break;
			case 'hs':
				switch ($t) {
					case 'enumeration':return 'text';
						break;
					default:return $t;
						break;
				}
				break;
			case 'ml':
				switch ($t) {
					case 'TEXT':return 'text';
						break;
					case 'NUMBER':return 'number';
						break;
					case 'DATE':return 'date';
						break;
					default:return 'text';
						break;
				}
				break;
			case 'zc':
				switch ($t) {
					case 'integer':
					case 'longinteger':
					case 'percent':
					case 'decimal':
					case 'phone':return 'number';
						break;
					case 'datetime':return 'date';
						break;
					default:return $t;
						break;
				}
				break;
			case 'mp':
				switch ($t) {
					case 'date':return 'text';
						break;
					default:return $t;
						break;
				}
				break;
			default:
				break;
		}
	}
	function extsel($s,$t,$type=null){
		$a = array();
		switch ($s) {
			case 'cm':
			case 'gr':
					foreach ($t as $k => $v) {
						array_push($a, array('name' => $v ));
					}
				break;
			case 'ac':
					foreach ($t as $k => $v) {
						array_push($a, array('name' => $v->name));
					}
				break;
			case 'hs':
					foreach ($t as $k => $v) {
						array_push($a, array('name' => $v['value'],'label' =>  $v['label']));
					}
				break;
			case 'mp':
					foreach ($t as $k => $v) {
						if($type !== 'checkbox')
							array_push($a, array('name' => $v['value']));
						else
							array_push($a, array('name' => '1','label' =>  $v['value']));
					}
				break;
		}
		return $a;
	}
	function subscribe($form,$data){
		foreach ($form['fields'] as $v) {
			if(isset($v['hidden']) && $v['hidden']){
				switch ($v['type']) {
					case 'radio':
					case 'checkbox':
					case 'select':
					case 'multiselect':
						$a=array();
						foreach ($v['extras'] as $g) {
							if(isset($g['hid']) && $g['hid'])
								array_push($a, $g['name']);
						}
						break;
					case 'text':
					case 'textarea':
						$a=(isset($v['value'])? $v['value']: '');
						break;
					default:
						# code...
						break;
				}
				$data[$v['id']] = $a;
			}
		}
		switch ($this->config['id']) {
			case 'aw':
				try{
					$list = $this->wrap->loadFromUrl('/accounts/'.$this->wrap->id.'/lists/'.$form['list']['id']);
					$user = array(
						'email' => $data['email'],
						'custom_fields' => array()
					);
					unset($data['email']);
					if(isset($data['name'])){
						$user['name'] = $data['name'];
						unset($data['name']);
					}
					$user['custom_fields'] = $data;
					$sub = $list->subscribers;
					$e = $sub->create($user);
					return '1';//subscribed
				} catch(AWeberAPIException $exc) {
					if($exc->message == "email: Subscriber already subscribed.")
						return '2';//already
					else
						return '0';//error
				}
				break;
			case 'cm':
				$c = $this->verify($form,$data);
				if($c)
					return '2';
				$this->wrap = new CS_REST_Subscribers($form['list']['id'],$this->auth);
				$user = array(
					'EmailAddress' => $data['email'],
					'CustomFields' => array(),
					'Resubscribe' => true
				);
				unset($data['email']);
				if(isset($data['name'])){
					$user['Name'] = $data['name'];
					unset($data['name']);
				}
				foreach ($data as $key => $value) {
					$a = array(
						'Key' => $key,
						'Value' => $value
					);
					array_push($user['CustomFields'], $a);
				}
				$e = $this->wrap->add($user);
				if($e->was_successful())
					return '1';//subscribed
				else
					return '0';//error
				break;
			case 'gr':
				$user = array(
					'email'				=> $data['email'],
					'campaign'			=> array('campaignId' => $form['list']['id']),
					'customFieldValues'	=> array()
				);
				unset($data['email']);
				if(isset($data['name'])){
					$user['name'] = $data['name'];
					unset($data['name']);
				}
				foreach ($data as $key => $value) {
					$a = array(
						'customFieldId' => $key,
						'value' => $value
					);
					array_push($user['customFieldValues'], $a);
				}
				$e = $this->wrap->addContact($user);
				if(empty((array) $e))
					return '1';//subscribed
				else if($e->code == 1000)
					return '0';//error
				else if($e->code == 1008)
					return '2';//already
				break;
			case 'ic':
				$user = $data;
				if(isset($user['fname'])){
					$user['firstName'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['lastName'] = $user['lname'];
					unset($user['lname']);
				}
				$e = $this->wrap->addOppoContact($user);
				if(empty($e))
					return '0';//error
				if($e->contactId){
					$t = $this->wrap->subscribeContactToList($e->contactId,$form['list']['id']);
					if(empty($t))
						return '2';//already
					else
						return '1';//subscribed
				}
				break;
			case 'sg':
				$user = $data;
				if(isset($user['fname'])){
					$user['first_name'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['last_name'] = $user['lname'];
					unset($user['lname']);
				}
				$e = $this->wrap->addContact(array($user));
				if($e['error_count'])
					return '0';//error
				$t = $this->wrap->addToList($e['persisted_recipients'][0],$form['list']['id']);
				if($e['new_count'])
					return '1';//subscribed
				return '2';//already
				break;
			case 'ck':
				if($this->verify($form,$data))return '2';//already
				$user = array('fields' => $data);
				if(isset($user['fields']['fname'])){
					$user['first_name'] = $user['fields']['fname'];
					unset($user['fields']['fname']);
				}
				if(isset($user['fields']['email'])){
					$user['email'] = $user['fields']['email'];
					unset($user['fields']['email']);
				}
				$e = $this->wrap->addContact($user, $form['list']['id']);
				if($e['http_status'] != 200)
					return '0';//error
				return '1';//subscribed
				break;
			case 'dp':
				if($this->verify($form,$data))return '2';//already
				$user = array('custom_fields' => $data);
				if(isset($user['custom_fields']['email'])){
					$user['email'] = $user['custom_fields']['email'];
					unset($user['custom_fields']['email']);
				}
				$e = $this->wrap->addContact(array("subscribers" => array($user)));

				if($e['http_status'] != 200)
					return '0';//error
				return '1';//subscribed
				break;
			case 'ml':
				$user = array('fields' => $data);
				if(isset($user['fields']['lname'])){
					$user['fields']['last_name'] = $user['fields']['lname'];
					unset($user['fields']['lname']);
				}
				if(isset($user['fields']['email'])){
					$user['email'] = $user['fields']['email'];
					unset($user['fields']['email']);
				}
				if(isset($user['fields']['name'])){
					$user['name'] = $user['fields']['name'];
					unset($user['fields']['name']);
				}
				$e = $this->wrap->addContact($user, $form['list']['id']);
				if($e['http_status'] != 200)
					return '0';//error
				if($e['data']['date_created'] == $e['data']['date_updated'])
					return '1';//subscribed
				return '2';//already
				break;
			case 'zc':
				$user = $data;
				if(isset($user['lname'])){
					$user['Last Name'] = $user['lname'];
					unset($user['lname']);
				}
				if(isset($user['email'])){
					$user['Contact Email'] = $user['email'];
					unset($user['email']);
				}
				if(isset($user['fname'])){
					$user['First Name'] = $user['fname'];
					unset($user['fname']);
				}
				$user = array(
					'contactinfo' => json_encode($user),
					'listkey' => $form['list']['id']
				);
				$e = $this->wrap->addContact($user);
				if($e['data']['code'] != 0)
					return '0';//error
				if($e['data']['message'] == "User successfully subscribed.")
					return '1';//subscribed
				return '2';//already
				break;
			case 'be':
				$user = $data;
				if(isset($user['fname'])){
					$user['firstname'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['lastname'] = $user['lname'];
					unset($user['lname']);
				}
				$t = $this->wrap->find($user['email'],$form['list']['id']);
				if(!empty($t))return '2';//already
				$e = $this->wrap->addContact($user,$form['list']['id']);
				if($e == '1')return '1';//subscribed
				return '0';//error
				break;
			case 'hs':
				if(isset($data['fname'])){
					$data['firstname'] = $data['fname'];
					unset($data['fname']);
				}
				if(isset($data['lname'])){
					$data['lastname'] = $data['lname'];
					unset($data['lname']);
				}
				$user = array();
				foreach ($data as $key => $value) {
					array_push($user, array(
						"property" => $key,
						"value" => $value
					));
				}
				$e = $this->wrap->addContact(array( "properties" => $user));
				if($e['status']==400)
					return '0';//error
				$atl = array("emails" => array($data['email']));
				$t = $this->wrap->addToList($atl,$form['list']['id']);
				if($e['status']==409)
					return '2';//already
				if($e['status']==200)
					return '1';//subscribed
				break;
			case 'cc':
				$user = array(
					'email_addresses'	=> array(
						array('email_address'	=> $data['email'])
						),
					'lists'	=> array(
						array('id' => $form['list']['id'])
					)
				);
				if(isset($user['fname'])){
					$user['first_name'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['last_name'] = $user['lname'];
					unset($user['lname']);
				}
				unset($data['email']);
				$custom = array();
				foreach ($data as $key => $value) {
					if(substr( $key, 0, 6 ) === "custom")
						array_push($custom, array(
							'name' => $key,
							'value' => $value
						));
					else
						$user[$key] = $value;
				}
				$user['custom_fields'] = $custom;

				$e = $this->wrap->addContact($user);
				if($e->http_status == 201)
					return '1';//subscribed
				elseif($e->http_status == 409)
					return '2';//already
				else
					return '0';//error
				break;
			case 'vr':
				$custom = array();
				$df = array('email','first_name','last_name','birthdate','gender','marital_status','company','title','website','street_address','extended_address','city','region','country','home_phone','mobile_phone','work_phone','fax');
				$user = $data;
				if(isset($user['fname'])){
					$user['first_name'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['last_name'] = $user['lname'];
					unset($user['lname']);
				}
				foreach ($data as $key => $value) {
					if(!in_array($key, $df)){
						$custom[$key]=$value;
						unset($user[$key]);
					}
				}
				if($custom)
					$user['custom'] = $custom;
				$e = $this->wrap->addContact($user, $form['list']['id']);
				if($e->http_status == 201)
					return '1';//subscribed
				elseif($e->http_status == 409)
					return '2';//already
				else
					return '0';//error
				break;
			case 'mm':
				$user = $data;
				$e = $this->wrap->addContact($user, $form['list']['id']);
				if($e->http_status == 200)
					return '1';//subscribed
				elseif($e->http_status == 409)
					return '2';//already
				else
					return '0';//error
				break;
			case 'ac':
				$user = $data;
				if(isset($user['fname'])){
					$user['first_name'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['last_name'] = $user['lname'];
					unset($user['lname']);
				}
				$user['p['.$form['list']['id'].']'] = $form['list']['id'];
				$user['status['.$form['list']['id'].']'] = 1;
				$e = $this->wrap->api("contact/add", $user);
				if($e->result_code)
					return '1';//subscribed
				else{
					$i=0;
					if($e->$i)
						return '2';//already
					else
						return '0';//error
				}
				break;
			case 'ms':
				$user = $data;
				if( !function_exists( 'mailster' ) )return '0';//error
				if(mailster( 'subscribers' )->get_by_mail( $user['email'], false ))return '2';//already
				if(isset($user['fname'])){
					$user['first_name'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['last_name'] = $user['lname'];
					unset($user['lname']);
				}
				$e = mailster( 'subscribers' )->add( $user, 'true' );
				if ( ! is_wp_error( $e ) ) {
					mailster( 'subscribers' )->assign_lists( $e, array($form['list']['id'] ) );
					return '1';//subscribed
				} else {
					return '0';//error
				}
				break;
			case 'mp':
				$user = $data;
				if( MAILPOET_VERSION == null)return '0';//error
				$mp_sub = new MailPoet\Models\Subscriber;
			    if($mp_sub::findOne($user['email']))return '2';//already
				if(isset($user['fname'])){
					$user['first_name'] = $user['fname'];
					unset($user['fname']);
				}
				if(isset($user['lname'])){
					$user['last_name'] = $user['lname'];
					unset($user['lname']);
				}
				foreach ($user as $k => $v) {
					if(is_array($v))$user[$k] = implode(',', $v);
				}

			    // separate data into default and custom fields
			    list($default_fields, $custom_fields) = $mp_sub::extractCustomFieldsFromFromObject($user);
			    // if some required default fields are missing, set their values
			    $default_fields = $mp_sub::setRequiredFieldsDefaultValues($default_fields);

			    // add subscriber
			    $new_subscriber = $mp_sub::create();
			    $new_subscriber->hydrate($default_fields);
			    $new_subscriber->save();
			    if($new_subscriber->getErrors() !== false)return '0';//error
			    if(!empty($custom_fields)) {
					$new_subscriber->saveCustomFields($custom_fields);
			    }

			    // reload subscriber to get the saved status/created|updated|delete dates/other fields
			    $new_subscriber = $mp_sub::findOne($new_subscriber->id);

			    // subscribe to segments and optionally: 1) send confirmation email, 2) schedule welcome email(s)
			    $mp_subseg = new MailPoet\Models\SubscriberSegment;
			    $mp_subseg::subscribeToSegments($new_subscriber, array($form['list']['id'] ));


					// send confirmation email
				if( $new_subscriber->status === $mp_sub::STATUS_UNCONFIRMED) {
					$new_subscriber->sendConfirmationEmail();
				}

				// schedule welcome email(s)
				if( $new_subscriber->status === $mp_sub::STATUS_SUBSCRIBED) {
					$mp_sub::scheduleSubscriberWelcomeNotification($new_subscriber->id, array($form['list']['id'] ));
				}
				return '1';//subscribed
				break;
			default:
				break;
		}

	}
	function verify($form,$data){
		switch ($this->config['id']) {
			case 'aw':
				try{
					$sub = $this->wrap->loadFromUrl('/accounts/'.$this->wrap->id.'/lists/'.$form['list']['id'].'/subscribers');
					$user = array('email' => $data['email']);
					$e = $sub->find($user);
					if($e->data['total_size'] < 1)
						return 0;
					else{
						if($e->data['entries'][0]['status'] == 'subscribed')
							return 1;
						else
							return 0;
					}
				} catch(AWeberAPIException $exc) {
					return 0;
				}
				break;
			case 'cm':
				$this->wrap = new CS_REST_Subscribers($form['list']['id'],$this->auth);
				$user = $data['email'];
				$e = $this->wrap->get($user);
				if($e->was_successful()){
					if(isset($e->response->State) && $e->response->State == 'Active')
						return 1;
					else
						return 0;//error
				}
				else
					return 0;//error
				break;
			case 'gr':
				$user = array(
					'query' => array('email' => $data['email'])
				);
				$e = (array) $this->wrap->getContacts($user);
				if(isset($e['0']))
					return 1;
				else
					return 0;
				break;
			case 'ic':
				$user = $data['email'];
				$e = $this->wrap->getContactWithEmail($user);
				if(empty($e))
					return 0;
				else{
					$t = $this->wrap->CheckingContactWithListId($e[0]->contactId,$form['list']['id']);
					if(empty($t->contacts) || $t->contacts[0]->status != 'normal')
						return 0;
					else
						return 1;
				}
				break;
			case 'cc':
				$user = array(
					'email' => $data['email']
				);
				$e = $this->wrap->getContact($user);
				if(count($e->data['results']) && $e->data['results'][0]['status'] == 'ACTIVE')
					return 1;
				return 0;
				break;
			case 'sg':
				$user = base64_encode($data['email']);
				$e = $this->wrap->getContact($user);
				if(isset($e['email']))return 1;
				return 0;
				break;
			case 'hs':
				$user = $data['email'];
				$e = $this->wrap->getContact($user);
				if($e['status']==200)return 1;
				return 0;
				break;
			case 'ck':
				$user = $data['email'];
				$e = $this->wrap->getContact($user);
				if($e['http_status']==200)
					if($e['data']['total_subscribers'] > 0)
						if($e['data']['subscribers'][0]['state'] == 'active')
							return 1;
				return 0;
				break;
			case 'dp':
				$user = $data['email'];
				$e = $this->wrap->getContact($user);
				if($e['http_status']==200)
					return 1;
				return 0;
				break;
			case 'ml':
				$user = $data['email'];
				$e = $this->wrap->getContact($user);
				if($e['http_status']==200)
					if($e['data']['type'] == 'active')
						return 1;
				return 0;
				break;
			case 'zc':
				$user = array(
					'contactemail'=> $data['email']
					);
				$e = $this->wrap->getContact($user);
				if($e['http_status']==200)
					if($e['data']['response']['code'][0] == 200)
						return 1;
				return 0;
				break;
			case 'be':
				$user = $data['email'];
				$t = $this->wrap->find($user,$form['list']['id']);
				if(!empty($t))return 1;
				return 0;
				break;
			case 'vr':
				$user = array(
					'email' => $data['email']
				);
				$e = $this->wrap->getContact($user);
				if(count($e->data['items']) && $e->data['items'][0]['attributes']['status'] == 'mailable')
					return 1;
				return 0;
				break;
			case 'mm':
				$user = array(
					'email' => $data['email']
				);
				$e = $this->wrap->getContact($user);
				if(count($e->data))
					return 1;
				return 0;
				break;
			case 'ac':
				$e = $this->wrap->api("contact/view?email=".$data['email']);
				if($e->result_code)
					return 1;
				return 0;
				break;
			case 'ms':
				if( !function_exists( 'mailster' ) )return 0;//error
				if(mailster( 'subscribers' )->get_by_mail( $data['email'], false ))return 1;
				return 0;
				break;
			case 'mp':
				if( MAILPOET_VERSION == null)return 0;
				$mp_sub = new MailPoet\Models\Subscriber;
			    if($mp_sub::findOne($data['email']))return 1;
				return 0;
				break;
			default:
				break;
		}

	}
	function get($url){
		$resp = wp_remote_get($url,$this->args);
		if(is_array($resp)){
			return $resp['body'];
		}
	}
	function post($url,$data){
		$resp = wp_remote_post($url,$this->args,$data);
		if(is_array($resp)){
			return $resp['body'];
		}
	}
	function pri(){
		print_r($this->config);
	}
}

?>