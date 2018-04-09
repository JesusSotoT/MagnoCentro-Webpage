<style type="text/css">

#optinpointb {
text-align: center;
min-height: 100px;
display: inline-block;
border-width: 1px 0;
width: 495px;
left: 50px;
top: 200px;
position: relative;
background: {{theme.bg_c||'#27313B'}};
border: {{theme.addon_bor_w||0}}px solid {{theme.addon_bor_c||'#000'}};
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
padding: 0 60px;
}
#optinpointb .addon_heading{
padding-top:20px;
color: {{theme.heading_fc||'#F4233C'}};
font-size: {{theme.heading_f.s||'24'}}px;
font-weight: {{theme.heading_f.w}};
font-family: {{theme.heading_f.f | livepf}};
font-style: {{theme.heading_f.st}};
}
#optinpointb .addon_msg, #optinpointb .addon_msg *{
color: #959595;
font-size: {{theme.msg_f.s||'15'}}px;
font-family: {{theme.msg_f.f | livepf}};
}
#optinpointb .addon_msg{
  margin-top: 15px;
}
#optinpointb .optinpoint{
margin-top: 20px;
}
#optinpointb .optinpoint_formbox > div,
#optinpointb .optinpoint > div{
position: relative;
}
#optinpointb .optinpoint_formbox > div:first-of-type{
  width: 65%;
  float: left;
}
#optinpointb .optinpoint_formbox > div:first-of-type + div{
  width: 35%;
  float: left;
}
#optinpointb .optinpoint_formbox .addon_tbox{
border-radius: 3px 0 0 3px;
}
#optinpointb .addon_tbox{
text-align: left;
margin-bottom: 10px;
width: 100%;
border-radius: 3px;
outline:0;
display: block;
 padding: 0 10px 0 40px;
color: {{theme.tbox_fc||'#353535'}};
font-size: {{theme.tbox_f.s||'17'}}px;
font-weight: {{theme.tbox_f.w}};
font-family: {{theme.tbox_f.f | livepf}};
font-style: {{theme.tbox_f.st}};
background-color: {{theme.tbox_bgc||'#fff'}};
width: {{theme.tbox_w}}px;
height: {{theme.tbox_h||'40'}}px;
line-height: {{theme.tbox_h||'40'}}px;
border: {{theme.tbox_bor||''}}px solid {{theme.tbox_borc||'#efefef'}};
}
#optinpointb .addon_tbox .in-text{
top: 50%;
-webkit-transform: translatey(-50% );
-moz-transform: translatey(-50% );
-ms-transform: translatey(-50% );
-o-transform: translatey(-50% );
transform: translatey(-50% );
position: relative;
}
.addon_tbox.mailicon:before,
.addon_tbox.pericon:before{
content:'';
display: block;
width: 40px;
height: {{theme.tbox_h||'40'}}px;
position: absolute;
top: 0;
left: 0;
}
.addon_tbox.mailicon:before{
background: {{getIcon('a02',15,theme.inico_c||theme.tbox_fc||'#000')}} no-repeat center;
}
.addon_tbox.pericon:before{
background: {{getIcon('c06',15,theme.inico_c||theme.tbox_fc||'#000')}} no-repeat center;
}
#optinpointb .optinpoint-groups{
display: block;
  margin:5px auto;
}
#optinpointb .optinpoint-item{
display:inline-block;
  margin: 2px 15px;
}
#optinpointb .addon_check {
cursor: pointer;
display: inline-block;
position: relative;
padding-left: 30px;
min-width: 70px;
}
#optinpointb .addon_check .cbox{
display: inline-block;
width: 12px;
height: 12px;
left: 0;
bottom: 0;
text-align: center;
position: absolute;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
-ms-transition: all 0.3s ease-in-out;
-moz-transition: all 0.3s ease-in-out;
-o-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
border:1px solid {{theme.check_borc}};
background-color: {{theme.check_c||'#fff'}};
}
#optinpointb .addon_check .ctext{
color: {{theme.check_fc||'#fff'}};
font-size: {{theme.check_f.s||'12'}}px;
font-weight: {{theme.check_f.w}};
font-family: {{theme.check_f.f | livepf}};
font-style: {{theme.check_f.st}};
}
#optinpointb .addon_check .cbox.checked:after,#optinpointb .addon_check:hover .cbox:after{
display: block;
overflow: hidden;
width:12px;
height:12px;
content:'';
background: no-repeat center;
background-image:{{getIcon('ch2',8,theme.check_ic||'#000')}};
}
#optinpointb .addon_check:hover .cbox:after{
opacity: 0.5;
}

