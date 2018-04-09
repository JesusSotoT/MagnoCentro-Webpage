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
-webkit-transform: translate(-50%, -50%);
-moz-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
-o-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
min-width: 700px;
min-height: 350px;
background: #fff;
<?php  if(isset($theme["bg_c"])){
    echo 'background-color:'.$theme["bg_c"].';';
}?>
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
}
#optinpoint-main .optinpoint-leftpane{
width:250px;
position: absolute;
height: 100%;
}
#optinpoint-main #optinpoint-newsletterform{
display: block;
padding: 0 50px 0 250px;
}
#optinpoint-main #optinpoint-newsletterform form{
display: inline-block;
 width: 100%;
-webkit-backface-visibility: hidden;
}
#optinpoint h3{
    line-height: 36px;
    margin: 40px 0 20px;
    color: #454545;
    font-size: 36px;
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
   margin-bottom: 10px;
}
#optinpoint .optinpoint_para,#optinpoint .optinpoint_para * {
<?php if(isset($theme["msg_f"]['f'])){
    array_push($oppo_font, $theme["msg_f"]['f']);
  echo 'font-family:'.$theme["msg_f"]['f'].';';
}if(isset($theme["msg_f"]['s'])){
    echo 'font-size:'.$theme["msg_f"]['s'].'px;';
}?>
}

#optinpoint  .optinpoint-field{
position: relative;
width:100%;
margin: 0 auto 12px auto;
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
width: 62px;
height: 62px;
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
#optinpoint .oppo-ficon input[type="text"] ~ .inputlabel{
  padding-left: 62px;
  <?php
if(isset($theme["tbox_h"])){
  echo 'padding-left:'.$theme["tbox_h"].'px;';
  }?>
}
<?php
$col = ((isset($theme["inico_c"]))? $theme["inico_c"] : '#888');
foreach ($form['fields'] as $f) {
  if($f['icon'] != 'idef' && $f['icon'] != 'inone')
    echo '#optinpoint .oppo-ficon [oppofield="'.$f['id'].'"] ~ .inputicon {background: '.$this->getIcon($f['icon'],30,$col).' no-repeat center}';
}
?>
#optinpoint .optinpoint-field textarea,
#optinpoint .optinpoint-field select,
#optinpoint input[type="text"]{
    width: 100%;
    height: 62px;
    background: #f8fafa;
    padding: 0 20px;
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

#optinpoint .optinpoint-field.optinpoint-multidrop select{
  height: 100px;
}
#optinpoint .optinpoint-field.optinpoint-drop:before{
content: '';
width: 62px;
height: 62px;
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
line-height: 62px;
color: rgba(0,0,0,0.6);
font-size: 16px;
font-weight:500;
padding: 0 20px;
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
#optinpoint .optinpoint-check *,
#optinpoint .optinpoint-radio *{
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
  line-height: 24px;
  margin-right: 10px;
}

#optinpoint .optinpoint-item span:before,
#optinpoint .optinpoint-item span:after {
  content: '';
  display: inline-block;
  width: 18px;
  height: 18px;
  left: 0;
  top: 2px;
  position: absolute;
}
#optinpoint .optinpoint-item span:before {
box-shadow: 0 0 1px 1px #ccc;
background-color: #fafafa;
transition: all 0.3s ease-in-out;
border-radius: 3px;
<?php
  if(isset($theme["check_borc"])){
      echo 'border: 1px solid'.$theme["check_borc"].';';
  }
 if(isset($theme["check_c"]))echo 'background: '.$theme["check_c"].';';?>
}
#optinpoint .optinpoint-item input[type='checkbox'] + span:before {
border-radius: 3px;
}
#optinpoint .optinpoint-item input[type='checkbox'] + span:hover:after, #optinpoint input[type='checkbox']:checked + span:after {
  content:'';
  background: no-repeat center;
