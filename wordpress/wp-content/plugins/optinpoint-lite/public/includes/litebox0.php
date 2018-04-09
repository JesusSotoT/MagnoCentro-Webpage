<?php
$theme['msg'] = htmlspecialchars_decode($theme['msg']);
?><style>
.optinpoint-overlay-bg.oppointselector {
	display: none;
	top: 0;
	left: 0;
	height:100%;
	width: 100%;
	cursor: pointer;
	z-index: 999999;
	background: #000;
	background: rgba(0,0,0,0.90);
	<?php  if(isset($theme["lite_bg_op"])){
				echo 'background:rgba(0,0,0,'.($theme["lite_bg_op"]/100).');';
			}?>
	cursor: default;
	position: fixed!important;
}

.optinpoint-overlay-bg .optinpoint-maina{
-webkit-transform: translate(0,0);
		height:100%;}
.optinpoint-overlay-bg #optinpoint-main {
		position: absolute;
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
-moz-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
-o-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
width: 100%;
}

.optinpoint-overlay-bg .optinpoint-wrapper {
	width:80%;
	max-width:780px;
	min-width:320px;
	margin:0 auto;
}

.optinpoint-overlay-bg #optinpoint-newsletterform {
	width:100%;
	display: block;
	text-align: center;
	letter-spacing: 1px;
}

.optinpoint-overlay-bg #optinpoint-newsletterform #optinpoint {
		padding: 50px 40px;
}

#optinpoint h3 {
	display: block;
	font-size:26px;
	font-weight:400;
	line-height:1.2;
	color:#fff;
	text-align: center;
	padding-bottom:20px;
	margin: 0 auto 30px auto;
	border-bottom:1px solid #fff;
	width:60%;
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
margin-bottom:25px;
}
#optinpoint .optinpoint_para,#optinpoint .optinpoint_para * {
	font-size:14px;
	line-height:26px;
	color:#fff;
	<?php
			if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
				echo 'font-family:'.$theme["msg_f"]['f'].';';
			}
			if(isset($theme["msg_f"]['s'])){
					echo 'font-size:'.$theme["msg_f"]['s'].'px;';
			}
	?>
}

#optinpoint form {
	position: relative;
	width:55%;
	margin: 0 auto;
}

#optinpoint  .optinpoint-field{
position: relative;
margin-bottom: 12px;

<?php
	if(isset($theme["tbox_w"])){
			echo 'width:'.$theme["tbox_w"].'px;';
	}
?>
}
#optinpoint .inputicon{
display: none;
}
#optinpoint .oppo-ficon .inputicon {
display: block;
width: 50px;
height: 50px;
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
#optinpoint .oppo-ficon input[type="text"],
#optinpoint .oppo-ficon .inputlabel{
	padding-left: 50px;
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
		font-size: 16px;
		font-weight:500;
		display: block;
		width:100%;
		height: 50px;
		background:#fff;
		padding: 0;
		color:#888;
		text-align: center;
		border:2px solid #fff;
		outline:0;
		border-radius: 1px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		transition: all 0.5s ease;
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

#optinpoint .optinpoint-field.optinpoint-multidrop select{
  height: 100px;
}
#optinpoint .optinpoint-field.optinpoint-drop:before{
content: '';
width: 50px;
height: 50px;
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
line-height: 50px;
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
#optinpoint input[type="text"]:valid + .inputlabel{
display: none;
}
#optinpoint select.oppoerror,
#optinpoint input[type="text"].oppoerror{
	border-color: red;
}
#optinpoint .optinpoint-field.optinpoint-check,
#optinpoint .optinpoint-field.optinpoint-radio{
  clear: both;
}
#optinpoint .optinpoint-check *,
#optinpoint .optinpoint-radio *{
font-size: 16px;
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
	margin-right: 10px;
  line-height: 20px;
}

#optinpoint .optinpoint-item span:before,
#optinpoint .optinpoint-item span:after {
	content: '';
	display: inline-block;
	width: 18px;
	height: 18px;
	left: 0;
	top: 4px;
	position: absolute;
}

#optinpoint .optinpoint-item span:before {
background-color: #fafafa;
transition: all 0.3s ease-in-out;
border-radius: 3px;
<?php
	if(isset($theme["check_borc"])){
			echo 'border: 1px solid'.$theme["check_borc"].';';
	}
?>
}
#optinpoint .optinpoint-item input[type='checkbox'] + span:before {
border-radius: 3px;
}
#optinpoint .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 12px;
height: 12px;
top: 6px;
left: 4px;
}
#optinpoint .optinpoint-item input:checked + span:before{
	<?php if(isset($theme["check_c"])) $color = $theme["check_c"]; else $color = '#158EC6';
	print_r('box-shadow: inset 0 0 0 10px '.$color.';');?>
}

