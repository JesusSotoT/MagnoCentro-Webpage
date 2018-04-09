<style type="text/css">

#optinpoints {
width: 500px;
height: 718px;
display: block;
background-color: {{theme.slider_canvas_c||'#333'}};
position: relative;
}
#optinpoints .optinpoints-inner{
  top: 50%;
-webkit-transform: translateY(-50%);
-moz-transform: translateY(-50%);
-ms-transform: translateY(-50%);
-o-transform: translateY(-50%);
transform: translateY(-50%);
position: absolute;
padding: 15px;
margin: 25px;
width: 450px;
text-align: center;
background:  {{theme.bg_c||'#fff'}};
-webkit-border-radius:10px;
-moz-border-radius:10px;
border-radius:10px;
}
#optinpoints .optinpoint-leftpane{
width: 100%;
text-align: center;
display: {{theme.slider_dissoc?'none':'inline-block'}};
}
#optinpoints h3{
color: {{theme.heading_fc}};
font-size: {{theme.heading_f.s||'18'}}px;
font-weight: {{theme.heading_f.w}};
font-family: {{theme.heading_f.f | livepf}};
font-style: {{theme.heading_f.st}};
}
#optinpoints .slider_msg, #optinpoints .slider_msg *{
font-size: {{theme.msg_f.s}}px;
font-family: {{theme.msg_f.f | livepf}};
}
#optinpoints .slider_tbox{
    margin: 10px auto;
    width: 90%;
    padding: 0 20px;
   -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    border-radius: 5px;
    outline:0;
    display: block;
color: {{theme.tbox_fc||'#353535'}};
font-size: {{theme.tbox_f.s||'16'}}px;
font-weight: {{theme.tbox_f.w||'bold'}};
font-family: {{theme.tbox_f.f | livepf}};
font-style: {{theme.tbox_f.st}};
background-color: {{theme.tbox_bgc||'#f8fafa'}};
width: {{theme.tbox_w}}px;
height: {{theme.tbox_h||'45'}}px;
border: {{theme.tbox_bor||'1'}}px solid {{theme.tbox_borc||'#e4e9e9'}};
}
#optinpoints .slider_tbox div{
top: 50%;
-webkit-transform: translatey(-50% );
-moz-transform: translatey(-50% );
-ms-transform: translatey(-50% );
-o-transform: translatey(-50% );
transform: translatey(-50% );
position: relative;
}
#optinpoints .optinpoint-groups{
display: block;
}
#optinpoints .optinpoint-item{
display:inline-block;
margin: 2px 15px;
}
#optinpoints .slider_check {
cursor: pointer;
display: inline-block;
position: relative;
padding-left: 30px;
line-height: 25px;
min-width: 100px;
}
#optinpoints .slider_check .cbox{
display: inline-block;
width: 22px;
height: 22px;
left: 0;
bottom: 0;
text-align: center;
position: absolute;
-webkit-box-shadow: 0 0 1px 1px {{theme.check_borc||'#ccc'}};
-moz-box-shadow: 0 0 1px 1px {{theme.check_borc||'#ccc'}};
-ms-box-shadow: 0 0 1px 1px {{theme.check_borc||'#ccc'}};
-o-box-shadow: 0 0 1px 1px {{theme.check_borc||'#ccc'}};
box-shadow: 0 0 1px 1px {{theme.check_borc||'#ccc'}};
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
-ms-transition: all 0.3s ease-in-out;
-moz-transition: all 0.3s ease-in-out;
-o-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
}
#optinpoints .slider_check .ctext{
color: {{theme.check_fc}};
font-size: {{theme.check_f.s}}px;
font-weight: {{theme.check_f.w}};
font-family: {{theme.check_f.f | livepf}};
font-style: {{theme.check_f.st}};
}
#optinpoints .slider_check .cbox.checked{
background-color: {{theme.check_c}};
}
#optinpoints .slider_check .cbox.checked:after,#optinpoints .slider_check:hover .cbox:after{
display: block;
overflow: hidden;
width:22px;
height:24px;
content:'';
background: no-repeat center;
background-image:{{getIcon('ch6',16,theme.check_ic||'#000')}};
}
#optinpoints .slider_check:hover .cbox:after{
opacity: 0.5;
}

#optinpoints .slider_button{
color: #fff;
line-height: 45px;
text-align: center;
cursor: pointer;
margin-top: 15px;
text-align: center;
width:100%;
color: {{theme.button_fc||'#fff'}};
font-size: {{theme.button_f.s || "22"}}px;
font-weight: {{theme.button_f.w||'bold'}};
font-family: {{theme.button_f.f | livepf}};
font-style: {{theme.button_f.st}};
{{theme.button_bc? "background-color:"+theme.button_bc+";" : "background-color: #4d90fe;
background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -mz-linear-gradient(top,#4d90fe,#4787ed);
background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
background-image: linear-gradient(top,#4d90fe,#4787ed);"}}
width: {{theme.button_w}}px;
height: {{theme.button_h||'45'}}px;
-webkit-border-radius: {{theme.button_br||'3'}}px;
-moz-border-radius: {{theme.button_br||'3'}}px;
border-radius: {{theme.button_br||'3'}}px;
border: {{theme.button_bor||'1'}}px solid {{theme.button_borc||'#3079ed'}};
}
#optinpoints .slider_button:hover{
color: {{theme.button_fch}};
background-color: {{theme.button_bch}};
}

.slider_spinner {
margin-top: 15px;
}

.slider_status{
position: relative;
font-size: 18px;
margin-bottom: 15px;
}
#slider_tag{
text-align: center;
display: {{theme.tag_en? 'block':'none'}};
}
#slider_tag,
#slider_tag *{
pointer-events: none;
color: {{theme.tag_fc||'#000'}};
font-size: {{theme.tag_f.s||'10'}}px;
font-weight: {{theme.tag_f.w||'500'}};
font-family:Arial;
font-family: {{theme.tag_f.f | livepf}};
font-style: {{theme.tag_f.st}};
}
#slider_tag:before{
content:{{getIcon('lock1',theme.tag_f.s||10,theme.tag_fc||'#000')}};
margin: 5px;
top: 1px;
position: relative;
}
#optinpoints .optinpoint-social{
display: inline-block;
margin-bottom: 10px;
}
#optinpoints .optinpoint-social::before{
content:"{{theme.soc_head||'Subscribe with'}}";
line-height: 30px;
display: block;
color: {{theme.soc_fc||'#b3b3b3'}};
font-size: {{theme.soc_f.s||'20'}}px;
font-weight: {{theme.soc_f.w}};
font-family: {{(theme.soc_f.f | livepf)}};
font-style: {{theme.soc_f.st}};
}