background-image: <?php
        $tfi='ch6';

        $tfc='#000';
        if(isset($theme["check_ic"])){$tfc=$theme["check_ic"];}
        echo $this->getIcon($tfi,15,$tfc);?>;
}
#optinpoint .optinpoint-item input[type='checkbox']:not(:checked) + span:hover:after {
opacity: 0.5;
}
#optinpoint .optinpoint-item input[type='radio'] + span:before {
border-radius: 50%;
width: 16px;
height: 16px;
top: 4px;
}
#optinpoint input[type='radio']:checked + span:after {
background: <?php echo $tfc;?>;
width: 12px;
height: 12px;
top: 6px;
left: 2px;
border-radius: 50%;
}
#optinpoint .oppoinfierr{
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
    if(isset($theme["status_fw"]['w'])){
        echo 'font-weight:'.$theme["status_fw"]['w'].';';
    }
    if(isset($theme["status_f"]['st'])){
        echo 'font-style:'.$theme["status_f"]['st'].';';
    }
  ?>
}

#optinpoint .optinpoint-subs-button{
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    width: 100%;
    color: #fff;
    font-size: 28px;
    border: 1px solid #3079ed;
   background-color: #4d90fe;
   height: 56px;
line-height: 56px;
    text-align: center;
    cursor: pointer;
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
#optinpoint .optinpoint-subs-button::before{
content: '<?php if(isset($theme['button'])) echo $theme['button'];else echo __( 'Subscribe', 'optinpoint' );?>';
<?php if(isset($theme["button_h"])){
      echo 'line-height:'.$theme["button_h"].'px;';
  } ?>
}
#optinpoint .optinpoint-subs-button:hover{
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
#optinpoint .optinpoint-subs-button.subsicon:before{
padding-left: 56px;
  <?php
  if(isset($theme["button_w"])){
      echo 'padding-left:'.$theme["button_h"].'px;';
  }
  ?>
}
#optinpoint .optinpoint-subs-button.subsicon::after{
content:'';
position: absolute;
height: 56px;
width: 56px;
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
#optinpoint-main .optinpoint-close-button{
    position: absolute;
   display: block;
top: 0;
right: 0;
margin: 10px 20px;
cursor: pointer;
}
#optinpoint-main .optinpoint-close-button::before{
    content: "\00D7";
    font-size: 30px;
    font-weight: 600;
    color: #959595;
    <?php if(isset($theme["lite_close_col"])){
            echo 'color:'.$theme["lite_close_col"].';';
        }
      ?>
}
#optinpoint-main .optinpoint-close-button:hover:before{
    color: #000;
}

#optinpoint-main .optinpoint-imgcont{
    -webkit-border-radius: 50%;
    -moz-box-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
background: #3079ed;
height: 230px;
width: 230px;
margin: -50px 0px 0 -50px;
border: 20px solid #fff;
display: block;
-webkit-box-sizing: content-box;
-moz-box-sizing: content-box;
box-sizing: content-box;
<?php  if(isset($theme["lite_head_col"])){
    echo 'background:'.$theme["lite_head_col"].';';
}
if(isset($theme["lite_head_col"]))$c= $theme["lite_hshad_col"];
else $c='#979797';
echo '-webkit-box-shadow: 0 3px 15px 2px '.$c.';
-moz-box-shadow: 0 3px 15px 2px '.$c.';
-ms-box-shadow: 0 3px 15px 2px '.$c.';
-o-box-shadow: 0 3px 15px 2px '.$c.';
box-shadow: 0 3px 15px 2px '.$c.';';
?>
}
#optinpoint-main .optinpoint-imgcont::before{
   content: "";
