<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
?>
<style type="text/css">
#optinpointf .optinpointf{
  position:fixed;z-index: 99999;
  display: inline-block;
  width: 320px;
background: #27313B;
text-align: center;
box-shadow: 0 0 20px rgba(0,0,0,.2);
overflow: hidden;
border-radius: 3px;
padding: 0 5px;
  -webkit-backface-visibility: hidden;
-webkit-transition: -webkit-transform 0.3s cubic-bezier(0.785, 0.135, 0.15, 0.86);
transition: transform 0.3s cubic-bezier(0.785, 0.135, 0.15, 0.86);
  <?php
    if(isset($theme["bg_c"])){
        echo 'background:'.$theme["bg_c"].';';
    }
  ?>
}
#optinpointf.oppotb_mid .optinpointf{left: calc(50% - 160px);bottom: 0}
#optinpointf.oppotb_mid .optinpointf.optinpointf-close{
-webkit-transform: translateY(1000px);transform: translateY(1000px);
}
#optinpointf.oppotb_left .optinpointf{left: 10px;bottom: 10px}
#optinpointf.oppotb_left .optinpointf.optinpointf-close{
-webkit-transform: translateX(-500px);transform: translateX(-500px);
}
#optinpointf.oppotb_right .optinpointf{right: 10px;bottom: 10px}
#optinpointf.oppotb_right .optinpointf.optinpointf-close{
-webkit-transform: translateX(500px);transform: translateX(500px);
}
.optinpointf div{
  position:relative;
}
.optinpointf h3{
color: #F4233C;
line-height: 20px;
padding-top:18px;
font-size: 20px;
<?php
  if(isset($theme["heading_f"]['f'])){
    array_push($oppo_font, $theme["heading_f"]['f']);
    echo 'font-family:'.$theme["heading_f"]['f'].';';
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
.optinpointf .optinpoint_para{
  margin: 12px auto;
}
.optinpointf .optinpoint_para,.optinpointf .optinpoint_para * {
font-size: 12px;
color: #959595;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
echo 'font-family:'.$theme["msg_f"]['f'].';';
}?>
}
.optinpointf form{
margin: 20px auto;
}
.optinpointf .formbox > div:first-of-type{
  width: 65%;
  float: left;
}
.optinpointf .formbox > div:first-of-type + div{
  width: 35%;
  float: left;
}
.optinpointf .formbox input[type="text"]{
border-radius: 3px 0 0 3px;
}
.optinpointf  .optinpoint-field{
position: relative;
width:100%;
margin: 0 auto 10px auto;
text-align: left;

}
.optinpointf .inputicon{
display: none;
}
.optinpointf .oppo-ficon .inputicon {
display: block;
width: 35px;
height: 35px;
position: absolute;
top: 0;
left: 0;
pointer-events: none;

}
.optinpointf .oppo-ficon input[type="text"],
.optinpointf .oppo-ficon input[type="text"] ~ .inputlabel{
  padding-left: 35px;

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
    echo '.optinpointf .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($fi,15,$col).' no-repeat center}';
}
?>
.optinpointf .optinpoint-field textarea,
.optinpointf .optinpoint-field select,
.optinpointf input[type="text"]{
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
  if(isset($theme["tbox_bor"]) && isset($theme["tbox_borc"])){
      echo ' border:'.$theme["tbox_bor"].'px solid '.$theme["tbox_borc"].';';
  }
?>
}

.optinpointf .optinpoint-field.optinpoint-multidrop select{
  height: 100px;
}

