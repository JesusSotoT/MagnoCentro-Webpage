<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
?>
<style type="text/css">

.optinpoints {
background-color: #333;
<?php
    if(isset($theme["slider_canvas_c"])){
        echo 'background-color:'.$theme["slider_canvas_c"].';';
    }
    if(isset($theme["slider_bg_p"]) && $theme["slider_bg_p"]!= 'pat0'){
        echo 'background-image:url("'.OPPOINT_PLUGIN_URL.'assets/'.$theme["slider_bg_p"].'.png");';
    }?>
}
.optinpoints .optinpoints-inner {
text-align: center;
border-radius:3px;
background: #27313B;
padding: 0;
margin:0 50px;
padding:0 20px;
display: inline-block;
<?php
if(isset($theme["bg_c"])){
    echo 'background-color:'.$theme["bg_c"].';';
}?>
}
.optinpoints div{
  position:relative;
}
.optinpoints h3{
line-height: 24px;
margin-top:20px;
color: #F4233C;
font-size: 24px;
<?php
if(isset($theme["heading_f"]['f'])){
    array_push($oppo_font, $theme["heading_f"]['f']);
echo 'font-family:'.$theme["heading_f"]['f'].';';
}
if(isset($theme["heading_f"]['s'])){
echo 'font-size:'.$theme["heading_f"]['s'].'px;';
}
if(isset($theme["heading_f"]['w'])){
echo 'font-weight:'.$theme["heading_f"]['w'].';';
}
if(isset($theme["heading_f"]['st'])){
echo 'font-style:'.$theme["heading_f"]['st'].';';
}
if(isset($theme["heading_fc"])){
echo 'color:'.$theme["heading_fc"].';';
}
?>
}
.optinpoints .optinpoint_para{
  margin-top: 15px;
}
.optinpoints .optinpoint_para,.optinpoints .optinpoint_para * {
font-size: 15px;
color: #959595;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
echo 'font-family:'.$theme["msg_f"]['f'].';';
}if(isset($theme["msg_f"]['s'])){
echo 'font-size:'.$theme["msg_f"]['s'].'px;';
}?>
}

.optinpoints form{
margin: 20px auto;
}
.optinpoints .formbox > div:first-of-type{
  width: 65%;
  float: left;
}
.optinpoints .formbox > div:first-of-type + div{
  width: 35%;
  float: left;
}
.optinpoints .formbox input[type="text"]{
border-radius: 3px 0 0 3px;
}
.optinpoints  .optinpoint-field{
position: relative;
width:100%;
margin: 0 auto 10px auto;
text-align: left;
<?php
  if(isset($theme["tbox_w"])){
      echo 'width:'.$theme["tbox_w"].'px;';
  }
?>
}
.optinpoints .inputicon{
display: none;
}
.optinpoints .oppo-ficon .inputicon {
display: block;
width: 40px;
height: 40px;
position: absolute;
top: 0;
left: 0;
pointer-events: none;
<?php
if(isset($theme["tbox_h"])){
  echo 'width:'.$theme["tbox_h"].'px;';
  echo 'height:'.$theme["tbox_h"].'px;';
}
?>
}
.optinpoints .oppo-ficon input[type="text"],
.optinpoints .oppo-ficon input[type="text"] ~ .inputlabel{
  padding-left: 40px;
  <?php
if(isset($theme["tbox_h"])){
  echo 'padding-left:'.$theme["tbox_h"].'px;';
  }?>
}
<?php
$col = ((isset($theme["inico_c"]))? $theme["inico_c"] : '#888');
foreach ($form['fields'] as $f) {
  $fi = false;
  if($f['icon'] == 'idef'){
    if($f['id']=='email')
      $fi = 'a02';
    else if($f['id']=='fname' || $f['id']=='lname' || $f['id']=='name')
      $fi = 'c06';
  }
  else if( $f['icon'] != 'inone')
    $fi = $f['icon'];
  if($fi)
    echo '.optinpoints .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($fi,15,$col).' no-repeat center}';
}
?>
.optinpoints .optinpoint-field textarea,
.optinpoints .optinpoint-field select,
.optinpoints input[type="text"]{
text-align: left;
width: 100%;
height: 40px;
border-radius:3px;
background: #fff;
 padding: 0 10px;
color: #353535;
font-size:17px;
outline:0;
display: block;
border: 1px solid #efefef;
<?php
if(isset($theme["tbox_f"]['f'])){
    array_push($oppo_font, $theme["tbox_f"]['f']);
echo 'font-family:'.$theme["tbox_f"]['f'].';';
}
if(isset($theme["tbox_f"]['s'])){
echo 'font-size:'.$theme["tbox_f"]['s'].'px;';
}
if(isset($theme["tbox_f"]['w'])){
echo 'font-weight:'.$theme["tbox_f"]['w'].';';
}
if(isset($theme["tbox_f"]['st'])){
echo 'font-style:'.$theme["tbox_f"]['st'].';';
}
if(isset($theme["tbox_fc"])){
echo 'color:'.$theme["tbox_fc"].';';
}
if(isset($theme["tbox_bgc"])){
echo 'background:'.$theme["tbox_bgc"].';';
}
if(isset($theme["tbox_w"])){
echo 'width:'.$theme["tbox_w"].'px;';
}
if(isset($theme["tbox_h"])){
echo 'height:'.$theme["tbox_h"].'px;';
}
if(isset($theme["tbox_bor"]) && isset($theme["tbox_borc"])){
echo ' border:'.$theme["tbox_bor"].'px solid '.$theme["tbox_borc"].';';
}
?>
}