#optinpoint .optinpoint-item input[type='checkbox'] + span:hover:after, #optinpoint input[type='checkbox']:checked + span:after {
	content:'';
	background: no-repeat center;
background-image: <?php
				$tfi='ch1';
				
				$tfc='#fff';
				if(isset($theme["check_ic"])){$tfc=$theme["check_ic"];}
				echo $this->getIcon($tfi,12,$tfc);?>;
}
#optinpoint .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
background-image:<?php echo $this->getIcon($tfi,12,'#444');?>;
opacity: 0.5;
}

#optinpoint .oppoinfierr{
	display: block;
	height: 12px;
	line-height: 12px;
	margin-bottom: -12px;
	font-size: 11px;
	color: red;
text-align: left;
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
	width:80%;
	height:45px;
		cursor: pointer;
		border:none;
		position: relative;
		margin: 10px auto;
		display: block;
		transition: all 0.5s ease;
		box-shadow:none;
		background: #62bc33;
	color:#fff;
		clear:both;
		text-shadow:none;
		border: 0;
		border-radius: 1px;
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
	background: -moz-linear-gradient(left, #62bc33 0%, #8bd331 100%);
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,#62bc33), color-stop(100%,#8bd331));
	background: -webkit-linear-gradient(left, #62bc33 0%,#8bd331 100%);
	background: -o-linear-gradient(left, #62bc33 0%,#8bd331 100%);
	background: -ms-linear-gradient(left, #62bc33 0%,#8bd331 100%);
	background: linear-gradient(to right, #62bc33 0%,#8bd331 100%);
	<?php }
				if(isset($theme["button_br"])){
						echo 'border-radius:'.$theme["button_br"].'px;';
				}
				if(isset($theme["button_bor"]) && isset($theme["button_borc"])){
						echo ' border:'.$theme["button_bor"].'px solid '.$theme["button_borc"].';';
				}
			?>
}
#optinpoint .optinpoint-subs-button::before{
	content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
	display: block;
	position: relative;
	line-height: 45px;
	<?php if(isset($theme["button_h"])){
			echo 'line-height:'.$theme["button_h"].'px;';
	} ?>
}
#optinpoint .optinpoint-subs-button:hover {
		border:none;
		box-shadow:none;
		background:#8BD331;
	color:#fff;
		<?php
				if(isset($theme["button_bch"])){
						echo 'background-color:'.$theme["button_bch"].';';
				}
				else { ?>
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
#optinpoint .optinpoint-subs-button.subsicon:before{
padding-left: 45px;
	<?php
	if(isset($theme["button_h"])){
			echo 'padding-left:'.$theme["button_h"].'px;';
	}
	?>
}
#optinpoint .optinpoint-subs-button.subsicon::after{
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
		 echo 'background: '.$this->getIcon($theme["button_i"],25,$col).' no-repeat center;';
	}
	?>
}
#optinpoint .optinpoint-feedback {
margin: -40px 0 22px;
		color: #fff;
height: 18px;
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

#optinpoint-main .optinpoint-feedback.optinpoint-done{
margin: 40px;height: auto;
}

.optinpoint-overlay-bg .optinpoint-close-button {
display: inline-block;
	width: 2em;
	height: 2em;
	border: 0.1em solid #7e7e7e;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-msborder-radius: 50%;
	-o-border-radius: 50%;
	border-radius: 50%;
	background-color: #7e7e7e;
	top: 2em;
	right:2em;
	 -moz-transform: rotate(45deg);
	 -o-transform: rotate(45deg);
	 -ms-transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
		transform: rotate(45deg);
		transition: all 0.5s ease;
		position: absolute;
		z-index:9999;
}


.optinpoint-overlay-bg .optinpoint-close-button::before {
		content: "";
		display: block;
		position: absolute;
		background-color: #000;
		width: 80%;
		height: 6%;
		left: 10%;
		top: 47%;
	}

	.optinpoint-overlay-bg .optinpoint-close-button::after {
		content: "";
		display: block;
		position: absolute;
		background-color: #000;
		width: 6%;
		height: 80%;
		left: 47%;
		top: 10%;
	}
	.optinpoint-overlay-bg .optinpoint-close-button:hover {
		background-color: #fff;
		-ms-transform: rotate(225deg);
		-webkit-transform: rotate(225deg);
		-moz-transform: rotate(225deg);
		-o-transform: rotate(225deg);
		transform: rotate(225deg);
	}

.optinpoint-overlay-bg .optinpoint-close-button:hover::after {
			background-color: #7e7e7e;
		}
.optinpoint-overlay-bg .optinpoint-close-button:hover::before {
			background-color: #7e7e7e;
		}
