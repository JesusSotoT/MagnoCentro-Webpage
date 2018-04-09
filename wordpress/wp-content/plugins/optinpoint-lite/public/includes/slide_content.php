<style type="text/css">
html {
    height: 0;
    position: relative;
    <?php if(is_admin_bar_showing())echo 'top: -32px;'?>
}
body {
min-height: 100%;
height: auto !important;
overflow-x: hidden !important;
z-index: -1;
<?php if(is_admin_bar_showing())echo 'padding-top: 32px;';
if (!(isset($_SERVER['HTTP_USER_AGENT']) && ((strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false))))
    echo 'position:relative;';?>
}body:before {display: none;}
#optinpoints {
visibility: hidden;
position: fixed;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
top: 0;
z-index: -1;
height: 100%;
width: 500px;
overflow-x: hidden;
overflow-y: hidden;
-webkit-transition-property: -webkit-transform;
-moz-transition-property: -moz-transform;
-ms-transition-property: -ms-transform;
-o-transition-property: -o-transform;
transition-property: transform;
}
.optinpoints-bg{
position: absolute;
z-index: -1;
top: 0;
left: 0;
right: 0;
bottom: 0;
min-width: 100%;
min-height: 100%;
overflow: hidden;
}
.optinpoints-cont{
width:560px;
position: relative;
overflow-y:scroll;
overflow-x: hidden;
height: 100%;
}
#optinpoints-trig,
#optinpoints-trig.optinpoints-trig.scrollhide,
#optinpoints-trig.optinpoints-trig.condhide,
body.body-optinpoints-open #optinpoints-trig .optinpoints-trigh{
display: none;
}
.body-optinpoints-open #optinpoints-trig.optinpoints-trig.condhide,
body.body-optinpoints-open #optinpoints-trig.optinpoints-trig.scrollhide{
display: block;
}
#optinpoints-trig.optinpoints-trig{
display: block;
z-index: 888888;
position:fixed;
}
#optinpoints-trig.optinpoints-trig .optinpoints-trigi,#optinpoints-trig.optinpoints-trig .optinpoints-trigh:before {
cursor:pointer;
}
.optinpoints-trig.right,.optinpoints.right,.optinpoints.right .optinpoints-cont,.optinpoints-trig.left .optinpoints-trigh:before{
left: auto;
right: 0px;
}
.optinpoints-trig.left,.optinpoints.left,.optinpoints.left .optinpoints-cont,.optinpoints-trig.right .optinpoints-trigh:before {
left: 0px;
right: auto;
}
.optinpoints-trig .optinpoints-trigh{
display: none;
}
.optinpoints-trig .optinpoints-trigh:before{
content:'';
width: 0;
height: 0;
position: absolute;
margin-top: 2px;
border-top: 6px solid transparent;
border-bottom: 6px solid transparent;
}
.optinpoints-trig.left .optinpoints-trigh:before{
border-right: 9px solid #000;
}
.optinpoints-trig.right .optinpoints-trigh:before{
border-left: 9px solid #000;
}
.optinpoints-trig.left.optinpoints-trigdis .optinpoints-trigi{
-webkit-transform: translate(-43px,0);
-moz-transform: translate(-43px,0);
-ms-transform: translate(-43px,0);
-o-transform: translate(-43px,0);
transform: translate(-43px,0);
}
.optinpoints-trig.right.optinpoints-trigdis .optinpoints-trigi{
-webkit-transform: translate(43px,0);
-moz-transform: translate(43px,0);
-ms-transform: translate(43px,0);
-o-transform: translate(43px,0);
transform: translate(43px,0);
}
.optinpoints-trig.optinpoints-trigdis .optinpoints-trigi:hover,
body.body-optinpoints-open #optinpoints-trig .optinpoints-trigi{
-webkit-transform: translate(0,0);
-moz-transform: translate(0,0);
-ms-transform: translate(0,0);
-o-transform: translate(0,0);
transform: translate(0,0);
}
#optinpoints-trig.optinpoints-trig.optinpoints-trigdis .optinpoints-trigh{
	display: none;
}
.optinpoints-overlay{
height: 100%;
width: 100%;
position: absolute;
display: block;
background: #000;
opacity:0;
z-index: 888888;
top: 0;
left: 0;
visibility:hidden;
}
.optinpoints-overlay.showo{
opacity:0.4;
visibility:visible;
}
body > *,.optinpoints-trigc,.optinpoints-trigi{
-webkit-transition: 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
-moz-transition: 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
-ms-transition: 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
-o-transition: 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
transition: 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
-webkit-transition-property: -webkit-transform, opacity, visibility;
-moz-transition-property: -moz-transform, opacity, visibility;
-ms-transition-property: -ms-transform, opacity, visibility;
-o-transition-property: -o-transform, opacity, visibility;
transition-property: transform, opacity, visibility;
}
.optinpoints-scroller {
position: relative;
width:500px;
}
.optinpoints-scroller.optinpoints-vertcent{
top: 50%;
-webkit-transform: translateY(-50%);
-moz-transform: translateY(-50%);
-ms-transform: translateY(-50%);
-o-transform: translateY(-50%);
transform: translateY(-50%);
}
.optinpoints-inner {
padding: 15px;
margin: 25px;
-webkit-transform:scale(0.8);
-moz-transform:scale(0.8);
-ms-transform:scale(0.8);
-o-transform:scale(0.8);
transform:scale(0.8);
-webkit-transition: -webkit-transform 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
-moz-transition: -moz-transform 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
-ms-transition: -ms-transform 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
-o-transition: -o-transform 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
transition: transform 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
}
.body-optinpoints-open #optinpoints{
visibility: visible;
}
.optinpoints-open .optinpoints-inner{
-webkit-transform:scale(1);
-moz-transform:scale(1);
-ms-transform:scale(1);
-o-transform:scale(1);
transform:scale(1);
}
.optinpoints-resp{
-webkit-transform-origin: left;
-moz-transform-origin: left;
-ms-transform-origin: left;
-o-transform-origin: left;
transform-origin: left;
}
.optinpoints.right .optinpoints-resp{
-webkit-transform-origin: right;
-moz-transform-origin: right;
-ms-transform-origin: right;
-o-transform-origin: right;
transform-origin: right;
}
@media only screen and (max-width:1024px) {
.optinpoints-trig .optinpoints-trigh{
width: 50px;
height: 50px;
position: absolute;
}
}
@media only screen and (max-width:700px) {
.optinpoints-trig.optinpoints-trigdis .optinpoints-trigi{
-webkit-transform: translate(-35px,0);
-moz-transform: translate(-35px,0);
-ms-transform: translate(-35px,0);
-o-transform: translate(-35px,0);
transform: translate(-35px,0);
}
}
@media only screen and (max-width:420px) {
.body-optinpoints-open {-webkit-overflow-scrolling:touch;overflow-y:hidden;}
.optinpoints-trigc{-webkit-transform-origin: left;
-moz-transform-origin: left;
-ms-transform-origin: left;
-o-transform-origin: left;
transform-origin: left;
-webkit-transform:scale(0.8);
-moz-transform:scale(0.8);
-ms-transform:scale(0.8);
-o-transform:scale(0.8);
transform:scale(0.8);}
.optinpoints-trig.right .optinpoints-trigc{
-webkit-transform-origin: right;
-moz-transform-origin: right;
-ms-transform-origin: right;
-o-transform-origin: right;
transform-origin: right;
}
}
</style>
<?php
$settings = $this->settings;
$cmeta = $this->cmeta;
$cmeta_cat = $this->cmeta_cat;
$form = $this->getformbyid(isset($cmeta['Slider']['form'])?$cmeta['Slider']['form'] : (isset($cmeta_cat['Slider']['form'])?$cmeta_cat['Slider']['form'] : $settings['slider_form']));
$form['fields'] = array_filter($form['fields'] ,array($this , 'myArrFilter'));

global $oppo_font;
$theme= $this->getthemebyid(isset($cmeta['Slider']['theme'])?$cmeta['Slider']['theme'] : (isset($cmeta_cat['Slider']['theme'])?$cmeta_cat['Slider']['theme'] :$settings['slider_theme']));
	$theme=$theme['options'];

include_once( 'slide'.$theme['tpl'].'.php' );
?>