#optinpoints .optinpoint-social .optinpoint-soc{
width:40px;
height: 40px;
-webkit-border-radius: 50%;
-moz-box-border-radius: 50%;
-ms-border-radius: 50%;
-o-border-radius: 50%;
border-radius: 50%;
float: left;
margin: 5px;
}
#optinpoints .optinpoint-social .optinpoint-soc::before{
display: block;
margin: 7px;
}

#optinpoints .optinpoint-social .optinpoint-soc.optinpoint-fb {
background: #2d609b;
}
#optinpoints .optinpoint-social .optinpoint-soc.optinpoint-fb::before {
content: {{getIcon('fb',25,'#fff')}}
}
#optinpoints .optinpoint-social .optinpoint-soc.optinpoint-gp {
background: #eb4026;
}
#optinpoints .optinpoint-social .optinpoint-soc.optinpoint-gp::before {
content: {{getIcon('gp',25,'#fff')}}
}
#optinpoints .optinpoint-social .optinpoint-soc.optinpoint-ms {
background: #00BCF2;
}
#optinpoints .optinpoint-social .optinpoint-soc.optinpoint-ms::before {
content: {{getIcon('ms',25,'#fff')}}
}
#optinpoints-trig{
width: 50px;
height: 50px;
margin: 0 3px;
position: absolute;
display: block;
left: 500px;
-webkit-border-radius:1px;
-moz-border-radius:1px;
border-radius:1px;
top:{{theme.slider_trigger_top ||'50'}}%;
background: {{theme.slider_trigger_bg || '#0066CB'}};
}
#optinpoints-trig:before{
content:{{getIcon('a04',32,theme.slider_trigger_c||'#fff')}};
height: 32px;
width: 32px;
display: block;
margin: 8px;
}
#optinpoints-over{
background: rgba(0, 0, 0, 0.4);
height: 100%;
width: 100%;
position: absolute;
display: block;
}
</style>
<div id="optinpoints-over"></div>
<div id="optinpoints-trig">
  <div class="optpoint-live-sc" ng-click="prev.goto(9)" data-lhint="Go to Trigger Options" style="top:0;right:0;margin:-10px">7</div>
</div>
<div id="optinpoints" class="{{theme.slider_bg_p}}">
<div class="optinpoints-inner">
  <div class="optpoint-live-sc" ng-click="prev.goto(8)" data-lhint="Go to Additional Theme Options" style="margin:-15px">8</div>
        <div><div class="optpoint-live-sc" ng-click="prev.goto(1)" data-lhint="Go to Custom Message Settings">1</div>
            <h3>{{theme.heading}}</h3>
            <div class="slider_msg"><p ng-bind-html="theme.msg | safe"></p></div>
        </div>
        <div class="optinpoint-leftpane">
            <div class="optinpoint-social">
                <div class="optinpoint-soc optinpoint-fb"></div>
                <div class="optinpoint-soc optinpoint-gp"></div>
                <div class="optinpoint-soc optinpoint-ms"></div>
            </div>
        </div>
        <div class="optinpoints">

            <div><div class="optpoint-live-sc righthov" ng-click="prev.goto(2)" data-lhint="Go to Text Box Settings" style="right: -20px;">2</div>
              <div class="slider_tbox"><div class="in-name">Name</div></div>
              <div class="slider_tbox"><div class="in-mail">Email address</div></div>
            </div>
            <div><div class="optpoint-live-sc" ng-click="prev.goto(3)" data-lhint="Go to Checkbox Settings">3</div>
              <div class="optinpoint-groups">
                <div class="slider_check_c"></div>
                <div class="optinpoint-item">
                    <div class="slider_check">
                      <div class="cbox"></div>
                      <div class="ctext">group1</div>
                    </div>
                </div>
                <div class="optinpoint-item">
                    <div class="slider_check">
                      <div class="cbox checked"></div>
                      <div class="ctext">group2</div>
                    </div>
                </div>
              </div>
            </div>
            <div><div class="optpoint-live-sc righthov" ng-click="prev.goto(4)" data-lhint="Go to Button Settings" style="right: -20px;">4</div>
              <div class="slider_button">{{theme.button}}</div>
            </div>
            <div><div class="optpoint-live-sc" ng-click="prev.goto(7)" data-lhint="Go to Tag Settings">6</div>
          <div id="slider_tag" ng-bind-html="theme.tag||'Secure and Spam free...' | safe"></div></div>
          <div>
            <div>
              <div class="optpoint-live-sc" ng-click="prev.goto(5)" data-lhint="Go to Spinner Settings" style="right: -20px;">5</div>
              <div class="slider_spinner" ng-bind-html="getSpin('7','optinpoints',theme.spinner_c||'#000')"></div>
            </div>

          </div>

  </div>
</div>
</div>