.optinpoints .optinpoint-field.optinpoint-multidrop select{
  height: 100px;
}


.optinpoints .optinpoint-field.optinpoint-drop:before{
content: '';
width: 40px;
height: 40px;
position: absolute;
right: 0;
top: 0;
pointer-events: none;
background: no-repeat center;
background-image: <?=$this->getIcon('dd',16,'#000');?>;
<?php
if(isset($theme["tbox_h"])){
  echo 'width:'.$theme["tbox_h"].'px;';
  echo 'height:'.$theme["tbox_h"].'px;';
}
?>
}
.optinpoints input[type="text"] ~ .inputlabel{
position: absolute;
top: 0;
left: 0;
right: 0;
pointer-events: none;
width: 100%;
line-height: 40px;
color: rgba(0,0,0,0.6);
font-size: 17px;
font-weight:500;
padding: 0 10px;
white-space: nowrap;
<?php
if(isset($theme["tbox_f"]['f'])){
    array_push($oppo_font, $theme["tbox_f"]['f']);
  echo 'font-family:'.str_replace("|ng","",$theme["tbox_f"]['f']).';';
}
if(isset($theme["tbox_f"]['s'])){
    echo 'font-size:'.$theme["tbox_f"]['s'].'px;';
}
if(isset($theme["tbox_f"]['w'])){
    echo 'font-weight:'.$theme["tbox_f"]['w'].';';
}
if(isset($theme["tbox_f"]['st'])){
    echo 'font-style:'.$theme["tbox_f"]['st'].';';
}
if(isset($theme["tbox_fc"])){
    echo 'color:'.$theme["tbox_fc"].';';
}
?>
}
.optinpoints input[type="text"]:valid + .inputlabel{
display: none;
}
.optinpoints select.oppoerror,
.optinpoints input[type="text"].oppoerror{
  border-color: red;
}