background: #4d90fe;
border: 15px solid #fff;
height: 170px;
width: 170px;
display: block;
-webkit-border-radius: 50%;
-moz-box-border-radius: 50%;
-ms-border-radius: 50%;
-o-border-radius: 50%;
border-radius: 50%;
top: 15px;
left: 15px;
position: relative;
<?php  if(isset($theme["lite_head_col"])){
    echo 'background:'.$theme["lite_head_col"].';';
}?>
background-image:<?php if(isset($theme['lite_img1']))echo 'url('.$theme['lite_img1'].');';else{?>
 url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSIxMjBweCIgaGVpZ2h0PSIxMjBweCIgdmlld0JveD0iMCAwIDEyMCAxMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyMCAxMjAiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIG9wYWNpdHk9IjAuMiIgZmlsbD0iIzAyMDIwMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIGQ9Ik0xMTkuNiw5Mi45YzAsNC40LTMuNiw3LjktOCw3LjloLTEwMWMtNC40LDAtOC0zLjUtOC03LjlWMjQuMmMwLTQuNCwzLjYtNy45LDgtNy45aDEwMWM0LjQsMCw4LDMuNSw4LDcuOVY5Mi45eiIvPjxwYXRoIGZpbGw9IiNDNjMyM0QiIGQ9Ik0xLjgsMjljLTAuMywwLjgtMC40LDEuOC0wLjQsMi43djU4LjljMCw1LjEsNC4xLDkuMiw5LjIsOS4yaDk5YzUuMSwwLDkuMi00LjEsOS4yLTkuMlYzMS43YzAtMC45LTAuMi0xLjgtMC40LTIuN0gxLjh6Ii8+PGxpbmVhckdyYWRpZW50IGlkPSJTVkdJRF8xXyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIyNDIuMTYxNCIgeTE9Ii0yOTcuMDQyIiB4Mj0iMzU1LjE3MzgiIHkyPSItMjk3LjA0MiIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgxIDAgMCAtMSAtMjM3LjYgLTIzOC44NCkiPjxzdG9wICBvZmZzZXQ9IjAiIHN0eWxlPSJzdG9wLWNvbG9yOiNGRkZGRkY7c3RvcC1vcGFjaXR5OjAiLz48c3RvcCAgb2Zmc2V0PSIwLjE0MzQiIHN0eWxlPSJzdG9wLWNvbG9yOiNENEQ0RDQ7c3RvcC1vcGFjaXR5OjAuMTI5MSIvPjxzdG9wICBvZmZzZXQ9IjAuNDYiIHN0eWxlPSJzdG9wLWNvbG9yOiM3QTdBN0E7c3RvcC1vcGFjaXR5OjAuNDE0Ii8+PHN0b3AgIG9mZnNldD0iMC43MTgiIHN0eWxlPSJzdG9wLWNvbG9yOiMzODM4Mzg7c3RvcC1vcGFjaXR5OjAuNjQ2MiIvPjxzdG9wICBvZmZzZXQ9IjAuOTA0MiIgc3R5bGU9InN0b3AtY29sb3I6IzEwMTAxMDtzdG9wLW9wYWNpdHk6MC44MTM4Ii8+PHN0b3AgIG9mZnNldD0iMSIgc3R5bGU9InN0b3AtY29sb3I6IzAwMDAwMDtzdG9wLW9wYWNpdHk6MC45Ii8+PC9saW5lYXJHcmFkaWVudD48cGF0aCBvcGFjaXR5PSI2LjAwMDAwMGUtMDAyIiBmaWxsPSJ1cmwoI1NWR0lEXzFfKSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIGQ9Ik0xMTIuNiw5NC40TDkuNCwyMy40Yy0xLjktMS4zLTMuMy0yLjktNC4yLTQuOGMtMC40LDEuMS0wLjcsMi4zLTAuNywzLjV2NjYuNWMwLDUuMSw0LjEsOS4yLDkuMiw5LjJoOTljMS44LDAsMy40LTAuNSw0LjgtMS40QzExNS45LDk2LjEsMTE0LjEsOTUuNSwxMTIuNiw5NC40eiIvPjxwYXRoIGZpbGw9IiNENkQ2RDYiIGQ9Ik0xMC44LDk2LjNsMTAzLjItNzFjMS45LTEuMywzLjMtMi45LDQuMi00LjhjMC40LDEuMSwwLjcsMi4zLDAuNywzLjV2NjYuNWMwLDUuMS00LjEsOS4yLTkuMiw5LjJoLTk5Yy0xLjgsMC0zLjQtMC41LTQuOC0xLjRDNy41LDk4LjEsOS4zLDk3LjMsMTAuOCw5Ni4zeiIvPjxwYXRoIGZpbGw9IiNFRkVGRUYiIGQ9Ik0xMDguOSw5Ni43TDUuNywyNS43Yy0xLjktMS4zLTMuMy0yLjktNC4yLTQuOGMtMC40LDEuMS0wLjcsMi4zLTAuNywzLjV2NjYuNWMwLDUuMSw0LjEsOS4yLDkuMiw5LjJoOTljMS44LDAsMy40LTAuNSw0LjgtMS40QzExMi4xLDk4LjUsMTEwLjQsOTcuNywxMDguOSw5Ni43eiIvPjxwYXRoIG9wYWNpdHk9IjAuOCIgZmlsbD0iI0U1RTVFNSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIGQ9Ik0xMDguOSw5Ni43TDU5LjYsNjIuN0wxMC4zLDk2LjdjLTEuNSwxLjEtMy4zLDEuOC00LjksMi4xYzEuNCwwLjgsMywxLjQsNC44LDEuNGg0My43aDU1LjJjMS44LDAsMy40LTAuNSw0LjgtMS40QzExMi4xLDk4LjUsMTEwLjQsOTcuNywxMDguOSw5Ni43eiIvPjxwYXRoIG9wYWNpdHk9IjAuMSIgZmlsbD0iIzAyMDIwMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAgICAiIGQ9Ik0xMTguNywyNS4zYzAtMC42LTAuMS0xLjEtMC4yLTEuNmMwLjMtMC4xLDAuNy0wLjIsMS0wLjNjLTAuNC0wLjItMC44LTAuNC0xLjItMC43Yy0xLjEtMy44LTQuNi02LjUtOC43LTYuNUgxMS4yYy00LjMsMC03LjksMi45LTguOCw2LjljLTAuMiwwLjEtMC40LDAuMi0wLjYsMC4zYzAuMiwwLjEsMC4zLDAuMSwwLjQsMC4xYy0wLjEsMC42LTAuMiwxLjItMC4yLDEuN2MwLDAsMC4yLTAuNCwwLjctMS41YzAuOSwxLjgsMi4zLDMuNCw0LjEsNC42bDUzLjUsMzYuNGw1My41LTM2LjNjMS44LTEuMiwzLjItMi45LDQuMS00LjZoMC4xQzExOC41LDI0LjksMTE4LjcsMjUuMywxMTguNywyNS4zeiIvPjxwYXRoIGZpbGw9IiNFOEU4RTgiIGQ9Ik0xMDkuNiwxNC42SDEwLjNjLTUuMSwwLTkuMiw0LjEtOS4yLDkuMmMwLDAsMC4yLTAuNCwwLjctMS41QzIuNywyNC4xLDQuMSwyNS43LDYsMjdsNTMuOSwzNy4ybDU0LTM3LjFjMS45LTEuMywzLjMtMi45LDQuMi00LjhjMC40LDEuMSwwLjcsMS41LDAuNywxLjVDMTE4LjcsMTguOCwxMTQuNiwxNC42LDEwOS42LDE0LjZ6Ii8+PC9nPjwvc3ZnPg==);<?php } ?>
