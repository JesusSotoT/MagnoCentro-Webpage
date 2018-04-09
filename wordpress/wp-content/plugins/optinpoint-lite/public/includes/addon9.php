<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
?>

 <style type="text/css">

.optinpointb {
width: 100%;
background: #27313B;
text-align: center;
display:none;
<?php  if(isset($theme["bg_c"])){
    echo 'background-color:'.$theme["bg_c"].';';
}
$bc='#EDEDED';
$bw=0;
if(isset($theme["addon_bor_c"]))$bc = $theme["addon_bor_c"];
if(isset($theme["addon_bor_w"]))$bw = $theme["addon_bor_w"];
  echo 'border: '.$bc.' solid '.$bw.'px;';
?>
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
}
.optinpointb .optinpointb-inner{
width: calc(100% - 20px);
max-width: 400px;
margin: 0 auto;
display: inline-block;
}
.optinpointb div{
  position:relative;
}
.optinpointb h3{
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
.optinpointb .optinpoint_para{
  margin-top: 15px;
}
.optinpointb .optinpoint_para,.optinpointb .optinpoint_para * {
font-size: 15px;
color: #959595;
line-height: 14px;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
  echo 'font-family:'.$theme["msg_f"]['f'].';';
}if(isset($theme["msg_f"]['s'])){
    echo 'font-size:'.$theme["msg_f"]['s'].'px;';
}?>
}
.optinpointb form{
margin: 20px auto;
}
.optinpointb .formbox > div:first-of-type{
  width: 65%;
  float: left;
}
.optinpointb .formbox > div:first-of-type + div{
  width: 35%;
  float: left;
}
.optinpointb .formbox input[type="text"]{
border-radius: 3px 0 0 3px;
}
.optinpointb .optinpoint-field{
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
.optinpointb .inputicon{
display: none;
}
.optinpointb .oppo-ficon .inputicon {
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
.optinpointb .oppo-ficon input[type="text"],
.optinpointb .oppo-ficon input[type="text"] ~ .inputlabel{
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
    echo '.optinpointb .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($fi,15,$col).' no-repeat center}';
}
?>
.optinpointb .optinpoint-field textarea,
.optinpointb .optinpoint-field select,
.optinpointb input[type="text"]{
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

.optinpointb .optinpoint-field.optinpoint-multidrop select{
  height: 100px;
}

.optinpointb .optinpoint-field.optinpoint-drop:before{
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
.optinpointb input[type="text"] ~ .inputlabel{
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
.optinpointb input[type="text"]:valid + .inputlabel{
display: none;
}
.optinpointb select.oppoerror,
.optinpointb input[type="text"].oppoerror{
  border-color: red;
}

.optinpointb .optinpoint-check *,
.optinpointb .optinpoint-radio *{
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
.optinpointb .optinpoint-item{
  <?php
     $pline = 2;
    if(isset($pline))echo 'width:'.(100/$pline).'%;';
    ?>
  display: inline-block;
  vertical-align: top;
}
.optinpointb .optinpoint-item input {
  display: none;
}
.optinpointb .optinpoint-item span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  padding-left: 35px;
  margin-right: 10px;
  line-height: 20px;
}

.optinpointb .optinpoint-item span:before,
.optinpointb .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 12px;
  height: 12px;
  left: 0;
  top: 4px;
  position: absolute;
}
.optinpointb .optinpoint-item span:before {
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
.optinpointb .optinpoint-item input[type='checkbox'] + span:hover:after, .optinpointb input[type='checkbox']:checked + span:after {
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
.optinpointb .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
.optinpointb .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 12px;
height: 12px;
top: 4px;
}
.optinpointb input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 8px;
height: 8px;
top: 6px;
left: 2px;
border-radius: 50%;
}
.optinpointb .oppoinfierr{
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

.optinpointb .optinpoint-subs-button{
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
.optinpointb .optinpoint-subs-button::before{
content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
}
.optinpointb .optinpoint-subs-button:hover{
background-color: #FA0B38;
<?php if(isset($theme["button_fch"])){
echo 'color:'.$theme["button_fch"].';';
}
if(isset($theme["button_bch"])){
echo 'background-color:'.$theme["button_bch"].';';
}?>
}
.optinpointb .optinpoint-subsc{
  text-align: center;
}
.optinpointb .optinpoint-subs-button.subsicon:before{
padding-left: 40px;
  <?php
  if(isset($theme["button_w"])){
      echo 'padding-left:'.$theme["button_h"].'px;';
  }
  ?>
}
.optinpointb .optinpoint-subs-button.subsicon::after{
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
.optinpointb.signalshow .optinpoint-subs-button::after,
.optinpointb.signalshow .optinpoint-subs-button::before{
  display: none;
}

.optinpointb .optinpoint-signal {
display: none;
  z-index: 1;
    top: 5px;
  left: calc(50% - 20px);
  position: absolute;
-webkit-transform: scale(0.8);
-ms-transform: scale(0.8);
transform: scale(0.8);
}
.optinpointb.signalshow .optinpoint-signal {
  display: inline-block;
}
.optinpointb .optinpoint-feedback{
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
.optinpointb .optinpoint-feedback.optinpoint-done{
font-size: 15px;display: inline-block; height: auto;  margin: 10px;
}
.optinpointb .optinpoint-feedback.optinpoint-done:before{
content:<?=$this->getIcon('ch1',15,'#fff');?>;
width: 40px;
height: 40px;
border-radius: 20px;
line-height: 46px;
display: block;
background-color: #01E169;
margin: 25px auto;
}
.optinpointb .optinpoint-tag{
margin: 5px auto;
}
.optinpointb .optinpoint-tag,
.optinpointb .optinpoint-tag *{
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
.optinpointb .optinpoint-tag:before{
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

</style>

<div class="optinpoint-reset oppointselector optinpointb optinpointcss" id="optinpointb">
<div class="optinpointb-inner">
          <?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
          <?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>

	    <form action="" method="post">
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
'icon' => true,
'bui' => (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')?true:false,
'type' => 2,
'sig' => $this->getSpin('8','optinpointb',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000')
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
</div>