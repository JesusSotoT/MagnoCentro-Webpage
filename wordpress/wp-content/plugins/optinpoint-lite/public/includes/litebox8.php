<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
$this->social=true;
?><style type="text/css">
.optinpoint-overlay-bg.oppointselector {
display: none;
top: 0;
left: 0;
height:100%;
width: 100%;
cursor: pointer;
z-index: 999999;
background: #000;
background: rgba(0,0,0,0.40);
<?php  if(isset($theme["lite_bg_op"])){
      echo 'background:rgba(0,0,0,'.($theme["lite_bg_op"]/100).');';
    }?>
cursor: default;
position: fixed!important;
}
.optinpoint-overlay-bg #optinpoint-main *{
 transition: all 0.5s ease;
}
.optinpoint-overlay-bg .optinpoint-mainc,
.optinpoint-overlay-bg .optinpoint-maina{
-webkit-transform: translate(0,0);
    height:100%;}
.optinpoint-overlay-bg #optinpoint-main {
position: absolute;
top: 50%;
left: 50%;
border-radius: 3px;
-webkit-transform: translate(-50%, -50%);
-moz-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
-o-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
width: calc(100% - 20px);
max-width:350px;
background: #262E43;
text-align: center;
<?php  if(isset($theme["bg_c"])){
    echo 'background-color:'.$theme["bg_c"].';';
}?>
}
#optinpoint h3{
line-height: 20px;
margin-top:20px;
color: #fff;
font-size: 20px;
<?php
    if(isset($theme["heading_f"]['f'])){
    array_push($oppo_font, $theme["heading_f"]['f']);
      echo 'font-family:'.$theme["heading_f"]['f'].';';
    }
    if(isset($theme["heading_f"]['s'])){
        echo 'font-size:'.$theme["heading_f"]['s'].'px;';
        echo 'line-height:'.$theme["heading_f"]['s'].'px;';
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
#optinpoint .optinpoint_para{
  margin: 15px 30px 0;
}
#optinpoint .optinpoint_para,#optinpoint .optinpoint_para * {
font-size: 12px;
color: #ADBBE0;
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
  echo 'font-family:'.$theme["msg_f"]['f'].';';
}if(isset($theme["msg_f"]['s'])){
    echo 'font-size:'.$theme["msg_f"]['s'].'px;';
}?>
}

#optinpoint form{
margin-top: 20px;
overflow: hidden;
}
#optinpoint .formbox{
margin: 0 auto;
width: calc(100% - 50px);
}

#optinpoint  .optinpoint-field{
position: relative;
width:100%;
margin: 0 auto 10px auto;
text-align: left;
}
#optinpoint .inputicon{
display: none;
}
#optinpoint .oppo-ficon .inputicon {
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
#optinpoint .optinpoint-field.oppo-ficon input[type="text"],
#optinpoint .optinpoint-field.oppo-ficon .inputlabel{
  padding-left: 40px;
  <?php
if(isset($theme["tbox_h"])){
  echo 'padding-left:'.$theme["tbox_h"].'px;';
  }?>
}
<?php
$col = ((isset($theme["inico_c"]))? $theme["inico_c"] : '#888');
foreach ($form['fields'] as $f) {
  if($f['icon'] != 'idef' && $f['icon'] != 'inone')
    echo '#optinpoint .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($f['icon'],25,$col).' no-repeat center}';
}
?>
#optinpoint .optinpoint-field textarea,
#optinpoint .optinpoint-field select,
#optinpoint input[type="text"]{
text-align: left;
width: 100%;
height: 40px;
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

#optinpoint .optinpoint-field.optinpoint-multidrop select{
  height: 100px;
}