background-repeat: no-repeat;
background-position: center;
box-sizing: content-box;
}

#optinpoint-main .optinpoint-social{
display: block;
bottom: 0;
text-align: center;
position: absolute;
padding: 20px 50px;
}
#optinpoint-main .optinpoint-social::before{
content: '<?php if(isset($theme['soc_head'])) echo $theme['soc_head'];else echo __( 'Subscribe with', 'optinpoint' );?>';
font-size: 20px;
line-height: 30px;
display: block;
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
    width:40px;
    height: 40px;
    -webkit-border-radius: 50%;
    -moz-box-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
    float: left;
    margin: 5px;
    cursor: pointer;
-webkit-transition: all 0.1s ease;
transition: all 0.1s ease;
-webkit-backface-visibility:hidden;
}
#optinpoint-main .optinpoint-social .optinpoint-soc:hover{
-webkit-transform:scale(1.1);
-ms-transform:scale(1.1);
transform:scale(1.1);
}
#optinpoint-main .optinpoint-social .optinpoint-soc::before{
display: block;
margin: 7px;
}

#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-fb {
    background: #2d609b;
    <?php if(!isset($settings["fb_api"])){
	echo 'display:none;';
    }?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-fb::before {
   content:<?php echo $this->getIcon('fb',25,'#fff');?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-gp {
    background: #eb4026;
    <?php if(!isset($settings["gp_api"])){
	echo 'display:none;';
    }?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-gp::before {
    content: <?php echo $this->getIcon('gp',25,'#fff');?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-ms {
    background: #00BCF2;
    <?php if(!isset($settings["ms_api"])){
	echo 'display:none;';
    }?>
}
#optinpoint-main .optinpoint-social .optinpoint-soc.optinpoint-ms::before {
    content: <?php echo $this->getIcon('ms',25,'#fff');?>
}


#optinpoint-main.woleft{
  min-width: inherit;
}
#optinpoint-main.woleft .optinpoint-leftpane{
  display: none;
}
#optinpoint-main.woleft #optinpoint-newsletterform{
  padding-left: 50px;
}