.optinpoints .optinpoint-check *,
.optinpoints .optinpoint-radio *{
  color: #fff;
<?php
if(isset($theme["check_f"]['f'])){
    array_push($oppo_font, $theme["check_f"]['f']);
  echo 'font-family:'.str_replace("|ng","",$theme["check_f"]['f']).';';
}
if(isset($theme["check_f"]['s'])){
    echo 'font-size:'.$theme["check_f"]['s'].'px;';
}
if(isset($theme["check_f"]['w'])){
    echo 'font-weight:'.$theme["check_f"]['w'].';';
}
if(isset($theme["check_f"]['st'])){
    echo 'font-style:'.$theme["check_f"]['st'].';';
}
if(isset($theme["check_fc"])){
    echo 'color:'.$theme["check_fc"].';';
}
?>
}
.optinpoints .optinpoint-item{
  <?php
    $pline = 2;
    if(isset($pline))echo 'width:'.(100/$pline).'%;';
    ?>
  display: inline-block;
  vertical-align: top;
}
.optinpoints .optinpoint-item input {
  display: none;
}
.optinpoints .optinpoint-item span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  padding-left: 35px;
  line-height: 20px;
  margin-right: 10px;
}

.optinpoints .optinpoint-item span:before,
.optinpoints .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 12px;
  height: 12px;
  left: 0;
  top: 4px;
  position: absolute;
}
.optinpoints .optinpoint-item span:before {
border:1px solid #ccc;
border-radius: 1px;
background-color: #fff;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
<?php
  if(isset($theme["check_borc"])){
      echo 'border: 1px solid'.$theme["check_borc"].';';
  }
if(isset($theme["check_c"]))echo 'background: '.$theme["check_c"].';';?>
}
.optinpoints .optinpoint-item input[type='checkbox'] + span:hover:after, .optinpoints input[type='checkbox']:checked + span:after {
content:'';
width: 14px;
height: 14px;
background: no-repeat center;
background-image: <?php
        $tfi='ch2';

        $tfc='#000';
        if(isset($theme["check_ic"])){$tfc=$theme["check_ic"];}
        echo $this->getIcon($tfi,8,$tfc);?>;
}
.optinpoints .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
.optinpoints .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 12px;
height: 12px;
top: 4px;
}
.optinpoints input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 8px;
height: 8px;
top: 6px;
left: 2px;
border-radius: 50%;
}
.optinpoints .oppoinfierr{
  display: block;
  height: 10px;
  text-align: left;
  line-height: 10px;
  margin-bottom: -10px;
  font-size: 10px;
  color: red;
pointer-events: none;
  <?php
    if(isset($theme["status_f"]['f'])){
    array_push($oppo_font, $theme["status_f"]['f']);
      echo 'font-family:'.str_replace("|ng","",$theme["status_f"]['f']).';';
    }
    if(isset($theme["status_f"]['w'])){
        echo 'font-weight:'.$theme["status_f"]['w'].';';
    }
    if(isset($theme["status_f"]['st'])){
        echo 'font-style:'.$theme["status_f"]['st'].';';
    }
  ?>
}


