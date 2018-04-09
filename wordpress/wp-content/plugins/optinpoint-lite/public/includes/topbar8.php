<?php
$topid = 'optinpointt' . (isset($topbar_scode)?$topbar_scode:'');
?>
<style type="text/css">
.optinpointt{
position:fixed;z-index: 99999;
display: block;
width: 100%;
height: 50px;
background: #262E43;
box-shadow: 0 0 20px rgba(0,0,0,.2);
left: 0;
text-align: center;
-webkit-transition: margin 0.3s cubic-bezier(0.785, 0.135, 0.15, 0.86),-webkit-transform 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
transition: margin 0.3s cubic-bezier(0.785, 0.135, 0.15, 0.86),transform 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);

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
.optinpointt.oppotb_top.optinpointt-close{
margin:-50px 0 0 ;
}
.optinpointt.oppotb_bot.optinpointt-close{
margin: 0 0 -50px;
}

.optinpointt .optinpointt-cont{
  display: block;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 75%;
  margin:0 auto;
  padding: 7px;
}

.optinpointt h3{
display: inline-block;
font-size: 18px;
color: #fff;
  white-space: nowrap;
line-height: 30px;
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
vertical-align: top;
text-align: left;
}
.optinpointt .inputicon{
display: none;
}
.optinpointt .oppo-ficon .inputicon {
display: block;
width: 35px;
height: 35px;
position: absolute;
top: 0;
left: 0;
pointer-events: none;

}
.optinpointt .optinpoint-field.oppo-ficon input[type="text"],
.optinpointt .optinpoint-field.oppo-ficon .inputlabel{
  padding-left: 35px;

}
<?php
$col = ((isset($theme["inico_c"]))? $theme["inico_c"] : '#888');
foreach ($fields as $f) {
  if($f['icon'] != 'idef' && $f['icon'] != 'inone')
    echo '.optinpointt .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($f['icon'],25,$col).' no-repeat center}';
}
?>
.optinpointt .optinpoint-field select,
.optinpointt input[type="text"]{
text-align: left;
height: 35px;
width: 100%;
background: #fff;
padding:  0 10px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
color: #353535;
font-size: 17px;
outline:0;
display: block;
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


.optinpointt .optinpoint-field.optinpoint-drop:before{
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
.optinpointt input[type="text"] ~ .inputlabel{
position: absolute;
top: 0;
left: 0;
text-overflow: ellipsis;
right: 0;
pointer-events: none;
width: 100%;
overflow: hidden;
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
  margin-top: -10px;
pointer-events: none;
  font-size: 10px;
  color: red;
  position: absolute;
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
.optinpointt div.optinpoint-subs-button{
display:inline-block;
width: 100%;
height:35px;
line-height: 35px;
color:#fff;
text-shadow:none;
font-size: 17px;
border: 1px solid #50B059;
background-color: #73C557;
text-align: center;
cursor: pointer;
border-radius: 3px;
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
.optinpointt .optinpoint-subs-button::before{
  content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
  display: block;
  white-space: nowrap;
}
.optinpointt .optinpoint-subs-button:hover{
background-color: #50B059;
<?php if(isset($theme["button_fch"])){
echo 'color:'.$theme["button_fch"].';';
}
if(isset($theme["button_bch"])){
echo 'background-color:'.$theme["button_bch"].';';
}?>
}
.optinpointt .optinpoint-subsc{
  position: relative;
  width: 21%;
  display: inline-block;
}
.optinpointt .optinpoint-subs-button.subsicon:before{
padding-left: 35px;

}
.optinpointt .optinpoint-subs-button.subsicon::after{
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
     echo 'background: '.$this->getIcon($theme["button_i"],25,$col).' no-repeat center;';
  }
  ?>
}
.optinpointt .optinpoint-feedback{
position: absolute;
bottom: 0;
font-size: 10px;
text-align: center;
color: #ccc;
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
.optinpointt .optinpoint-feedback.optinpoint-done:before{
content:<?=$this->getIcon('ch1',15,'#fff');?>;
width: 40px;
height: 40px;
border-radius: 20px;
line-height: 46px;
display: inline-block;
position: relative;
float: left;
margin: 5px 20px 0 0;
background-color: #01E169;
}
.optinpointt .optinpoint-feedback.optinpoint-done{
line-height: 50px;
font-size: 15px;
position: relative;
display: inline-block;
width: auto;
}
.optinpointt .optinpointt-close-button {
display: inline-block;
width: 2em;
height: 2em;
line-height: 2em;
right: 10px;
top:10px;
position: absolute;
cursor:pointer;
}

.optinpointt .optinpointt-close-button::before {
    content: "\00D7";
    font-size: 25px;
    font-weight: 100;
    color: #959595;
  }
.optinpointt .optinpointt-close-button:hover:before {
    color: #000;
}

.optinpointt .optinpoint-signal {
display: none;
position: absolute;
top: 3px;
right: 2px;
-webkit-transform: scale(0.5);
-ms-transform: scale(0.5);
transform: scale(0.5);
}
.optinpointt.signalshow .optinpoint-signal {
  display: inline-block;
}
@media only screen and (max-width : 1200px) {
#optinpointt h3{font-size: 13px;}
}
@media only screen and (max-width : 1024px) {
#optinpointt{
    display: none;
}
}
<?php if(isset($topbar_scode)){?>
#optinpointt<?php echo $topbar_scode;?> .optinpoint-signalc {top: calc(50% - 14px);right: 0;width: 40px;}
@media only screen and (min-width : 650px) {
#optinpointt<?php echo $topbar_scode;?> .optinpoint-signal {-webkit-transform: scale(0.6);transform: scale(0.6);-webkit-transform-origin: left;transform-origin: left;}
}
@media only screen and (max-width : 650px) {
#optinpointt<?php echo $topbar_scode;?> .optinpoint-field,#optinpointt<?php echo $topbar_scode;?> .optinpoint-subsc{width: 100%;margin-bottom: 10px;}
#optinpointt<?php echo $topbar_scode;?> .optinpointt-cont{flex-direction:column;}
#optinpointt<?php echo $topbar_scode;?> .optinpoint-signalc {position: relative;top: 0;margin: 0 auto;}
}
<?php } ?>
</style>
<div class="optinpoint-reset optinpointt optinpointcss<?php echo (!isset($topbar_scode)?' optinpointt-close':'');?> oppointselector oppotb_top">
    <form action="" method="post">
    <div class="optinpointt-cont">
  <?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>'; ?>
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
  'icon' => false,
  'type' => 1
  );
$this->stfield($fields,$set);
?>
              <div class="optinpoint-subsc">
                <div class="optinpoint-subs-button<?php echo (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')? ' subsicon' : '';?>"></div>
          <div class="optinpoint-signal"><?php
      echo $this->getSpin('3',$topid,isset($theme["spinner_c"])?$theme["spinner_c"]:'#000');?></div>
      </div>
     </div>
    </form>
    <div class="optinpoint-feedback" oppoerr="gen"></div>
    <div class="optinpointt-close-button"></div>
</div>