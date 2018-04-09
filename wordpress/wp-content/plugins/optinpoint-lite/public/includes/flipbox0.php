<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
?>
<style type="text/css">
.optinpointf{
	position:fixed;z-index: 99999;
	display: inline-block;
	width: 320px;
	background: #000;
padding-bottom: 35px
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
.optinpointf .optinpointf-head{
  width: 100%;
  height: 35px;
}
.optinpointf h3{
display: block;
width: 200px;
font-size:15px;
line-height: 35px;
font-weight:400;
color:#fff;
padding-left: 10px;
float: left;
width: 100%;
text-align: center;
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
  margin-bottom: 10px;
}
.optinpointf .optinpoint_para,.optinpointf .optinpoint_para * {
  color: #fff;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
echo 'font-family:'.str_replace("|ng","",$theme["msg_f"]['f']).';';
}?>
}
.optinpointf .optinpointf-cont{
  padding:10px;
  text-align: center;
}

.optinpointf .optinpoint-field{
position: relative;
width:100%;
margin: 0 auto 10px auto;
}
.optinpointf .inputicon{
display: none;
}
.optinpointf .oppo-ficon .inputicon {
display: block;
width: 30px;
height: 30px;
position: absolute;
top: 0;
left: 0;
pointer-events: none;
}
.optinpointf .oppo-ficon input[type="text"],
.optinpointf .oppo-ficon .inputlabel{
  padding-left: 30px;
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
    display: inline-block;
    width:100%;
    background:#fff;
    height:30px;
    text-align: center;
    border:2px solid #fff;
    outline:0;
    border-radius: 1px;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    -ms-border-radius: 1px;
    -o-border-radius: 1px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-size: 16px;
    <?php
        if(isset($theme["tbox_f"]['f'])){
    array_push($oppo_font, $theme["tbox_f"]['f']);
          echo 'font-family:'.$theme["tbox_f"]['f'].';';
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
width: 30px;
height: 30px;
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
line-height: 30px;
color: rgba(0,0,0,0.6);
font-size: 16px;
font-weight:500;
white-space: nowrap;
text-align: center;
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
text-align: left;
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
  line-height: 20px;
  margin-right: 10px;
}

.optinpointf .optinpoint-item span:before,
.optinpointf .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 18px;
  height: 18px;
  left: 0;
  top: 4px;
  position: absolute;
}

.optinpointf .optinpoint-item span:before {
background-color: #fafafa;
transition: all 0.3s ease-in-out;
border-radius: 3px;
<?php
  if(isset($theme["check_borc"])){
      echo 'border: 1px solid'.$theme["check_borc"].';';
  }
?>
}
.optinpointf .optinpoint-item input[type='checkbox'] + span:before {
border-radius: 3px;
}
.optinpointf .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 12px;
height: 12px;
top: 6px;
left: 4px;
}
.optinpointf .optinpoint-item input:checked + span:before{
  <?php if(isset($theme["check_c"])) $color = $theme["check_c"]; else $color = '#158EC6';
  print_r('box-shadow: inset 0 0 0 10px '.$color.';');?>
}