#optinpoint .optinpoint-field.optinpoint-drop:before{
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
#optinpoint input[type="text"] ~ .inputlabel{
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
#optinpoint input[type="text"]:valid + .inputlabel{
display: none;
}
#optinpoint select.oppoerror,
#optinpoint input[type="text"].oppoerror{
  border-color: red;
}
#optinpoint .optinpoint-field.optinpoint-check,
#optinpoint .optinpoint-field.optinpoint-radio{
  text-align: left;
  clear: both;
}
#optinpoint .optinpoint-check *,
#optinpoint .optinpoint-radio *{
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
#optinpoint .optinpoint-item{
  <?php
    $pline = 2;
    if(isset($pline))echo 'width:'.(100/$pline).'%;';
    ?>
  display: inline-block;
  vertical-align: top;
}
#optinpoint .optinpoint-item input {
  display: none;
}
#optinpoint .optinpoint-item span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  padding-left: 35px;
  line-height: 20px;
  margin-right: 10px;
}

#optinpoint .optinpoint-item span:before,
#optinpoint .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 12px;
  height: 12px;
  left: 0;
  top: 4px;
  position: absolute;
}
#optinpoint .optinpoint-item span:before {
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
#optinpoint .optinpoint-item input[type='checkbox'] + span:hover:after, #optinpoint input[type='checkbox']:checked + span:after {
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
#optinpoint .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
#optinpoint .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 12px;
height: 12px;
top: 4px;
}
#optinpoint input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 8px;
height: 8px;
top: 6px;
left: 2px;
border-radius: 50%;
}
#optinpoint .oppoinfierr{
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

#optinpoint .optinpoint-subs-button{
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
width: 100%;
color: #fff;
font-size: 17px;
border: 1px solid #50B059;
background-color: #73C557;
height: 42px;
line-height: 42px;
text-align: center;
cursor: pointer;
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

#optinpoint .optinpoint-subs-button::before{
content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
}
#optinpoint .optinpoint-subs-button:hover{
background-color: #50B059;
<?php if(isset($theme["button_fch"])){
    echo 'color:'.$theme["button_fch"].';';
}
if(isset($theme["button_bch"])){
    echo 'background-color:'.$theme["button_bch"].';';
}?>
}
#optinpoint .optinpoint-subsc{position: relative;max-width: 350px;margin: 0 auto;clear: both;}
#optinpoint .optinpoint-subs-button.subsicon:before{
padding-left: 42px;
  <?php
  if(isset($theme["button_w"])){
      echo 'padding-left:'.$theme["button_h"].'px;';
  }
  ?>
}
#optinpoint .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 42px;
width: 42px;
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
     echo 'background: '.$this->getIcon($theme["button_i"],25,$col).' no-repeat center;';
  }
  ?>
}
#optinpoint-main .optinpoint-signal {
display: none;
position: absolute;
top: 6px;
right: 5px;
-webkit-transform: scale(0.8);
-ms-transform: scale(0.8);
transform: scale(0.8);
}
.optinpoint-overlay-bg.signalshow #optinpoint-main .optinpoint-signal {
  display: inline-block;
}
#optinpoint-main .optinpoint-feedback{
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
#optinpoint-main .optinpoint-tag{
margin: 5px auto;
}
#optinpoint-main .optinpoint-tag,
#optinpoint-main .optinpoint-tag *{
color:#68728D;
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
#optinpoint-main .optinpoint-tag:before{
content:<?php
  $tfs=10;
  if(isset($theme["tag_f"]['s'])){$tfs=$theme["tag_f"]['s'];}
  $tfc='#68728D';
  if(isset($theme["tag_fc"])){$tfc=$theme["tag_fc"];}
  echo $this->getIcon('lock1',$tfs,$tfc);?>;
margin: 5px;
top: 1px;
position:relative;
}

#optinpoint-main .optinpoint-social{
display: inline-block;
margin: 0 auto;
height: 90px;
width: 100%;
background: rgba(75, 75, 75, 0.3);
box-shadow: 0px 1px 1px 1px rgba(116, 116, 116, 0.94);
}
#optinpoint-main .optinpoint-social::before{
content: '<?php if(isset($theme['soc_head'])) echo $theme['soc_head'];else echo __( 'Subscribe with', 'optinpoint' );?>';
font-size: 13px;
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