.optinpoints .optinpoint-subs-button{
border-radius: 0 3px 3px 0;
width: 100%;
color: #fff;
font-size: 17px;
border: 1px solid #FA0B38;
background-color: #FF1F43;
height: 40px;
line-height: 40px;
text-align: center;
cursor: pointer;
position: relative;
top: 0;
transition: all 0.5s ease;
<?php
if(isset($theme["button_f"]['f'])){
    array_push($oppo_font, $theme["button_f"]['f']);
echo 'font-family:'.$theme["button_f"]['f'].';';
}
if(isset($theme["button_f"]['s'])){
echo 'font-size:'.$theme["button_f"]['s'].'px;';
}
if(isset($theme["button_f"]['w'])){
echo 'font-weight:'.$theme["button_f"]['w'].';';
}
if(isset($theme["button_f"]['st'])){
echo 'font-style:'.$theme["button_f"]['st'].';';
}
if(isset($theme["button_fc"])){
echo 'color:'.$theme["button_fc"].';';
}
if(isset($theme["button_w"])){
echo 'width:'.$theme["button_w"].'px;';
}
if(isset($theme["button_h"])){
echo 'height:'.$theme["button_h"].'px;';
echo 'line-height:'.$theme["button_h"].'px;';
}
if(isset($theme["button_bc"])){
echo 'background-color:'.$theme["button_bc"].';';
}
if(isset($theme["button_br"])){
echo '-webkit-border-radius:'.$theme["button_br"].'px;';
echo '-moz-border-radius:'.$theme["button_br"].'px;';
echo 'border-radius:'.$theme["button_br"].'px;';
}
if(isset($theme["button_bor"]) && isset($theme["button_borc"])){
echo ' border:'.$theme["button_bor"].'px solid '.$theme["button_borc"].';';
}
?>
}
.optinpoints .optinpoint-subs-button::before{
content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
}
.optinpoints .optinpoint-subs-button:hover{
background-color: #FA0B38;
<?php if(isset($theme["button_fch"])){
echo 'color:'.$theme["button_fch"].';';
}
if(isset($theme["button_bch"])){
echo 'background-color:'.$theme["button_bch"].';';
}?>
}
.optinpoints .optinpoint-subs-button.subsicon:before{
padding-left: 40px;
  <?php
  if(isset($theme["button_w"])){
      echo 'padding-left:'.$theme["button_h"].'px;';
  }
  ?>
}
.optinpoints .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 40px;
width: 40px;
top: 0;
left: 0;
pointer-events: none;
  <?php
  if(isset($theme["button_h"])){
      echo 'width:'.$theme["button_h"].'px;';
      echo 'height:'.$theme["button_h"].'px;';
  }
  if($theme["button_i"] != 'inone' && $theme["button_i"] != 'idef'){
    $col = ((isset($theme["button_fc"]))? $theme["button_fc"] : '#fff');
     echo 'background: '.$this->getIcon($theme["button_i"],15,$col).' no-repeat center;';
  }
  ?>
}
.optinpoints-inner .optinpoint-subsc{
  text-align: center;
}
.optinpoints-inner.signalshow  .optinpoint-subs-button::after,
.optinpoints-inner.signalshow  .optinpoint-subs-button::before{
  display: none;
}
.optinpoints .optinpoint-signal {
display: none;
  z-index: 1;
    top: 5px;
  left: calc(50% - 20px);
  position: absolute;
-webkit-transform: scale(0.8);
-ms-transform: scale(0.8);
transform: scale(0.8);
}
.optinpoints-inner.signalshow .optinpoint-signal {
  display: inline-block;
}

.optinpoints.optinpoint-tag{
margin: 5px auto;
}
.optinpoints .optinpoint-tag,
.optinpoints .optinpoint-tag *{
color:#fff;
font-size: 10px;
<?php
if(isset($theme["tag_f"]['f'])){
    array_push($oppo_font, $theme["tag_f"]['f']);
  echo 'font-family:'.$theme["tag_f"]['f'].';';
}
if(isset($theme["tag_f"]['s'])){
    echo 'font-size:'.$theme["tag_f"]['s'].'px;';
}
if(isset($theme["tag_f"]['w'])){
    echo 'font-weight:'.$theme["tag_f"]['w'].';';
}
if(isset($theme["tag_f"]['st'])){
    echo 'font-style:'.$theme["tag_f"]['st'].';';
}
if(isset($theme["tag_fc"])){
    echo 'color:'.$theme["tag_fc"].';';
}
?>
}
.optinpoints .optinpoint-tag:before{

   content:<?php
        $tfs=10;
        if(isset($theme["tag_f"]['s'])){$tfs=$theme["tag_f"]['s'];}
        $tfc='#fff';
        if(isset($theme["tag_fc"])){$tfc=$theme["tag_fc"];}
        echo $this->getIcon('lock1',$tfs,$tfc);?>;
   margin: 5px;
   top: 1px;
   position:relative;
}
.optinpoints .optinpoint-feedback{
text-align: center;
position: relative;
color: #ccc;
font-size: 10px;
height: 12px;
margin-top: -12px;
<?php
if(isset($theme["status_f"]['f'])){
    array_push($oppo_font, $theme["status_f"]['f']);
echo 'font-family:'.$theme["status_f"]['f'].';';
}
if(isset($theme["status_f"]['s'])){
echo 'font-size:'.$theme["status_f"]['s'].'px;';
}
if(isset($theme["status_f"]['w'])){
echo 'font-weight:'.$theme["status_f"]['w'].';';
}
if(isset($theme["status_f"]['st'])){
echo 'font-style:'.$theme["status_f"]['st'].';';
}
if(isset($theme["status_fc"])){
echo 'color:'.$theme["status_fc"].';';
}
?>
}
.optinpoints .optinpoint-feedback.optinpoint-done{
font-size: 15px;   margin: 10px;
  height: auto;
}
.optinpoints .optinpoint-feedback.optinpoint-done:before{
content:<?=$this->getIcon('ch1',15,'#fff');?>;
width: 40px;
height: 40px;
border-radius: 20px;
line-height: 46px;
display: block;
background-color: #01E169;
margin: 40px auto;
}
.optinpoints-trig{	
top:40%;
margin: 0 3px;
display: block;
<?php
if(isset($theme["slider_trigger_top"])){
echo 'top:'.$theme["slider_trigger_top"].'%;';
}
?>
}
.optinpoints-trigi{
background: #27313B;
width:50px;
height:50px;
<?php
if(isset($theme["slider_trigger_bg"])){
echo 'background:'.$theme["slider_trigger_bg"].';';
}?>
}