#optinpointb .addon_button{
width: 100%;
text-align: center;
cursor: pointer;
border-radius: 0 3px 3px 0;
color: {{theme.button_fc||'#fff'}};
font-size: {{theme.button_f.s || "17"}}px;
font-weight: {{theme.button_f.w}};
font-family: {{theme.button_f.f | livepf}};
font-style: {{theme.button_f.st}};
background-color:{{theme.button_bc||'#FF1F43'}};
width: {{theme.button_w}}px;
height: {{theme.button_h||'40'}}px;
line-height: {{theme.button_h||'40'}}px;
border-radius: {{theme.button_br}}px;
border: {{theme.button_bor||'1'}}px solid {{theme.button_borc||'#FA0B38'}};
}
#optinpointb .addon_button:hover{
color: {{theme.button_fch}};
background-color: {{theme.button_bch||'#FA0B38'}};
}

#optinpointb .in-mail+div{
position: absolute;
top: 0;
right: 0;
}
.addon_spinner {
top: 0;
right: 0;
margin: 6px 5px;
-webkit-transform: scale(0.8);
-ms-transform: scale(0.8);
transform: scale(0.8);
}
#optinpointb .optinpoint-tag{
margin: 5px auto;
display: {{theme.tag_en? 'block':'none'}};
}
#optinpointb .optinpoint-tag,
#optinpointb .optinpoint-tag *{
pointer-events: none;
color: {{theme.tag_fc||'#fff'}};
font-size: {{theme.tag_f.s||'10'}}px;
font-weight: {{theme.tag_f.w}};
font-family:Arial;
font-family: {{theme.tag_f.f | livepf}};
font-style: {{theme.tag_f.st}};
}
#optinpointb .optinpoint-tag:before{
content:{{getIcon('lock1',theme.tag_f.s||10,theme.tag_fc||'#fff')}};
margin: 5px;
top: 1px;
position: relative;
}

</style>

<div id="optinpointb" class="optinpointb">
  <div class="optpoint-live-sc" ng-click="prev.goto(8)" data-lhint="Go to Additional Theme Options" style="margin:-30px">7</div>

          <div><div class="optpoint-live-sc" ng-click="prev.goto(1)" data-lhint="Go to Custom Message Settings">1</div>
            <div class="addon_heading">{{theme.heading}}</div>
            <div class="addon_msg"><p ng-bind-html="theme.msg | safe"></p></div>
            </div>
        <div class="optinpoint" id="optinpoint">
            <div><div class="optpoint-live-sc righthov" ng-click="prev.goto(2)" data-lhint="Go to Text Box Settings" style="right: -50px;">2</div>
              <div class="addon_tbox pericon"><div class="in-text in-name">Name</div></div>
            </div>
            <div class="optinpoint_formbox">
              <div class="addon_tbox mailicon"><div class="in-text in-mail">Email address</div>
                <div>
                  <div class="optpoint-live-sc" ng-click="prev.goto(5)" data-lhint="Go to Spinner Settings" style="left:10px;top:25px">5</div>
                  <div class="addon_spinner" ng-bind-html="getSpin('8','optinpointb',theme.spinner_c||'#000')"></div>
                </div>
              </div>
              <div><div class="optpoint-live-sc righthov" ng-click="prev.goto(4)" data-lhint="Go to Button Settings" style="right: -50px;">4</div>
                <div class="addon_button">{{theme.button}}</div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <div><div class="optpoint-live-sc" ng-click="prev.goto(3)" data-lhint="Go to Checkbox Settings" style="left: 10px;">3</div>
              <div class="optinpoint-groups">
                <div class="addon_check_c"></div>
                <div class="optinpoint-item">
                    <div class="addon_check">
                      <div class="cbox"></div>
                      <div class="ctext">group1</div>
                    </div>
                </div>
                <div class="optinpoint-item">
                    <div class="addon_check">
                      <div class="cbox checked"></div>
                      <div class="ctext">group2</div>
                    </div>
                </div>
              </div>
            </div>
      <div><div class="optpoint-live-sc" ng-click="gotos($event)" data-optno="9" data-lhint="Go to Tag Settings">6</div>
          <div class="optinpoint-tag" ng-bind-html="data.theme.a9.addon_tag||'Secure and Spam free...' | safe"></div></div>
          </div>
  </div>
</div>