.optinpointf .optinpoint-item input[type='checkbox'] + span:hover:after, .optinpointf input[type='checkbox']:checked + span:after {
  content:'';
  background: no-repeat center;
background-image: <?php
        $tfi='ch1';

        $tfc='#fff';
        if(isset($theme["check_ic"])){$tfc=$theme["check_ic"];}
        echo $this->getIcon($tfi,12,$tfc);?>;
}
.optinpointf .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
background-image:<?php echo $this->getIcon($tfi,12,'#444');?>;
opacity: 0.5;
}
.optinpointf .oppoinfierr{
  text-align: left;
  display: block;
  height: 10px;
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
.optinpointf input[type="email"]:focus,.optinpointf input[type="text"]:focus {
    border:2px solid #ddd;
    <?php
        if(isset($theme["tbox_bor"]) && isset($theme["tbox_borc"])){
            echo ' border:'.$theme["tbox_bor"].'px solid '.$theme["tbox_borc"].';';
        } ?>
}
.optinpointf .optinpoint-subs-button{
  display:inline-block;
  text-align: center;
  width: 100%;
    height:28px;
    line-height: 28px;
    margin-bottom:10px;
    background: #62bc33;
  color:#fff;
    cursor:pointer;
    -webkit-box-shadow:none;
    -moz-box-shadow:none;
    -ms-box-shadow:none;
    -o-box-shadow:none;
    box-shadow:none;
    clear:both;
    text-shadow:none;
    border: 0;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    -ms-border-radius: 1px;
    -o-border-radius: 1px;
    border-radius: 1px;
    position: relative;
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
        else{ ?>
          background: -moz-linear-gradient(left, #62bc33 0%, #8bd331 100%);
          background: -webkit-gradient(linear, left top, right top, color-stop(0%,#62bc33), color-stop(100%,#8bd331));
          background: -webkit-linear-gradient(left, #62bc33 0%,#8bd331 100%);
          background: -o-linear-gradient(left, #62bc33 0%,#8bd331 100%);
          background: -ms-linear-gradient(left, #62bc33 0%,#8bd331 100%);
          background: linear-gradient(to right, #62bc33 0%,#8bd331 100%);
        <?php }
        if(isset($theme["button_br"])){
            echo '-webkit-border-radius:'.$theme["button_br"].'px;';
            echo '-moz-border-radius:'.$theme["button_br"].'px;';
            echo '-ms-border-radius:'.$theme["button_br"].'px;';
            echo '-o-border-radius:'.$theme["button_br"].'px;';
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
  position: relative;
  line-height: 28px;
}
.optinpointf .optinpoint-subs-button:hover{
    background:#8BD331;
  color:#fff;
	<?php
        if(isset($theme["button_bch"])){
            echo 'background:'.$theme["button_bch"].';';
        }
        else{ ?>
          background: -moz-linear-gradient(left, #8BD331 0%, #8bd331 100%);
        background: -webkit-gradient(linear, left top, right top, color-stop(0%,#8BD331), color-stop(100%,#8bd331));
        background: -webkit-linear-gradient(left, #8BD331 0%,#8bd331 100%);
        background: -o-linear-gradient(left, #8BD331 0%,#8bd331 100%);
        background: -ms-linear-gradient(left, #8BD331 0%,#8bd331 100%);
        background: linear-gradient(to right, #8BD331 0%,#8bd331 100%);
          <?php }
        if(isset($theme["button_fch"])){
            echo 'color:'.$theme["button_fch"].';';
        }
        if(isset($theme["button_bor"]) && isset($theme["button_borc"])){
            echo ' border:'.$theme["button_bor"].'px solid '.$theme["button_borc"].';';
        }
      ?>
}
.optinpointf .optinpoint-subs-button.subsicon:before{
padding-left: 28px;
}
.optinpointf .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 28px;
width: 28px;
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
.optinpointf .optinpoint-feedback{
margin: -40px 0 22px;
  clear:both;
height:14px;
position: relative;
color: #fff;
  <?php
        if(isset($theme["status_f"]['f'])){
    array_push($oppo_font, $theme["status_f"]['f']);
          echo 'font-family:'.$theme["status_f"]['f'].';';
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

.optinpointf .optinpoint-feedback.optinpoint-done{
  margin: 0;
  height: auto;
}

.optinpointf .optinpointf-close-button {
display: inline-block;
width: 1.5em;
height: 1.5em;
right: 10px;
top:5px;
position: absolute;
border: 0.1em solid #7e7e7e;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
-msborder-radius: 50%;
-o-border-radius: 50%;
border-radius: 50%;
cursor:pointer;
background-color: #7e7e7e;
-moz-transform: rotate(45deg);
-o-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-webkit-transform: rotate(45deg);
transform: rotate(45deg);
transition: all 0.5s ease;
}


.optinpointf .optinpointf-close-button::before {
    content: "";
    display: block;
    position: absolute;
    background-color: #000;
    width: 80%;
    height: 6%;
    left: 10%;
    top: 47%;
  }

  .optinpointf .optinpointf-close-button::after {
    content: "";
    display: block;
    position: absolute;
    background-color: #000;
    width: 6%;
    height: 80%;
    left: 47%;
    top: 10%;
  }
  .optinpointf .optinpointf-close-button:hover {
    background-color: #fff;
    -ms-transform: rotate(225deg);
    -webkit-transform: rotate(225deg);
    -moz-transform: rotate(225deg);
    -o-transform: rotate(225deg);
    transform: rotate(225deg);
  }

.optinpointf .optinpointf-close-button:hover::after {
      background-color: #7e7e7e;
    }
.optinpointf .optinpointf-close-button:hover::before {
      background-color: #7e7e7e;
    }

.optinpointf .optinpoint-signalc {
height: 40px;
  margin-top: 10px;
  text-align: center;
}
.optinpointf .optinpoint-signal {
display: none;
}
#optinpointf.signalshow .optinpoint-signal {
  display: inline-block;
}
@media only screen and (max-width : 1024px) {
.optinpointf{
	display: none;
}
}
</style>
<div class="optinpointf-tray optinpointcss oppointselector oppotb_right" id="optinpointf">
<div class="optinpoint-reset optinpointf optinpointf-close">
  <div class="optinpointf-head">
<?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
    <div class="optinpointf-close-button"></div>
  </div>
  <div class="optinpointf-cont">
<?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>
  <form action="" method="post">
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
  'icon' => false,
  'type' => 1
  );
$this->stfield($form['fields'],$set);
?>
                        <div class="optinpoint-subs-button<?php echo (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')? ' subsicon' : '';?>"></div>
   <div class="optinpoint-signalc"><div class="optinpoint-signal"><?php
            echo $this->getSpin('1','optinpointf',isset($theme["spinner_c"])?$theme["spinner_c"]:'#fff');?></div></div>
	</form>
	<div class="optinpoint-feedback" oppoerr="gen"></div>
  </div>
</div>
</div>