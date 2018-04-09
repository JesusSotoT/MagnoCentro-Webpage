<?php
$topid = 'optinpointt' . (isset($topbar_scode)?$topbar_scode:'');
?>
<style type="text/css">
.optinpointt{
position:fixed;z-index: 99999;
display: block;
width: 100%;
height: 50px;
background: #27313B;
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
.optinpointt div{
position: relative;
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
  text-align: center;
}
.optinpointt h3{
display: inline-block;
font-size: 18px;
color: #F4233C;
line-height: 30px;
  white-space: nowrap;
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
.optinpointt .formbox > div:first-of-type{
  width: 65%;
  float: left;
}
.optinpointt .formbox > div:first-of-type + div{
  width: 35%;
  float: left;
}
.optinpointt .formbox input[type="text"]{
border-radius: 3px 0 0 3px;
}
.optinpointt .optinpoint-field{
position: relative;
width:<?php echo ((count($fields) > 1)? 31 : 50); ?>%;
margin: 0 10px;
display: inline-block;
vertical-align: top;
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
.optinpointt .oppo-ficon input[type="text"],
.optinpointt .oppo-ficon input[type="text"] ~ .inputlabel{
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
    echo '.optinpointt .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($fi,15,$col).' no-repeat center}';
}
?>
.optinpointt .optinpoint-field select,
.optinpointt input[type="text"]{
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
right: 0;
pointer-events: none;
width: 100%;
line-height: 35px;
text-overflow: ellipsis;
color: rgba(0,0,0,0.6);
font-size: 14px;
overflow: hidden;
font-weight:500;
padding: 0 10px;
text-align: left;
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
  text-align: left;
  line-height: 10px;
pointer-events: none;
  margin-bottom: -10px;
  font-size: 10px;
  color: red;
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
border-radius: 0 3px 3px 0;
display:block;
width: 100%;
height:35px;
line-height: 32px;
color:#fff;
text-shadow:none;
font-size: 17px;
border: 1px solid #FA0B38;
background-color: #FF1F43;
text-align: center;
cursor: pointer;
position: absolute;
top: 0;
left: 0;
position: relative;
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
}
.optinpointt .optinpoint-subs-button:hover{
background-color: #FA0B38;
<?php if(isset($theme["button_fch"])){
echo 'color:'.$theme["button_fch"].';';
}
if(isset($theme["button_bch"])){
echo 'background-color:'.$theme["button_bch"].';';
}?>
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
     echo 'background: '.$this->getIcon($theme["button_i"],15,$col).' no-repeat center;';
  }
  ?>
}
.optinpointt.signalshow .optinpoint-subs-button::after,
.optinpointt.signalshow .optinpoint-subs-button::before{
  display: none;
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
right: 10px;
top:5px;
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
  z-index: 1;
    top: 4px;
  left: calc(50% - 20px);
  position: absolute;
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
#optinpointt{display: none;}
}
<?php if(isset($topbar_scode)){?>
@media only screen and (max-width : 650px) {
#optinpointt<?php echo $topbar_scode;?> .optinpoint-field{width: 100%;margin-bottom: 10px;}
#optinpointt<?php echo $topbar_scode;?> .optinpointt-cont{flex-direction:column;}
#optinpointt<?php echo $topbar_scode;?> .optinpoint-signalc {position: relative;top: 0;margin: 0 auto;}
}
<?php } ?>
</style>
<div class="optinpoint-reset optinpointt optinpointcss<?php echo (!isset($topbar_scode)?' optinpointt-close':'');?> oppointselector oppotb_top" id="<?php echo $topid;?>">
    <form action="" method="post">
    <div class="optinpointt-cont">
  <?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>'; ?>
<input type="hidden" name="action" value="optinpoint_lite_add_email_ajax"/>
<input type="hidden" name="oppoform" value="<?php echo $form['id'];?>"/>
<?php $set = array(
'icon' => true,
'bui' => (isset($theme['button_i']) && $theme['button_i'] != 'inone' && $theme['button_i'] != 'idef')?true:false,
'type' => 2,
'sig' => $this->getSpin('8',$topid,isset($theme["spinner_c"])?$theme["spinner_c"]:'#000')
);
$this->stfield($fields,$set);
?>

                <div style="clear:both"></div></div>
    </form>
    <div class="optinpoint-feedback" oppoerr="gen"></div>
    <div class="optinpointt-close-button"></div>
</div>