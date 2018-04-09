<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
 ?>
 <style type="text/css">

#<?php echo $oppow_id; ?> {
padding: 0 5px;
background: #27313B;
text-align: center;
width: 100%;
<?php  if(isset($theme["bg_c"])){
    echo 'background-color:'.$theme["bg_c"].';';
}?>
}

#<?php echo $oppow_id;?> div{
  position:relative;
}

#<?php echo $oppow_id;?> h3{
color: #F4233C;
line-height: 20px;
padding-top:18px;
font-size: 20px;
margin: 0;
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
#<?php echo $oppow_id;?> .optinpoint_para{
  margin: 12px auto;
  line-height: 14px;
}
#<?php echo $oppow_id;?> .optinpoint_para,#<?php echo $oppow_id;?> .optinpoint_para * {
font-size: 12px;
color: #959595;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
  echo 'font-family:'.$theme["msg_f"]['f'].';';
}if(isset($theme["msg_f"]['s'])){
    echo 'font-size:'.$theme["msg_f"]['s'].'px;';
}?>
}
#<?php echo $oppow_id;?> form{
margin: 20px auto;
}
#<?php echo $oppow_id;?> .formbox > div:first-of-type{
  width: 65%;
  float: left;
}
#<?php echo $oppow_id;?> .formbox > div:first-of-type + div{
  width: 35%;
  float: left;
}
#<?php echo $oppow_id;?> .formbox input[type="text"]{
border-radius: 3px 0 0 3px;
}
#<?php echo $oppow_id;?>  .optinpoint-field{
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
#<?php echo $oppow_id;?> .inputicon{
display: none;
}
#<?php echo $oppow_id;?> .oppo-ficon .inputicon {
display: block;
width: 35px;
height: 35px;
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
#<?php echo $oppow_id;?> .oppo-ficon input[type="text"],
#<?php echo $oppow_id;?> .oppo-ficon input[type="text"] ~ .inputlabel{
  padding-left: 35px;
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
    echo '#'.$oppow_id.' .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$plugin->getIcon($fi,15,$col).' no-repeat center}';
}
?>
#<?php echo $oppow_id;?> .optinpoint-field textarea,
#<?php echo $oppow_id;?> .optinpoint-field select,
#<?php echo $oppow_id;?> input[type="text"]{
text-align: left;
width: 100%;
height: 35px;
background: #fff;
 padding: 0 10px;
border-radius: 3px;
color: #353535;
font-size:14px;
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

#<?php echo $oppow_id;?> .optinpoint-field.optinpoint-multidrop select{
  height: 100px;
}

#<?php echo $oppow_id;?> .optinpoint-field.optinpoint-drop:before{
content: '';
width: 35px;
height: 35px;
position: absolute;
right: 0;
top: 0;
pointer-events: none;
background: no-repeat center;
background-image: <?=$plugin->getIcon('dd',16,'#000');?>;
<?php
if(isset($theme["tbox_h"])){
  echo 'width:'.$theme["tbox_h"].'px;';
  echo 'height:'.$theme["tbox_h"].'px;';
}
?>
}
#<?php echo $oppow_id;?> input[type="text"] ~ .inputlabel{
position: absolute;
top: 0;
left: 0;
right: 0;
pointer-events: none;
width: 100%;
line-height: 35px;
color: rgba(0,0,0,0.6);
font-size: 14px;
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
#<?php echo $oppow_id;?> input[type="text"]:valid + .inputlabel{
display: none;
}
#<?php echo $oppow_id;?> select.oppoerror,
#<?php echo $oppow_id;?> input[type="text"].oppoerror{
  border-color: red;
}

#<?php echo $oppow_id;?> .optinpoint-check *,
#<?php echo $oppow_id;?> .optinpoint-radio *{
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
#<?php echo $oppow_id;?> .optinpoint-item{
  <?php
    $pline = 2;
    if(isset($pline))echo 'width:'.(100/$pline).'%;';
    ?>
  display: inline-block;
  vertical-align: top;
}
#<?php echo $oppow_id;?> .optinpoint-item input {
  display: none;
}
#<?php echo $oppow_id;?> .optinpoint-item span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  line-height: 20px;
  padding-left: 35px;
  margin-right: 10px;
}