#optinpoint-main .optinpoint-social .optinpoint-soc{
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
#optinpoint-main .optinpoint-social .optinpoint-soc::before{
content: '';
display: block;
width:40px;
height: 40px;
background: no-repeat center;
}

#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-fb {
<?php if(!isset($settings["fb_api"])){
echo 'display:none;';
}?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-fb::before {
background-image:<?php echo $this->getIcon('fb1',15,'#fff');?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-fb:hover:before {
background-image:<?php echo $this->getIcon('fb1',15,'#2d609b');?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-gp {
<?php if(!isset($settings["gp_api"])){
echo 'display:none;';
}?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-gp:before {
background-image: <?php echo $this->getIcon('gp1',15,'#fff');?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-gp:hover:before {
background-image: <?php echo $this->getIcon('gp1',15,'#eb4026');?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-ms {
<?php if(!isset($settings["ms_api"])){
echo 'display:none;';
}?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-ms::before {
background-image: <?php echo $this->getIcon('ms1',15,'#fff');?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-ms:hover:before {
background-image: <?php echo $this->getIcon('ms1',15,'#00BCF2');?>
}

#optinpoint-main .optinpoint-close-button{
position: absolute;
display: block;
top: 0;
right: 0;
width: 25px;
text-align: center;
cursor: pointer;
}
#optinpoint-main .optinpoint-close-button::before{
content: "\00D7";
font-size: 25px;
line-height: 25px;
font-weight: 100;
color: #999;
opacity: 0.4;
<?php if(isset($theme["lite_close_col"])){
echo 'color:'.$theme["lite_close_col"].';';
}?>
}
#optinpoint-main .optinpoint-close-button:hover:before{
opacity: 1;
}
#optinpoint-main .optinpoint-feedback.optinpoint-done{
font-size: 15px;  top: 0;  margin: 0;height: auto}
#optinpoint-main .optinpoint-feedback.optinpoint-done:before{
content:<?=$this->getIcon('ch1',15,'#fff');?>;
width: 40px;
height: 40px;
border-radius: 20px;
line-height: 46px;
display: block;
background-color: #01E169;
margin: 40px auto;
}

#optinpoint-main.wosoc .optinpoint-social {
display: none;
}
#optinpoint-main.wosoc .optinpoint {
height: 100%;
}
@media only screen
and (min-width : 480px)
and (max-width : 750px)
and (orientation : landscape) {
  .optinpoint-overlay-bg #optinpoint-main{
-webkit-transform:translate(-50%, -50%) scale(0.8);
    -ms-transform:translate(-50%, -50%) scale(0.8);
    transform:translate(-50%, -50%) scale(0.8);
  }
}
</style>

<div class="optinpoint-reset optinpoint-overlay-bg oppointselector optinpointcss">
<div class="optinpoint-maina">
  <div class="optinpoint-mainc">
  <div id="optinpoint-main" class="<?php if(isset($theme['lite_dissoc'])) echo ' wosoc';  ?>">
    <div id="optinpoint-newsletterform" class="optinpoint-wrapper">
      <div class="optinpoint" id="optinpoint">
<?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
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
            echo $this->getSpin('3','optinpoint-main',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000');?></div>

              </div>
              <?php if(isset($theme['tag_en'])){
              if(isset($theme['tag'])) $tagtxt= $theme['tag'];
              else $tagtxt=__( 'Secure and Spam free...', 'optinpoint' );
              echo '<div class="optinpoint-tag">'.$tagtxt.'</div>';
              }?>

            </div>

            </form>
          <div class="optinpoint-feedback" oppoerr="gen"></div>
      </div>
            <div class="optinpoint-social">
                <div class="optinpoint-soc optinpoint-fb"></div>
                <div class="optinpoint-soc optinpoint-gp"></div>
                <div class="optinpoint-soc optinpoint-ms"></div>
            </div>

    </div>
        <div class="optinpoint-close-button"></div>
  </div>
</div>
</div>
</div>