.optinpointf .optinpoint-field.optinpoint-drop:before{
content: '';
width: 35px;
height: 35px;
position: absolute;
right: 0;
top: 0;
pointer-events: none;
background: no-repeat center;
background-image: <?=$this->getIcon('dd',16,'#000');?>;

}
.optinpointf input[type="text"] ~ .inputlabel{
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
.optinpointf input[type="text"]:valid + .inputlabel{
display: none;
}
.optinpointf select.oppoerror,
.optinpointf input[type="text"].oppoerror{
  border-color: red;
}

.optinpointf .optinpoint-check *,
.optinpointf .optinpoint-radio *{
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
.optinpointf .optinpoint-item{
  <?php
    $pline = 2;
    if(isset($pline))echo 'width:'.(100/$pline).'%;';
    ?>
  display: inline-block;
  vertical-align: top;
}
.optinpointf .optinpoint-item input {
  display: none;
}
.optinpointf .optinpoint-item span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  padding-left: 35px;
  margin-right: 10px;
  line-height: 20px;
}

.optinpointf .optinpoint-item span:before,
.optinpointf .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 12px;
  height: 12px;
  left: 0;
  top: 4px;
  position: absolute;
}
.optinpointf .optinpoint-item span:before {
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
.optinpointf .optinpoint-item input[type='checkbox'] + span:hover:after, .optinpointf input[type='checkbox']:checked + span:after {
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
.optinpointf .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
.optinpointf .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 12px;
height: 12px;
top: 4px;
}
.optinpointf input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 8px;
height: 8px;
top: 6px;
left: 2px;
border-radius: 50%;
}
.optinpointf .oppoinfierr{
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


.optinpointf .optinpoint-subs-button{
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
  if(isset($theme["button_f"]['w'])){
      echo 'font-weight:'.$theme["button_f"]['w'].';';
  }
  if(isset($theme["button_f"]['st'])){
      echo 'font-style:'.$theme["button_f"]['st'].';';
  }
  if(isset($theme["button_fc"])){
      echo 'color:'.$theme["button_fc"].';';
  }
  if(isset($theme["button_bc"])){
      echo 'background:'.$theme["button_bc"].';';
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
.optinpointf .optinpoint-subs-button::before{
  content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
  display: block;
}
.optinpointf .optinpoint-subs-button:hover{
background-color: #FA0B38;
    <?php
        if(isset($theme["button_bch"])){
            echo 'background:'.$theme["button_bch"].';';
        }
        if(isset($theme["button_fch"])){
            echo 'color:'.$theme["button_fch"].';';
        }
      ?>
}
.optinpointf .optinpoint-subsc{
  text-align: center;
}
.optinpointf .optinpoint-subs-button.subsicon:before{
padding-left: 35px;

}
.optinpointf .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 35px;
width: 35px;
top: 0;
left: 0;
pointer-events: none;
  <?php

  if($theme["button_i"] != 'inone' && $theme["button_i"] != 'idef'){
    $col = ((isset($theme["button_fc"]))? $theme["button_fc"] : '#fff');
     echo 'background: '.$this->getIcon($theme["button_i"],15,$col).' no-repeat center;';
  }
  ?>
}
#optinpointf.signalshow .optinpoint-subs-button::after,
#optinpointf.signalshow .optinpoint-subs-button::before{
  display: none;
}

.optinpointf .optinpoint-feedback{
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
        echo 'height:'.$theme["status_f"]['s'].'px;';
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

.optinpointf .optinpoint-feedback.optinpoint-done:before{
content:'';
background:<?=$this->getIcon('ch1',15,'#fff');?> no-repeat center;
width: 40px;
height: 40px;
border-radius: 20px;
line-height: 46px;
display: block;
background-color: #01E169;
margin: 30px auto;
}
.optinpointf .optinpoint-feedback.optinpoint-done{
font-size: 15px;height: auto;  margin: 10px;
}


.optinpointf .optinpointf-close-button {
display: inline-block;
top: 0;
right: 0;
width: 25px;
position: absolute;
cursor:pointer;
}

.optinpointf .optinpointf-close-button::before {
    content: "\00D7";
font-size: 25px;
line-height: 25px;
font-weight: 100;
color: #999;
opacity: 0.4;
}
.optinpointf .optinpointf-close-button:hover:before {
opacity: 1;
}

.optinpointf .optinpoint-signal {
display: none;
  z-index: 1;
    top: 4px;
  left: calc(50% - 20px);
  position: absolute;
-webkit-transform: scale(0.5);
-ms-transform: scale(0.5);
transform: scale(0.5);
}
#optinpointf.signalshow .optinpoint-signal{
  display: inline-block;
}

@media only screen and (max-width : 1024px) {
#optinpointf .optinpointf{
  display: none;
}
}
</style>
<div class="optinpointf-tray optinpointcss oppointselector oppotb_right" id="optinpointf">
<div class="optinpoint-reset optinpointf optinpointf-close">
          <?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>

    <div class="optinpointf-close-button"></div>

    <?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>
  <form action="" method="post">
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
'icon' => true,
'bui' => (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')?true:false,
'type' => 2,
'sig' => $this->getSpin('8','optinpointf',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000'));
$this->stfield($form['fields'],$set);
?>

                <div style="clear:both"></div>

  </form>
  <div class="optinpoint-feedback" oppoerr="gen"></div>
  </div>
</div>