#<?php echo $oppow_id;?> .optinpoint-item span:before,
#<?php echo $oppow_id;?> .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 12px;
  height: 12px;
  left: 0;
  top: 4px;
  position: absolute;
}
#<?php echo $oppow_id;?> .optinpoint-item span:before {
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
#<?php echo $oppow_id;?> .optinpoint-item input[type='checkbox'] + span:hover:after, #<?php echo $oppow_id;?> input[type='checkbox']:checked + span:after {
content:'';
width: 14px;
height: 14px;
background: no-repeat center;
background-image: <?php
        $tfi='ch2';

        $tfc='#000';
        if(isset($theme["check_ic"])){$tfc=$theme["check_ic"];}
        echo $plugin->getIcon($tfi,8,$tfc);?>;
}
#<?php echo $oppow_id;?> .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
#<?php echo $oppow_id;?> .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 12px;
height: 12px;
top: 4px;
}
#<?php echo $oppow_id;?> input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 8px;
height: 8px;
top: 6px;
left: 2px;
border-radius: 50%;
}
#<?php echo $oppow_id;?> .oppoinfierr{
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

#<?php echo $oppow_id;?> .optinpoint-subs-button{
border-radius: 0 3px 3px 0;
width: 100%;
color: #fff;
font-size: 17px;
border: 1px solid #FA0B38;
background-color: #FF1F43;
height: 35px;
line-height: 30px;
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
#<?php echo $oppow_id;?> .optinpoint-subs-button::before{
content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
}
#<?php echo $oppow_id;?> .optinpoint-subs-button:hover{
background-color: #FA0B38;
<?php if(isset($theme["button_fch"])){
echo 'color:'.$theme["button_fch"].';';
}
if(isset($theme["button_bch"])){
echo 'background-color:'.$theme["button_bch"].';';
}?>
}

#<?php echo $oppow_id;?> .optinpoint-subsc{
  text-align: center;
}
#<?php echo $oppow_id;?> .optinpoint-subs-button.subsicon:before{
padding-left: 35px;
  <?php
  if(isset($theme["button_w"])){
      echo 'padding-left:'.$theme["button_h"].'px;';
  }
  ?>
}
#<?php echo $oppow_id;?> .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 35px;
width: 35px;
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
     echo 'background: '.$plugin->getIcon($theme["button_i"],15,$col).' no-repeat center;';
  }
  ?>
}
#<?php echo $oppow_id;?>.signalshow .optinpoint-subs-button::after,
#<?php echo $oppow_id;?>.signalshow .optinpoint-subs-button::before{
 display: none;
}

#<?php echo $oppow_id;?> .optinpoint-signal {
display: none;
  z-index: 1;
    top: 4px;
  left: calc(50% - 20px);
  position: absolute;
-webkit-transform: scale(0.5);
-ms-transform: scale(0.5);
transform: scale(0.5);
}
#<?php echo $oppow_id;?>.signalshow .optinpoint-signal {
  display: inline-block;
}
#<?php echo $oppow_id;?> .optinpoint-feedback{
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
#<?php echo $oppow_id;?> .optinpoint-feedback.optinpoint-done{
font-size: 15px; margin: 10px;height: auto;
}
#<?php echo $oppow_id;?> .optinpoint-feedback.optinpoint-done:before{
content:<?=$plugin->getIcon('ch1',15,'#fff');?>;
width: 40px;
height: 40px;
border-radius: 20px;
line-height: 46px;
display: block;
background-color: #01E169;
margin: 40px auto;
}
#<?php echo $oppow_id;?> .optinpoint-tag{
margin: 5px auto;
}
#<?php echo $oppow_id;?> .optinpoint-tag,
#<?php echo $oppow_id;?> .optinpoint-tag *{
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
#<?php echo $oppow_id;?> .optinpoint-tag:before{
content:<?php
  $tfs=10;
  if(isset($theme["tag_f"]['s'])){$tfs=$theme["tag_f"]['s'];}
  $tfc='#fff';
  if(isset($theme["tag_fc"])){$tfc=$theme["tag_fc"];}
  echo $plugin->getIcon('lock1',$tfs,$tfc);?>;
margin: 5px;
top: 1px;
position:relative;
}

</style>
<div class="widget-text wp_widget_plugin_box">
<div class="optinpoint-reset oppointselector optinpoint optinpointcss" id="<?php echo $oppow_id;?>">
          <?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
          <?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>
    <form action="" method="post" >

<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
'icon' => true,
'bui' => (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')?true:false,
'type' => 2,
'sig' => $plugin->getSpin('8',$oppow_id,isset($theme["spinner_c"])?$theme["spinner_c"]:'#000')
);
$plugin->stfield($form['fields'],$set);
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
</div>