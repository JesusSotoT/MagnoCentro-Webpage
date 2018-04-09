<?php
$topid = 'optinpointt' . (isset($topbar_scode)?$topbar_scode:'');
?>
<style type="text/css">
.optinpointt{
	position:fixed;z-index: 99999;
	display: block;
	width: 100%;
	height: 50px;
	background: #000;
left: 0;
  <?php
        if(isset($theme["bg_c"])){
            echo 'background:'.$theme["bg_c"].';';
        }
    ?>
}
.optinpointt.oppotb_top{
top:0;
}
.optinpointt.oppotb_bot{
bottom:0;
}
.optinpointt.optinpointt-close{
visibility: hidden;
}
.optinpointt .optinpointt-cont{
  display: block;
  display: flex;
  justify-content: center;
  align-items: center;
  margin:0 auto;
  width: 75%;
  padding: 10px;
  text-align: center;
}
.optinpointt h3{
  font-size: 18px;
  display: inline-block;
  line-height: 30px;
  color: #fff;
  white-space: nowrap;
  text-align: right;
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

.optinpointt .optinpoint-field{
position: relative;
width:<?php echo ((count($fields) > 1)? 21 : 30); ?>%;
margin: 0 10px;
display: inline-block;
}
.optinpointt .inputicon{
display: none;
}
.optinpointt .oppo-ficon .inputicon {
display: block;
width: 30px;
height: 30px;
position: absolute;
top: 0;
left: 0;
pointer-events: none;
}
.optinpointt .oppo-ficon input[type="text"],
.optinpointt .oppo-ficon .inputlabel{
  padding-left: 30px;
}
<?php
$col = ((isset($theme["inico_c"]))? $theme["inico_c"] : '#888');
foreach ($form['fields'] as $f) {
  if($f['icon'] != 'idef' && $f['icon'] != 'inone')
    echo '.optinpointt .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($f['icon'],20,$col).' no-repeat center}';
}
?>
.optinpointt .optinpoint-field select,
.optinpointt input[type="text"]{
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


.optinpointt .optinpoint-field.optinpoint-drop:before{
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
.optinpointt input[type="text"] ~ .inputlabel{
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
overflow: hidden;
white-space: nowrap;
text-overflow: ellipsis;
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
.optinpointt input[type="text"]:valid + .inputlabel{
display: none;
}
.optinpointt select.oppoerror,
.optinpointt input[type="text"].oppoerror{
  border-color: red;
}
.optinpointt .oppoinfierr{
  display: block;
  height: 10px;
  line-height: 10px;
  margin-bottom: -10px;
  font-size: 10px;
  color: red;
  position: absolute;
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
.optinpointt .optinpoint-subs-button{
display:inline-block;
text-align: center;
width: <?php echo ((count($fields) > 1)? 23 : 33); ?>%;
height:30px;
line-height: 28px;
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
.optinpointt .optinpoint-subs-button::before{
  content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
   display: block;
  position: relative;
  line-height: 28px;
}
.optinpointt .optinpoint-subs-button:hover{
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
.optinpointt .optinpoint-subs-button.subsicon:before{
padding-left: 30px;

}
.optinpointt .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 30px;
width: 30px;
top: 0;
left: 0;
pointer-events: none;
  <?php

  if($theme["button_i"] != 'inone' && $theme["button_i"] != 'idef'){
    $col = ((isset($theme["button_fc"]))? $theme["button_fc"] : '#fff');
     echo 'background: '.$this->getIcon($theme["button_i"],20,$col).' no-repeat center;';
  }
  ?>
}
.optinpointt .optinpoint-feedback{
position: absolute;
bottom: 0;
color: #fff;
font-size: 10px;
text-align: center;
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
.optinpointt .optinpoint-feedback.optinpoint-done{
  line-height: 50px;
  font-size: 20px;
  top:0;height: auto;
}
.optinpointt .optinpointt-close-button {
display: inline-block;
width: 2em;
height: 2em;
right: 10px;
top:10px;
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


.optinpointt .optinpointt-close-button::before {
    content: "";
    display: block;
    position: absolute;
    background-color: #000;
    width: 80%;
    height: 6%;
    left: 10%;
    top: 47%;
  }

  .optinpointt .optinpointt-close-button::after {
    content: "";
    display: block;
    position: absolute;
    background-color: #000;
    width: 6%;
    height: 80%;
    left: 47%;
    top: 10%;
  }
  .optinpointt .optinpointt-close-button:hover {
    background-color: #fff;
    -ms-transform: rotate(225deg);
    -webkit-transform: rotate(225deg);
    -moz-transform: rotate(225deg);
    -o-transform: rotate(225deg);
    transform: rotate(225deg);
  }

.optinpointt .optinpointt-close-button:hover::after {
  background-color: #7e7e7e;
}
.optinpointt .optinpointt-close-button:hover::before {
  background-color: #7e7e7e;
}

.optinpointt .optinpoint-signalc {
height: 40px;
width: 40px;
top: 8px;
right: 60px;
position: absolute;
}

.optinpointt .optinpoint-signal {
display: none;
}
.optinpointt.signalshow .optinpoint-signal {
  display: inline-block;
}
@media only screen and (max-width : 1200px) {
#optinpointt h3{font-size: 13px;}
}
@media only screen and (max-width : 1024px) {
#optinpointt{display: none;}
}
<?php if(isset($topbar_scode)){?>
#optinpointt<?php echo $topbar_scode;?> .optinpoint-signalc {top: calc(50% - 14px);right: 0;width: 40px;}
@media only screen and (min-width : 650px) {
#optinpointt<?php echo $topbar_scode;?> .optinpoint-signal {-webkit-transform: scale(0.6);transform: scale(0.6);-webkit-transform-origin: left;transform-origin: left;}
}
@media only screen and (max-width : 650px) {
#optinpointt<?php echo $topbar_scode;?> .optinpoint-field,#optinpointt<?php echo $topbar_scode;?> .optinpoint-subs-button{width: 100%;margin-bottom: 10px;}
#optinpointt<?php echo $topbar_scode;?> .optinpointt-cont{flex-direction:column;}
#optinpointt<?php echo $topbar_scode;?> .optinpoint-signalc {position: relative;top: 0;margin: 0 auto;}
}
<?php } ?>
</style>

<div class="optinpoint-reset optinpointt optinpointcss<?php echo (!isset($topbar_scode)?' optinpointt-close':'');?> oppointselector oppotb_top">
	<form action="" method="post">
  <div class="optinpointt-cont">
<?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
  'icon' => false,
  'type' => 1
  );
$this->stfield($fields,$set);
?>

  <div class="optinpoint-subs-button<?php echo (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')? ' subsicon' : '';?>"></div>
    </div>
   <div class="optinpoint-signalc"><div class="optinpoint-signal"><?php
            echo $this->getSpin('1',$topid,isset($theme["spinner_c"])?$theme["spinner_c"]:'#fff');?></div></div>

	</form>
	<div class="optinpoint-feedback" oppoerr="gen"></div>
  <div class="optinpointt-close-button"></div>
</div>