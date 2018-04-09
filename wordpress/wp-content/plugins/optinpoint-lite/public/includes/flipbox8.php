<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
$this->social=true;
?>
<style type="text/css">
#optinpointf .optinpointf{
  position:fixed;z-index: 99999;
  display: inline-block;
  width: 320px;
background: #262E43;
text-align: center;
box-shadow: 0 0 20px rgba(0,0,0,.2);
overflow: hidden;
border-radius: 3px;
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
.optinpointf h3{
line-height: 20px;
padding-top:20px;
color: #fff;
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
    margin: 10px 10px 0;
  line-height: 14px;
}
.optinpointf .optinpoint_para,.optinpointf .optinpoint_para * {
font-size: 12px;
color: #ADBBE0;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
echo 'font-family:'.$theme["msg_f"]['f'].';';
}?>
}

.optinpointf form{
margin-top: 20px;
overflow: hidden;
}
.optinpointf .formbox{
margin: 0 auto;
width: calc(100% - 20px);
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
.optinpointf .optinpoint-field.oppo-ficon input[type="text"],
.optinpointf .optinpoint-field.oppo-ficon .inputlabel{
  padding-left: 35px;

}
<?php
$col = ((isset($theme["inico_c"]))? $theme["inico_c"] : '#888');
foreach ($form['fields'] as $f) {
  if($f['icon'] != 'idef' && $f['icon'] != 'inone')
    echo '.optinpointf .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($f['icon'],25,$col).' no-repeat center}';
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
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
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
.optinpointf input[type="text"]:valid + .inputlabel{
display: none;
}
.optinpointf select.oppoerror,
.optinpointf input[type="text"].oppoerror{
  border-color: red;
}
.optinpointf .optinpoint-field.optinpoint-check,
.optinpointf .optinpoint-field.optinpoint-radio{
  text-align: left;
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
border:1px solid #353535;
background: #fff;
border-radius: 1px;
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
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
width: 100%;
color: #fff;
font-size: 17px;
border: 1px solid #50B059;
background-color: #73C557;
height: 36px;
line-height: 36px;
text-align: center;
cursor: pointer;
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
background-color: #50B059;
    <?php
        if(isset($theme["button_bch"])){
            echo 'background:'.$theme["button_bch"].';';
        }
        if(isset($theme["button_fch"])){
            echo 'color:'.$theme["button_fch"].';';
        }
      ?>
}
.optinpointf .optinpoint-subsc{position: relative;}
.optinpointf .optinpoint-subs-button.subsicon:before{
padding-left: 36px;

}
.optinpointf .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 36px;
width: 36px;
top: 0;
left: 0;
pointer-events: none;
  <?php

  if($theme["button_i"] != 'inone' && $theme["button_i"] != 'idef'){
    $col = ((isset($theme["button_fc"]))? $theme["button_fc"] : '#fff');
     echo 'background: '.$this->getIcon($theme["button_i"],25,$col).' no-repeat center;';
  }
  ?>
}
.optinpointf .optinpoint-social{
display: inline-block;
margin: 12px auto 0;
height: 90px;
width: 100%;
background: rgba(75, 75, 75, 0.3);
box-shadow: 0px 1px 1px 1px rgba(116, 116, 116, 0.94);
}
.optinpointf .optinpoint-social::before{
content: '<?php if(isset($theme['soc_head'])) echo $theme['soc_head'];else echo __( 'Subscribe with', 'optinpoint' );?>';
font-size: 13px;
line-height: 13px;
color: #ADACB2;
width: 100%;
display: block;
margin: 15px auto 5px;
<?php
if(isset($theme["soc_f"]['f'])){
    array_push($oppo_font, $theme["soc_f"]['f']);
  echo 'font-family:'.$theme["soc_f"]['f'].';';
}
if(isset($theme["soc_f"]['s'])){
    echo 'font-size:'.$theme["soc_f"]['s'].'px;';
    echo 'line-height:'.$theme["soc_f"]['s'].'px;';
}
if(isset($theme["soc_f"]['w'])){
    echo 'font-weight:'.$theme["soc_f"]['w'].';';
}
if(isset($theme["soc_f"]['st'])){
    echo 'font-style:'.$theme["soc_f"]['st'].';';
}
if(isset($theme["soc_fc"])){
    echo 'color:'.$theme["soc_fc"].';';
}
?>
}

