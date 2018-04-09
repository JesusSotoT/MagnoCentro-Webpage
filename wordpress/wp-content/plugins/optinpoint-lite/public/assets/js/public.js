!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});
;(function( $ ){
	var oppocsldMoving = false,
		oppocsldOpened = false;
	var privateMethods = {
		execute: function(action, callback) {
		var $menu = $("#optinpoints"),
			$trig = $("#optinpoints-trig"),
			$body = $("body"),
			$html = $("html"),
			menucWidth = $menu.data("menucWidth"),
			speed = $menu.data("speed"),
			side = $menu.data("side"),
			bodyClass = "body-optinpoints-open",
			bodyAnimation,
			bodyInit,
			scrollTop,
			diff;
		if ('open' === action || ('toggle' === action && !$body.hasClass('body-optinpoints-open'))) {

			$body.bind('mousewheel DOMMouseScroll', freezeCon);
			$('.optinpoints-cont').bind('mousewheel DOMMouseScroll', scrollCon);
			$('.optinpoints-overlay').addClass('showo');
			$body.addClass(bodyClass);
			centresp();
			$(window).resize(function() {
				$(".optinpoints").hasClass("optinpoints-open") && centresp()
			});
			$('.optinpoints').addClass('optinpoints-open');
		} else {
			$body.unbind('mousewheel DOMMouseScroll', freezeCon);
			$('.optinpoints-cont').unbind('mousewheel DOMMouseScroll', scrollCon);
			$('.optinpoints-overlay').removeClass('showo');
			$('body > *').css({
				'-webkit-transform' : '',
				transform: ''
			});
			setTimeout(function() {
				$body.removeClass(bodyClass).removeAttr('style');
			}, speed);
			$('.optinpoints').removeClass('optinpoints-open');
			$trig.removeClass('optinpoints-trigdis');
		}
	}
};
function centresp() {
	var $menu = $("#optinpoints"),
		$trig = $("#optinpoints-trig"),
		$body = $("body"),
		$html = $("html"),
		menucWidth = $menu.data("menucWidth"),
		movein = $menu.data("movein"),
		speed = $menu.data("speed"),
		side = $menu.data("side"),
		bodytrans,sltrans,
		scrollTop,
		diff,
		bodyClass = "body-optinpoints-open";

	$('.optinpoints-bg,.optinpoints-overlay').css({'height': $('body').height()});
	if ($('.optinpoints').height() < $('.optinpoints-scroller').height())
		$('.optinpoints-scroller').removeClass('optinpoints-vertcent');
	else
		$('.optinpoints-scroller').addClass('optinpoints-vertcent');

	if ($(window).width() < 560) {
		diff = (560 - $(window).width());
		var perc = (menucWidth - diff) / 500;
		$('.optinpoints-resp').css({
			'-webkit-transform': 'scale(' + perc + ',' + perc + ')',
			transform: 'scale(' + perc + ',' + perc + ')'
		});
	} else {
		$('.optinpoints-resp').removeAttr('style');
		diff = 0;
	}
	menuWidth = menucWidth - diff;
	if (side === 'left') {
		bodytrans = {
			'-webkit-transform': 'translate(' + menuWidth + 'px,0)',
			transform: 'translate(' + menuWidth + 'px,0)'
		};
		sltrans = {left:'-'+menuWidth+'px'};
	} else {
		bodytrans = {
			'-webkit-transform': 'translate(-' + menuWidth + 'px,0)',
			transform: 'translate(-' + menuWidth + 'px,0)'
		};
		sltrans = {right:'-'+menuWidth+'px'};
	}
	if(movein)
		$('body > *').css(bodytrans);
	else
		$('body > *').not('.optinpoints').css(bodytrans);
}
function scrollCon(e) {
	var scrollTo = null;
	if (e.type == 'mousewheel') {
		scrollTo = (e.originalEvent.wheelDelta * -1);
	}
	else if (e.type == 'DOMMouseScroll') {
		scrollTo = 40 * e.originalEvent.detail;
	}
	if (scrollTo) {
		e.preventDefault();
		$(this).scrollTop(scrollTo + $(this).scrollTop());
	}
}

function freezeCon(e) {
	if (e.type == 'mousewheel' || e.type == 'DOMMouseScroll') {
		e.preventDefault()
	}
}
var methods = {
	open: function(name, callback) {
		privateMethods.execute('open', name, callback);
	},
	close: function(name, callback) {
		privateMethods.execute('close', name, callback);
	},
	toggle: function(name, callback) {
		privateMethods.execute('toggle', name, callback);
	}
};

$.oppocsld = function(method) {
	if (methods[method]) {
		return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
	} else if (typeof method === 'function' || typeof method === 'string' || !method) {
		return methods.toggle.apply(this, arguments);
	} else {
		$.error('Method ' + method + ' does not exist on jQuery.sidr');
	}
};
$.fn.oppocsld = function(options) {
	var settings=$.extend({speed:400,side:"left",source:null,menucWidth:$(".optinpoints-scroller").width(),movein:false},options);
	var name = 'optinpoints',
		$sideMenu = $('#optinpoints'),
		$trigMenu = $('#optinpoints-trig');
	$sideMenu
		.addClass('optinpoints')
		.addClass(settings.side)
		.data({
			speed: settings.speed,
			side: settings.side,
			menucWidth: settings.menucWidth,
			movein:settings.movein
		});
	if(!oppoisset(optinpoint.chkcon.s)){
		$trigMenu.addClass('condhide');
	}
	$trigMenu
		.addClass('optinpoints-trig')
		.addClass(settings.side);
	$('.optinpoints-bg').css({
	'background-color' : $('body').css('background-color')||'#fff',
	'background-image' : $('body').css('background-image'),
	});
	if(settings.movein){
		if(settings.side == 'left')
			$('.optinpoints').css({left:'-'+settings.menucWidth+'px'});
		else
			$('.optinpoints').css({right:'-'+settings.menucWidth+'px'});
	}
	if (typeof settings.source === 'function') {
		var newContent = settings.source(name);
		privateMethods.loadContent($sideMenu, newContent);
	}
	return this.each(function() {
		var $this = $(this),
			data = $this.data('optinpoints');
		if (!data) {
			$this.data('optinpoints', name);
			if ('ontouchstart' in document.documentElement) {
				$this.find('.optinpoints-trigi').bind('touchstart', function(e) {
					var theEvent = e.originalEvent.touches[0];
					this.touched = e.timeStamp;
				});
				$this.find('.optinpoints-trigi').bind('touchend', function(e) {
					var delta = Math.abs(e.timeStamp - this.touched);
					if(delta < 200) {
						e.preventDefault();
						methods.toggle(name);
					}
				});
				$this.find('.optinpoints-trigh').bind('touchstart', function(e) {
					var theEvent = e.originalEvent.touches[0];
					this.touched = e.timeStamp;
				});
				$this.find('.optinpoints-trigh').bind('touchend', function(e) {
					var delta = Math.abs(e.timeStamp - this.touched);
					if(delta < 200) {
						e.preventDefault();
						$trigMenu.addClass('optinpoints-trigdis');
					}
				});
			} else {
				$this.find('.optinpoints-trigi').click(function(e) {
					e.preventDefault();
					methods.toggle(name);
				});
				$this.find('.optinpoints-trigh').click(function(e) {
					e.preventDefault();
					$trigMenu.addClass('optinpoints-trigdis');
				});
			}
		}
	});
};

	$(function () {
$('[oppomask]').each(function(){
	$(this).mask($(this).attr('oppomask'),{placeholder:$(this).attr('oppomph')});
});
if(oppoisset(optinpoint.addon) || oppoisset(optinpoint.addon_scode)){
	if(oppoisset(optinpoint.addon_desktop)) var deskb = true;
	if(oppoisset(optinpoint.addon_tablet)) var tabb = true;
	if(oppoisset(optinpoint.addon_mobile)) var mobb = true;
}
if(oppoisset(optinpoint.chkcon.t)){
	show_oppo_topbar();
	$('.optinpointt-close-button').click(hide_oppo_topbar);
}
if(oppoisset(optinpoint.chkcon.f)){
	var flipclosed=0;
	show_oppo_flipbox();
	$('.optinpointf-close-button').click(hide_oppo_flipbox);
}

var x=0;
if((oppoisset(mobb) && $(window).width()<=480) || (oppoisset(tabb) && $(window).width()>480 && $(window).width()<=768) || (oppoisset(deskb) && $(window).width()>768))
$('.optinpointb').show();

if(oppoisset(optinpoint.chkcon.l)){
	if($('.optinpoint-leftpane.adjh').height() < $('#optinpoint-main').height());
	var docHeight = $(document).height();
	var timeoutID;
	if(oppoisset(optinpoint.lite_desktop)) var deskl = true;
	if(oppoisset(optinpoint.lite_tablet)) var tabl = true;
	if(oppoisset(optinpoint.lite_mobile)) var mobl = true;
	if(oppoisset(optinpoint.chkcon.l) && ((oppoisset(mobl) && $(window).width()<=480) || (oppoisset(tabl) && $(window).width()>480 && $(window).width()<=768) || (oppoisset(deskl) && $(window).width()>768))){
		window.addEventListener("load", function(){
			if(oppoisset(optinpoint.lite_behave_time)){
				if(oppoisset(optinpoint.lite_behave_time_inac)) {
			 		 oppo_setup();
				}
				else
					setTimeout(function(){show_oppo_litebox()}, optinpoint.lite_behave_time*1000);
			}
			if(oppoisset(optinpoint.lite_behave_scroll)){
				var scrollp = 50;
				$(document).scroll(function() {if(x==0)if(($(window).scrollTop() / ($(document).height()-$(window).height())) * 100 > scrollp)show_oppo_litebox();});
			}
		},false);
	}

	$('.optinpoint-close-button').click(function(){
		hide_oppo_litebox();
	});
	if(oppoisset(optinpoint.lite_close_bck)){
		$('.optinpoint-overlay-bg').click(function(e){
			if($(e.target).find('#optinpoint-newsletterform').length != 0)
				hide_oppo_litebox();
		});
	}

}

if(oppoisset(optinpoint.chkcon.l) || oppoisset(optinpoint.chkcon.a) || oppoisset(optinpoint.chkcon.t) || oppoisset(optinpoint.chkcon.f) || oppoisset(optinpoint.chkcon.w) || oppoisset(optinpoint.chkcon.s) ){
	var oppo_subing = 0;
	$('.optinpoint-subs-button').click(function (e){
		e.preventDefault();
		if(oppo_subing)return false;
		var button = this;
		var optpo = $(button).parents('.oppointselector:first');
		var form = $(optpo).find('form');
		var preload = $(button).attr('oppopre');
		$(optpo).find('[oppoerr="gen"]').html('');
		$(optpo).find('.optinpoint-field').each(function(){
			if($(this).hasClass('oppomul')){
				v= new Array();
				$(this).find('input:checked').each(function(){
					v.push($(this).val());
				});
			}
			else{
				v = $(this).find('[oppotype]').val();
			}
			$this = $(this);
			$opf = $(this).find('[oppotype]');
			err = oppovalid($opf.attr('oppotype'),$opf.attr('oppoformat'),$opf.attr('opporeq'),v);
  			if(err){
  				$opf.addClass('oppoerror');
  				if(!$(optpo).find('.optinpoint-mainc').length){
	  				$this.addClass('oppoerrora');
				  	setTimeout(function() {
				  		$this.removeClass('oppoerrora');
				  	}, 500);
				}
			  	$(optpo).find('[oppoerr="'+$opf.attr('oppofield')+'"]').html(err);
  			}
  			else{
  				$opf.removeClass('oppoerror');
  				$(optpo).find('[oppoerr="'+$opf.attr('oppofield')+'"]').html('');
  			}
		});
		if($(optpo).find('.oppoerror').length){
			if($(optpo).find('.optinpoint-mainc').length){
				$(optpo).find('.optinpoint-mainc').addClass('oppoerrora');
				setTimeout(function() {
					$('.optinpoint-mainc').removeClass('oppoerrora');
				}, 500);
			}
			return false;
		}
		$(optpo).addClass('signalshow');
		var SubsForm = $(form).serialize();
		oppo_subing = 1;
		$.ajax({
			type:"POST",
			url: optinpoint.ajax_url+'?optinpoint_lite_service=1',
			data: SubsForm,
			//dataType: "json",
			success:function(data){
				oppo_subing = 0;
				if(data >= 1){
					if(opposucurl()){$('.optinpoint-overlay-bg').hide();}
					else if(optinpoint.suc_sub == 'suc_msg' && oppoisset(optinpoint.suc_msg)){
						$(optpo).find('form').fadeOut(function () {
							if(data == 1)
								$(optpo).find('[oppoerr="gen"]').addClass('optinpoint-done').html(optinpoint.suc_msg);
							else if(data == 2)
								$(optpo).find('[oppoerr="gen"]').addClass('optinpoint-done').html(oppo_errmsg[2]);
						});
					}
				}
				else if(data == 0)
					$(optpo).find('[oppoerr="gen"]').html(oppo_errmsg[3]);
				else
					$(optpo).find('[oppoerr="gen"]').html(oppo_errmsg[4]);
				$(optpo).removeClass('signalshow');
			}
		});
		return false;
	});

	$('.oppointselector').each(function(){
		var form = $(this).find('form');
		$(form).find('input').keypress(function(e) {
			if(e.which == 10 || e.which == 13) {
				$(form).find('.optinpoint-subs-button').click();
			}
		});
	});
	$('.optinpoint-soc').click(function (e){
		e.preventDefault();
		var cont = $(this).closest('.oppointselector');
		$(cont).addClass('signalshow');
		if($(this).hasClass('optinpoint-fb')){

			FB.login(function(response) {if (response.status === 'connected') {FB.api('/me?locale=en_US&fields=name,email,first_name,last_name', function(response) {
					SubsForm={name:response.first_name+' '+response.last_name,
						email:response.email,
						action:'optinpoint_lite_add_email_ajax'};
					$(cont).find('[oppofield="name"]').val(response.first_name);
					$(cont).find('[oppofield="fname"]').val(response.first_name);
					$(cont).find('[oppofield="lname"]').val(response.last_name);
					$(cont).find('[oppofield="email"]').val(response.email);
					$(cont).find('.optinpoint-subs-button').click();
			});}else{
				$(cont).find('[oppoerr="gen"]').html(oppo_errmsg[3]);
				$(cont).removeClass('signalshow');
			}}, {scope: 'public_profile,email'});

		}
		else if($(this).hasClass('optinpoint-gp')){
			gapi.auth.signIn({'callback': signinCallback });
				function signinCallback(authResult) {if (authResult['status']['signed_in']) {if (authResult['status']['method'] == 'PROMPT') {gapi.client.load('oauth2', 'v2', function () {gapi.client.oauth2.userinfo.get().execute(function (resp) {
				SubsForm={name:resp.name,
						email:resp.email,
						action:'optinpoint_lite_add_email_ajax'};
						$(cont).find('[oppofield="name"]').val(resp.name);
						$(cont).find('[oppofield="fname"]').val(resp.name);
						$(cont).find('[oppofield="email"]').val(resp.email);
						$(cont).find('.optinpoint-subs-button').click();
			});});}} else {
				$(cont).find('[oppoerr="gen"]').html(oppo_errmsg[3]);
				$(cont).removeClass('signalshow');
			}}
		}
		else if($(this).hasClass('optinpoint-ms')){
			WL.login({scope: ["wl.basic", "wl.emails"]}).then(function (response) {
				WL.api({path: "me",method: "GET"}).then(function (response) {
					SubsForm={name:response.name,
						email:response.emails.account,
						action:'optinpoint_lite_add_email_ajax'};
						$(cont).find('[oppofield="name"]').val(response.name);
						$(cont).find('[oppofield="fname"]').val(response.name);
						$(cont).find('[oppofield="email"]').val(response.emails.account);
						$(cont).find('.optinpoint-subs-button').click();
				},function (responseFailed) {
					$(cont).find('[oppoerr="gen"]').html(oppo_errmsg[3]);
					$(cont).removeClass('signalshow');
				});},function (responseFailed){
					$(cont).find('[oppoerr="gen"]').html(oppo_errmsg[3]);
					$(cont).removeClass('signalshow');
			});

		}

	});
}


if (oppoisset(optinpoint.chkcon.s)) {
	if (oppoisset(optinpoint.slider_desktop)) var desks = true;
	if (oppoisset(optinpoint.slider_tablet)) var tabs = true;
	if (oppoisset(optinpoint.slider_mobile)) var mobs = true;
	if (oppoisset(optinpoint.chkcon.s) && ((oppoisset(mobs) && $(window).width() <= 480) || (oppoisset(tabs) && $(window).width() > 480 && $(window).width() <= 768) || (oppoisset(desks) && $(window).width() > 768))) {

		var opts = [];
		var timeoutIDs,s=0;
		if (oppoisset(optinpoint.slider_orient)) opts['side'] = optinpoint.slider_orient;
		if (oppoisset(optinpoint.slider_behave_movein)) opts['movein'] = true;
		$('#optinpoints-trig').oppocsld(opts);

		if (oppoisset(optinpoint.slider_trigger_scroll)){
			var p = 50;
			if(($(window).scrollTop() / $(document).height())*100 >= p)
				$('#optinpoints-trig').removeClass('scrollhide');
			else
				$('#optinpoints-trig').addClass('scrollhide');
			$(document).scroll(function() {
				if(($(window).scrollTop() / $(document).height())*100 >= p)
					$('#optinpoints-trig').removeClass('scrollhide');
				else
					$('#optinpoints-trig').addClass('scrollhide');
			});
		}else $('#optinpoints-trig').removeClass('scrollhide');
		if (oppoisset(optinpoint.slider_close_bck)) {
			$('.optinpoints-overlay').click(function() {
				$.oppocsld('close', 'optinpoints');
			});
		}
		if (oppoisset(optinpoint.slider_behave_time)) {
			if (oppoisset(optinpoint.slider_behave_time_inac)) {
				setups();
			} else
				setTimeout(function() {
					$.oppocsld('open', 'optinpoints');
				}, optinpoint.slider_behave_time * 1000);
		}
	}
}

oppovalid = function(t,f,r,v){
	if(r == 'true' && !v)
		return oppo_errmsg[0];
	if(!v || v.length === 0)return '';
	if(f && !oppovalidate(f,v)){
		return oppo_errmsg[1];
	}
	return '';
};
opposucurl = function(){
	if(optinpoint.suc_sub == 'suc_url' && oppoisset(optinpoint.suc_url)){
		if(oppoisset(optinpoint.suc_url_tab)){
			var win=window.open(optinpoint.suc_url,'_blank');
			win.focus();
		}
		else window.open(optinpoint.suc_url,'_self');
		return true;
	}
};
msieversion = function() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))
    	return true;
    return false;
}
if(msieversion()){
	$(".optinpoint-field input").on("keyup", function() {
		var label = $(this).parent().find(".inputlabel");
		if($(this).val()) {
			$(label).hide();
		} else {
			$(label).show();
		}
	});	
}
function show_oppo_litebox(){
	if(x==1)return;
	if(oppoisset(optinpoint.lite_behave_cookie) && x==0){
		if(document.cookie.indexOf("optinpoint_show") >= 0)return;
		var date, expires;
		date = new Date();
		date.setTime(date.getTime()+(24*60*60*1000));
		expires = "; expires="+date.toGMTString();
		document.cookie = "optinpoint_show=true"+expires+"; path=/";
	}
	$('.optinpoint-overlay-bg').show();
	if($('.optinpoint-leftpane.adjh')){
		var ah = $('.optinpoint-leftpane.adjh').height(),
			bh =$('#optinpoint-main').height();
			if(ah < bh)$('.optinpoint-leftpane.adjh').css('height',bh+1);
	}
	x=1;
	if(oppoisset(optinpoint.lite_close_time)){
			setup();
	}
}

function hide_oppo_litebox(){
	$('.optinpoint-overlay-bg').hide();
}
function show_oppo_topbar(){
	if((oppoisset(optinpoint.topbar_behave_cookie) && document.cookie.indexOf("optinpointt_show") >= 0))return;
	$('#optinpointt').removeClass('optinpointt-close');
}
function hide_oppo_topbar(){
	$('#optinpointt').addClass('optinpointt-close');
}
function show_oppo_flipbox(){
	var scp = 50/100;
	$(document).scroll(function() {
		if(flipclosed)return;
		if($(window).scrollTop()+ $(window).height()*scp >= $(document).height()*scp)
			$('.optinpointf').removeClass('optinpointf-close');
		else
			$('.optinpointf').addClass('optinpointf-close');
	});
}
function hide_oppo_flipbox(){
	if($('.optinpointf').hasClass('optinpointf-close'))
		$('.optinpointf').removeClass('optinpointf-close');
	else{
		$('.optinpointf').addClass('optinpointf-close');
		flipclosed=1;
	}
}

function oppo_setup() {
	document.addEventListener("mousemove", opporesetTimer, false);
	document.addEventListener("mousedown", opporesetTimer, false);
	document.addEventListener("keypress", opporesetTimer, false);
	document.addEventListener("DOMMouseScroll", opporesetTimer, false);
	document.addEventListener("mousewheel", opporesetTimer, false);
	document.addEventListener("touchmove", opporesetTimer, false);
	document.addEventListener("MSPointerMove", opporesetTimer, false);
	oppostartTimer();
}
function oppostartTimer() {
	oppotimeoutID = window.setTimeout(oppogoInactive, optinpoint.lite_behave_time*1000);
}
function opporesetTimer(e) {
	window.clearTimeout(oppotimeoutID);oppo_setup();
}
function oppogoInactive() {
	 if(x==0)show_oppo_litebox();
}
function setups() {
	document.addEventListener("mousemove", resetTimers, false);
	document.addEventListener("mousedown", resetTimers, false);
	document.addEventListener("keypress", resetTimers, false);
	document.addEventListener("DOMMouseScroll", resetTimers, false);
	document.addEventListener("mousewheel", resetTimers, false);
	document.addEventListener("touchmove", resetTimers, false);
	document.addEventListener("MSPointerMove", resetTimers, false);
	startTimers();
}
function startTimers() {
	timeoutIDs = window.setTimeout(goInactives, optinpoint.slider_behave_time * 1000);
}
function resetTimers(e) {
	window.clearTimeout(timeoutIDs);
	setups();
}
function goInactives() {
	if(s==0){$.oppocsld('open', 'optinpoints');s=1;}
}
function setup() {
	document.addEventListener("mousemove", resetTimer, false);
	document.addEventListener("mousedown", resetTimer, false);
	document.addEventListener("keypress", resetTimer, false);
	document.addEventListener("DOMMouseScroll", resetTimer, false);
	document.addEventListener("mousewheel", resetTimer, false);
	document.addEventListener("touchmove", resetTimer, false);
	document.addEventListener("MSPointerMove", resetTimer, false);
	startTimer();
}
function startTimer() {
	timeoutID = window.setTimeout(goInactive, optinpoint.lite_close_time*1000);
}
function resetTimer(e) {
	window.clearTimeout(timeoutID);setup();
}
function goInactive() {
	hide_oppo_litebox();
}
function oppovalidate(f,w){
	var a;
	switch(f){
		case 'email':a=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i),e=a.test(w);
			break;
		case 'number':a=new RegExp(/^[0-9]*$/gm),e=a.test(w);
			break;
		case 'url':a=new RegExp(/^(ftp|http|https):\/\/[^ "]+$/g),e=a.test(w);
			break;
		case 'decimalone':a=new RegExp(/^[0-9]+(\.[0-9])?$/gm),e=a.test(w);
			break;
		case 'date':a=new RegExp(/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}?$/gm),e=a.test(w);
			break;
		default:e=true;
			break;
	}
	return e?!0:!1;
}
	});

}(jQuery));
function oppoisset(){var r,t=arguments,n=t.length,e=0;if(0===n)throw new Error("Empty oppoisset");for(;e!==n;){if(t[e]===r||null===t[e])return!1;e++}return!0}
var oppo_errmsg = [
	optinpoint.errorrf || '* Field Required',
	optinpoint.errorfe || '* Invalid Entry',
	optinpoint.erroras || 'Already subscribed to Newsletters',
	optinpoint.errorue || 'An unknown error occurred processing your request. Please try again later.',
	"Please configure the plugin properly"
];