.optinpoints-trig .optinpoints-trigi:hover{
-webkit-box-shadow: inset 3px 2px 21px 5px rgba(0,0,0,0.2);
-moz-box-shadow: inset 3px 2px 21px 5px rgba(0,0,0,0.2);
box-shadow: inset 3px 2px 21px 5px rgba(0,0,0,0.2);
}
.optinpoints-trigi:before{	
<?php
$ti='b06';
if(isset($theme["slider_trigger_i"])){
  if($theme["slider_trigger_i"] == 'inone')$ti='';
  else if($theme["slider_trigger_i"] != 'idef')$ti=$theme["slider_trigger_i"];
}
 ?>
content:<?php echo $this->getIcon($ti,32,(isset($theme["slider_trigger_c"]))?$theme["slider_trigger_c"]:'#fff');?>;
height: 32px;
width: 32px;
display: block;
margin: 8px;
position: absolute;
}

#optinpoints-trig .optinpoints-trigh{
<?php
  if(isset($theme["slider_trigger_hider"]))
    echo 'display:block;';
?>
}
#optinpoints-trig .optinpoints-trigh:before{
<?php
  if(isset($theme["slider_trigger_hc"])){
    echo 'border-right-color: '.$theme["slider_trigger_hc"].';';
    echo 'border-left-color: '.$theme["slider_trigger_hc"].';';
  }
?>
}
</style>


<div id="optinpoints" class="scrollhide optinpointcss">
  <div class="optinpoints-cont">
  <div class="optinpoints-scroller">
    <div class="optinpoints-resp">
    <div class="optinpoints-inner oppointselector optinpoint-mainc">
          <?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
          <?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>
  <div class="optinpoint-cont">
	    <form action="" method="post" class="optinpoint-reset">
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
'icon' => true,
'bui' => (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')?true:false,
'type' => 2,
'sig' => $this->getSpin('8','optinpoints',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000')
);
$this->stfield($form['fields'],$set);
?>

                <div style="clear:both"></div>

              <?php if(isset($theme['tag_en'])){
              if(isset($theme['tag'])) $tagtxt= $theme['tag'];
              else $tagtxt=__( 'Secure and Spam free...', 'optinpoint' );
              echo '<div class="optinpoint-tag">'.$tagtxt.'</div>';
              }?>


		</form>
    	<div class="optinpoint-feedback" oppoerr="gen"></div>
    </div>
	</div>	</div></div></div></div>
<div class="optinpoints-bg optinpointcss"></div>
<div class="optinpoints-overlay optinpointcss"></div>
<div id="optinpoints-trig" class="optinpointcss" <?php if(isset($settings['slider_trigger_scroll'])) echo 'class="scrollhide"';?>>
  <div class="optinpoints-trigc">
    <div class="optinpoints-trigi"></div>
    <div class="optinpoints-trigh"></div>
  </div>
</div>