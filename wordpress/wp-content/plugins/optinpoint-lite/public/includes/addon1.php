<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
$this->social=true;
?>
 <style type="text/css">
.optinpointb {
width: 100%;
padding:10px;
background: #fff;
display:none;
<?php  if(isset($theme["bg_c"])){
    echo 'background-color:'.$theme["bg_c"].';';
}
$bc='#EDEDED';
$bw=1;
if(isset($theme["addon_bor_c"]))$bc = $theme["addon_bor_c"];
if(isset($theme["addon_bor_w"]))$bw = $theme["addon_bor_w"];
  echo 'border: '.$bc.' solid '.$bw.'px;';
?>
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
}
.optinpointb .optinpoint-leftpane{
display: inline-block;
float: left;
<?php
        if(isset($theme["addon_dissoc"])){
          echo 'display:none;';
        }?>
}
.optinpointb form{
  display: inline-block;
  padding: 0 20px;
  width: calc(100% - 160px);
}
.optinpointb .optinpoint-cont{
  margin-top: 20px;
}
.optinpointb h3{
  font-size: 18px;
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
.optinpointb .optinpoint_para,.optinpointb .optinpoint_para * {
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
  echo 'font-family:'.$theme["msg_f"]['f'].';';
}if(isset($theme["msg_f"]['s'])){
    echo 'font-size:'.$theme["msg_f"]['s'].'px;';
}?>
}