#optinpoint-main .optinpoint-signalc {
height: 40px;
	margin: 10px;
	text-align: center;
}
#optinpoint-main .optinpoint-signal {
display: none;
}
.optinpoint-overlay-bg.signalshow #optinpoint-main .optinpoint-signal {
	display: inline-block;
}
.optinpoint-overlay-bg .optinpoint-footer{
	color: #3c3c3c;
	position: absolute;
	bottom: 15px;
	width: 100%;
	text-align: center;
	text-decoration: none;
}
.optinpoint-overlay-bg .optinpoint-footer a{
	text-decoration: none;
	 color: #3c3c3c;
	 font-family: 'Sacramento', cursive;
	 font-size: 24px;
}
.optinpoint-overlay-bg .optinpoint-tag,
.optinpoint-overlay-bg .optinpoint-tag *{
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
.optinpoint-overlay-bg .optinpoint-tag:before{

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

@media only screen and (max-width:1024px) {

    .optinpoint-overlay-bg .optinpoint-wrapper {
        width:92%;
    }
}

@media only screen and (max-width:769px) {

    .optinpoint-overlay-bg #optinpoint-newsletterform #optinpoint {
        padding: 40px 25px;
    }

    #optinpoint .optinpoint-field {
        margin-bottom:7px;
    }

    .optinpoint-overlay-bg #optinpoint .optinpoint-subs-button,
	.optinpoint-overlay-bg #optinpoint h3 {
        width: 100%;
    }
}

@media only screen and (max-width:600px) {

    #optinpoint form{
        width:100%;
    }

    .optinpoint-overlay-bg #optinpoint h3 {
		margin: 0;
		font-size: 16px;
		padding-bottom: 5px;
    }
    .optinpoint-overlay-bg #optinpoint .optinpoint_para{
      line-height: 15px;
	margin: 0;
	font-size: 11px;
	padding-bottom: 5px;
    }
    #optinpoint input{
      height:20px;
    }
    #optinpoint input[type='text'], #optinpoint input[type='text']+.inputlabel{
		font-size: 12px;
  height: 35px;
  line-height: 35px;
   	}
    #optinpoint .optinpoint-subs-button{
      height:34px;
      font-size: 15px
    }
    #optinpoint .optinpoint-subs-button:before{
      line-height: 34px;
    }
    #optinpoint .optinpoint-item input[type='checkbox'] + label {
    	font-size:12px;
    }
    #optinpoint .optinpoint-item input[type='checkbox'] + label:before, #optinpoint .optinpoint-item input[type='checkbox'] + label:after{
    	width:15px;
    	height:15px;
    }
    #optinpoint .optinpoint-item input[type='checkbox'] + label:hover:after, #optinpoint input[type='checkbox']:checked + label:after{
    	font-size: 12px;
    }
    .optinpoint-overlay-bg .optinpoint-close-button {
      top:1em;
      right:1em;
    }
}
@media only screen and (max-width:420px) {
    .optinpoint-overlay-bg .optinpoint-close-button {
      position: relative;
		display: block;
		left: 45%;
    }
}
@media only screen
and (min-width : 480px)
and (max-width : 650px)
and (orientation : landscape) {
.optinpoint-overlay-bg #optinpoint-main{
  -webkit-transform:scale(0.75) translate(-50%, -50%);
  -moz-transform:scale(0.75) translate(-50%, -50%);
  -ms-transform:scale(0.75) translate(-50%, -50%);
  -o-transform:scale(0.75) translate(-50%, -50%);
  transform:scale(0.75) translate(-50%, -50%);
   -webkit-transform-origin:top left;
  -moz-transform-origin:top left;
  -ms-transform-origin:top left;
  -o-transform-origin:top left;
  transform-origin:top left;
}
}

</style>
<div class="optinpoint-reset optinpoint-overlay-bg optinpointcss oppointselector">
	<div class="optinpoint-maina">
		<div id="optinpoint-main">
			<div class="optinpoint-wrapper <?php echo (isset($settings['lite_behave_anim'])?$settings['lite_behave_anim'].' animated':'');?>" <?php echo (isset($settings['lite_behave_animo'])?'oppoexitanim':'');?>>
				<div id="optinpoint-newsletterform">
					<div class="optinpoint" id="optinpoint">
						<?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
						<?php if(isset($theme['msg'])) echo '<div class="optinpoint_para">'.$theme['msg'].'</div>';?>
						<form action="" method="post" class="optinpoint-mainc">
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
		echo $this->getSpin('1','optinpoint-main',isset($theme["spinner_c"])?$theme["spinner_c"]:'#fff');?></div></div>
							</form>
						<div class="optinpoint-feedback" oppoerr="gen"></div>
				</div>
		</div>
	</div>
</div>
<div class="optinpoint-close-button"></div>

</div>
</div>