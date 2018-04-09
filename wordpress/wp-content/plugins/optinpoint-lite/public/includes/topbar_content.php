<?php
$settings = $this->settings;
$cmeta = $this->cmeta;
$cmeta_cat = $this->cmeta_cat;
$form = $this->getformbyid(isset($cmeta['Topbar']['form'])?$cmeta['Topbar']['form'] : (isset($cmeta_cat['Topbar']['form'])?$cmeta_cat['Topbar']['form'] : $settings['topbar_form']));
$form['fields'] = array_filter($form['fields'] ,array($this , 'myArrFilter'));
$fields = array();
foreach ($form['fields'] as $v) {
  if((isset($v['eft']) && $v['eft'] == true) || ($v['id']=='email'))
    array_push($fields, $v);
}

global $oppo_font;
$theme= $this->getthemebyid(isset($cmeta['Topbar']['theme'])?$cmeta['Topbar']['theme'] : (isset($cmeta_cat['Topbar']['theme'])?$cmeta_cat['Topbar']['theme'] :$settings['topbar_theme']));
	$theme=$theme['options'];

include( 'topbar'.$theme['tpl'].'.php' );
?>