.optinpointb  .optinpoint-field{
position: relative;
width:100%;
margin: 0 auto 12px auto;
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
width: 45px;
height: 45px;
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
.optinpointb .oppo-ficon  input[type="text"] ~ .inputlabel{
  padding-left: 45px;
  <?php
if(isset($theme["tbox_h"])){
  echo 'padding-left:'.$theme["tbox_h"].'px;';
  }?>
}
<?php
$col = ((isset($theme["inico_c"]))? $theme["inico_c"] : '#888');
foreach ($form['fields'] as $f) {
  if($f['icon'] != 'idef' && $f['icon'] != 'inone')
    echo '.optinpointb .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($f['icon'],30,$col).' no-repeat center}';
}
?>
.optinpointb .optinpoint-field textarea,
.optinpointb .optinpoint-field select,
.optinpointb input[type="text"]{
width: 100%;
height: 45px;
background: #f8fafa;
padding: 0 20px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-ms-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;
border: 1px solid #e4e9e9;
color: #353535;
font-size: 16px;
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
width: 45px;
height: 45px;
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
line-height: 45px;
padding: 0 20px;
color: rgba(0,0,0,0.6);
font-size: 16px;
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
.optinpointb input[type="text"]:valid + .inputlabel{
display: none;
}
.optinpointb select.oppoerror,
.optinpointb input[type="text"].oppoerror{
  border-color: red;
}
.optinpointb .optinpoint-check *,
.optinpointb .optinpoint-radio *{
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
  line-height: 24px;
}

.optinpointb .optinpoint-item span:before,
.optinpointb .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 18px;
  height: 18px;
  left: 0;
  top: 2px;
  position: absolute;
}
.optinpointb .optinpoint-item span:before {
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
.optinpointb .optinpoint-item input[type='checkbox'] + span:before {
border-radius: 3px;
}
.optinpointb .optinpoint-item input[type='checkbox'] + span:hover:after, .optinpointb input[type='checkbox']:checked + span:after {
  content:'';
  background: no-repeat center;
background-image: <?php
        $tfi='ch6';

        $tfc='#000';
        if(isset($theme["check_ic"])){$tfc=$theme["check_ic"];}
        echo $this->getIcon($tfi,15,$tfc);?>;
}
.optinpointb .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
.optinpointb .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 16px;
height: 16px;
top: 4px;
}
.optinpointb input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 12px;
height: 12px;
top: 6px;
left: 2px;
border-radius: 50%;
}
.optinpointb .oppoinfierr{
  display: block;
  height: 12px;
  line-height: 12px;
  margin-bottom: -12px;
  font-size: 11px;
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
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
-ms-border-radius: 3px;
-o-border-radius: 3px;
width: 100%;
padding: 0 22px;
color: #fff;
font-size: 22px;
border: 1px solid #3079ed;
background-color: #4d90fe;
height: 45px;
line-height: 45px;
text-align: center;
cursor: pointer;
margin-bottom: 10px;
position: relative;
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
    }
    if(isset($theme["button_bc"])){
        echo 'background-color:'.$theme["button_bc"].';';
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
.optinpointb .optinpoint-subs-button::before{
content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
<?php if(isset($theme["button_h"])){
      echo 'line-height:'.$theme["button_h"].'px;';
  } ?>
}
.optinpointb .optinpoint-subs-button:hover{
<?php if(isset($theme["button_fch"])){
        echo 'color:'.$theme["button_fch"].';';
    }
    if(isset($theme["button_bch"])){
        echo 'background-color:'.$theme["button_bch"].';';
    } else{ ?>
  background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -mz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
  <?php }?>
}
.optinpointb .optinpoint-subs-button.subsicon:before{
padding-left: 45px;
  <?php
  if(isset($theme["button_w"])){
      echo 'padding-left:'.$theme["button_h"].'px;';
  }
  ?>
}
.optinpointb .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 45px;
width: 45px;
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
     echo 'background: '.$this->getIcon($theme["button_i"],30,$col).' no-repeat center;';
  }
  ?>
}
.optinpointb .optinpoint-social{
display: block;
}
.optinpointb .optinpoint-social::before{
content: '<?php if(isset($theme['soc_head'])) echo $theme['soc_head'];else echo __( 'Subscribe with', 'optinpoint' );?>';
font-size: 20px;
line-height: 30px;
display: block;
text-align: center;
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

.optinpointb .optinpoint-social .optinpoint-soc{
margin: 5px;
cursor: pointer;
width:150px;
height: 35px;
margin-bottom: 5px;
border-radius: 5px;
-webkit-transition: all 0.1s ease;
transition: all 0.1s ease;
-webkit-backface-visibility:hidden;
}
.optinpointb .optinpoint-social .optinpoint-soc:hover{
-webkit-transform:scale(1.1);
-ms-transform:scale(1.1);
transform:scale(1.1);
}
.optinpointb .optinpoint-social .optinpoint-soc::before{
display: block;
margin: 4px 6px;
padding: 0px 5px;
display: inline-block;
border-right: 1px solid #cccccc;
height: 23px;
}

.optinpointb .optinpoint-social .optinpoint-soc::after{
position: absolute;
line-height: 35px;
padding-left: 10px;
color: #fff;
font-size: 14px;
}
.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-fb {
    background: #2d609b;
    <?php if(!isset($settings["fb_api"])){
	echo 'display:none;';
    }?>
}
.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-fb::before {
   content:<?php echo $this->getIcon('fb',25,'#fff');?>
}
.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-gp {
    background: #eb4026;
    <?php if(!isset($settings["gp_api"])){
	echo 'display:none;';
    }?>
}

.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-gp::before {
    content: <?php echo $this->getIcon('gp',25,'#fff');?>
}
.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-ms {
    background: #00BCF2;
    <?php if(!isset($settings["ms_api"])){
  echo 'display:none;';
    }?>
}
.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-ms::before {
    content: <?php echo $this->getIcon('ms',25,'#fff');?>
}

.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-fb::after {
    content:"Facebook";
}
.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-gp::after {
    content:"Google Plus";
}
.optinpointb .optinpoint-social .optinpoint-soc.optinpoint-ms::after {
    content:"Outlook";
}

.optinpointb .optinpoint-signalc {
height: 40px;
  margin: 10px;
  text-align: center;
}
.optinpointb .optinpoint-signal {
display: none;
}
.optinpointb.signalshow .optinpoint-signal {
  display: inline-block;
}
.optinpointb .optinpoint-feedback{
margin: -40px 0 22px;
position: relative;
font-size: 16px;
min-height: 16px;
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
  clear: both;
  margin: 0;
}
@media only screen
and (max-width : 900px) {
.optinpointb form{
  clear:both;
  width: 100%;
}
.optinpointb .optinpoint-leftpane{width: 100%;}
.optinpointb .optinpoint-social .optinpoint-soc{margin:5px auto;}
}

.optinpointb .optinpoint-tag{
text-align: center;
position: relative;
margin-top: 5px;
}
.optinpointb .optinpoint-tag,
.optinpointb .optinpoint-tag *{
color:#000;
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
        if(isset($theme["tag_fs"])){$tfs=$theme["tag_fs"];}
        $tfc='#000';
        if(isset($theme["tag_fc"])){$tfc=$theme["tag_fc"];}
        echo $this->getIcon('lock1',$tfs,$tfc);?>;
   margin: 5px;
   top: 1px;
   position:relative;
}
</style>

<div class="optinpoint-reset oppointselector optinpointb optinpointcss" id="optinpointb">
<?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
<?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>
  <div class="optinpoint-cont">
	    <div class="optinpoint-leftpane">
            <div class="optinpoint-social">
                <div class="optinpoint-soc optinpoint-fb"></div>
                <div class="optinpoint-soc optinpoint-gp"></div>
                <div class="optinpoint-soc optinpoint-ms"></div>
            </div>
        </div>
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
                <?php if(isset($theme['tag_en'])){
              if(isset($theme['tag'])) $tagtxt= $theme['tag'];
              else $tagtxt=__( 'Secure and Spam free...', 'optinpoint' );
              echo '<div class="optinpoint-tag">'.$tagtxt.'</div>';
              }?>
			<div class="optinpoint-signalc"><div class="optinpoint-signal"><?php
            echo $this->getSpin('7','optinpointb',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000');?></div></div>
		</form>
    	<div class="optinpoint-feedback" oppoerr="gen"></div>
    </div> <div style="clear:both"></div>
	</div>	