#optinpoint-main.limgonly .optinpoint-social{
  display: none;
}

#optinpoint-main.lsoconly .optinpoint-imgcont{
  display: none;
}
#optinpoint-main.lsoconly .optinpoint-social{
top: 50%;
-webkit-transform: translatey(-50% );
-moz-transform: translatey(-50% );
-ms-transform: translatey(-50% );
-o-transform: translatey(-50% );
transform: translatey(-50% );
text-align: left;
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc {
width:140px;
height: 35px;
margin-bottom: 5px;
border-radius: 5px;
float: none;
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc::before{
padding: 0px 5px;
display: inline-block;
border-right: 1px solid #cccccc;
height: 23px;
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc::after{
position: absolute;
line-height: 35px;
padding-left: 10px;
color: #fff;
font-size: 14px;
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc.optinpoint-fb::after {
    content:"Facebook";
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc.optinpoint-gp::after {
    content:"Google Plus";
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc.optinpoint-ms::after {
    content:"Outlook";
}
#optinpoint-main .optinpoint-signalc {
height: 40px;
  margin: 10px;
  text-align: center;
}
#optinpoint-main .optinpoint-signal {
display: none;
}
.optinpoint-overlay-bg.signalshow .optinpoint-signal {
  display: inline-block;
}
#optinpoint-main .optinpoint-feedback{
margin: -40px 0 22px;
text-align: center;
position: relative;
font-size: 18px;
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
#optinpoint-main .optinpoint-tag{
text-align: center;
position: relative;
margin-top: 5px;
}
#optinpoint-main .optinpoint-tag,
#optinpoint-main .optinpoint-tag *{
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
#optinpoint-main .optinpoint-tag:before{

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
@media only screen
and (max-width : 1024px) {
.optinpoint-overlay-bg #optinpoint-main{
  -webkit-transform:scale(0.8) translate(-50%, -50%);
  -moz-transform:scale(0.8) translate(-50%, -50%);
  -ms-transform:scale(0.8) translate(-50%, -50%);
  -o-transform:scale(0.8) translate(-50%, -50%);
  transform:scale(0.8) translate(-50%, -50%);
  -webkit-transform-origin:top left;
  -moz-transform-origin:top left;
  -ms-transform-origin:top left;
  -o-transform-origin:top left;
  transform-origin:top left;
  display: block;
}
}
@media only screen
and (max-width : 768px)
and (orientation : portrait) {
.optinpoint-overlay-bg #optinpoint-main{
width: 100%;
min-width: inherit;
}
#optinpoint-main .optinpoint-leftpane{
position: relative;
text-align: center;
height: 320px;
width: 100%;
}
#optinpoint-main .optinpoint-imgcont{
margin: -80px auto;
-webkit-transform: scale(0.8);
-moz-transform: scale(0.8);
-ms-transform: scale(0.8);
-o-transform: scale(0.8);
transform: scale(0.8);
}
#optinpoint-main .optinpoint-imgcont:after{
position: absolute;
top: 0;
margin: 55px;
left: inherit;
}
#optinpoint-main #optinpoint-newsletterform{
padding: 20px;
}
#optinpoint-main #optinpoint-newsletterform form{
  width: 100%;
}
#optinpoint-main .optinpoint-social{
  position: relative;
  display: inline-block;
  padding: 0;
  margin-top: 75px;
}
#optinpoint h3{
  margin-top: 10px;
}
#optinpoint .optinpoint-subs-button{
width: 100%;
}
#optinpoint h3,#optinpoint p{
  text-align: center;
}
#optinpoint .optinpoint-groups{
  display: inline-block;
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc{
width: 40px;
height: 40px;
border-radius: 50%;
float: left;
margin: 5px;
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc::before{
  padding: 0;
  border: 0;
}
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc.optinpoint-fb::after,
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc.optinpoint-gp::after,
#optinpoint-main.lsoconly .optinpoint-social .optinpoint-soc.optinpoint-ms::after {
    content:none;
}
#optinpoint-main.lsoconly .optinpoint-social{
  top:0;
  -webkit-transform:none;
  -moz-transform:none;
  -ms-transform:none;
  -o-transform:none;
  transform:none;
  margin-top: 25px;
}
#optinpoint-main.lsoconly .optinpoint-leftpane{
height: 100px;
}
#optinpoint-main.limgonly .optinpoint-leftpane{
height: 250px;
}
#optinpoint .optinpoint-item input[type='checkbox'] + label{
  text-align: left;
}
}
@media only screen
and (min-width : 480px)
and (max-width : 768px)
and (orientation : landscape) {
.optinpoint-overlay-bg #optinpoint-main{
  -webkit-transform:scale(0.5) translate(-50%, -50%);
  -moz-transform:scale(0.5) translate(-50%, -50%);
  -ms-transform:scale(0.5) translate(-50%, -50%);
  -o-transform:scale(0.5) translate(-50%, -50%);
  transform:scale(0.5) translate(-50%, -50%);
  -webkit-transform-origin:top left;
  -moz-transform-origin:top left;
  -ms-transform-origin:top left;
  -o-transform-origin:top left;
  transform-origin:top left;
}
}
@media only screen
only screen and (-webkit-min-device-pixel-ratio : 1.5),
only screen and (min-device-pixel-ratio : 1.5) {
.optinpoint-overlay-bg #optinpoint-main{
  -webkit-transform:scale(0.25) translate(-50%, -50%);
  -webkit-transform-origin:top left;
}
}
@media only screen
and (max-width : 480px)
and (orientation : portrait) {
.optinpoint-overlay-bg #optinpoint-main{
  -webkit-transform:scale(0.5) translate(-50%, -50%);
  -moz-transform:scale(0.5) translate(-50%, -50%);
  -ms-transform:scale(0.5) translate(-50%, -50%);
  -o-transform:scale(0.5) translate(-50%, -50%);
  transform:scale(0.5) translate(-50%, -50%);
  width: 480px;
}
#optinpoint input[type="text"]{
  height: 54px;
}
#optinpoint h3{
  margin-bottom: 10px;
}
}