.optinpointf .optinpoint-social .optinpoint-soc{
display: inline-block;
width:40px;
height: 40px;
border-radius: 2px;
cursor: pointer;
-webkit-transition: all 0.1s ease;
transition: all 0.1s ease;
-webkit-backface-visibility:hidden;
border:1px solid #262E43;
<?php  if(isset($theme["bg_c"])){
    echo 'border-color: '.$theme["bg_c"].';';
}?>
}
.optinpointf .optinpoint-social .optinpoint-soc::before{
content: '';
display: block;
width:40px;
height: 40px;
background: no-repeat center;
}

.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-fb {
<?php if(!isset($settings["fb_api"])){
echo 'display:none;';
}?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-fb::before {
background-image:<?php echo $this->getIcon('fb1',15,'#fff');?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-fb:hover:before {
background-image:<?php echo $this->getIcon('fb1',15,'#2d609b');?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-gp {
<?php if(!isset($settings["gp_api"])){
echo 'display:none;';
}?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-gp:before {
background-image: <?php echo $this->getIcon('gp1',15,'#fff');?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-gp:hover:before {
background-image: <?php echo $this->getIcon('gp1',15,'#eb4026');?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-ms {
<?php if(!isset($settings["ms_api"])){
echo 'display:none;';
}?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-ms::before {
background-image: <?php echo $this->getIcon('ms1',15,'#fff');?>
}
.optinpointf .optinpoint-social .optinpoint-soc.optinpoint-ms:hover:before {
background-image: <?php echo $this->getIcon('ms1',15,'#00BCF2');?>
}

.optinpointf .optinpoint-feedback{
text-align: center;
position: relative;
color: #ccc;
font-size: 10px;
height: 12px;
top: -91px;
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
font-size: 15px;top: 0;  margin: 0;height: auto;
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
position: absolute;
top: 4px;
right: 3px;
-webkit-transform: scale(0.5);
-ms-transform: scale(0.5);
transform: scale(0.5);
}
#optinpointf.signalshow .optinpoint-signal {
  display: inline-block;
}
#optinpointf.wosoc .optinpoint-social{
display: none;
}

@media only screen and (max-width : 1024px) {
#optinpointf .optinpointf{
  display: none;
}
}
</style>
<div class="optinpointf-tray optinpointcss oppointselector oppotb_right<?php if(isset($theme['addon_dissoc']))echo ' wosoc';?>" id="optinpointf">
<div class="optinpoint-reset optinpointf optinpointf-close">
    <?php echo isset($theme['heading'])?'<h3>'.$theme['heading'].'</h3>' : '<h3>Subscribe Now</h3>';?>
    <div class="optinpointf-close-button"></div>

<?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>
  <form action="" method="post">
              <div class="formbox">
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
  'icon' => false,
  'type' => 1
  );
$this->stfield($form['fields'],$set);
?>
              <div class="optinpoint-subsc">
                <div class="optinpoint-subs-button<?php echo (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')? ' subsicon' : '';?>"></div>
                <div class="optinpoint-signal"><?php
    echo $this->getSpin('3','optinpointf',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000');?></div>

              </div>

            </div>

            <div class="optinpoint-social">
                <div class="optinpoint-soc optinpoint-fb"></div>
                <div class="optinpoint-soc optinpoint-gp"></div>
                <div class="optinpoint-soc optinpoint-ms"></div>
            </div>
  </form>
  <div class="optinpoint-feedback" oppoerr="gen"></div>
  </div>
</div>