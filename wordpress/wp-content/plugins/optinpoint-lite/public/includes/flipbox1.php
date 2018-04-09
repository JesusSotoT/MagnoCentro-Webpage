<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
$this->social=true;
?>
<style type="text/css">
.optinpointf{
  position:fixed;z-index: 99999;
  display: inline-block;
  width: 320px;
background: #fff;
box-shadow: 0 0 20px rgba(0,0,0,.2);
overflow: hidden;
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
}
.optinpointf h3{
  display: block;
  width: 95%;
    font-size:16px;
    line-height: 35px;
    font-weight:400;
    margin: 10px;
    text-align: center;
    float: left;
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
  font-size: 14px;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
echo 'font-family:'.$theme["msg_f"]['f'].';';
}?>
}

.optinpointf .optinpointf-cont{
  padding:10px;
  text-align: center;
  max-height: 500px;
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
  if($f['icon'] != 'idef' && $f['icon'] != 'inone')
    echo '.optinpointf .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($f['icon'],25,$col).' no-repeat center}';
}
?>
.optinpointf .optinpoint-field textarea,
.optinpointf .optinpoint-field select,
.optinpointf input[type="text"]{
    display: inline-block;
border-radius: 5px;
width: 100%;
background: #f8fafa;
padding: 0 5%;
border: 1px solid #e4e9e9;
height:35px;
color: #353535;
outline:0;
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
font-size: 16px;
padding: 0 5%;
font-weight:500;
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
  line-height: 24px;
}

.optinpointf .optinpoint-item span:before,
.optinpointf .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 18px;
  height: 18px;
  left: 0;
  top: 2px;
  position: absolute;
}
.optinpointf .optinpoint-item span:before {
box-shadow: 0 0 1px 1px #ccc;
background-color: #fafafa;
transition: all 0.3s ease-in-out;
border-radius: 3px;
<?php
  if(isset($theme["check_borc"])){
      echo 'border: 1px solid'.$theme["check_borc"].';';
  }if(isset($theme["check_c"]))echo 'background: '.$theme["check_c"].';';
?>
}
.optinpointf .optinpoint-item input[type='checkbox'] + span:before {
border-radius: 3px;
}
.optinpointf .optinpoint-item input[type='checkbox'] + span:hover:after, .optinpointf input[type='checkbox']:checked + span:after {
  content:'';
  background: no-repeat center;
background-image: <?php
        $tfi='ch6';

        $tfc='#000';
        if(isset($theme["check_ic"])){$tfc=$theme["check_ic"];}
        echo $this->getIcon($tfi,15,$tfc);?>;
}
.optinpointf .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
.optinpointf .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 16px;
height: 16px;
top: 4px;
}
.optinpointf input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 12px;
height: 12px;
top: 6px;
left: 2px;
border-radius: 50%;
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
.optinpointf input[type="text"]:focus {
    <?php
        if(isset($theme["tbox_bor"]) && isset($theme["tbox_borc"])){
            echo ' border:'.$theme["tbox_bor"].'px solid '.$theme["tbox_borc"].';';
        } ?>
}
.optinpointf .optinpoint-subs-button{
   -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
  display:inline-block;
  text-align: center;
  width: 100%;
    height:36px;
    line-height: 36px;
    border: 1px solid #3079ed;
   background-color: #4d90fe;
  color:#fff;
    cursor:pointer;
    text-shadow:none;
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
           background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -mz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
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
}
.optinpointf .optinpoint-subs-button:hover{
    background:#8BD331;
  color:#fff;
    <?php
        if(isset($theme["button_bch"])){
            echo 'background:'.$theme["button_bch"].';';
        }
        else{ ?>
          background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -mz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
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
.optinpointf .optinpoint-feedback{
margin: -40px 0 22px;
position: relative;
height:14px;
width: 100%;
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
position: relative;
margin-top: 25px;
font-size: 16px;
}

.optinpointf .optinpointf-close-button {
  display: inline-block;
  width: 17px;
  height: 30px;
  right: 20px;
  top: 10px;
  position: absolute;
  cursor: pointer;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.optinpointf .optinpointf-close-button::before {
  content: "\00D7";
  font-size: 30px;
  font-weight: 100;
  color: #959595;
}
.optinpointf .optinpointf-close-button:hover:before {
    color: #000;
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
            echo $this->getSpin('7','optinpointf',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000');?></div></div>
  </form>
  <div class="optinpoint-feedback" oppoerr="gen"></div>
  </div>
  </div>
</div>