</style>

<div class="optinpoint-reset optinpoint-overlay-bg oppointselector optinpointcss">
<div class="optinpoint-maina">
  <div class="optinpoint-mainc">
    <div id="optinpoint-main" class="
	<?php if(isset($theme['lite_dislogo']) && isset($theme['lite_dissoc']))echo 'woleft';
	else if(isset($theme['lite_dislogo'])) echo 'lsoconly';
	else if(isset($theme['lite_dissoc'])) echo 'limgonly';	?>">
        <div class="optinpoint-leftpane">
            <div class="optinpoint-imgcont"></div>
            <div class="optinpoint-social">
                <div class="optinpoint-soc optinpoint-fb"></div>
                <div class="optinpoint-soc optinpoint-gp"></div>
                <div class="optinpoint-soc optinpoint-ms"></div>
            </div>
        </div>
		<div id="optinpoint-newsletterform" class="optinpoint-wrapper">
			<div class="optinpoint" id="optinpoint">
<?php if(isset($theme['heading'])) echo '<h3>'.$theme['heading'].'</h3>';?>
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
              <?php if(isset($theme['tag_en'])){
              if(isset($theme['tag'])) $tagtxt= $theme['tag'];
              else $tagtxt=__( 'Secure and Spam free...', 'optinpoint' );
              echo '<div class="optinpoint-tag">'.$tagtxt.'</div>';
              }?>
    				<div class="optinpoint-signalc"><div class="optinpoint-signal"><?php
            echo $this->getSpin('7','optinpoint-main',isset($theme["spinner_c"])?$theme["spinner_c"]:'#000');?></div></div>
        		</form>
    			<div class="optinpoint-feedback" oppoerr="gen"></div>
			</div>
		</div>
        <div class="optinpoint-close-button"></div>
	</div>
</div>
</div>
</div>