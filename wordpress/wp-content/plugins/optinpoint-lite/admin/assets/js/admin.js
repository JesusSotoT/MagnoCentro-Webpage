(function(e){"use strict";function t(t,n){var r=this,i=t.attr("oppo-sel-name")||n.name||"";t.parent().hide();var s=t.css("width");t.parent().show();if(s=="0px"){s=t.outerWidth()+20}this.$el=t.hide();this.options=n;this.$parent=e("<div"+e.map(["class","title"],function(e){var t=r.$el.attr(e)||"";t=(e==="class"?"ms-parent"+(t?" ":""):"")+t;return t?" "+e+'="'+t+'"':""}).join("")+" />");this.$choice=e('<button type="button" class="ms-choice"><span class="placeholder">'+n.placeholder+"</span><div></div></button>");this.$drop=e('<div class="ms-drop '+n.position+'"></div>');this.$el.after(this.$parent);this.$parent.append(this.$choice);this.$parent.append(this.$drop);if(this.$el.prop("disabled")){this.$choice.addClass("disabled")}this.$parent.css("width",n.width||s);if(!this.options.keepOpen){e("body").click(function(t){if(e(t.target)[0]===r.$choice[0]||e(t.target).parents(".ms-choice")[0]===r.$choice[0]){return}if((e(t.target)[0]===r.$drop[0]||e(t.target).parents(".ms-drop")[0]!==r.$drop[0])&&r.options.isOpen){r.close()}})}this.selectAllName='name="selectAll'+i+'"';this.selectGroupName='name="selectGroup'+i+'"';this.selectItemName='name="'+i+'"'}t.prototype={constructor:t,init:function(){var t=this,n=[];if(this.options.filter){n.push('<div class="ms-search">','<input type="text" autocomplete="off" autocorrect="off" autocapitilize="off" spellcheck="false">',"</div>")}n.push("<ul>");if(this.options.selectAll&&!this.options.single){n.push('<li class="ms-select-all">',"<label>",'<input type="checkbox" '+this.selectAllName+" /> ",this.options.selectAllDelimiter[0]+this.options.selectAllText+this.options.selectAllDelimiter[1],"</label>","</li>")}e.each(this.$el.children(),function(e,r){n.push(t.optionToHtml(e,r))});n.push('<li class="ms-no-results">'+this.options.noMatchesFound+"</li>");n.push("</ul>");this.$drop.html(n.join(""));this.$drop.find("ul").css("max-height",this.options.maxHeight+"px");this.$drop.find(".multiple").css("width",this.options.multipleWidth+"px");this.$searchInput=this.$drop.find(".ms-search input");this.$selectAll=this.$drop.find("input["+this.selectAllName+"]");this.$selectGroups=this.$drop.find("input["+this.selectGroupName+"]");this.$selectItems=this.$drop.find("input["+this.selectItemName+"]:enabled");this.$disableItems=this.$drop.find("input["+this.selectItemName+"]:disabled");this.$noResults=this.$drop.find(".ms-no-results");this.events();this.updateSelectAll(true);this.update(true);if(this.options.isOpen){this.open()}},optionToHtml:function(t,n,r,i){var s=this,o=e(n),u=[],a=this.options.multiple,f=["class","title"],l=e.map(f,function(e,t){var n=e==="class"&&a;var r=o.attr(e)||"";return n||r?" "+e+'="'+(n?"multiple"+(r?" ":""):"")+r+'"':""}).join(""),c,h=this.options.single?"radio":"checkbox";if(o.is("option")){var p=o.val(),d=s.options.textTemplate(o),v=s.$el.attr("multiple")!=undefined?o.prop("selected"):o.attr("selected")=="selected",m=this.options.styler(p)?' style="'+this.options.styler(p)+'"':"";c=i||o.prop("disabled");if(this.options.blockSeparator>""&&this.options.blockSeparator==o.val()){u.push("<li"+l+m+">",'<label class="'+this.options.blockSeparator+(c?"disabled":"")+'">',d,"</label>","</li>")}else{u.push("<li"+l+m+">","<label"+(c?' class="disabled"':"")+">",'<input type="'+h+'" '+this.selectItemName+' value="'+p+'"'+(v?' checked="checked"':"")+(c?' disabled="disabled"':"")+(r?' data-group="'+r+'"':"")+"/> ",d,"</label>","</li>")}}else if(!r&&o.is("optgroup")){var g="group_"+t,y=o.attr("label");c=o.prop("disabled");u.push('<li class="group">','<label class="optgroup'+(c?" disabled":"")+'" data-group="'+g+'">',this.options.hideOptgroupCheckboxes?"":'<input type="checkbox" '+this.selectGroupName+(c?' disabled="disabled"':"")+" /> ",y,"</label>","</li>");e.each(o.children(),function(e,t){u.push(s.optionToHtml(e,t,g,c))})}return u.join("")},events:function(){function n(e){e.preventDefault();t[t.options.isOpen?"close":"open"]()}var t=this;var r=this.$el.parent().closest("label")[0]||e("label[for="+this.$el.attr("id")+"]")[0];if(r){e(r).off("click").on("click",function(e){if(e.target.nodeName.toLowerCase()!=="label"||e.target!==this){return}n(e);if(!t.options.filter||!t.options.isOpen){t.focus()}e.stopPropagation()})}this.$choice.off("click").on("click",n).off("focus").on("focus",this.options.onFocus).off("blur").on("blur",this.options.onBlur);this.$parent.off("keydown").on("keydown",function(e){switch(e.which){case 27:t.close();t.$choice.focus();break}});this.$searchInput.off("keydown").on("keydown",function(e){if(e.keyCode===9&&e.shiftKey){t.close()}}).off("keyup").on("keyup",function(e){if(t.options.filterAcceptOnEnter&&(e.which===13||e.which==32)&&t.$searchInput.val()){t.$selectAll.click();t.close();t.focus();return}t.filter()});this.$selectAll.off("click").on("click",function(){var n=e(this).prop("checked"),r=t.$selectItems.filter(":visible");if(r.length===t.$selectItems.length){t[n?"checkAll":"uncheckAll"]()}else{t.$selectGroups.prop("checked",n);r.prop("checked",n);t.options[n?"onCheckAll":"onUncheckAll"]();t.update()}});this.$selectGroups.off("click").on("click",function(){var n=e(this).parent().attr("data-group"),r=t.$selectItems.filter(":visible"),i=r.filter('[data-group="'+n+'"]'),s=i.length!==i.filter(":checked").length;i.prop("checked",s);t.updateSelectAll();t.update();t.options.onOptgroupClick({label:e(this).parent().text(),checked:s,children:i.get()})});this.$selectItems.off("click").on("click",function(){t.updateSelectAll();t.update();t.updateOptGroupSelect();t.options.onClick({label:e(this).parent().text(),value:e(this).val(),checked:e(this).prop("checked")});if(t.options.single&&t.options.isOpen&&!t.options.keepOpen){t.close()}})},open:function(){if(this.$choice.hasClass("disabled")){return}this.options.isOpen=true;this.$choice.find(">div").addClass("open");this.$drop.slideDown();this.$selectAll.parent().show();this.$noResults.hide();if(this.$el.children().length===0){this.$selectAll.parent().hide();this.$noResults.show()}if(this.options.container){var t=this.$drop.offset();this.$drop.appendTo(e(this.options.container));this.$drop.offset({top:t.top,left:t.left})}if(this.options.filter){this.$searchInput.val("");this.$searchInput.focus();this.filter()}this.options.onOpen()},close:function(){this.options.isOpen=false;this.$choice.find(">div").removeClass("open");this.$drop.slideUp();if(this.options.container){this.$parent.append(this.$drop);this.$drop.css({top:"auto",left:"auto"})}this.options.onClose()},update:function(t){var n=this.getSelects(),r=this.$choice.find(">span");if(n.length===0){r.addClass("placeholder").html(this.options.placeholder)}else if(this.options.countSelected&&n.length<this.options.minumimCountSelected){r.removeClass("placeholder").html((this.options.displayValues?n:this.getSelects("text")).join(this.options.delimiter))}else if(this.options.allSelected&&n.length===this.$selectItems.length+this.$disableItems.length){r.removeClass("placeholder").html(this.options.allSelected)}else if((this.options.countSelected||this.options.etcaetera)&&n.length>this.options.minumimCountSelected){if(this.options.etcaetera){r.removeClass("placeholder").html((this.options.displayValues?n:this.getSelects("text").slice(0,this.options.minumimCountSelected)).join(this.options.delimiter)+"...")}else{r.removeClass("placeholder").html(this.options.countSelected.replace("#",n.length).replace("%",this.$selectItems.length+this.$disableItems.length))}}else{r.removeClass("placeholder").html((this.options.displayValues?n:this.getSelects("text")).join(this.options.delimiter))}this.$el.val(this.getSelects());this.$drop.find("li").removeClass("selected");this.$drop.find("input["+this.selectItemName+"]:checked").each(function(){e(this).parents("li").first().addClass("selected")});if(!t){this.$el.trigger("change")}},updateSelectAll:function(e){var t=this.$selectItems;if(!e){t=t.filter(":visible")}this.$selectAll.prop("checked",t.length&&t.length===t.filter(":checked").length);if(this.$selectAll.prop("checked")){this.options.onCheckAll()}},updateOptGroupSelect:function(){var t=this.$selectItems.filter(":visible");e.each(this.$selectGroups,function(n,r){var i=e(r).parent().attr("data-group"),s=t.filter('[data-group="'+i+'"]');e(r).prop("checked",s.length&&s.length===s.filter(":checked").length)})},getSelects:function(t){var n=this,r=[],i=[];this.$drop.find("input["+this.selectItemName+"]:checked").each(function(){r.push(e(this).parents("li").first().text());i.push(e(this).val())});if(t==="text"&&this.$selectGroups.length){r=[];this.$selectGroups.each(function(){var t=[],i=e.trim(e(this).parent().text()),s=e(this).parent().data("group"),o=n.$drop.find("["+n.selectItemName+'][data-group="'+s+'"]'),u=o.filter(":checked");if(u.length===0){return}t.push("[");t.push(i);if(o.length>u.length){var a=[];u.each(function(){a.push(e(this).parent().text())});t.push(": "+a.join(", "))}t.push("]");r.push(t.join(""))})}return t==="text"?r:i},setSelects:function(t){var n=this;this.$selectItems.prop("checked",false);e.each(t,function(e,t){n.$selectItems.filter('[value="'+t+'"]').prop("checked",true)});this.$selectAll.prop("checked",this.$selectItems.length===this.$selectItems.filter(":checked").length);this.update()},enable:function(){this.$choice.removeClass("disabled")},disable:function(){this.$choice.addClass("disabled")},checkAll:function(){this.$selectItems.prop("checked",true);this.$selectGroups.prop("checked",true);this.$selectAll.prop("checked",true);this.update();this.options.onCheckAll()},uncheckAll:function(){this.$selectItems.prop("checked",false);this.$selectGroups.prop("checked",false);this.$selectAll.prop("checked",false);this.update();this.options.onUncheckAll()},focus:function(){this.$choice.focus();this.options.onFocus()},blur:function(){this.$choice.blur();this.options.onBlur()},refresh:function(){this.init()},filter:function(){var t=this,n=e.trim(this.$searchInput.val()).toLowerCase();if(n.length===0){this.$selectItems.parent().show();this.$disableItems.parent().show();this.$selectGroups.parent().show()}else{this.$selectItems.each(function(){var t=e(this).parent();t[t.text().toLowerCase().indexOf(n)<0?"hide":"show"]()});this.$disableItems.parent().hide();this.$selectGroups.each(function(){var n=e(this).parent();var r=n.attr("data-group"),i=t.$selectItems.filter(":visible");n[i.filter('[data-group="'+r+'"]').length===0?"hide":"show"]()});if(this.$selectItems.filter(":visible").length){this.$selectAll.parent().show();this.$noResults.hide()}else{this.$selectAll.parent().hide();this.$noResults.show()}}this.updateOptGroupSelect();this.updateSelectAll()}};e.fn.multipleSelect=function(){var n=arguments[0],r=arguments,i,s=["getSelects","setSelects","enable","disable","checkAll","uncheckAll","focus","blur","refresh"];this.each(function(){var o=e(this),u=o.data("multipleSelect"),a=e.extend({},e.fn.multipleSelect.defaults,o.data(),typeof n==="object"&&n);if(!u){u=new t(o,a);o.data("multipleSelect",u)}if(typeof n==="string"){if(e.inArray(n,s)<0){throw"Unknown method: "+n}i=u[n](r[1])}else{u.init();if(r[1]){i=u[r[1]].apply(u,[].slice.call(r,2))}}});return i?i:this};e.fn.multipleSelect.defaults={name:"",isOpen:false,placeholder:"",selectAll:true,selectAllText:"Select all",selectAllDelimiter:["[","]"],allSelected:"All selected",minumimCountSelected:3,countSelected:"# of % selected",noMatchesFound:"No matches found",multiple:false,multipleWidth:80,single:false,filter:false,width:undefined,maxHeight:250,container:null,position:"bottom",keepOpen:false,blockSeparator:"",displayValues:false,delimiter:", ",styler:function(){return false},textTemplate:function(e){return e.text()},onOpen:function(){return false},onClose:function(){return false},onCheckAll:function(){return false},onUncheckAll:function(){return false},onFocus:function(){return false},onBlur:function(){return false},onOptgroupClick:function(){return false},onClick:function(){return false}}})(jQuery);!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}
!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){"use strict";function b(){var a=document.createElement("input");return a.setAttribute("type","range"),"text"!==a.type}function c(a,b){var c=Array.prototype.slice.call(arguments,2);return setTimeout(function(){return a.apply(null,c)},b)}function d(a,b){return b=b||100,function(){if(!a.debouncing){var c=Array.prototype.slice.apply(arguments);a.lastReturnVal=a.apply(window,c),a.debouncing=!0}return clearTimeout(a.debounceTimeout),a.debounceTimeout=setTimeout(function(){a.debouncing=!1},b),a.lastReturnVal}}function e(a){return a&&(0===a.offsetWidth||0===a.offsetHeight||a.open===!1)}function f(a){for(var b=[],c=a.parentNode;e(c);)b.push(c),c=c.parentNode;return b}function g(a,b){function c(a){"undefined"!=typeof a.open&&(a.open=a.open?!1:!0)}var d=f(a),e=d.length,g=[],h=a[b];if(e){for(var i=0;e>i;i++)g[i]=d[i].style.cssText,d[i].style.setProperty?d[i].style.setProperty("display","block","important"):d[i].style.cssText+=";display: block !important",d[i].style.height="0",d[i].style.overflow="hidden",d[i].style.visibility="hidden",c(d[i]);h=a[b];for(var j=0;e>j;j++)d[j].style.cssText=g[j],c(d[j])}return h}function h(a,b){var c=parseFloat(a);return Number.isNaN(c)?b:c}function i(a){return a.charAt(0).toUpperCase()+a.substr(1)}function j(b,e){if(this.$window=a(window),this.$document=a(document),this.$element=a(b),this.options=a.extend({},n,e),this.polyfill=this.options.polyfill,this.orientation=this.$element[0].getAttribute("data-orientation")||this.options.orientation,this.onInit=this.options.onInit,this.onSlide=this.options.onSlide,this.onSlideEnd=this.options.onSlideEnd,this.DIMENSION=o.orientation[this.orientation].dimension,this.DIRECTION=o.orientation[this.orientation].direction,this.DIRECTION_STYLE=o.orientation[this.orientation].directionStyle,this.COORDINATE=o.orientation[this.orientation].coordinate,this.polyfill&&m)return!1;this.identifier="js-"+k+"-"+l++,this.startEvent=this.options.startEvent.join("."+this.identifier+" ")+"."+this.identifier,this.moveEvent=this.options.moveEvent.join("."+this.identifier+" ")+"."+this.identifier,this.endEvent=this.options.endEvent.join("."+this.identifier+" ")+"."+this.identifier,this.toFixed=(this.step+"").replace(".","").length-1,this.$fill=a('<div class="'+this.options.fillClass+'" />'),this.$handle=a('<div class="'+this.options.handleClass+'" />'),this.$range=a('<div class="'+this.options.rangeClass+" "+this.options[this.orientation+"Class"]+'" id="'+this.identifier+'" />').insertAfter(this.$element).prepend(this.$fill,this.$handle),this.$element.css({position:"absolute",width:"1px",height:"1px",overflow:"hidden",opacity:"0"}),this.handleDown=a.proxy(this.handleDown,this),this.handleMove=a.proxy(this.handleMove,this),this.handleEnd=a.proxy(this.handleEnd,this),this.init();var f=this;this.$window.on("resize."+this.identifier,d(function(){c(function(){f.update()},300)},20)),this.$document.on(this.startEvent,"#"+this.identifier+":not(."+this.options.disabledClass+")",this.handleDown),this.$element.on("change."+this.identifier,function(a,b){if(!b||b.origin!==f.identifier){var c=a.target.value,d=f.getPositionFromValue(c);f.setPosition(d)}})}Number.isNaN=Number.isNaN||function(a){return"number"==typeof a&&a!==a};var k="rangeslider",l=0,m=b(),n={polyfill:!0,orientation:"horizontal",rangeClass:"rangeslider",disabledClass:"rangeslider--disabled",horizontalClass:"rangeslider--horizontal",verticalClass:"rangeslider--vertical",fillClass:"rangeslider__fill",handleClass:"rangeslider__handle",startEvent:["mousedown","touchstart","pointerdown"],moveEvent:["mousemove","touchmove","pointermove"],endEvent:["mouseup","touchend","pointerup"]},o={orientation:{horizontal:{dimension:"width",direction:"left",directionStyle:"left",coordinate:"x"},vertical:{dimension:"height",direction:"top",directionStyle:"bottom",coordinate:"y"}}};j.prototype.init=function(){this.update(!0,!1),this.onInit&&"function"==typeof this.onInit&&this.onInit()},j.prototype.update=function(a,b){a=a||!1,a&&(this.min=h(this.$element[0].getAttribute("min"),0),this.max=h(this.$element[0].getAttribute("max"),100),this.value=h(this.$element[0].value,Math.round(this.min+(this.max-this.min)/2)),this.step=h(this.$element[0].getAttribute("step"),1)),this.handleDimension=g(this.$handle[0],"offset"+i(this.DIMENSION)),this.rangeDimension=g(this.$range[0],"offset"+i(this.DIMENSION)),this.maxHandlePos=this.rangeDimension-this.handleDimension,this.grabPos=this.handleDimension/2,this.position=this.getPositionFromValue(this.value),this.$element[0].disabled?this.$range.addClass(this.options.disabledClass):this.$range.removeClass(this.options.disabledClass),this.setPosition(this.position,b)},j.prototype.handleDown=function(a){if(this.$document.on(this.moveEvent,this.handleMove),this.$document.on(this.endEvent,this.handleEnd),!((" "+a.target.className+" ").replace(/[\n\t]/g," ").indexOf(this.options.handleClass)>-1)){var b=this.getRelativePosition(a),c=this.$range[0].getBoundingClientRect()[this.DIRECTION],d=this.getPositionFromNode(this.$handle[0])-c,e="vertical"===this.orientation?this.maxHandlePos-(b-this.grabPos):b-this.grabPos;this.setPosition(e),b>=d&&b<d+this.handleDimension&&(this.grabPos=b-d)}},j.prototype.handleMove=function(a){a.preventDefault();var b=this.getRelativePosition(a),c="vertical"===this.orientation?this.maxHandlePos-(b-this.grabPos):b-this.grabPos;this.setPosition(c)},j.prototype.handleEnd=function(a){a.preventDefault(),this.$document.off(this.moveEvent,this.handleMove),this.$document.off(this.endEvent,this.handleEnd),this.$element.trigger("change",{origin:this.identifier}),this.onSlideEnd&&"function"==typeof this.onSlideEnd&&this.onSlideEnd(this.position,this.value)},j.prototype.cap=function(a,b,c){return b>a?b:a>c?c:a},j.prototype.setPosition=function(a,b){var c,d;void 0===b&&(b=!0),c=this.getValueFromPosition(this.cap(a,0,this.maxHandlePos)),d=this.getPositionFromValue(c),this.$fill[0].style[this.DIMENSION]=d+this.grabPos+"px",this.$handle[0].style[this.DIRECTION_STYLE]=d+"px",this.setValue(c),this.position=d,this.value=c,b&&this.onSlide&&"function"==typeof this.onSlide&&this.onSlide(d,c)},j.prototype.getPositionFromNode=function(a){for(var b=0;null!==a;)b+=a.offsetLeft,a=a.offsetParent;return b},j.prototype.getRelativePosition=function(a){var b=i(this.COORDINATE),c=this.$range[0].getBoundingClientRect()[this.DIRECTION],d=0;return"undefined"!=typeof a["page"+b]?d=a["client"+b]:"undefined"!=typeof a.originalEvent["client"+b]?d=a.originalEvent["client"+b]:a.originalEvent.touches&&a.originalEvent.touches[0]&&"undefined"!=typeof a.originalEvent.touches[0]["client"+b]?d=a.originalEvent.touches[0]["client"+b]:a.currentPoint&&"undefined"!=typeof a.currentPoint[this.COORDINATE]&&(d=a.currentPoint[this.COORDINATE]),d-c},j.prototype.getPositionFromValue=function(a){var b,c;return b=(a-this.min)/(this.max-this.min),c=Number.isNaN(b)?0:b*this.maxHandlePos},j.prototype.getValueFromPosition=function(a){var b,c;return b=a/(this.maxHandlePos||1),c=this.step*Math.round(b*(this.max-this.min)/this.step)+this.min,Number(c.toFixed(this.toFixed))},j.prototype.setValue=function(a){(a!==this.value||""===this.$element[0].value)&&this.$element.val(a).trigger("input",{origin:this.identifier})},j.prototype.destroy=function(){this.$document.off("."+this.identifier),this.$window.off("."+this.identifier),this.$element.off("."+this.identifier).removeAttr("style").removeData("plugin_"+k),this.$range&&this.$range.length&&this.$range[0].parentNode.removeChild(this.$range[0])},a.fn[k]=function(b){var c=Array.prototype.slice.call(arguments,1);return this.each(function(){var d=a(this),e=d.data("plugin_"+k);e||d.data("plugin_"+k,e=new j(this,b)),"string"==typeof b&&e[b].apply(e,c)})}});
jQuery&&function($){function i(i,t){var o=$('<div class="minicolors" />'),n=$.minicolors.defaults;i.data("minicolors-initialized")||(t=$.extend(!0,{},n,t),o.addClass("minicolors-theme-"+t.theme).toggleClass("minicolors-with-opacity",t.opacity).toggleClass("minicolors-no-data-uris",t.dataUris!==!0),void 0!==t.position&&$.each(t.position.split(" "),function(){o.addClass("minicolors-position-"+this)}),i.addClass("minicolors-input").data("minicolors-initialized",!1).data("minicolors-settings",t).prop("size",7).wrap(o).after('<div class="minicolors-panel minicolors-slider-'+t.control+'"><div class="minicolors-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-opacity-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-grid minicolors-sprite"><div class="minicolors-grid-inner"></div><div class="minicolors-picker"><div></div></div></div></div>'),t.inline||(i.after('<span class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color"></span></span>'),i.next(".minicolors-swatch").on("click",function(t){t.preventDefault(),i.focus()})),i.parent().find(".minicolors-panel").on("selectstart",function(){return!1}).end(),t.inline&&i.parent().addClass("minicolors-inline"),e(i,!1),i.data("minicolors-initialized",!0))}function t(i){var t=i.parent();i.removeData("minicolors-initialized").removeData("minicolors-settings").removeProp("size").removeClass("minicolors-input"),t.before(i).remove()}function o(i){var t=i.parent(),o=t.find(".minicolors-panel"),s=i.data("minicolors-settings");!i.data("minicolors-initialized")||i.prop("disabled")||t.hasClass("minicolors-inline")||t.hasClass("minicolors-focus")||(n(),t.addClass("minicolors-focus"),o.stop(!0,!0).fadeIn(s.showSpeed,function(){s.show&&s.show.call(i.get(0))}))}function n(){$(".minicolors-focus").each(function(){var i=$(this),t=i.find(".minicolors-input"),o=i.find(".minicolors-panel"),n=t.data("minicolors-settings");o.fadeOut(n.hideSpeed,function(){n.hide&&n.hide.call(t.get(0)),i.removeClass("minicolors-focus")})})}function s(i,t,o){var n=i.parents(".minicolors").find(".minicolors-input"),s=n.data("minicolors-settings"),e=i.find("[class$=-picker]"),r=i.offset().left,c=i.offset().top,l=Math.round(t.pageX-r),h=Math.round(t.pageY-c),d=o?s.animationSpeed:0,u,g,m,p;t.originalEvent.changedTouches&&(l=t.originalEvent.changedTouches[0].pageX-r,h=t.originalEvent.changedTouches[0].pageY-c),0>l&&(l=0),0>h&&(h=0),l>i.width()&&(l=i.width()),h>i.height()&&(h=i.height()),i.parent().is(".minicolors-slider-wheel")&&e.parent().is(".minicolors-grid")&&(u=75-l,g=75-h,m=Math.sqrt(u*u+g*g),p=Math.atan2(g,u),0>p&&(p+=2*Math.PI),m>75&&(m=75,l=75-75*Math.cos(p),h=75-75*Math.sin(p)),l=Math.round(l),h=Math.round(h)),i.is(".minicolors-grid")?e.stop(!0).animate({top:h+"px",left:l+"px"},d,s.animationEasing,function(){a(n,i)}):e.stop(!0).animate({top:h+"px"},d,s.animationEasing,function(){a(n,i)})}function a(i,t){function o(i,t){var o,n;return i.length&&t?(o=i.offset().left,n=i.offset().top,{x:o-t.offset().left+i.outerWidth()/2,y:n-t.offset().top+i.outerHeight()/2}):null}var n,s,a,e,c,l,d,g=i.val(),m=i.attr("data-opacity"),f=i.parent(),v=i.data("minicolors-settings"),b=f.find(".minicolors-swatch"),y=f.find(".minicolors-grid"),M=f.find(".minicolors-slider"),w=f.find(".minicolors-opacity-slider"),x=y.find("[class$=-picker]"),C=M.find("[class$=-picker]"),k=w.find("[class$=-picker]"),S=o(x,y),z=o(C,M),D=o(k,w);if(t.is(".minicolors-grid, .minicolors-slider")){switch(v.control){case"wheel":e=y.width()/2-S.x,c=y.height()/2-S.y,l=Math.sqrt(e*e+c*c),d=Math.atan2(c,e),0>d&&(d+=2*Math.PI),l>75&&(l=75,S.x=69-75*Math.cos(d),S.y=69-75*Math.sin(d)),s=u(l/.75,0,100),n=u(180*d/Math.PI,0,360),a=u(100-Math.floor(z.y*(100/M.height())),0,100),g=p({h:n,s:s,b:a}),M.css("backgroundColor",p({h:n,s:s,b:100}));break;case"saturation":n=u(parseInt(S.x*(360/y.width()),10),0,360),s=u(100-Math.floor(z.y*(100/M.height())),0,100),a=u(100-Math.floor(S.y*(100/y.height())),0,100),g=p({h:n,s:s,b:a}),M.css("backgroundColor",p({h:n,s:100,b:a})),f.find(".minicolors-grid-inner").css("opacity",s/100);break;case"brightness":n=u(parseInt(S.x*(360/y.width()),10),0,360),s=u(100-Math.floor(S.y*(100/y.height())),0,100),a=u(100-Math.floor(z.y*(100/M.height())),0,100),g=p({h:n,s:s,b:a}),M.css("backgroundColor",p({h:n,s:s,b:100})),f.find(".minicolors-grid-inner").css("opacity",1-a/100);break;default:n=u(360-parseInt(z.y*(360/M.height()),10),0,360),s=u(Math.floor(S.x*(100/y.width())),0,100),a=u(100-Math.floor(S.y*(100/y.height())),0,100),g=p({h:n,s:s,b:a}),y.css("backgroundColor",p({h:n,s:100,b:100}))}i.val(h(g,v.letterCase))}t.is(".minicolors-opacity-slider")&&(m=v.opacity?parseFloat(1-D.y/w.height()).toFixed(2):1,v.opacity&&i.attr("data-opacity",m)),b.find("SPAN").css({backgroundColor:g,opacity:m}),r(i,g,m)}function e(i,t){var o,n,s,a,e,c,l,g=i.parent(),m=i.data("minicolors-settings"),v=g.find(".minicolors-swatch"),b=g.find(".minicolors-grid"),y=g.find(".minicolors-slider"),M=g.find(".minicolors-opacity-slider"),w=b.find("[class$=-picker]"),x=y.find("[class$=-picker]"),C=M.find("[class$=-picker]");switch(o=h(d(i.val(),!0),m.letterCase),o||(o=h(d(m.defaultValue,!0),m.letterCase)),n=f(o),t||i.val(o),m.opacity&&(s=""===i.attr("data-opacity")?1:u(parseFloat(i.attr("data-opacity")).toFixed(2),0,1),isNaN(s)&&(s=1),i.attr("data-opacity",s),v.find("SPAN").css("opacity",s),e=u(M.height()-M.height()*s,0,M.height()),C.css("top",e+"px")),v.find("SPAN").css("backgroundColor",o),m.control){case"wheel":c=u(Math.ceil(.75*n.s),0,b.height()/2),l=n.h*Math.PI/180,a=u(75-Math.cos(l)*c,0,b.width()),e=u(75-Math.sin(l)*c,0,b.height()),w.css({top:e+"px",left:a+"px"}),e=150-n.b/(100/b.height()),""===o&&(e=0),x.css("top",e+"px"),y.css("backgroundColor",p({h:n.h,s:n.s,b:100}));break;case"saturation":a=u(5*n.h/12,0,150),e=u(b.height()-Math.ceil(n.b/(100/b.height())),0,b.height()),w.css({top:e+"px",left:a+"px"}),e=u(y.height()-n.s*(y.height()/100),0,y.height()),x.css("top",e+"px"),y.css("backgroundColor",p({h:n.h,s:100,b:n.b})),g.find(".minicolors-grid-inner").css("opacity",n.s/100);break;case"brightness":a=u(5*n.h/12,0,150),e=u(b.height()-Math.ceil(n.s/(100/b.height())),0,b.height()),w.css({top:e+"px",left:a+"px"}),e=u(y.height()-n.b*(y.height()/100),0,y.height()),x.css("top",e+"px"),y.css("backgroundColor",p({h:n.h,s:n.s,b:100})),g.find(".minicolors-grid-inner").css("opacity",1-n.b/100);break;default:a=u(Math.ceil(n.s/(100/b.width())),0,b.width()),e=u(b.height()-Math.ceil(n.b/(100/b.height())),0,b.height()),w.css({top:e+"px",left:a+"px"}),e=u(y.height()-n.h/(360/y.height()),0,y.height()),x.css("top",e+"px"),b.css("backgroundColor",p({h:n.h,s:100,b:100}))}i.data("minicolors-initialized")&&r(i,o,s)}function r(i,t,o){var n=i.data("minicolors-settings"),s=i.data("minicolors-lastChange");s&&s.hex===t&&s.opacity===o||(i.data("minicolors-lastChange",{hex:t,opacity:o}),n.change&&(n.changeDelay?(clearTimeout(i.data("minicolors-changeTimeout")),i.data("minicolors-changeTimeout",setTimeout(function(){n.change.call(i.get(0),t,o)},n.changeDelay))):n.change.call(i.get(0),t,o)),i.trigger("change").trigger("input"))}function c(i){var t=d($(i).val(),!0),o=b(t),n=$(i).attr("data-opacity");return o?(void 0!==n&&$.extend(o,{a:parseFloat(n)}),o):null}function l(i,t){var o=d($(i).val(),!0),n=b(o),s=$(i).attr("data-opacity");return n?(void 0===s&&(s=1),t?"rgba("+n.r+", "+n.g+", "+n.b+", "+parseFloat(s)+")":"rgb("+n.r+", "+n.g+", "+n.b+")"):null}function h(i,t){return"uppercase"===t?i.toUpperCase():i.toLowerCase()}function d(i,t){return i=i.replace(/[^A-F0-9]/gi,""),3!==i.length&&6!==i.length?"":(3===i.length&&t&&(i=i[0]+i[0]+i[1]+i[1]+i[2]+i[2]),"#"+i)}function u(i,t,o){return t>i&&(i=t),i>o&&(i=o),i}function g(i){var t={},o=Math.round(i.h),n=Math.round(255*i.s/100),s=Math.round(255*i.b/100);if(0===n)t.r=t.g=t.b=s;else{var a=s,e=(255-n)*s/255,r=(a-e)*(o%60)/60;360===o&&(o=0),60>o?(t.r=a,t.b=e,t.g=e+r):120>o?(t.g=a,t.b=e,t.r=a-r):180>o?(t.g=a,t.r=e,t.b=e+r):240>o?(t.b=a,t.r=e,t.g=a-r):300>o?(t.b=a,t.g=e,t.r=e+r):360>o?(t.r=a,t.g=e,t.b=a-r):(t.r=0,t.g=0,t.b=0)}return{r:Math.round(t.r),g:Math.round(t.g),b:Math.round(t.b)}}function m(i){var t=[i.r.toString(16),i.g.toString(16),i.b.toString(16)];return $.each(t,function(i,o){1===o.length&&(t[i]="0"+o)}),"#"+t.join("")}function p(i){return m(g(i))}function f(i){var t=v(b(i));return 0===t.s&&(t.h=360),t}function v(i){var t={h:0,s:0,b:0},o=Math.min(i.r,i.g,i.b),n=Math.max(i.r,i.g,i.b),s=n-o;return t.b=n,t.s=0!==n?255*s/n:0,t.h=0!==t.s?i.r===n?(i.g-i.b)/s:i.g===n?2+(i.b-i.r)/s:4+(i.r-i.g)/s:-1,t.h*=60,t.h<0&&(t.h+=360),t.s*=100/255,t.b*=100/255,t}function b(i){return i=parseInt(i.indexOf("#")>-1?i.substring(1):i,16),{r:i>>16,g:(65280&i)>>8,b:255&i}}$.minicolors={defaults:{animationSpeed:50,animationEasing:"swing",change:null,changeDelay:0,control:"hue",dataUris:!0,defaultValue:"",hide:null,hideSpeed:100,inline:!1,letterCase:"lowercase",opacity:!1,position:"bottom left",show:null,showSpeed:100,theme:"default"}},$.extend($.fn,{minicolors:function(s,a){switch(s){case"destroy":return $(this).each(function(){t($(this))}),$(this);case"hide":return n(),$(this);case"opacity":return void 0===a?$(this).attr("data-opacity"):($(this).each(function(){e($(this).attr("data-opacity",a))}),$(this));case"rgbObject":return c($(this),"rgbaObject"===s);case"rgbString":case"rgbaString":return l($(this),"rgbaString"===s);case"settings":return void 0===a?$(this).data("minicolors-settings"):($(this).each(function(){var i=$(this).data("minicolors-settings")||{};t($(this)),$(this).minicolors($.extend(!0,i,a))}),$(this));case"show":return o($(this).eq(0)),$(this);case"value":return void 0===a?$(this).val():($(this).each(function(){e($(this).val(a))}),$(this));default:return"create"!==s&&(a=s),$(this).each(function(){i($(this),a)}),$(this)}}}),$(document).on("mousedown.minicolors touchstart.minicolors",function(i){$(i.target).parents().add(i.target).hasClass("minicolors")||n()}).on("mousedown.minicolors touchstart.minicolors",".minicolors-grid, .minicolors-slider, .minicolors-opacity-slider",function(i){var t=$(this);i.preventDefault(),$(document).data("minicolors-target",t),s(t,i,!0)}).on("mousemove.minicolors touchmove.minicolors",function(i){var t=$(document).data("minicolors-target");t&&s(t,i)}).on("mouseup.minicolors touchend.minicolors",function(){$(this).removeData("minicolors-target")}).on("mousedown.minicolors touchstart.minicolors",".minicolors-swatch",function(i){var t=$(this).parent().find(".minicolors-input");i.preventDefault(),o(t)}).on("focus.minicolors",".minicolors-input",function(){var i=$(this);i.data("minicolors-initialized")&&o(i)}).on("blur.minicolors",".minicolors-input",function(){var i=$(this),t=i.data("minicolors-settings");i.data("minicolors-initialized")&&(i.val(d(i.val(),!0)),""===i.val()&&i.val(d(t.defaultValue,!0)),i.val(h(i.val(),t.letterCase)))}).on("keydown.minicolors",".minicolors-input",function(i){var t=$(this);if(t.data("minicolors-initialized"))switch(i.keyCode){case 9:n();break;case 13:case 27:n(),t.blur()}}).on("keyup.minicolors",".minicolors-input",function(){var i=$(this);i.data("minicolors-initialized")&&e(i,!0)}).on("paste.minicolors",".minicolors-input",function(){var i=$(this);i.data("minicolors-initialized")&&setTimeout(function(){e(i,!0)},1)})}(jQuery);var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(r){var t,e,o,a,h,n,c,d="",C=0;for(r=Base64._utf8_encode(r);C<r.length;)t=r.charCodeAt(C++),e=r.charCodeAt(C++),o=r.charCodeAt(C++),a=t>>2,h=(3&t)<<4|e>>4,n=(15&e)<<2|o>>6,c=63&o,isNaN(e)?n=c=64:isNaN(o)&&(c=64),d=d+this._keyStr.charAt(a)+this._keyStr.charAt(h)+this._keyStr.charAt(n)+this._keyStr.charAt(c);return d},decode:function(r){var t,e,o,a,h,n,c,d="",C=0;for(r=r.replace(/[^A-Za-z0-9\+\/\=]/g,"");C<r.length;)a=this._keyStr.indexOf(r.charAt(C++)),h=this._keyStr.indexOf(r.charAt(C++)),n=this._keyStr.indexOf(r.charAt(C++)),c=this._keyStr.indexOf(r.charAt(C++)),t=a<<2|h>>4,e=(15&h)<<4|n>>2,o=(3&n)<<6|c,d+=String.fromCharCode(t),64!=n&&(d+=String.fromCharCode(e)),64!=c&&(d+=String.fromCharCode(o));return d=Base64._utf8_decode(d)},_utf8_encode:function(r){r=r.replace(/\r\n/g,"\n");for(var t="",e=0;e<r.length;e++){var o=r.charCodeAt(e);128>o?t+=String.fromCharCode(o):o>127&&2048>o?(t+=String.fromCharCode(o>>6|192),t+=String.fromCharCode(63&o|128)):(t+=String.fromCharCode(o>>12|224),t+=String.fromCharCode(o>>6&63|128),t+=String.fromCharCode(63&o|128))}return t},_utf8_decode:function(r){for(var t="",e=0,o=c1=c2=0;e<r.length;)o=r.charCodeAt(e),128>o?(t+=String.fromCharCode(o),e++):o>191&&224>o?(c2=r.charCodeAt(e+1),t+=String.fromCharCode((31&o)<<6|63&c2),e+=2):(c2=r.charCodeAt(e+1),c3=r.charCodeAt(e+2),t+=String.fromCharCode((15&o)<<12|(63&c2)<<6|63&c3),e+=3);return t}};
!function(a){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=a();else if("function"==typeof define&&define.amd)define([],a);else{var b;b="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,b.Quill=a()}}(function(){var a;return function b(a,c,d){function e(g,h){if(!c[g]){if(!a[g]){var i="function"==typeof require&&require;if(!h&&i)return i(g,!0);if(f)return f(g,!0);var j=new Error("Cannot find module '"+g+"'");throw j.code="MODULE_NOT_FOUND",j}var k=c[g]={exports:{}};a[g][0].call(k.exports,function(b){var c=a[g][1][b];return e(c?c:b)},k,k.exports,b,a,c,d)}return c[g].exports}for(var f="function"==typeof require&&require,g=0;g<d.length;g++)e(d[g]);return e}({1:[function(b,c,d){(function(b){(function(){function e(a,b,c){for(var d=a.length,e=c?d:-1;c?e--:++e<d;)if(b(a[e],e,a))return e;return-1}function f(a,b,c){if(b!==b)return i(a,c);for(var d=c-1,e=a.length;++d<e;)if(a[d]===b)return d;return-1}function g(a){return"function"==typeof a||!1}function h(a){return"string"==typeof a?a:null==a?"":a+""}function i(a,b,c){for(var d=a.length,e=b+(c?0:-1);c?e--:++e<d;){var f=a[e];if(f!==f)return e}return-1}function j(a){return!!a&&"object"==typeof a}function k(a,b){for(var c=-1,d=a.length,e=-1,f=[];++c<d;)a[c]===b&&(a[c]=yb,f[++e]=c);return f}function l(){}function m(){}function n(a){this.__wrapped__=a,this.__actions__=null,this.__dir__=1,this.__dropCount__=0,this.__filtered__=!1,this.__iteratees__=null,this.__takeCount__=Ic,this.__views__=null}function o(a){var b=a?a.length:0;for(this.data={hash:Cc(null),set:new yc};b--;)this.push(a[b])}function p(a,b){var c=a.data,d="string"==typeof b||Wa(b)?c.set.has(b):c.hash[b];return d?0:-1}function q(a){var b=this.data;"string"==typeof a||Wa(a)?b.set.add(a):b.hash[a]=!0}function r(a,b){var c=-1,d=a.length;for(b||(b=Array(d));++c<d;)b[c]=a[c];return b}function s(a,b){for(var c=-1,d=a.length;++c<d&&b(a[c],c,a)!==!1;);return a}function t(a,b){for(var c=-1,d=a.length;++c<d;)if(!b(a[c],c,a))return!1;return!0}function u(a,b){for(var c=-1,d=a.length,e=Array(d);++c<d;)e[c]=b(a[c],c,a);return e}function v(a,b,c,d){var e=-1,f=a.length;for(d&&f&&(c=a[++e]);++e<f;)c=b(c,a[e],e,a);return c}function w(a,b){for(var c=-1,d=a.length;++c<d;)if(b(a[c],c,a))return!0;return!1}function x(a,b){return a===kb?b:a}function y(a,b,c){for(var d=-1,e=md(b),f=e.length;++d<f;){var g=e[d],h=a[g],i=c(h,b[g],g,a,b);(i===i?i===h:h!==h)&&(h!==kb||g in a)||(a[g]=i)}return a}function z(a,b){return null==b?a:A(b,md(b),a)}function A(a,b,c){c||(c={});for(var d=-1,e=b.length;++d<e;){var f=b[d];c[f]=a[f]}return c}function B(a,b,c){var d=typeof a;return"function"==d?b===kb?a:Y(a,b,c):null==a?fb:"object"==d?P(a):b===kb?ib(a):Q(a,b)}function C(a,b,c,d,e,f,g){var h;if(c&&(h=e?c(a,d,e):c(a)),h!==kb)return h;if(!Wa(a))return a;var i=hd(a);if(i){if(h=ua(a),!b)return r(a,h)}else{var j=sc.call(a),k=j==Eb;if(j!=Hb&&j!=zb&&(!k||e))return ec[j]?wa(a,j,b):e?a:{};if(h=va(k?{}:a),!b)return z(h,a)}f||(f=[]),g||(g=[]);for(var l=f.length;l--;)if(f[l]==a)return g[l];return f.push(a),g.push(h),(i?s:J)(a,function(d,e){h[e]=C(d,b,c,e,a,f,g)}),h}function D(a,b,c){if("function"!=typeof a)throw new TypeError(xb);return setTimeout(function(){a.apply(kb,c)},b)}function E(a,b){var c=a?a.length:0,d=[];if(!c)return d;var e=-1,g=ra(),h=g==f,i=h&&b.length>=200?Vc(b):null,j=b.length;i&&(g=p,h=!1,b=i);a:for(;++e<c;){var k=a[e];if(h&&k===k){for(var l=j;l--;)if(b[l]===k)continue a;d.push(k)}else g(b,k,0)<0&&d.push(k)}return d}function F(a,b){var c=!0;return Sc(a,function(a,d,e){return c=!!b(a,d,e)}),c}function G(a,b,c,d){var e;return c(a,function(a,c,f){return b(a,c,f)?(e=d?c:a,!1):void 0}),e}function H(a,b,c){for(var d=-1,e=a.length,f=-1,g=[];++d<e;){var h=a[d];if(j(h)&&ya(h)&&(c||hd(h)||Ta(h))){b&&(h=H(h,b,c));for(var i=-1,k=h.length;++i<k;)g[++f]=h[i]}else c||(g[++f]=h)}return g}function I(a,b){return Tc(a,b,_a)}function J(a,b){return Tc(a,b,md)}function K(a,b,c){if(null!=a){c!==kb&&c in La(a)&&(b=[c]);for(var d=0,e=b.length;null!=a&&e>d;)a=a[b[d++]];return d&&d==e?a:kb}}function L(a,b,c,d,e,f){return a===b?!0:null==a||null==b||!Wa(a)&&!j(b)?a!==a&&b!==b:M(a,b,L,c,d,e,f)}function M(a,b,c,d,e,f,g){var h=hd(a),i=hd(b),j=Ab,k=Ab;h||(j=sc.call(a),j==zb?j=Hb:j!=Hb&&(h=$a(a))),i||(k=sc.call(b),k==zb?k=Hb:k!=Hb&&(i=$a(b)));var l=j==Hb,m=k==Hb,n=j==k;if(n&&!h&&!l)return na(a,b,j);if(!e){var o=l&&qc.call(a,"__wrapped__"),p=m&&qc.call(b,"__wrapped__");if(o||p)return c(o?a.value():a,p?b.value():b,d,e,f,g)}if(!n)return!1;f||(f=[]),g||(g=[]);for(var q=f.length;q--;)if(f[q]==a)return g[q]==b;f.push(a),g.push(b);var r=(h?ma:oa)(a,b,c,d,e,f,g);return f.pop(),g.pop(),r}function N(a,b,c){var d=b.length,e=d,f=!c;if(null==a)return!e;for(a=La(a);d--;){var g=b[d];if(f&&g[2]?g[1]!==a[g[0]]:!(g[0]in a))return!1}for(;++d<e;){g=b[d];var h=g[0],i=a[h],j=g[1];if(f&&g[2]){if(i===kb&&!(h in a))return!1}else{var k=c?c(i,j,h):kb;if(!(k===kb?L(j,i,c,!0):k))return!1}}return!0}function O(a,b){var c=-1,d=ya(a)?Array(a.length):[];return Sc(a,function(a,e,f){d[++c]=b(a,e,f)}),d}function P(a){var b=sa(a);if(1==b.length&&b[0][2]){var c=b[0][0],d=b[0][1];return function(a){return null==a?!1:a[c]===d&&(d!==kb||c in La(a))}}return function(a){return N(a,b)}}function Q(a,b){var c=hd(a),d=Ba(a)&&Ea(b),e=a+"";return a=Ma(a),function(f){if(null==f)return!1;var g=e;if(f=La(f),!(!c&&d||g in f)){if(f=1==a.length?f:K(f,U(a,0,-1)),null==f)return!1;g=Oa(a),f=La(f)}return f[g]===b?b!==kb||g in f:L(b,f[g],kb,!0)}}function R(a){return function(b){return null==b?kb:b[a]}}function S(a){var b=a+"";return a=Ma(a),function(c){return K(c,a,b)}}function T(a,b,c,d,e){return e(a,function(a,e,f){c=d?(d=!1,a):b(c,a,e,f)}),c}function U(a,b,c){var d=-1,e=a.length;b=null==b?0:+b||0,0>b&&(b=-b>e?0:e+b),c=c===kb||c>e?e:+c||0,0>c&&(c+=e),e=b>c?0:c-b>>>0,b>>>=0;for(var f=Array(e);++d<e;)f[d]=a[d+b];return f}function V(a,b){for(var c=-1,d=b.length,e=Array(d);++c<d;)e[c]=a[b[c]];return e}function W(a,b,c){var d=0,e=a?a.length:d;if("number"==typeof b&&b===b&&Lc>=e){for(;e>d;){var f=d+e>>>1,g=a[f];(c?b>=g:b>g)&&null!==g?d=f+1:e=f}return e}return X(a,b,fb,c)}function X(a,b,c,d){b=c(b);for(var e=0,f=a?a.length:0,g=b!==b,h=null===b,i=b===kb;f>e;){var j=wc((e+f)/2),k=c(a[j]),l=k!==kb,m=k===k;if(g)var n=m||d;else n=h?m&&l&&(d||null!=k):i?m&&(d||l):null==k?!1:d?b>=k:b>k;n?e=j+1:f=j}return Gc(f,Kc)}function Y(a,b,c){if("function"!=typeof a)return fb;if(b===kb)return a;switch(c){case 1:return function(c){return a.call(b,c)};case 3:return function(c,d,e){return a.call(b,c,d,e)};case 4:return function(c,d,e,f){return a.call(b,c,d,e,f)};case 5:return function(c,d,e,f,g){return a.call(b,c,d,e,f,g)}}return function(){return a.apply(b,arguments)}}function Z(a){return vc.call(a,0)}function $(a,b,c){for(var d=c.length,e=-1,f=Fc(a.length-d,0),g=-1,h=b.length,i=Array(f+h);++g<h;)i[g]=b[g];for(;++e<d;)i[c[e]]=a[e];for(;f--;)i[g++]=a[e++];return i}function _(a,b,c){for(var d=-1,e=c.length,f=-1,g=Fc(a.length-e,0),h=-1,i=b.length,j=Array(g+i);++f<g;)j[f]=a[f];for(var k=f;++h<i;)j[k+h]=b[h];for(;++d<e;)j[k+c[d]]=a[f++];return j}function aa(a){return Ra(function(b,c){var d=-1,e=null==b?0:c.length,f=e>2?c[e-2]:kb,g=e>2?c[2]:kb,h=e>1?c[e-1]:kb;for("function"==typeof f?(f=Y(f,h,5),e-=2):(f="function"==typeof h?h:kb,e-=f?1:0),g&&Aa(c[0],c[1],g)&&(f=3>e?kb:f,e=1);++d<e;){var i=c[d];i&&a(b,i,f)}return b})}function ba(a,b){return function(c,d){var e=c?Xc(c):0;if(!Da(e))return a(c,d);for(var f=b?e:-1,g=La(c);(b?f--:++f<e)&&d(g[f],f,g)!==!1;);return c}}function ca(a){return function(b,c,d){for(var e=La(b),f=d(b),g=f.length,h=a?g:-1;a?h--:++h<g;){var i=f[h];if(c(e[i],i,e)===!1)break}return b}}function da(a,b){function c(){var e=this&&this!==mc&&this instanceof c?d:a;return e.apply(b,arguments)}var d=ea(a);return c}function ea(a){return function(){var b=arguments;switch(b.length){case 0:return new a;case 1:return new a(b[0]);case 2:return new a(b[0],b[1]);case 3:return new a(b[0],b[1],b[2]);case 4:return new a(b[0],b[1],b[2],b[3]);case 5:return new a(b[0],b[1],b[2],b[3],b[4])}var c=Rc(a.prototype),d=a.apply(c,b);return Wa(d)?d:c}}function fa(a,b){return function(c,d,f){if(d=pa(d,f,3),hd(c)){var g=e(c,d,b);return g>-1?c[g]:kb}return G(c,d,a)}}function ga(a,b){return function(c,d,e){return"function"==typeof d&&e===kb&&hd(c)?a(c,d):b(c,Y(d,e,3))}}function ha(a){var b=Ra(function(c,d){var e=k(d,b.placeholder);return la(c,a,null,d,e)});return b}function ia(a,b){return function(c,d,e,f){var g=arguments.length<3;return"function"==typeof d&&f===kb&&hd(c)?a(c,d,e,g):T(c,pa(d,f,4),e,g,b)}}function ja(a,b,c,d,e,f,g,h,i,j){function l(){for(var u=arguments.length,v=u,w=Array(u);v--;)w[v]=arguments[v];if(d&&(w=$(w,d,e)),f&&(w=_(w,f,g)),p||s){var x=l.placeholder,y=k(w,x);if(u-=y.length,j>u){var z=h?r(h):null,A=Fc(j-u,0),B=p?y:null,C=p?null:y,D=p?w:null,E=p?null:w;b|=p?rb:sb,b&=~(p?sb:rb),q||(b&=~(mb|nb));var F=[a,b,c,D,B,E,C,z,i,A],G=ja.apply(kb,F);return Ca(a)&&Yc(G,F),G.placeholder=x,G}}var H=n?c:this,I=o?H[a]:a;return h&&(w=Ia(w,h)),m&&i<w.length&&(w.length=i),this&&this!==mc&&this instanceof l&&(I=t||ea(a)),I.apply(H,w)}var m=b&tb,n=b&mb,o=b&nb,p=b&pb,q=b&ob,s=b&qb,t=o?null:ea(a);return l}function ka(a,b,c,d){function e(){for(var b=-1,h=arguments.length,i=-1,j=d.length,k=Array(h+j);++i<j;)k[i]=d[i];for(;h--;)k[i++]=arguments[++b];var l=this&&this!==mc&&this instanceof e?g:a;return l.apply(f?c:this,k)}var f=b&mb,g=ea(a);return e}function la(a,b,c,d,e,f,g,h){var i=b&nb;if(!i&&"function"!=typeof a)throw new TypeError(xb);var j=d?d.length:0;if(j||(b&=~(rb|sb),d=e=null),j-=e?e.length:0,b&sb){var k=d,l=e;d=e=null}var m=i?null:Wc(a),n=[a,b,c,d,e,k,l,f,g,h];if(m&&(Fa(n,m),b=n[1],h=n[9]),n[9]=null==h?i?0:a.length:Fc(h-j,0)||0,b==mb)var o=da(n[0],n[2]);else o=b!=rb&&b!=(mb|rb)||n[4].length?ja.apply(kb,n):ka.apply(kb,n);var p=m?Uc:Yc;return p(o,n)}function ma(a,b,c,d,e,f,g){var h=-1,i=a.length,j=b.length;if(i!=j&&!(e&&j>i))return!1;for(;++h<i;){var k=a[h],l=b[h],m=d?d(e?l:k,e?k:l,h):kb;if(m!==kb){if(m)continue;return!1}if(e){if(!w(b,function(a){return k===a||c(k,a,d,e,f,g)}))return!1}else if(k!==l&&!c(k,l,d,e,f,g))return!1}return!0}function na(a,b,c){switch(c){case Bb:case Cb:return+a==+b;case Db:return a.name==b.name&&a.message==b.message;case Gb:return a!=+a?b!=+b:a==+b;case Ib:case Kb:return a==b+""}return!1}function oa(a,b,c,d,e,f,g){var h=md(a),i=h.length,j=md(b),k=j.length;if(i!=k&&!e)return!1;for(var l=i;l--;){var m=h[l];if(!(e?m in b:qc.call(b,m)))return!1}for(var n=e;++l<i;){m=h[l];var o=a[m],p=b[m],q=d?d(e?p:o,e?o:p,m):kb;if(!(q===kb?c(o,p,d,e,f,g):q))return!1;n||(n="constructor"==m)}if(!n){var r=a.constructor,s=b.constructor;if(r!=s&&"constructor"in a&&"constructor"in b&&!("function"==typeof r&&r instanceof r&&"function"==typeof s&&s instanceof s))return!1}return!0}function pa(a,b,c){var d=l.callback||db;return d=d===db?B:d,c?d(a,b,c):d}function qa(a){for(var b=a.name,c=Pc[b],d=c?c.length:0;d--;){var e=c[d],f=e.func;if(null==f||f==a)return e.name}return b}function ra(a,b,c){var d=l.indexOf||Na;return d=d===Na?f:d,a?d(a,b,c):d}function sa(a){for(var b=ab(a),c=b.length;c--;)b[c][2]=Ea(b[c][1]);return b}function ta(a,b){var c=null==a?kb:a[b];return Xa(c)?c:kb}function ua(a){var b=a.length,c=new a.constructor(b);return b&&"string"==typeof a[0]&&qc.call(a,"index")&&(c.index=a.index,c.input=a.input),c}function va(a){var b=a.constructor;return"function"==typeof b&&b instanceof b||(b=Object),new b}function wa(a,b,c){var d=a.constructor;switch(b){case Mb:return Z(a);case Bb:case Cb:return new d(+a);case Nb:case Ob:case Pb:case Qb:case Rb:case Sb:case Tb:case Ub:case Vb:var e=a.buffer;return new d(c?Z(e):e,a.byteOffset,a.length);case Gb:case Kb:return new d(a);case Ib:var f=new d(a.source,ac.exec(a));f.lastIndex=a.lastIndex}return f}function xa(a,b,c){null==a||Ba(b,a)||(b=Ma(b),a=1==b.length?a:K(a,U(b,0,-1)),b=Oa(b));var d=null==a?a:a[b];return null==d?kb:d.apply(a,c)}function ya(a){return null!=a&&Da(Xc(a))}function za(a,b){return a="number"==typeof a||cc.test(a)?+a:-1,b=null==b?Nc:b,a>-1&&a%1==0&&b>a}function Aa(a,b,c){if(!Wa(c))return!1;var d=typeof b;if("number"==d?ya(c)&&za(b,c.length):"string"==d&&b in c){var e=c[b];return a===a?a===e:e!==e}return!1}function Ba(a,b){var c=typeof a;if("string"==c&&Xb.test(a)||"number"==c)return!0;if(hd(a))return!1;var d=!Wb.test(a);return d||null!=b&&a in La(b)}function Ca(a){var b=qa(a);if(!(b in n.prototype))return!1;var c=l[b];if(a===c)return!0;var d=Wc(c);return!!d&&a===d[0]}function Da(a){return"number"==typeof a&&a>-1&&a%1==0&&Nc>=a}function Ea(a){return a===a&&!Wa(a)}function Fa(a,b){var c=a[1],d=b[1],e=c|d,f=tb>e,g=d==tb&&c==pb||d==tb&&c==ub&&a[7].length<=b[8]||d==(tb|ub)&&c==pb;if(!f&&!g)return a;d&mb&&(a[2]=b[2],e|=c&mb?0:ob);var h=b[3];if(h){var i=a[3];a[3]=i?$(i,h,b[4]):r(h),a[4]=i?k(a[3],yb):r(b[4])}return h=b[5],h&&(i=a[5],a[5]=i?_(i,h,b[6]):r(h),a[6]=i?k(a[5],yb):r(b[6])),h=b[7],h&&(a[7]=r(h)),d&tb&&(a[8]=null==a[8]?b[8]:Gc(a[8],b[8])),null==a[9]&&(a[9]=b[9]),a[0]=b[0],a[1]=e,a}function Ga(a,b){a=La(a);for(var c=-1,d=b.length,e={};++c<d;){var f=b[c];f in a&&(e[f]=a[f])}return e}function Ha(a,b){var c={};return I(a,function(a,d,e){b(a,d,e)&&(c[d]=a)}),c}function Ia(a,b){for(var c=a.length,d=Gc(b.length,c),e=r(a);d--;){var f=b[d];a[d]=za(f,c)?e[f]:kb}return a}function Ja(a){var b;l.support;if(!j(a)||sc.call(a)!=Hb||!qc.call(a,"constructor")&&(b=a.constructor,"function"==typeof b&&!(b instanceof b)))return!1;var c;return I(a,function(a,b){c=b}),c===kb||qc.call(a,c)}function Ka(a){for(var b=_a(a),c=b.length,d=c&&a.length,e=!!d&&Da(d)&&(hd(a)||Ta(a)),f=-1,g=[];++f<c;){var h=b[f];(e&&za(h,d)||qc.call(a,h))&&g.push(h)}return g}function La(a){return Wa(a)?a:Object(a)}function Ma(a){if(hd(a))return a;var b=[];return h(a).replace(Yb,function(a,c,d,e){b.push(d?e.replace(_b,"$1"):c||a)}),b}function Na(a,b,c){var d=a?a.length:0;if(!d)return-1;if("number"==typeof c)c=0>c?Fc(d+c,0):c;else if(c){var e=W(a,b),g=a[e];return(b===b?b===g:g!==g)?e:-1}return f(a,b,c||0)}function Oa(a){var b=a?a.length:0;return b?a[b-1]:kb}function Pa(a,b,c){var d=hd(a)?t:F;return c&&Aa(a,b,c)&&(b=null),("function"!=typeof b||c!==kb)&&(b=pa(b,c,3)),d(a,b)}function Qa(a,b,c){var d=hd(a)?u:O;return b=pa(b,c,3),d(a,b)}function Ra(a,b){if("function"!=typeof a)throw new TypeError(xb);return b=Fc(b===kb?a.length-1:+b||0,0),function(){for(var c=arguments,d=-1,e=Fc(c.length-b,0),f=Array(e);++d<e;)f[d]=c[b+d];switch(b){case 0:return a.call(this,f);case 1:return a.call(this,c[0],f);case 2:return a.call(this,c[0],c[1],f)}var g=Array(b+1);for(d=-1;++d<b;)g[d]=c[d];return g[b]=f,a.apply(this,g)}}function Sa(a,b,c,d){return b&&"boolean"!=typeof b&&Aa(a,b,c)?b=!1:"function"==typeof b&&(d=c,c=b,b=!1),"function"==typeof c?C(a,b,Y(c,d,1)):C(a,b)}function Ta(a){return j(a)&&ya(a)&&sc.call(a)==zb}function Ua(a){return!!a&&1===a.nodeType&&j(a)&&sc.call(a).indexOf("Element")>-1}function Va(a,b,c,d){c="function"==typeof c?Y(c,d,3):kb;var e=c?c(a,b):kb;return e===kb?L(a,b,c):!!e}function Wa(a){var b=typeof a;return!!a&&("object"==b||"function"==b)}function Xa(a){return null==a?!1:sc.call(a)==Eb?tc.test(pc.call(a)):j(a)&&bc.test(a)}function Ya(a){return"number"==typeof a||j(a)&&sc.call(a)==Gb}function Za(a){return"string"==typeof a||j(a)&&sc.call(a)==Kb}function $a(a){return j(a)&&Da(a.length)&&!!dc[sc.call(a)]}function _a(a){if(null==a)return[];Wa(a)||(a=Object(a));var b=a.length;b=b&&Da(b)&&(hd(a)||Ta(a))&&b||0;for(var c=a.constructor,d=-1,e="function"==typeof c&&c.prototype===a,f=Array(b),g=b>0;++d<b;)f[d]=d+"";for(var h in a)g&&za(h,b)||"constructor"==h&&(e||!qc.call(a,h))||f.push(h);return f}function ab(a){a=La(a);for(var b=-1,c=md(a),d=c.length,e=Array(d);++b<d;){var f=c[b];e[b]=[f,a[f]]}return e}function bb(a){return V(a,md(a))}function cb(a){return a=h(a),a&&$b.test(a)?a.replace(Zb,"\\$&"):a}function db(a,b,c){return c&&Aa(a,b,c)&&(b=null),j(a)?gb(a):B(a,b)}function eb(a){return function(){return a}}function fb(a){return a}function gb(a){return P(C(a,!0))}function hb(){}function ib(a){return Ba(a)?R(a):S(a)}function jb(a){var b=++rc;return h(a)+b}var kb,lb="3.9.3",mb=1,nb=2,ob=4,pb=8,qb=16,rb=32,sb=64,tb=128,ub=256,vb=150,wb=16,xb="Expected a function",yb="__lodash_placeholder__",zb="[object Arguments]",Ab="[object Array]",Bb="[object Boolean]",Cb="[object Date]",Db="[object Error]",Eb="[object Function]",Fb="[object Map]",Gb="[object Number]",Hb="[object Object]",Ib="[object RegExp]",Jb="[object Set]",Kb="[object String]",Lb="[object WeakMap]",Mb="[object ArrayBuffer]",Nb="[object Float32Array]",Ob="[object Float64Array]",Pb="[object Int8Array]",Qb="[object Int16Array]",Rb="[object Int32Array]",Sb="[object Uint8Array]",Tb="[object Uint8ClampedArray]",Ub="[object Uint16Array]",Vb="[object Uint32Array]",Wb=/\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\n\\]|\\.)*?\1)\]/,Xb=/^\w*$/,Yb=/[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\n\\]|\\.)*?)\2)\]/g,Zb=/[.*+?^${}()|[\]\/\\]/g,$b=RegExp(Zb.source),_b=/\\(\\)?/g,ac=/\w*$/,bc=/^\[object .+?Constructor\]$/,cc=/^\d+$/,dc={};dc[Nb]=dc[Ob]=dc[Pb]=dc[Qb]=dc[Rb]=dc[Sb]=dc[Tb]=dc[Ub]=dc[Vb]=!0,dc[zb]=dc[Ab]=dc[Mb]=dc[Bb]=dc[Cb]=dc[Db]=dc[Eb]=dc[Fb]=dc[Gb]=dc[Hb]=dc[Ib]=dc[Jb]=dc[Kb]=dc[Lb]=!1;var ec={};ec[zb]=ec[Ab]=ec[Mb]=ec[Bb]=ec[Cb]=ec[Nb]=ec[Ob]=ec[Pb]=ec[Qb]=ec[Rb]=ec[Gb]=ec[Hb]=ec[Ib]=ec[Kb]=ec[Sb]=ec[Tb]=ec[Ub]=ec[Vb]=!0,ec[Db]=ec[Eb]=ec[Fb]=ec[Jb]=ec[Lb]=!1;var fc={"function":!0,object:!0},gc=fc[typeof d]&&d&&!d.nodeType&&d,hc=fc[typeof c]&&c&&!c.nodeType&&c,ic=gc&&hc&&"object"==typeof b&&b&&b.Object&&b,jc=fc[typeof self]&&self&&self.Object&&self,kc=fc[typeof window]&&window&&window.Object&&window,lc=hc&&hc.exports===gc&&gc,mc=ic||kc!==(this&&this.window)&&kc||jc||this,nc=Object.prototype,oc=(oc=mc.window)?oc.document:null,pc=Function.prototype.toString,qc=nc.hasOwnProperty,rc=0,sc=nc.toString,tc=RegExp("^"+cb(pc.call(qc)).replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g,"$1.*?")+"$"),uc=ta(mc,"ArrayBuffer"),vc=ta(uc&&new uc(0),"slice"),wc=Math.floor,xc=ta(Object,"getPrototypeOf"),yc=ta(mc,"Set"),zc=ta(mc,"Uint8Array"),Ac=ta(mc,"WeakMap"),Bc=function(){try{var a=ta(mc,"Float64Array"),b=new a(new uc(10),0,1)&&a}catch(c){}return b||null}(),Cc=ta(Object,"create"),Dc=ta(Array,"isArray"),Ec=ta(Object,"keys"),Fc=Math.max,Gc=Math.min,Hc=ta(Date,"now"),Ic=Number.POSITIVE_INFINITY,Jc=4294967295,Kc=Jc-1,Lc=Jc>>>1,Mc=Bc?Bc.BYTES_PER_ELEMENT:0,Nc=9007199254740991,Oc=Ac&&new Ac,Pc={},Qc=l.support={};!function(a){var b=function(){this.x=a},c=[];b.prototype={valueOf:a,y:a};for(var d in new b)c.push(d);try{Qc.dom=11===oc.createDocumentFragment().nodeType}catch(e){Qc.dom=!1}}(1,0);var Rc=function(){function a(){}return function(b){if(Wa(b)){a.prototype=b;var c=new a;a.prototype=null}return c||{}}}(),Sc=ba(J),Tc=ca(),Uc=Oc?function(a,b){return Oc.set(a,b),a}:fb;vc||(Z=uc&&zc?function(a){var b=a.byteLength,c=Bc?wc(b/Mc):0,d=c*Mc,e=new uc(b);if(c){var f=new Bc(e,0,c);f.set(new Bc(a,0,c))}return b!=d&&(f=new zc(e,d),f.set(new zc(a,d))),e}:eb(null));var Vc=Cc&&yc?function(a){return new o(a)}:eb(null),Wc=Oc?function(a){return Oc.get(a)}:hb,Xc=R("length"),Yc=function(){var a=0,b=0;return function(c,d){var e=dd(),f=wb-(e-b);if(b=e,f>0){if(++a>=vb)return c}else a=0;return Uc(c,d)}}(),Zc=Ra(function(a,b){return ya(a)?E(a,H(b,!1,!0)):[]}),$c=Ra(function(a){for(var b=a.length,c=b,d=Array(l),e=ra(),g=e==f,h=[];c--;){var i=a[c]=ya(i=a[c])?i:[];d[c]=g&&i.length>=120?Vc(c&&i):null}var j=a[0],k=-1,l=j?j.length:0,m=d[0];a:for(;++k<l;)if(i=j[k],(m?p(m,i):e(h,i,0))<0){for(var c=b;--c;){var n=d[c];if((n?p(n,i):e(a[c],i,0))<0)continue a}m&&m.push(i),h.push(i)}return h}),_c=fa(Sc),ad=ga(s,Sc),bd=Ra(function(a,b,c){var d=-1,e="function"==typeof b,f=Ba(b),g=ya(a)?Array(a.length):[];return Sc(a,function(a){var h=e?b:f&&null!=a?a[b]:null;g[++d]=h?h.apply(a,c):xa(a,b,c)}),g}),cd=ia(v,Sc),dd=Hc||function(){return(new Date).getTime()},ed=Ra(function(a,b,c){var d=mb;if(c.length){var e=k(c,ed.placeholder);d|=rb}return la(a,d,b,c,e)}),fd=Ra(function(a,b){return D(a,1,b)}),gd=ha(rb),hd=Dc||function(a){return j(a)&&Da(a.length)&&sc.call(a)==Ab};Qc.dom||(Ua=function(a){return!!a&&1===a.nodeType&&j(a)&&!jd(a)});var id=g(/x/)||zc&&!g(zc)?function(a){return sc.call(a)==Eb}:g,jd=xc?function(a){if(!a||sc.call(a)!=Hb)return!1;var b=ta(a,"valueOf"),c=b&&(c=xc(b))&&xc(c);return c?a==c||xc(a)==c:Ja(a)}:Ja,kd=aa(function(a,b,c){return c?y(a,b,c):z(a,b)}),ld=Ra(function(a){var b=a[0];return null==b?b:(a.push(x),kd.apply(kb,a))}),md=Ec?function(a){var b=null==a?null:a.constructor;return"function"==typeof b&&b.prototype===a||"function"!=typeof a&&ya(a)?Ka(a):Wa(a)?Ec(a):[]}:Ka,nd=Ra(function(a,b){if(null==a)return{};if("function"!=typeof b[0]){var b=u(H(b),String);return Ga(a,E(_a(a),b))}var c=Y(b[0],b[1],3);return Ha(a,function(a,b,d){return!c(a,b,d)})});n.prototype=Rc(m.prototype),n.prototype.constructor=n,o.prototype.push=q,l.assign=kd,l.bind=ed,l.callback=db,l.constant=eb,l.defaults=ld,l.defer=fd,l.difference=Zc,l.forEach=ad,l.intersection=$c,l.invoke=bd,l.keys=md,l.keysIn=_a,l.map=Qa,l.matches=gb,l.omit=nd,l.pairs=ab,l.partial=gd,l.property=ib,l.restParam=Ra,l.values=bb,l.collect=Qa,l.each=ad,l.extend=kd,l.iteratee=db,l.clone=Sa,l.escapeRegExp=cb,l.every=Pa,l.find=_c,l.identity=fb,l.indexOf=Na,l.isArguments=Ta,l.isArray=hd,l.isElement=Ua,l.isEqual=Va,l.isFunction=id,l.isNative=Xa,l.isNumber=Ya,l.isObject=Wa,l.isPlainObject=jd,l.isString=Za,l.isTypedArray=$a,l.last=Oa,l.noop=hb,l.now=dd,l.reduce=cd,l.uniqueId=jb,l.all=Pa,l.eq=Va,l.detect=_c,l.foldl=cd,l.inject=cd,l.VERSION=lb,s(["bind","partial"],function(a){l[a].placeholder=l}),"function"==typeof a&&"object"==typeof a.amd&&a.amd?(mc._=l,a(function(){return l})):gc&&hc?lc?(hc.exports=l)._=l:gc._=l:mc._=l}).call(this)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],2:[function(b,c,d){!function(b){function c(){this._events={},this._conf&&e.call(this,this._conf)}function e(a){a&&(this._conf=a,a.delimiter&&(this.delimiter=a.delimiter),a.maxListeners&&(this._events.maxListeners=a.maxListeners),a.wildcard&&(this.wildcard=a.wildcard),a.newListener&&(this.newListener=a.newListener),this.wildcard&&(this.listenerTree={}))}function f(a){this._events={},this.newListener=!1,e.call(this,a)}function g(a,b,c,d){if(!c)return[];var e,f,h,i,j,k,l,m=[],n=b.length,o=b[d],p=b[d+1];if(d===n&&c._listeners){if("function"==typeof c._listeners)return a&&a.push(c._listeners),[c];for(e=0,f=c._listeners.length;f>e;e++)a&&a.push(c._listeners[e]);return[c]}if("*"===o||"**"===o||c[o]){if("*"===o){for(h in c)"_listeners"!==h&&c.hasOwnProperty(h)&&(m=m.concat(g(a,b,c[h],d+1)));return m}if("**"===o){l=d+1===n||d+2===n&&"*"===p,l&&c._listeners&&(m=m.concat(g(a,b,c,n)));for(h in c)"_listeners"!==h&&c.hasOwnProperty(h)&&("*"===h||"**"===h?(c[h]._listeners&&!l&&(m=m.concat(g(a,b,c[h],n))),m=m.concat(g(a,b,c[h],d))):m=h===p?m.concat(g(a,b,c[h],d+2)):m.concat(g(a,b,c[h],d)));return m}m=m.concat(g(a,b,c[o],d+1))}if(i=c["*"],i&&g(a,b,i,d+1),j=c["**"])if(n>d){j._listeners&&g(a,b,j,n);for(h in j)"_listeners"!==h&&j.hasOwnProperty(h)&&(h===p?g(a,b,j[h],d+2):h===o?g(a,b,j[h],d+1):(k={},k[h]=j[h],g(a,b,{"**":k},d+1)))}else j._listeners?g(a,b,j,n):j["*"]&&j["*"]._listeners&&g(a,b,j["*"],n);return m}function h(a,b){a="string"==typeof a?a.split(this.delimiter):a.slice();for(var c=0,d=a.length;d>c+1;c++)if("**"===a[c]&&"**"===a[c+1])return;for(var e=this.listenerTree,f=a.shift();f;){if(e[f]||(e[f]={}),e=e[f],0===a.length){if(e._listeners){if("function"==typeof e._listeners)e._listeners=[e._listeners,b];else if(i(e._listeners)&&(e._listeners.push(b),!e._listeners.warned)){var g=j;"undefined"!=typeof this._events.maxListeners&&(g=this._events.maxListeners),g>0&&e._listeners.length>g&&(e._listeners.warned=!0,console.error("(node) warning: possible EventEmitter memory leak detected. %d listeners added. Use emitter.setMaxListeners() to increase limit.",e._listeners.length),console.trace())}}else e._listeners=b;return!0}f=a.shift()}return!0}var i=Array.isArray?Array.isArray:function(a){return"[object Array]"===Object.prototype.toString.call(a)},j=10;f.prototype.delimiter=".",f.prototype.setMaxListeners=function(a){this._events||c.call(this),this._events.maxListeners=a,this._conf||(this._conf={}),this._conf.maxListeners=a},f.prototype.event="",f.prototype.once=function(a,b){return this.many(a,1,b),this},f.prototype.many=function(a,b,c){function d(){0===--b&&e.off(a,d),c.apply(this,arguments)}var e=this;if("function"!=typeof c)throw new Error("many only accepts instances of Function");return d._origin=c,this.on(a,d),e},f.prototype.emit=function(){this._events||c.call(this);var a=arguments[0];if("newListener"===a&&!this.newListener&&!this._events.newListener)return!1;if(this._all){for(var b=arguments.length,d=new Array(b-1),e=1;b>e;e++)d[e-1]=arguments[e];for(e=0,b=this._all.length;b>e;e++)this.event=a,this._all[e].apply(this,d)}if("error"===a&&!(this._all||this._events.error||this.wildcard&&this.listenerTree.error))throw arguments[1]instanceof Error?arguments[1]:new Error("Uncaught, unspecified 'error' event.");var f;if(this.wildcard){f=[];var h="string"==typeof a?a.split(this.delimiter):a.slice();g.call(this,f,h,this.listenerTree,0)}else f=this._events[a];if("function"==typeof f){if(this.event=a,1===arguments.length)f.call(this);else if(arguments.length>1)switch(arguments.length){case 2:f.call(this,arguments[1]);break;case 3:f.call(this,arguments[1],arguments[2]);break;default:for(var b=arguments.length,d=new Array(b-1),e=1;b>e;e++)d[e-1]=arguments[e];f.apply(this,d)}return!0}if(f){for(var b=arguments.length,d=new Array(b-1),e=1;b>e;e++)d[e-1]=arguments[e];for(var i=f.slice(),e=0,b=i.length;b>e;e++)this.event=a,i[e].apply(this,d);return i.length>0||!!this._all}return!!this._all},f.prototype.on=function(a,b){if("function"==typeof a)return this.onAny(a),this;if("function"!=typeof b)throw new Error("on only accepts instances of Function");if(this._events||c.call(this),this.emit("newListener",a,b),this.wildcard)return h.call(this,a,b),this;if(this._events[a]){if("function"==typeof this._events[a])this._events[a]=[this._events[a],b];else if(i(this._events[a])&&(this._events[a].push(b),!this._events[a].warned)){var d=j;"undefined"!=typeof this._events.maxListeners&&(d=this._events.maxListeners),d>0&&this._events[a].length>d&&(this._events[a].warned=!0,console.error("(node) warning: possible EventEmitter memory leak detected. %d listeners added. Use emitter.setMaxListeners() to increase limit.",this._events[a].length),console.trace())}}else this._events[a]=b;return this},f.prototype.onAny=function(a){if("function"!=typeof a)throw new Error("onAny only accepts instances of Function");return this._all||(this._all=[]),this._all.push(a),this},f.prototype.addListener=f.prototype.on,f.prototype.off=function(a,b){if("function"!=typeof b)throw new Error("removeListener only takes instances of Function");var c,d=[];if(this.wildcard){var e="string"==typeof a?a.split(this.delimiter):a.slice();d=g.call(this,null,e,this.listenerTree,0)}else{if(!this._events[a])return this;c=this._events[a],d.push({_listeners:c})}for(var f=0;f<d.length;f++){var h=d[f];if(c=h._listeners,i(c)){for(var j=-1,k=0,l=c.length;l>k;k++)if(c[k]===b||c[k].listener&&c[k].listener===b||c[k]._origin&&c[k]._origin===b){j=k;break}if(0>j)continue;return this.wildcard?h._listeners.splice(j,1):this._events[a].splice(j,1),0===c.length&&(this.wildcard?delete h._listeners:delete this._events[a]),this}(c===b||c.listener&&c.listener===b||c._origin&&c._origin===b)&&(this.wildcard?delete h._listeners:delete this._events[a])}return this},f.prototype.offAny=function(a){var b,c=0,d=0;if(a&&this._all&&this._all.length>0){for(b=this._all,c=0,d=b.length;d>c;c++)if(a===b[c])return b.splice(c,1),this}else this._all=[];return this},f.prototype.removeListener=f.prototype.off,f.prototype.removeAllListeners=function(a){if(0===arguments.length)return!this._events||c.call(this),this;if(this.wildcard)for(var b="string"==typeof a?a.split(this.delimiter):a.slice(),d=g.call(this,null,b,this.listenerTree,0),e=0;e<d.length;e++){var f=d[e];f._listeners=null}else{if(!this._events[a])return this;this._events[a]=null}return this},f.prototype.listeners=function(a){if(this.wildcard){var b=[],d="string"==typeof a?a.split(this.delimiter):a.slice();return g.call(this,b,d,this.listenerTree,0),b}return this._events||c.call(this),this._events[a]||(this._events[a]=[]),i(this._events[a])||(this._events[a]=[this._events[a]]),this._events[a]},f.prototype.listenersAny=function(){return this._all?this._all:[]},"function"==typeof a&&a.amd?a(function(){return f}):"object"==typeof d?d.EventEmitter2=f:window.EventEmitter2=f}()},{}],3:[function(a,b,c){var d=a("fast-diff"),e=a("./is"),f=a("./op"),g=String.fromCharCode(0),h=function(a){e.array(a)?this.ops=a:e.object(a)&&e.array(a.ops)?this.ops=a.ops:this.ops=[]};h.prototype.insert=function(a,b){var c={};return 0===a.length?this:(c.insert=a,e.object(b)&&Object.keys(b).length>0&&(c.attributes=b),this.push(c))},h.prototype["delete"]=function(a){return 0>=a?this:this.push({"delete":a})},h.prototype.retain=function(a,b){if(0>=a)return this;var c={retain:a};return e.object(b)&&Object.keys(b).length>0&&(c.attributes=b),this.push(c)},h.prototype.push=function(a){var b=this.ops.length,c=this.ops[b-1];if(a=f.clone(a),e.object(c)){if(e.number(a["delete"])&&e.number(c["delete"]))return this.ops[b-1]={"delete":c["delete"]+a["delete"]},this;if(e.number(c["delete"])&&null!=a.insert&&(b-=1,c=this.ops[b-1],!e.object(c)))return this.ops.unshift(a),this;if(e.equal(a.attributes,c.attributes)){if(e.string(a.insert)&&e.string(c.insert))return this.ops[b-1]={insert:c.insert+a.insert},e.object(a.attributes)&&(this.ops[b-1].attributes=a.attributes),this;if(e.number(a.retain)&&e.number(c.retain))return this.ops[b-1]={retain:c.retain+a.retain},e.object(a.attributes)&&(this.ops[b-1].attributes=a.attributes),this}}return b===this.ops.length?this.ops.push(a):this.ops.splice(b,0,a),this},h.prototype.chop=function(){var a=this.ops[this.ops.length-1];return a&&a.retain&&!a.attributes&&this.ops.pop(),this},h.prototype.length=function(){return this.ops.reduce(function(a,b){return a+f.length(b)},0)},h.prototype.slice=function(a,b){a=a||0,e.number(b)||(b=1/0);for(var c=new h,d=f.iterator(this.ops),g=0;b>g&&d.hasNext();){var i;a>g?i=d.next(a-g):(i=d.next(b-g),c.push(i)),g+=f.length(i)}return c},h.prototype.compose=function(a){for(var b=f.iterator(this.ops),c=f.iterator(a.ops),d=new h;b.hasNext()||c.hasNext();)if("insert"===c.peekType())d.push(c.next());else if("delete"===b.peekType())d.push(b.next());else{var g=Math.min(b.peekLength(),c.peekLength()),i=b.next(g),j=c.next(g);if(e.number(j.retain)){var k={};e.number(i.retain)?k.retain=g:k.insert=i.insert;var l=f.attributes.compose(i.attributes,j.attributes,e.number(i.retain));l&&(k.attributes=l),d.push(k)}else e.number(j["delete"])&&e.number(i.retain)&&d.push(j)}return d.chop()},h.prototype.diff=function(a){var b=new h;if(this.ops===a.ops)return b;var c=[this.ops,a.ops].map(function(b){return b.map(function(c){if(null!=c.insert)return e.string(c.insert)?c.insert:g;var d=b===a.ops?"on":"with";throw new Error("diff() called "+d+" non-document")}).join("")}),i=d(c[0],c[1]),j=f.iterator(this.ops),k=f.iterator(a.ops);return i.forEach(function(a){for(var c=a[1].length;c>0;){var g=0;switch(a[0]){case d.INSERT:g=Math.min(k.peekLength(),c),b.push(k.next(g));break;case d.DELETE:g=Math.min(c,j.peekLength()),j.next(g),b["delete"](g);break;case d.EQUAL:g=Math.min(j.peekLength(),k.peekLength(),c);var h=j.next(g),i=k.next(g);e.equal(h.insert,i.insert)?b.retain(g,f.attributes.diff(h.attributes,i.attributes)):b.push(i)["delete"](g)}c-=g}}),b.chop()},h.prototype.transform=function(a,b){if(b=!!b,e.number(a))return this.transformPosition(a,b);for(var c=f.iterator(this.ops),d=f.iterator(a.ops),g=new h;c.hasNext()||d.hasNext();)if("insert"!==c.peekType()||!b&&"insert"===d.peekType())if("insert"===d.peekType())g.push(d.next());else{var i=Math.min(c.peekLength(),d.peekLength()),j=c.next(i),k=d.next(i);if(j["delete"])continue;k["delete"]?g.push(k):g.retain(i,f.attributes.transform(j.attributes,k.attributes,b))}else g.retain(f.length(c.next()));return g.chop()},h.prototype.transformPosition=function(a,b){b=!!b;for(var c=f.iterator(this.ops),d=0;c.hasNext()&&a>=d;){var e=c.peekLength(),g=c.peekType();c.next(),"delete"!==g?("insert"===g&&(a>d||!b)&&(a+=e),d+=e):a-=Math.min(e,a-d)}return a},b.exports=h},{"./is":4,"./op":5,"fast-diff":6}],4:[function(a,b,c){b.exports={equal:function(a,b){if(a===b)return!0;if(null==a&&null==b)return!0;if(null==a||null==b)return!1;if(!this.object(a)||!this.object(b))return!1;if(Object.keys(a).length!=Object.keys(b).length)return!1;for(var c in a)if(a[c]!==b[c])return!1;return!0},array:function(a){return Array.isArray(a)},number:function(a){return"number"==typeof a?!0:"object"==typeof a&&"[object Number]"===Object.prototype.toString.call(a)?!0:!1},object:function(a){return a?"function"==typeof a||"object"==typeof a:!1},string:function(a){return"string"==typeof a?!0:"object"==typeof a&&"[object String]"===Object.prototype.toString.call(a)?!0:!1}}},{}],5:[function(a,b,c){function d(a){this.ops=a,this.index=0,this.offset=0}var e=a("./is"),f={attributes:{clone:function(a,b){return e.object(a)?Object.keys(a).reduce(function(c,d){return void 0===a[d]||null===a[d]&&!b||(c[d]=a[d]),c},{}):{}},compose:function(a,b,c){e.object(a)||(a={}),e.object(b)||(b={});var d=this.clone(b,c);for(var f in a)void 0!==a[f]&&void 0===b[f]&&(d[f]=a[f]);return Object.keys(d).length>0?d:void 0},diff:function(a,b){e.object(a)||(a={}),e.object(b)||(b={});var c=Object.keys(a).concat(Object.keys(b)).reduce(function(c,d){return a[d]!==b[d]&&(c[d]=void 0===b[d]?null:b[d]),c},{});return Object.keys(c).length>0?c:void 0},transform:function(a,b,c){if(!e.object(a))return b;if(!e.object(b))return void 0;if(!c)return b;var d=Object.keys(b).reduce(function(c,d){return void 0===a[d]&&(c[d]=b[d]),c},{});return Object.keys(d).length>0?d:void 0}},clone:function(a){var b=this.attributes.clone(a);return e.object(b.attributes)&&(b.attributes=this.attributes.clone(b.attributes,!0)),b},iterator:function(a){return new d(a)},length:function(a){return e.number(a["delete"])?a["delete"]:e.number(a.retain)?a.retain:e.string(a.insert)?a.insert.length:1}};d.prototype.hasNext=function(){return this.peekLength()<1/0},d.prototype.next=function(a){a||(a=1/0);var b=this.ops[this.index];if(b){var c=this.offset,d=f.length(b);if(a>=d-c?(a=d-c,this.index+=1,this.offset=0):this.offset+=a,e.number(b["delete"]))return{"delete":a};var g={};return b.attributes&&(g.attributes=b.attributes),e.number(b.retain)?g.retain=a:e.string(b.insert)?g.insert=b.insert.substr(c,a):g.insert=b.insert,g}return{retain:1/0}},d.prototype.peekLength=function(){return this.ops[this.index]?f.length(this.ops[this.index])-this.offset:1/0},d.prototype.peekType=function(){return this.ops[this.index]?e.number(this.ops[this.index]["delete"])?"delete":e.number(this.ops[this.index].retain)?"retain":"insert":"retain"},b.exports=f},{"./is":4}],6:[function(a,b,c){function d(a,b){if(a==b)return a?[[n,a]]:[];var c=h(a,b),d=a.substring(0,c);a=a.substring(c),b=b.substring(c),c=i(a,b);var f=a.substring(a.length-c);a=a.substring(0,a.length-c),b=b.substring(0,b.length-c);var g=e(a,b);return d&&g.unshift([n,d]),f&&g.push([n,f]),k(g),g}function e(a,b){var c;if(!a)return[[m,b]];if(!b)return[[l,a]];var e=a.length>b.length?a:b,g=a.length>b.length?b:a,h=e.indexOf(g);if(-1!=h)return c=[[m,e.substring(0,h)],[n,g],[m,e.substring(h+g.length)]],a.length>b.length&&(c[0][0]=c[2][0]=l),c;if(1==g.length)return[[l,a],[m,b]];var i=j(a,b);if(i){var k=i[0],o=i[1],p=i[2],q=i[3],r=i[4],s=d(k,p),t=d(o,q);return s.concat([[n,r]],t)}return f(a,b)}function f(a,b){for(var c=a.length,d=b.length,e=Math.ceil((c+d)/2),f=e,h=2*e,i=new Array(h),j=new Array(h),k=0;h>k;k++)i[k]=-1,j[k]=-1;i[f+1]=0,j[f+1]=0;for(var n=c-d,o=n%2!=0,p=0,q=0,r=0,s=0,t=0;e>t;t++){for(var u=-t+p;t-q>=u;u+=2){var v,w=f+u;v=u==-t||u!=t&&i[w-1]<i[w+1]?i[w+1]:i[w-1]+1;for(var x=v-u;c>v&&d>x&&a.charAt(v)==b.charAt(x);)v++,x++;if(i[w]=v,v>c)q+=2;else if(x>d)p+=2;else if(o){var y=f+n-u;if(y>=0&&h>y&&-1!=j[y]){var z=c-j[y];if(v>=z)return g(a,b,v,x)}}}for(var A=-t+r;t-s>=A;A+=2){var z,y=f+A;z=A==-t||A!=t&&j[y-1]<j[y+1]?j[y+1]:j[y-1]+1;for(var B=z-A;c>z&&d>B&&a.charAt(c-z-1)==b.charAt(d-B-1);)z++,B++;if(j[y]=z,z>c)s+=2;else if(B>d)r+=2;else if(!o){var w=f+n-A;if(w>=0&&h>w&&-1!=i[w]){var v=i[w],x=f+v-w;if(z=c-z,v>=z)return g(a,b,v,x)}}}}return[[l,a],[m,b]]}function g(a,b,c,e){var f=a.substring(0,c),g=b.substring(0,e),h=a.substring(c),i=b.substring(e),j=d(f,g),k=d(h,i);return j.concat(k)}function h(a,b){if(!a||!b||a.charAt(0)!=b.charAt(0))return 0;for(var c=0,d=Math.min(a.length,b.length),e=d,f=0;e>c;)a.substring(f,e)==b.substring(f,e)?(c=e,f=c):d=e,e=Math.floor((d-c)/2+c);return e}function i(a,b){if(!a||!b||a.charAt(a.length-1)!=b.charAt(b.length-1))return 0;for(var c=0,d=Math.min(a.length,b.length),e=d,f=0;e>c;)a.substring(a.length-e,a.length-f)==b.substring(b.length-e,b.length-f)?(c=e,f=c):d=e,e=Math.floor((d-c)/2+c);return e}function j(a,b){function c(a,b,c){for(var d,e,f,g,j=a.substring(c,c+Math.floor(a.length/4)),k=-1,l="";-1!=(k=b.indexOf(j,k+1));){var m=h(a.substring(c),b.substring(k)),n=i(a.substring(0,c),b.substring(0,k));l.length<n+m&&(l=b.substring(k-n,k)+b.substring(k,k+m),d=a.substring(0,c-n),e=a.substring(c+m),f=b.substring(0,k-n),g=b.substring(k+m))}return 2*l.length>=a.length?[d,e,f,g,l]:null}var d=a.length>b.length?a:b,e=a.length>b.length?b:a;if(d.length<4||2*e.length<d.length)return null;var f,g=c(d,e,Math.ceil(d.length/4)),j=c(d,e,Math.ceil(d.length/2));if(!g&&!j)return null;f=j?g&&g[4].length>j[4].length?g:j:g;var k,l,m,n;a.length>b.length?(k=f[0],l=f[1],m=f[2],n=f[3]):(m=f[0],n=f[1],k=f[2],l=f[3]);var o=f[4];return[k,l,m,n,o]}function k(a){a.push([n,""]);for(var b,c=0,d=0,e=0,f="",g="";c<a.length;)switch(a[c][0]){case m:e++,g+=a[c][1],c++;break;case l:d++,f+=a[c][1],c++;break;case n:d+e>1?(0!==d&&0!==e&&(b=h(g,f),0!==b&&(c-d-e>0&&a[c-d-e-1][0]==n?a[c-d-e-1][1]+=g.substring(0,b):(a.splice(0,0,[n,g.substring(0,b)]),c++),g=g.substring(b),f=f.substring(b)),b=i(g,f),0!==b&&(a[c][1]=g.substring(g.length-b)+a[c][1],g=g.substring(0,g.length-b),f=f.substring(0,f.length-b))),0===d?a.splice(c-e,d+e,[m,g]):0===e?a.splice(c-d,d+e,[l,f]):a.splice(c-d-e,d+e,[l,f],[m,g]),c=c-d-e+(d?1:0)+(e?1:0)+1):0!==c&&a[c-1][0]==n?(a[c-1][1]+=a[c][1],a.splice(c,1)):c++,e=0,d=0,f="",g=""}""===a[a.length-1][1]&&a.pop();var j=!1;for(c=1;c<a.length-1;)a[c-1][0]==n&&a[c+1][0]==n&&(a[c][1].substring(a[c][1].length-a[c-1][1].length)==a[c-1][1]?(a[c][1]=a[c-1][1]+a[c][1].substring(0,a[c][1].length-a[c-1][1].length),a[c+1][1]=a[c-1][1]+a[c+1][1],a.splice(c-1,1),j=!0):a[c][1].substring(0,a[c+1][1].length)==a[c+1][1]&&(a[c-1][1]+=a[c+1][1],a[c][1]=a[c][1].substring(a[c+1][1].length)+a[c+1][1],a.splice(c+1,1),j=!0)),c++;j&&k(a)}var l=-1,m=1,n=0,o=d;o.INSERT=m,o.DELETE=l,o.EQUAL=n,b.exports=o},{}],7:[function(a,b,c){b.exports={version:"0.20.0"}},{}],8:[function(a,b,c){var d,e,f,g,h,i,j,k;j=a("lodash"),d=a("rich-text/lib/delta"),k=a("../lib/dom"),f=a("./format"),g=a("./line"),h=a("../lib/linked-list"),i=a("./normalizer"),e=function(){function a(a,b){this.root=a,null==b&&(b={}),this.normalizer=new i,this.formats={},j.each(b.formats,j.bind(this.addFormat,this)),this.setHTML(this.root.innerHTML)}return a.prototype.addFormat=function(a,b){return j.isObject(b)||(b=f.FORMATS[a]),null!=this.formats[a]&&console.warn("Overwriting format",a,this.formats[a]),this.formats[a]=new f(b),this.normalizer.addFormat(b)},a.prototype.appendLine=function(a){return this.insertLineBefore(a,null)},a.prototype.findLeafAt=function(a,b){var c,d,e;return e=this.findLineAt(a),c=e[0],d=e[1],null!=c?c.findLeafAt(d,b):[void 0,d]},a.prototype.findLine=function(a){for(var b;null!=a&&null==k.BLOCK_TAGS[a.tagName];)a=a.parentNode;return b=null!=a?k(a).data(g.DATA_KEY):void 0,(null!=b?b.node:void 0)===a?b:void 0},a.prototype.findLineAt=function(a){var b,c;if(!(this.lines.length>0))return[void 0,a];if(c=this.toDelta().length(),a===c)return[this.lines.last,this.lines.last.length];if(a>c)return[void 0,a-c];for(b=this.lines.first;null!=b;){if(a<b.length)return[b,a];a-=b.length,b=b.next}return[void 0,a]},a.prototype.getHTML=function(){return this.root.innerHTML.replace(/\>\s+\</g,">&nbsp;<")},a.prototype.insertLineBefore=function(a,b){var c;return c=new g(this,a),null!=b?(k(a.parentNode).isElement()||this.root.insertBefore(a,b.node),this.lines.insertAfter(b.prev,c)):(k(a.parentNode).isElement()||this.root.appendChild(a),this.lines.append(c)),c},a.prototype.mergeLines=function(a,b){return b.length>1&&(1===a.length&&k(a.leaves.last.node).remove(),j.each(k(b.node).childNodes(),function(b){return b.tagName!==k.DEFAULT_BREAK_TAG?a.node.appendChild(b):void 0})),this.removeLine(b),a.rebuild()},a.prototype.optimizeLines=function(){return j.each(this.lines.toArray(),function(a,b){return a.optimize(),!0})},a.prototype.rebuild=function(){var a,b,c;for(b=this.lines.toArray(),a=this.root.firstChild,null!=a&&null!=k.LIST_TAGS[a.tagName]&&(a=a.firstChild),j.each(b,function(b){return function(c,d){for(var e,f;c.node!==a;){if(c.node.parentNode!==b.root&&(null!=(f=c.node.parentNode)?f.parentNode:void 0)!==b.root)return b.removeLine(c);a=b.normalizer.normalizeLine(a),e=b.insertLineBefore(a,c),a=k(a).nextLineNode(b.root)}return c.outerHTML!==a.outerHTML&&(c.node=b.normalizer.normalizeLine(c.node),c.rebuild()),a=k(a).nextLineNode(b.root)}}(this)),c=[];null!=a;)a=this.normalizer.normalizeLine(a),this.appendLine(a),c.push(a=k(a).nextLineNode(this.root));return c},a.prototype.removeLine=function(a){return null!=a.node.parentNode&&(k.LIST_TAGS[a.node.parentNode.tagName]&&1===a.node.parentNode.childNodes.length?k(a.node.parentNode).remove():k(a.node).remove()),this.lines.remove(a)},a.prototype.setHTML=function(a){return a=i.stripComments(a),a=i.stripWhitespace(a),this.root.innerHTML=a,this.lines=new h,this.rebuild()},a.prototype.splitLine=function(a,b){var c,d,e,f;return b=Math.min(b,a.length-1),f=k(a.node).split(b,!0),c=f[0],d=f[1],a.node=c,a.rebuild(),e=this.insertLineBefore(d,a.next),e.formats=j.clone(a.formats),e.resetContent(),e},a.prototype.toDelta=function(){var a,b;return b=this.lines.toArray(),a=new d,j.each(b,function(b){return j.each(b.delta.ops,function(b){return a.push(b)})}),a},a}(),b.exports=e},{"../lib/dom":17,"../lib/linked-list":18,"./format":10,"./line":12,"./normalizer":13,lodash:1,"rich-text/lib/delta":3}],9:[function(a,b,c){var d,e,f,g,h,i,j;i=a("lodash"),d=a("rich-text/lib/delta"),j=a("../lib/dom"),e=a("./document"),g=a("./line"),h=a("./selection"),f=function(){function a(a,b,c){this.root=a,this.quill=b,this.options=null!=c?c:{},this.root.setAttribute("id",this.options.id),this.doc=new e(this.root,this.options),this.delta=this.doc.toDelta(),this.length=this.delta.length(),this.selection=new h(this.doc,this.quill),this.timer=setInterval(i.bind(this.checkUpdate,this),this.options.pollInterval),this.savedRange=null,this.quill.on("selection-change",function(a){return function(b){return a.savedRange=b}}(this)),this.options.readOnly||this.enable()}return a.sources={API:"api",SILENT:"silent",USER:"user"},a.prototype.destroy=function(){return clearInterval(this.timer)},a.prototype.disable=function(){return this.enable(!1)},a.prototype.enable=function(a){return null==a&&(a=!0),this.root.setAttribute("contenteditable",a)},a.prototype.applyDelta=function(b,c){var d;return d=this._update(),d&&(b=d.transform(b,!0),d=b.transform(d,!1)),b.ops.length>0&&(b=this._trackDelta(function(a){return function(){var c;return c=0,i.each(b.ops,function(b){return i.isString(b.insert)?(a._insertAt(c,b.insert,b.attributes),c+=b.insert.length):i.isNumber(b.insert)?(a._insertEmbed(c,b.attributes),c+=1):i.isNumber(b["delete"])?a._deleteAt(c,b["delete"]):i.isNumber(b.retain)?(i.each(b.attributes,function(d,e){return a._formatAt(c,b.retain,e,d)}),c+=b.retain):void 0}),a.selection.shiftAfter(0,0,i.bind(a.doc.optimizeLines,a.doc))}}(this)),this.delta=this.doc.toDelta(),this.length=this.delta.length(),this.innerHTML=this.root.innerHTML,b&&c!==a.sources.SILENT&&this.quill.emit(this.quill.constructor.events.TEXT_CHANGE,b,c)),d&&d.ops.length>0&&c!==a.sources.SILENT?this.quill.emit(this.quill.constructor.events.TEXT_CHANGE,d,a.sources.USER):void 0},a.prototype.checkUpdate=function(b){var c;return null==b&&(b="user"),null==this.root.parentNode?clearInterval(this.timer):(c=this._update(),c&&(this.delta=this.delta.compose(c),this.length=this.delta.length(),this.quill.emit(this.quill.constructor.events.TEXT_CHANGE,c,b)),c&&(b=a.sources.SILENT),this.selection.update(b))},a.prototype.focus=function(){return null!=this.selection.range?this.selection.setRange(this.selection.range):this.root.focus()},a.prototype.getBounds=function(a){var b,c,d,e,f,g,h;return this.checkUpdate(),g=this.doc.findLeafAt(a,!0),d=g[0],e=g[1],null==d?null:(c=this.root.parentNode.getBoundingClientRect(),h="left",0===d.length?b=d.node.parentNode.getBoundingClientRect():j.VOID_TAGS[d.node.tagName]?(b=d.node.getBoundingClientRect(),1===e&&(h="right")):(f=document.createRange(),e<d.length?(f.setStart(d.node,e),f.setEnd(d.node,e+1)):(f.setStart(d.node,e-1),f.setEnd(d.node,e),h="right"),b=f.getBoundingClientRect()),{height:b.height,left:b[h]-c.left,top:b.top-c.top})},a.prototype._deleteAt=function(a,b){return 0>=b?void 0:this.selection.shiftAfter(a,-1*b,function(c){return function(){var d,e,f,g,h,i,j;for(j=c.doc.findLineAt(a),f=j[0],i=j[1],d=f,g=f.length-i<=b&&i>0;null!=d&&b>0;)h=d.next,e=Math.min(d.length-i,b),0===i&&b>=d.length?c.doc.removeLine(d):d.deleteText(i,e),b-=e,d=h,i=0;return g&&f.next?c.doc.mergeLines(f,f.next):void 0}}(this))},a.prototype._formatAt=function(a,b,c,d){return this.selection.shiftAfter(a,0,function(e){return function(){var f,g,h,i,j;for(i=e.doc.findLineAt(a),g=i[0],h=i[1],j=[];null!=g&&b>0;)f=Math.min(b,g.length-h-1),g.formatText(h,f,c,d),b-=f,b>0&&g.format(c,d),b-=1,h=0,j.push(g=g.next);return j}}(this))},a.prototype._insertEmbed=function(a,b){return this.selection.shiftAfter(a,1,function(c){return function(){var d,e,f;return f=c.doc.findLineAt(a),d=f[0],e=f[1],d.insertEmbed(e,b)}}(this))},a.prototype._insertAt=function(a,b,c){return null==c&&(c={}),this.selection.shiftAfter(a,b.length,function(d){return function(){var e,f,g,h;return b=b.replace(/\r\n?/g,"\n"),f=b.split("\n"),h=d.doc.findLineAt(a),e=h[0],g=h[1],i.each(f,function(a,b){var h;return null==e||e.length<=g?(b<f.length-1||a.length>0)&&(e=d.doc.appendLine(document.createElement(j.DEFAULT_BLOCK_TAG)),g=0,e.insertText(g,a,c),e.format(c),h=null):(e.insertText(g,a,c),b<f.length-1&&(h=d.doc.splitLine(e,g+a.length),i.each(i.defaults({},c,e.formats),function(a,b){return e.format(b,c[b])}),g=0)),e=h})}}(this))},a.prototype._trackDelta=function(a){var b,c,d,e,f,g,h,j,k,l;g=null!=(k=this.savedRange)?k.start:void 0,a(),c=this.doc.toDelta(),this.savedRange=this.selection.getRange(),d=null!=(l=this.savedRange)?l.start:void 0;try{if(null!=g&&null!=d&&g<=this.delta.length()&&d<=c.length()&&(j=this.delta.slice(g),f=c.slice(d),i.isEqual(j.ops,f.ops)))return h=this.delta.slice(0,g),e=c.slice(0,d),h.diff(e)}catch(m){b=m}return this.delta.diff(c)},a.prototype._update=function(){var a;return this.innerHTML===this.root.innerHTML?!1:(a=this._trackDelta(function(a){return function(){return a.selection.preserve(i.bind(a.doc.rebuild,a.doc)),a.selection.shiftAfter(0,0,i.bind(a.doc.optimizeLines,a.doc))}}(this)),this.innerHTML=this.root.innerHTML,a.ops.length>0?a:!1)},a}(),b.exports=f},{"../lib/dom":17,"./document":8,"./line":12,"./selection":14,lodash:1,"rich-text/lib/delta":3}],10:[function(a,b,c){var d,e,f;e=a("lodash"),f=a("../lib/dom"),d=function(){function a(a){this.config=a}return a.types={LINE:"line",EMBED:"embed"},a.FORMATS={bold:{tag:"B",prepare:"bold"},italic:{tag:"I",prepare:"italic"},underline:{tag:"U",prepare:"underline"},strike:{tag:"S",prepare:"strikeThrough"},color:{style:"color","default":"rgb(0, 0, 0)",prepare:"foreColor"},background:{style:"backgroundColor","default":"rgb(255, 255, 255)",prepare:"backColor"},font:{style:"fontFamily","default":"'Helvetica', 'Arial', sans-serif",prepare:"fontName"},size:{style:"fontSize","default":"13px",prepare:function(a){return document.execCommand("fontSize",!1,f.convertFontSize(a))}},link:{tag:"A",add:function(a,b){return a.setAttribute("href",b),a},remove:function(a){return a.removeAttribute("href"),a},value:function(a){return a.getAttribute("href")}},image:{type:a.types.EMBED,tag:"IMG",attribute:"src"},align:{type:a.types.LINE,style:"textAlign","default":"left"},bullet:{type:a.types.LINE,exclude:"list",parentTag:"UL",tag:"LI"},list:{type:a.types.LINE,exclude:"bullet",parentTag:"OL",tag:"LI"}},a.prototype.add=function(b,c){var d,g,h,i,j;return c?this.value(b)===c?b:(e.isString(this.config.parentTag)&&(h=b.parentNode,h.tagName!==this.config.parentTag&&(h=document.createElement(this.config.parentTag),f(b).wrap(h)),b.parentNode.tagName===(null!=(i=b.parentNode.previousSibling)?i.tagName:void 0)&&f(b.parentNode.previousSibling).merge(b.parentNode),b.parentNode.tagName===(null!=(j=b.parentNode.nextSibling)?j.tagName:void 0)&&f(b.parentNode).merge(b.parentNode.nextSibling)),e.isString(this.config.tag)&&b.tagName!==this.config.tag&&(d=document.createElement(this.config.tag),null!=f.VOID_TAGS[d.tagName]?(null!=b.parentNode&&f(b).replace(d),b=d):this.isType(a.types.LINE)?b=f(b).switchTag(this.config.tag).get():(f(b).wrap(d),b=d)),(e.isString(this.config.style)||e.isString(this.config.attribute)||e.isString(this.config["class"]))&&(e.isString(this.config["class"])&&(b=this.remove(b)),f(b).isTextNode()&&(g=document.createElement(f.DEFAULT_INLINE_TAG),f(b).wrap(g),b=g),e.isString(this.config.style)&&c!==this.config["default"]&&(b.style[this.config.style]=c),e.isString(this.config.attribute)&&b.setAttribute(this.config.attribute,c),e.isString(this.config["class"])&&f(b).addClass(this.config["class"]+c)),e.isFunction(this.config.add)&&(b=this.config.add(b,c)),b):this.remove(b)},a.prototype.isType=function(a){return a===this.config.type},a.prototype.match=function(a){var b,c,d,g,h;if(!f(a).isElement())return!1;if(e.isString(this.config.parentTag)&&(null!=(g=a.parentNode)?g.tagName:void 0)!==this.config.parentTag)return!1;if(e.isString(this.config.tag)&&a.tagName!==this.config.tag)return!1;if(e.isString(this.config.style)&&(!a.style[this.config.style]||a.style[this.config.style]===this.config["default"]))return!1;if(e.isString(this.config.attribute)&&!a.hasAttribute(this.config.attribute))return!1;if(e.isString(this.config["class"])){for(h=f(a).classes(),c=0,d=h.length;d>c;c++)if(b=h[c],0===b.indexOf(this.config["class"]))return!0;return!1}return!0},a.prototype.prepare=function(a){return e.isString(this.config.prepare)?document.execCommand(this.config.prepare,!1,a):e.isFunction(this.config.prepare)?this.config.prepare(a):void 0},a.prototype.remove=function(b){var c,d,g,h;if(!this.match(b))return b;if(e.isString(this.config.style)&&(b.style[this.config.style]="",b.getAttribute("style")||b.removeAttribute("style")),e.isString(this.config.attribute)&&b.removeAttribute(this.config.attribute),e.isString(this.config["class"]))for(h=f(b).classes(),d=0,g=h.length;g>d;d++)c=h[d],0===c.indexOf(this.config["class"])&&f(b).removeClass(c);if(e.isString(this.config.tag))if(this.isType(a.types.LINE))e.isString(this.config.parentTag)&&(null!=b.previousSibling&&f(b).splitBefore(b.parentNode.parentNode),null!=b.nextSibling&&f(b.nextSibling).splitBefore(b.parentNode.parentNode)),b=f(b).switchTag(f.DEFAULT_BLOCK_TAG).get();else{if(this.isType(a.types.EMBED))return void f(b).remove();b=f(b).switchTag(f.DEFAULT_INLINE_TAG).get()}return e.isString(this.config.parentTag)&&f(b.parentNode).unwrap(),e.isFunction(this.config.remove)&&(b=this.config.remove(b)),b.tagName!==f.DEFAULT_INLINE_TAG||b.hasAttributes()||(b=f(b).unwrap()),b},a.prototype.value=function(a){var b,c,d,g;if(!this.match(a))return void 0;if(this.config.value)return this.config.value(a);if(e.isString(this.config.attribute))return a.getAttribute(this.config.attribute)||void 0;if(e.isString(this.config.style))return a.style[this.config.style]||void 0;if(e.isString(this.config["class"])){for(g=f(a).classes(),c=0,d=g.length;d>c;c++)if(b=g[c],0===b.indexOf(this.config["class"]))return b.slice(this.config["class"].length)}else if(e.isString(this.config.tag))return!0;return void 0},a}(),b.exports=d},{"../lib/dom":17,lodash:1}],11:[function(a,b,c){var d,e,f,g,h,i=function(a,b){function c(){this.constructor=a}for(var d in b)j.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},j={}.hasOwnProperty;g=a("lodash"),h=a("../lib/dom"),d=a("./format"),f=a("../lib/linked-list"),e=function(a){function b(a,c){this.node=a,this.formats=g.clone(c),this.text=h(this.node).text(),this.length=this.text.length,h(this.node).data(b.DATA_KEY,this)}return i(b,a),b.DATA_KEY="leaf",b.isLeafNode=function(a){return h(a).isTextNode()||null==a.firstChild},b.prototype.deleteText=function(a,c){var d;if(c>0)return this.text=this.text.slice(0,a)+this.text.slice(a+c),this.length=this.text.length,null!=h.EMBED_TAGS[this.node.tagName]?(d=document.createTextNode(this.text),h(d).data(b.DATA_KEY,this),this.node=h(this.node).replace(d).get()):h(this.node).text(this.text)},b.prototype.insertText=function(a,c){var d;return this.text=this.text.slice(0,a)+c+this.text.slice(a),h(this.node).isTextNode()?h(this.node).text(this.text):(d=document.createTextNode(c),h(d).data(b.DATA_KEY,this),this.node.tagName===h.DEFAULT_BREAK_TAG?this.node=h(this.node).replace(d).get():(this.node.appendChild(d),this.node=d)),this.length=this.text.length},b}(f.Node),b.exports=e},{"../lib/dom":17,"../lib/linked-list":18,"./format":10,lodash:1}],12:[function(a,b,c){var d,e,f,g,h,i,j,k,l=function(a,b){function c(){this.constructor=a}for(var d in b)m.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},m={}.hasOwnProperty;j=a("lodash"),d=a("rich-text/lib/delta"),k=a("../lib/dom"),e=a("./format"),f=a("./leaf"),g=a("./line"),h=a("../lib/linked-list"),i=a("./normalizer"),g=function(a){function b(a,c){this.doc=a,this.node=c,this.formats={},this.rebuild(),b.__super__.constructor.call(this,this.node)}return l(b,a),b.DATA_KEY="line",b.prototype.buildLeaves=function(a,b){return j.each(k(a).childNodes(),function(a){return function(c){var d;return c=a.doc.normalizer.normalizeNode(c),d=j.clone(b),j.each(a.doc.formats,function(a,b){return!a.isType(e.types.LINE)&&a.match(c)?d[b]=a.value(c):void 0}),f.isLeafNode(c)?a.leaves.append(new f(c,d)):a.buildLeaves(c,d)}}(this))},b.prototype.deleteText=function(a,b){var c,d,e;if(b>0){for(e=this.findLeafAt(a),d=e[0],a=e[1];null!=d&&b>0;)c=Math.min(b,d.length-a),d.deleteText(a,c),b-=c,d=d.next,a=0;return this.rebuild()}},b.prototype.findLeaf=function(a){return null!=a?k(a).data(f.DATA_KEY):void 0},b.prototype.findLeafAt=function(a,b){var c;if(null==b&&(b=!1),a>=this.length-1)return[this.leaves.last,this.leaves.last.length];for(c=this.leaves.first;null!=c;){if(a<c.length||a===c.length&&b)return[c,a];a-=c.length,c=c.next}return[this.leaves.last,a-this.leaves.last.length]},b.prototype.format=function(a,b){var c;return j.isObject(a)?c=a:(c={},c[a]=b),j.each(c,function(a){return function(b,c){var d,f;return f=a.doc.formats[c],null!=f?(f.isType(e.types.LINE)&&(f.config.exclude&&a.formats[f.config.exclude]&&(d=a.doc.formats[f.config.exclude],null!=d&&(a.node=d.remove(a.node),delete a.formats[f.config.exclude])),a.node=f.add(a.node,b)),b?a.formats[c]=b:delete a.formats[c]):void 0}}(this)),this.resetContent()},b.prototype.formatText=function(a,b,c,d){var f,g,h,i,j,l,m,n,o,p;if(l=this.findLeafAt(a),g=l[0],h=l[1],f=this.doc.formats[c],null!=f&&f.config.type!==e.types.LINE){for(;null!=g&&b>0;){if(j=g.next,d&&g.formats[c]!==d||!d&&null!=g.formats[c]){if(p=g.node,null!=g.formats[c]){for(k(p).splitBefore(this.node);!f.match(p);)p=p.parentNode;k(p).split(g.length)}h>0&&(m=k(p).split(h),i=m[0],p=m[1]),g.length>h+b&&(n=k(p).split(b),p=n[0],o=n[1]),f.add(p,d)}b-=g.length-h,h=0,g=j}return this.rebuild()}},b.prototype._insert=function(a,b,c){var d,e,f,g,h,i;return h=this.findLeafAt(a),d=h[0],e=h[1],b=j.reduce(c,function(a){return function(b,c,d){var e;return e=a.doc.formats[d],null!=e&&(b=e.add(b,c)),b}}(this),b),i=k(d.node).split(e),g=i[0],f=i[1],f&&(f=k(f).splitBefore(this.node).get()),this.node.insertBefore(b,f),this.rebuild()},b.prototype.insertEmbed=function(a,b){var c,d,f,g,h,i,l,m;return l=this.findLeafAt(a),d=l[0],f=l[1],m=k(d.node).split(f),i=m[0],g=m[1],c=j.find(Object.keys(b),function(a){return function(b){return a.doc.formats[b].isType(e.types.EMBED)}}(this)),h=this.doc.formats[c].add({},b[c]),b=j.clone(b),delete b[c],this._insert(a,h,b)},b.prototype.insertText=function(a,b,c){var d,e,f;return null==c&&(c={}),b.length>0?(f=this.findLeafAt(a),d=f[0],e=f[1],j.isEqual(d.formats,c)?(d.insertText(e,b),this.resetContent()):this._insert(a,document.createTextNode(b),c)):void 0},b.prototype.optimize=function(){return i.optimizeLine(this.node),this.rebuild()},b.prototype.rebuild=function(a){return null==a&&(a=!1),!a&&null!=this.outerHTML&&this.outerHTML===this.node.outerHTML&&j.all(this.leaves.toArray(),function(a){return function(b){return k(b.node).isAncestor(a.node)}}(this))?!1:(this.node=this.doc.normalizer.normalizeNode(this.node),0!==k(this.node).length()||this.node.querySelector(k.DEFAULT_BREAK_TAG)||this.node.appendChild(document.createElement(k.DEFAULT_BREAK_TAG)),this.leaves=new h,this.formats=j.reduce(this.doc.formats,function(a){return function(b,c,d){return c.isType(e.types.LINE)&&(c.match(a.node)?b[d]=c.value(a.node):delete b[d]),b}}(this),this.formats),this.buildLeaves(this.node,{}),this.resetContent(),!0)},b.prototype.resetContent=function(){return k(this.node).data(b.DATA_KEY,this),this.outerHTML=this.node.outerHTML,this.length=1,this.delta=new d,j.each(this.leaves.toArray(),function(a){return function(b){return a.length+=b.length,null!=k.EMBED_TAGS[b.node.tagName]?a.delta.insert(1,b.formats):a.delta.insert(b.text,b.formats)}}(this)),this.delta.insert("\n",this.formats)},b}(h.Node),b.exports=g},{"../lib/dom":17,"../lib/linked-list":18,"./format":10,"./leaf":11,"./line":12,"./normalizer":13,lodash:1,"rich-text/lib/delta":3}],13:[function(a,b,c){var d,e,f,g;e=a("lodash"),g=a("../lib/dom"),f=function(a){return a=a.replace(/(?:^|[-_])(\w)/g,function(a,b){return b?b.toUpperCase():""}),a.charAt(0).toLowerCase()+a.slice(1)},d=function(){function a(){this.whitelist={styles:{},tags:{}},this.whitelist.tags[g.DEFAULT_BREAK_TAG]=!0,this.whitelist.tags[g.DEFAULT_BLOCK_TAG]=!0,this.whitelist.tags[g.DEFAULT_INLINE_TAG]=!0}return a.ALIASES={STRONG:"B",EM:"I",DEL:"S",STRIKE:"S"},a.ATTRIBUTES={color:"color",face:"fontFamily",size:"fontSize"},a.prototype.addFormat=function(a){return null!=a.tag&&(this.whitelist.tags[a.tag]=!0),null!=a.parentTag&&(this.whitelist.tags[a.parentTag]=!0),null!=a.style?this.whitelist.styles[a.style]=!0:void 0},a.prototype.normalizeLine=function(b){return b=a.wrapInline(b),b=a.handleBreaks(b),"LI"===b.tagName&&a.flattenList(b),b=a.pullBlocks(b),b=this.normalizeNode(b),a.unwrapText(b),null!=b&&null!=g.LIST_TAGS[b.tagName]&&(b=b.firstChild),b},a.prototype.normalizeNode=function(b){return g(b).isTextNode()?b:(e.each(a.ATTRIBUTES,function(a,c){var d;return b.hasAttribute(c)?(d=b.getAttribute(c),"size"===c&&(d=g.convertFontSize(d)),b.style[a]=d,b.removeAttribute(c)):void 0}),"bold"===b.style.fontWeight&&(b.style.fontWeight="",g(b).wrap(document.createElement("b"))),this.whitelistStyles(b),this.whitelistTags(b))},a.prototype.whitelistStyles=function(a){var b,c;return b=g(a).styles(),c=e.omit(b,function(a){return function(b,c){return null==a.whitelist.styles[f(c)]}}(this)),Object.keys(c).length<Object.keys(b).length?Object.keys(c).length>0?g(a).styles(c,!0):a.removeAttribute("style"):void 0},a.prototype.whitelistTags=function(b){return g(b).isElement()?(null!=a.ALIASES[b.tagName]?b=g(b).switchTag(a.ALIASES[b.tagName]).get():null==this.whitelist.tags[b.tagName]&&(b=null!=g.BLOCK_TAGS[b.tagName]?g(b).switchTag(g.DEFAULT_BLOCK_TAG).get():b.hasAttributes()||null==b.firstChild?g(b).switchTag(g.DEFAULT_INLINE_TAG).get():g(b).unwrap()),b):b},a.flattenList=function(a){var b,c,d;return d=a.nextSibling,b=e.map(a.querySelectorAll("li")),b.forEach(function(b){return a.parentNode.insertBefore(b,d),d=b.nextSibling}),c=e.map(a.querySelectorAll(Object.keys(g.LIST_TAGS).join(","))),c.forEach(function(a){return g(a).remove()})},a.handleBreaks=function(a){var b;return b=e.map(a.querySelectorAll(g.DEFAULT_BREAK_TAG)),e.each(b,function(b){return function(b){return null==b.nextSibling||g.isIE(10)&&null==b.previousSibling?void 0:g(b.nextSibling).splitBefore(a.parentNode)}}(this)),a},a.optimizeLine=function(a){var b,c,d,f;for(a.normalize(),b=g(a).length(),d=g(a).descendants(),f=[];d.length>0;)c=d.pop(),null!=(null!=c?c.parentNode:void 0)&&null==g.EMBED_TAGS[c.tagName]&&(c.tagName===g.DEFAULT_BREAK_TAG?0!==b?f.push(g(c).remove()):f.push(void 0):0===g(c).length()?(d.push(c.nextSibling),f.push(g(c).unwrap())):null!=c.previousSibling&&c.tagName===c.previousSibling.tagName&&e.isEqual(g(c).attributes(),g(c.previousSibling).attributes())?(d.push(c.firstChild),f.push(g(c.previousSibling).merge(c))):f.push(void 0));return f},a.pullBlocks=function(b){var c;for(c=b.firstChild;null!=c;){if(null!=g.BLOCK_TAGS[c.tagName]&&"LI"!==c.tagName){g(c).isolate(b.parentNode),null!=g.LIST_TAGS[c.tagName]&&c.firstChild?(g(c.parentNode).unwrap(),null==b.parentNode&&(b=c)):(g(c).unwrap(),a.pullBlocks(b));break}c=c.nextSibling}return b},a.stripComments=function(a){return a.replace(/<!--[\s\S]*?-->/g,"")},a.stripWhitespace=function(a){return a=a.trim(),a=a.replace(/(\r?\n|\r)+/g," "),a=a.replace(/\>\s+\</g,"><")},a.wrapInline=function(a){var b,c;if(null!=g.BLOCK_TAGS[a.tagName])return a;for(b=document.createElement(g.DEFAULT_BLOCK_TAG),a.parentNode.insertBefore(b,a);null!=a&&null==g.BLOCK_TAGS[a.tagName];)c=a.nextSibling,b.appendChild(a),a=c;return b},a.unwrapText=function(a){var b;return b=e.map(a.querySelectorAll(g.DEFAULT_INLINE_TAG)),e.each(b,function(a){return a.hasAttributes()?void 0:g(a).unwrap()})},a}(),b.exports=d},{"../lib/dom":17,lodash:1}],14:[function(a,b,c){var d,e,f,g,h,i;h=a("lodash"),i=a("../lib/dom"),d=a("./leaf"),e=a("./normalizer"),f=a("../lib/range"),g=function(){function a(a,b){this.doc=a,this.emitter=b,this.focus=!1,this.range=new f(0,0),this.nullDelay=!1,this.update("silent")}return a.prototype.checkFocus=function(){return document.activeElement===this.doc.root},a.prototype.getRange=function(a){var b,c,d;return null==a&&(a=!1),this.checkFocus()?(c=this._getNativeRange(),null==c?null:(d=this._positionToIndex(c.startContainer,c.startOffset),b=c.startContainer===c.endContainer&&c.startOffset===c.endOffset?d:this._positionToIndex(c.endContainer,c.endOffset),new f(Math.min(d,b),Math.max(d,b)))):a?this.range:null},a.prototype.preserve=function(a){var b,c,d,e,f,g,h,i,j;return d=this._getNativeRange(),null!=d&&this.checkFocus()?(e=this._encodePosition(d.startContainer,d.startOffset),i=e[0],j=e[1],f=this._encodePosition(d.endContainer,d.endOffset),b=f[0],c=f[1],a(),g=this._decodePosition(i,j),i=g[0],j=g[1],h=this._decodePosition(b,c),b=h[0],c=h[1],this._setNativeRange(i,j,b,c)):a()},a.prototype.setRange=function(a,b){var c,d,e,f,g,h,i;return null!=a?(e=this._indexToPosition(a.start),h=e[0],i=e[1],a.isCollapsed()?(f=[h,i],c=f[0],d=f[1]):(g=this._indexToPosition(a.end),c=g[0],d=g[1]),this._setNativeRange(h,i,c,d)):this._setNativeRange(null),this.update(b)},a.prototype.shiftAfter=function(a,b,c){var d;return d=this.getRange(),c(),null!=d?(d.shift(a,b),this.setRange(d,"silent")):void 0},a.prototype.update=function(a){var b,c,d,e;return c=this.checkFocus(),d=this.getRange(!0),b="silent"!==a&&(!f.compare(d,this.range)||c!==this.focus),e=c?d:null,null!==e||"user"!==a||this.nullDelay?(this.nullDelay=!1,this.range=d,this.focus=c,b?this.emitter.emit(this.emitter.constructor.events.SELECTION_CHANGE,e,a):void 0):this.nullDelay=!0;},a.prototype._decodePosition=function(a,b){var c;return i(a).isElement()&&(c=i(a.parentNode).childNodes().indexOf(a),b+=c,a=a.parentNode),[a,b]},a.prototype._encodePosition=function(a,b){for(var c;;){if(i(a).isTextNode()||a.tagName===i.DEFAULT_BREAK_TAG||null!=i.EMBED_TAGS[a.tagName])return[a,b];if(b<a.childNodes.length)a=a.childNodes[b],b=0;else{if(0===a.childNodes.length)return null==this.doc.normalizer.whitelist.tags[a.tagName]&&(c=document.createTextNode(""),a.appendChild(c),a=c),[a,0];if(a=a.lastChild,!i(a).isElement())return[a,i(a).length()];if(a.tagName===i.DEFAULT_BREAK_TAG||null!=i.EMBED_TAGS[a.tagName])return[a,1];b=a.childNodes.length}}},a.prototype._getNativeRange=function(){var a,b;return b=document.getSelection(),(null!=b?b.rangeCount:void 0)>0&&(a=b.getRangeAt(0),i(a.startContainer).isAncestor(this.doc.root,!0)&&(a.startContainer===a.endContainer||i(a.endContainer).isAncestor(this.doc.root,!0)))?a:null},a.prototype._indexToPosition=function(a){var b,c,d;return 0===this.doc.lines.length?[this.doc.root,0]:(d=this.doc.findLeafAt(a,!0),b=d[0],c=d[1],this._decodePosition(b.node,c))},a.prototype._positionToIndex=function(a,b){var c,d,e,f,g,h;if(i.isIE(10)&&"BR"===a.tagName&&1===b&&(b=0),h=this._encodePosition(a,b),d=h[0],b=h[1],f=this.doc.findLine(d),null==f)return 0;for(c=f.findLeaf(d),g=0;null!=f.prev;)f=f.prev,g+=f.length;if(null==c)return g;for(e=0;null!=c.prev;)c=c.prev,e+=c.length;return g+e+b},a.prototype._setNativeRange=function(a,b,c,d){var e,f;if(f=document.getSelection())if(null!=a){if(this.checkFocus()||this.doc.root.focus(),e=this._getNativeRange(),null==e||a!==e.startContainer||b!==e.startOffset||c!==e.endContainer||d!==e.endOffset)return f.removeAllRanges(),e=document.createRange(),e.setStart(a,b),e.setEnd(c,d),f.addRange(e)}else if(f.removeAllRanges(),this.doc.root.blur(),i.isIE(11)&&!i.isIE(9))return document.body.focus()},a}(),b.exports=g},{"../lib/dom":17,"../lib/range":20,"./leaf":11,"./normalizer":13,lodash:1}],15:[function(a,b,c){a("./modules/authorship"),a("./modules/image-tooltip"),a("./modules/keyboard"),a("./modules/link-tooltip"),a("./modules/multi-cursor"),a("./modules/paste-manager"),a("./modules/toolbar"),a("./modules/tooltip"),a("./modules/undo-manager"),b.exports=a("./quill")},{"./modules/authorship":21,"./modules/image-tooltip":22,"./modules/keyboard":23,"./modules/link-tooltip":24,"./modules/multi-cursor":25,"./modules/paste-manager":26,"./modules/toolbar":27,"./modules/tooltip":28,"./modules/undo-manager":29,"./quill":30}],16:[function(a,b,c){var d,e,f,g=function(a,b){function c(){this.constructor=a}for(var d in b)h.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},h={}.hasOwnProperty;f=a("./dom"),e=a("./picker"),d=function(a){function b(){b.__super__.constructor.apply(this,arguments),f(this.container).addClass("ql-color-picker")}return g(b,a),b.prototype.buildItem=function(a,c,d){var e;return e=b.__super__.buildItem.call(this,a,c,d),e.style.backgroundColor=c.value,e},b}(e),b.exports=d},{"./dom":17,"./picker":19}],17:[function(a,b,c){var d,e,f,g,h,i=function(a,b){return function(){return a.apply(b,arguments)}},j=function(a,b){function c(){this.constructor=a}for(var d in b)k.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},k={}.hasOwnProperty;f=a("lodash"),h=null,e=function(){function a(a){this.node=a,this.trigger=i(this.trigger,this)}return a.prototype.addClass=function(a){return this.hasClass(a)?void 0:(null!=this.node.classList?this.node.classList.add(a):null!=this.node.className&&(this.node.className=(this.node.className+" "+a).trim()),this)},a.prototype.attributes=function(a){var b,c,d,e,g,h;if(a)return f.each(a,function(a){return function(b,c){return a.node.setAttribute(c,b)}}(this)),this;if(null==this.node.attributes)return{};for(a={},g=this.node.attributes,c=d=0,e=g.length;e>d;c=++d)h=g[c],b=this.node.attributes[c],a[b.name]=b.value;return a},a.prototype.child=function(a){var b,c;for(b=this.node.firstChild,c=g(b).length();null!=b&&!(c>a);)a-=c,b=b.nextSibling,c=g(b).length();return null==b&&(b=this.node.lastChild,a=g(b).length()),[b,a]},a.prototype.childNodes=function(){return f.map(this.node.childNodes)},a.prototype.classes=function(){return this.node.className.split(/\s+/)},a.prototype.data=function(a,b){var c;return null!=b?(null==this.node["ql-data"]&&(this.node["ql-data"]={}),this.node["ql-data"][a]=b,this):null!=(c=this.node["ql-data"])?c[a]:void 0},a.prototype.descendants=function(){return f.map(this.node.getElementsByTagName("*"))},a.prototype.get=function(){return this.node},a.prototype.hasClass=function(a){return null!=this.node.classList?this.node.classList.contains(a):null!=this.node.className?this.classes().indexOf(a)>-1:!1},a.prototype.isAncestor=function(a,b){var c;if(null==b&&(b=!1),a===this.node)return b;for(c=this.node;c;){if(c===a)return!0;c=c.parentNode}return!1},a.prototype.isElement=function(){var a;return(null!=(a=this.node)?a.nodeType:void 0)===g.ELEMENT_NODE},a.prototype.isTextNode=function(){var a;return(null!=(a=this.node)?a.nodeType:void 0)===g.TEXT_NODE},a.prototype.isolate=function(a){return null!=this.node.nextSibling&&g(this.node.nextSibling).splitBefore(a),this.splitBefore(a),this},a.prototype.length=function(){var a;return null==this.node?0:(a=this.text().length,this.isElement()&&(a+=this.node.querySelectorAll(Object.keys(g.EMBED_TAGS).join(",")).length),a)},a.prototype.merge=function(a){var b;return b=g(a),this.isElement()?(b.moveChildren(this.node),this.normalize()):this.text(this.text()+b.text()),b.remove(),this},a.prototype.moveChildren=function(a){return f.each(this.childNodes(),function(b){return a.appendChild(b)}),this},a.prototype.nextLineNode=function(a){var b;return b=this.node.nextSibling,null==b&&this.node.parentNode!==a&&(b=this.node.parentNode.nextSibling),null!=b&&null!=g.LIST_TAGS[b.tagName]&&(b=b.firstChild),b},a.prototype.normalize=function(){var a,b,c,d;for(b=this.node.firstChild;null!=b;)d=b.nextSibling,a=g(b),null!=d&&g(d).isTextNode()&&(0===a.text().length?a.remove():a.isTextNode()&&(c=d.nextSibling,a.merge(d),d=c)),b=d;return this},a.prototype.on=function(a,b){return this.node.addEventListener(a,function(c){return function(d){var e,f;return e=!h||"keydown"!==a&&"keyup"!==a?d:h,f=b.call(c.node,e),f||(d.preventDefault(),d.stopPropagation()),f}}(this)),this},a.prototype.remove=function(){var a;return null!=(a=this.node.parentNode)&&a.removeChild(this.node),this.node=null,null},a.prototype.removeClass=function(a){var b;if(this.hasClass(a))return null!=this.node.classList?this.node.classList.remove(a):null!=this.node.className&&(b=this.classes(),b.splice(b.indexOf(a),1),this.node.className=b.join(" ")),this.node.getAttribute("class")||this.node.removeAttribute("class"),this},a.prototype.replace=function(a){return this.node.parentNode.replaceChild(a,this.node),this.node=a,this},a.prototype.splitBefore=function(a,b){var c,d,e,f;if(null==b&&(b=!1),this.node===a||this.node.parentNode===a)return this;if(null!=this.node.previousSibling||b){for(e=this.node.parentNode,d=e.cloneNode(!1),e.parentNode.insertBefore(d,e.nextSibling),f=this.node;null!=f;)c=f.nextSibling,d.appendChild(f),f=c;return g(d).splitBefore(a)}return g(this.node.parentNode).splitBefore(a)},a.prototype.split=function(a,b){var c,d,e,f,h,i,j,k,l,m;if(null==b&&(b=!1),j=this.length(),a=Math.max(0,a),a=Math.min(a,j),!b&&0===a)return[this.node.previousSibling,this.node,!1];if(!b&&a===j)return[this.node,this.node.nextSibling,!1];if(this.node.nodeType===g.TEXT_NODE)return c=this.node.splitText(a),[this.node,c,!0];for(h=this.node,m=this.node.cloneNode(!1),this.node.parentNode.insertBefore(m,h.nextSibling),k=this.child(a),d=k[0],a=k[1],l=g(d).split(a),e=l[0],f=l[1];null!==f;)i=f.nextSibling,m.appendChild(f),f=i;return[h,m,!0]},a.prototype.styles=function(a,b){var c,d;return null==b&&(b=!1),a?(b||(a=f.defaults(a,this.styles())),d=f.map(a,function(a,b){return b+": "+a}).join("; ")+";",this.node.setAttribute("style",d),this):(d=this.node.getAttribute("style")||"",c=f.reduce(d.split(";"),function(a,b){var c,d,e;return d=b.split(":"),c=d[0],e=d[1],c&&e&&(c=c.trim(),e=e.trim(),a[c.toLowerCase()]=e),a},{}))},a.prototype.switchTag=function(a){var b,c;return a=a.toUpperCase(),this.node.tagName===a?this:(c=document.createElement(a),b=this.attributes(),null==g.VOID_TAGS[a]&&this.moveChildren(c),this.replace(c),this.node=c,this.attributes(b))},a.prototype.text=function(a){if(null!=a){switch(this.node.nodeType){case g.ELEMENT_NODE:this.node.textContent=a;break;case g.TEXT_NODE:this.node.data=a}return this}switch(this.node.nodeType){case g.ELEMENT_NODE:return this.node.tagName===g.DEFAULT_BREAK_TAG?"":null!=g.EMBED_TAGS[this.node.tagName]?g.EMBED_TEXT:null!=this.node.textContent?this.node.textContent:"";case g.TEXT_NODE:return this.node.data||"";default:return""}},a.prototype.textNodes=function(){var a,b,c;for(c=document.createTreeWalker(this.node,NodeFilter.SHOW_TEXT,null,!1),b=[];a=c.nextNode();)b.push(a);return b},a.prototype.toggleClass=function(a,b){return null==b&&(b=!this.hasClass(a)),b?this.addClass(a):this.removeClass(a),this},a.prototype.trigger=function(a,b){var c,d,e;return null==b&&(b={}),["keypress","keydown","keyup"].indexOf(a)<0?(c=document.createEvent("Event"),c.initEvent(a,b.bubbles,b.cancelable)):(c=document.createEvent("KeyboardEvent"),h=f.clone(b),f.isNumber(b.key)?h.which=b.key:f.isString(b.key)?h.which=b.key.toUpperCase().charCodeAt(0):h.which=0,g.isIE(10)?(e=[],b.altKey&&e.push("Alt"),b.ctrlKey&&e.push("Control"),b.metaKey&&e.push("Meta"),b.shiftKey&&e.push("Shift"),c.initKeyboardEvent(a,b.bubbles,b.cancelable,window,0,0,e.join(" "),null,null)):(d=f.isFunction(c.initKeyboardEvent)?"initKeyboardEvent":"initKeyEvent",c[d](a,b.bubbles,b.cancelable,window,b.ctrlKey,b.altKey,b.shiftKey,b.metaKey,0,0))),this.node.dispatchEvent(c),h=null,this},a.prototype.unwrap=function(){var a,b;return b=this.node.firstChild,a=this.node.nextSibling,f.each(this.childNodes(),function(b){return function(c){return b.node.parentNode.insertBefore(c,a)}}(this)),this.remove(),b},a.prototype.wrap=function(a){var b;for(null!=this.node.parentNode&&this.node.parentNode.insertBefore(a,this.node),b=a;null!=b.firstChild;)b=a.firstChild;return b.appendChild(this.node),this},a}(),d=function(a){function b(){return b.__super__.constructor.apply(this,arguments)}return j(b,a),b.prototype["default"]=function(){return this.node.querySelector("option[selected]")},b.prototype.option=function(a,b){var c,d,e,g,h,i;if(null==b&&(b=!0),i=f.isElement(a)?a.value:a){for(i=i.replace(/[^\w]+/g,""),h=this.node.children,d=e=0,g=h.length;g>e;d=++e)if(c=h[d],c.value.replace(/[^\w]+/g,"")===i){this.node.selectedIndex=d;break}}else this.node.selectedIndex=-1;return b&&this.trigger("change"),this},b.prototype.reset=function(a){var b;return null==a&&(a=!0),b=this["default"](),null!=b?b.selected=!0:this.node.selectedIndex=0,a&&this.trigger("change"),this},b.prototype.value=function(){return this.node.selectedIndex>-1?this.node.options[this.node.selectedIndex].value:""},b}(e),g=function(a){return"SELECT"===(null!=a?a.tagName:void 0)?new d(a):new e(a)},g=f.extend(g,{ELEMENT_NODE:1,NOBREAK_SPACE:"&nbsp;",TEXT_NODE:3,ZERO_WIDTH_NOBREAK_SPACE:"\ufeff",DEFAULT_BLOCK_TAG:"DIV",DEFAULT_BREAK_TAG:"BR",DEFAULT_INLINE_TAG:"SPAN",EMBED_TEXT:"!",FONT_SIZES:{"10px":1,"13px":2,"16px":3,"18px":4,"24px":5,"32px":6,"48px":7},KEYS:{BACKSPACE:8,TAB:9,ENTER:13,ESCAPE:27,LEFT:37,UP:38,RIGHT:39,DOWN:40,DELETE:46},BLOCK_TAGS:{ADDRESS:"ADDRESS",ARTICLE:"ARTICLE",ASIDE:"ASIDE",AUDIO:"AUDIO",BLOCKQUOTE:"BLOCKQUOTE",CANVAS:"CANVAS",DD:"DD",DIV:"DIV",DL:"DL",FIGCAPTION:"FIGCAPTION",FIGURE:"FIGURE",FOOTER:"FOOTER",FORM:"FORM",H1:"H1",H2:"H2",H3:"H3",H4:"H4",H5:"H5",H6:"H6",HEADER:"HEADER",HGROUP:"HGROUP",LI:"LI",OL:"OL",OUTPUT:"OUTPUT",P:"P",PRE:"PRE",SECTION:"SECTION",TABLE:"TABLE",TBODY:"TBODY",TD:"TD",TFOOT:"TFOOT",TH:"TH",THEAD:"THEAD",TR:"TR",UL:"UL",VIDEO:"VIDEO"},EMBED_TAGS:{IMG:"IMG"},LINE_TAGS:{DIV:"DIV",LI:"LI"},LIST_TAGS:{OL:"OL",UL:"UL"},VOID_TAGS:{AREA:"AREA",BASE:"BASE",BR:"BR",COL:"COL",COMMAND:"COMMAND",EMBED:"EMBED",HR:"HR",IMG:"IMG",INPUT:"INPUT",KEYGEN:"KEYGEN",LINK:"LINK",META:"META",PARAM:"PARAM",SOURCE:"SOURCE",TRACK:"TRACK",WBR:"WBR"},convertFontSize:function(a){var b,c,d,e;f.isString(a)&&a.indexOf("px")>-1?(d=Object.keys(g.FONT_SIZES),e=f.values(g.FONT_SIZES)):(e=Object.keys(g.FONT_SIZES),d=f.values(g.FONT_SIZES));for(b in d)if(c=d[b],parseInt(a)<=parseInt(c))return e[b];return f.last(e)},isIE:function(a){var b;return b=document.documentMode,b&&a>=b},isIOS:function(){return/iPhone|iPad/i.test(navigator.userAgent)},isMac:function(){return/Mac/i.test(navigator.platform)}}),b.exports=g},{lodash:1}],18:[function(a,b,c){var d,e;e=function(){function a(a){this.data=a,this.prev=this.next=null}return a}(),d=function(){function a(){this.length=0,this.first=this.last=null}return a.Node=e,a.prototype.append=function(a){return null!=this.first?(a.next=null,this.last.next=a):this.first=a,a.prev=this.last,this.last=a,this.length+=1},a.prototype.insertAfter=function(a,b){return b.prev=a,null!=a?(b.next=a.next,null!=a.next&&(a.next.prev=b),a.next=b,a===this.last&&(this.last=b)):(b.next=this.first,this.first.prev=b,this.first=b),this.length+=1},a.prototype.remove=function(a){return this.length>1?(null!=a.prev&&(a.prev.next=a.next),null!=a.next&&(a.next.prev=a.prev),a===this.first&&(this.first=a.next),a===this.last&&(this.last=a.prev)):this.first=this.last=null,a.prev=a.next=null,this.length-=1},a.prototype.toArray=function(){var a,b;for(a=[],b=this.first;null!=b;)a.push(b),b=b.next;return a},a}(),b.exports=d},{}],19:[function(a,b,c){var d,e,f;e=a("lodash"),f=a("./dom"),d=function(){function a(a){this.select=a,this.container=document.createElement("span"),this.buildPicker(),f(this.container).addClass("ql-picker"),this.select.style.display="none",this.select.parentNode.insertBefore(this.container,this.select),f(document).on("click",function(a){return function(){return a.close(),!0}}(this)),f(this.label).on("click",function(a){return function(){return e.defer(function(){return f(a.container).toggleClass("ql-expanded")}),!1}}(this)),f(this.select).on("change",function(a){return function(){var b,c;return a.select.selectedIndex>-1&&(b=a.container.querySelectorAll(".ql-picker-item")[a.select.selectedIndex],c=a.select.options[a.select.selectedIndex]),a.selectItem(b,!1),f(a.label).toggleClass("ql-active",c!==f(a.select)["default"]())}}(this))}return a.TEMPLATE='<span class="ql-picker-label"></span><span class="ql-picker-options"></span>',a.prototype.buildItem=function(a,b,c){var d;return d=document.createElement("span"),d.setAttribute("data-value",b.getAttribute("value")),f(d).addClass("ql-picker-item").text(f(b).text()).on("click",function(a){return function(){return a.selectItem(d,!0),a.close()}}(this)),this.select.selectedIndex===c&&this.selectItem(d,!1),d},a.prototype.buildPicker=function(){var b;return e.each(f(this.select).attributes(),function(a){return function(b,c){return a.container.setAttribute(c,b)}}(this)),this.container.innerHTML=a.TEMPLATE,this.label=this.container.querySelector(".ql-picker-label"),b=this.container.querySelector(".ql-picker-options"),e.each(this.select.options,function(a){return function(c,d){var e;return e=a.buildItem(b,c,d),b.appendChild(e)}}(this))},a.prototype.close=function(){return f(this.container).removeClass("ql-expanded")},a.prototype.selectItem=function(a,b){var c,d;return c=this.container.querySelector(".ql-selected"),null!=c&&f(c).removeClass("ql-selected"),null!=a?(d=a.getAttribute("data-value"),f(a).addClass("ql-selected"),f(this.label).text(f(a).text()),f(this.select).option(d,b),this.label.setAttribute("data-value",d)):(this.label.innerHTML="&nbsp;",this.label.removeAttribute("data-value"))},a}(),b.exports=d},{"./dom":17,lodash:1}],20:[function(a,b,c){var d,e;e=a("lodash"),d=function(){function a(a,b){this.start=a,this.end=b}return a.compare=function(a,b){return a===b?!0:null==a||null==b?!1:a.equals(b)},a.prototype.equals=function(a){return null==a?!1:this.start===a.start&&this.end===a.end},a.prototype.shift=function(a,b){var c;return c=e.map([this.start,this.end],function(c){return a>c?c:b>=0?c+b:Math.max(a,c+b)}),this.start=c[0],this.end=c[1],c},a.prototype.isCollapsed=function(){return this.start===this.end},a}(),b.exports=d},{lodash:1}],21:[function(a,b,c){var d,e,f,g,h;f=a("../quill"),g=f.require("lodash"),h=f.require("dom"),e=f.require("delta"),d=function(){function a(a,b){this.quill=a,this.options=b,null!=this.options.button&&this.attachButton(this.options.button),this.options.enabled&&this.enable(),this.quill.addFormat("author",{"class":"author-"}),null!=this.options.authorId&&(this.quill.on(this.quill.constructor.events.PRE_EVENT,function(a){return function(b,c,d){var h,i;return b===a.quill.constructor.events.TEXT_CHANGE&&"user"===d?(h=new e,i={author:a.options.authorId},g.each(c.ops,function(b){return null==b["delete"]?null!=b.insert||null!=b.retain&&null!=b.attributes?(b.attributes||(b.attributes={}),b.attributes.author=a.options.authorId,h.retain(b.retain||b.insert.length||1,i)):h.retain(b.retain):void 0}),a.quill.updateContents(h,f.sources.SILENT)):void 0}}(this)),this.addAuthor(this.options.authorId,this.options.color))}return a.DEFAULTS={authorId:null,color:"transparent",enabled:!1},a.prototype.addAuthor=function(a,b){var c;return c={},c[".authorship .author-"+a]={"background-color":""+b},this.quill.theme.addStyles(c)},a.prototype.attachButton=function(a){var b;return b=h(a),b.on("click",function(a){return function(){return b.toggleClass("ql-on"),a.enable($dom.hasClass("ql-on"))}}(this))},a.prototype.enable=function(a){return null==a&&(a=!0),h(this.quill.root).toggleClass("authorship",a)},a.prototype.disable=function(){return this.enable(!1)},a}(),f.registerModule("authorship",d),b.exports=d},{"../quill":30}],22:[function(a,b,c){var d,e,f,g,h,i,j,k=function(a,b){function c(){this.constructor=a}for(var d in b)l.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},l={}.hasOwnProperty;f=a("../quill"),h=a("./tooltip"),i=f.require("lodash"),j=f.require("dom"),d=f.require("delta"),g=f.require("range"),e=function(a){function b(a,c){this.quill=a,this.options=c,this.options=i.defaults(this.options,h.DEFAULTS),b.__super__.constructor.call(this,this.quill,this.options),this.preview=this.container.querySelector(".preview"),this.textbox=this.container.querySelector(".input"),j(this.container).addClass("ql-image-tooltip"),this.initListeners()}return k(b,a),b.DEFAULTS={template:'<input class="input" type="textbox"> <div class="preview"> <span>Preview</span> </div> <a href="javascript:;" class="cancel">Cancel</a> <a href="javascript:;" class="insert">Insert</a>'},b.prototype.initListeners=function(){return j(this.quill.root).on("focus",i.bind(this.hide,this)),j(this.container.querySelector(".insert")).on("click",i.bind(this.insertImage,this)),j(this.container.querySelector(".cancel")).on("click",i.bind(this.hide,this)),j(this.textbox).on("input",i.bind(this._preview,this)),this.initTextbox(this.textbox,this.insertImage,this.hide),this.quill.onModuleLoad("toolbar",function(a){return function(b){return a.toolbar=b,b.initFormat("image",i.bind(a._onToolbar,a))}}(this))},b.prototype.insertImage=function(){var a,b;return b=this._normalizeURL(this.textbox.value),null==this.range&&(this.range=new g(0,0)),this.range&&(this.preview.innerHTML="<span>Preview</span>",this.textbox.value="",a=this.range.end,this.quill.insertEmbed(a,"image",b,"user"),this.quill.setSelection(a+1,a+1)),this.hide()},b.prototype._onToolbar=function(a,b){return b?(this.textbox.value||(this.textbox.value="http://"),this.show(),this.textbox.focus(),i.defer(function(a){return function(){return a.textbox.setSelectionRange(a.textbox.value.length,a.textbox.value.length)}}(this))):(this.quill.deleteText(a,"user"),this.toolbar.setActive("image",!1))},b.prototype._preview=function(){var a;if(this._matchImageURL(this.textbox.value))return"IMG"===this.preview.firstChild.tagName?this.preview.firstChild.setAttribute("src",this.textbox.value):(a=document.createElement("img"),a.setAttribute("src",this.textbox.value),this.preview.replaceChild(a,this.preview.firstChild))},b.prototype._matchImageURL=function(a){return/^https?:\/\/.+\.(jpe?g|gif|png)$/.test(a)},b.prototype._normalizeURL=function(a){return/^https?:\/\//.test(a)||(a="http://"+a),a},b}(h),f.registerModule("image-tooltip",e),b.exports=e},{"../quill":30,"./tooltip":28}],23:[function(a,b,c){var d,e,f,g,h;f=a("../quill"),g=f.require("lodash"),h=f.require("dom"),d=f.require("delta"),e=function(){function a(a,b){this.quill=a,this.hotkeys={},this._initListeners(),this._initHotkeys(),this.quill.onModuleLoad("toolbar",function(a){return function(b){return a.toolbar=b}}(this))}return a.hotkeys={BOLD:{key:"B",metaKey:!0},INDENT:{key:h.KEYS.TAB},ITALIC:{key:"I",metaKey:!0},OUTDENT:{key:h.KEYS.TAB,shiftKey:!0},UNDERLINE:{key:"U",metaKey:!0}},a.prototype.addHotkey=function(a,b){return Array.isArray(a)||(a=[a]),g.each(a,function(a){return function(c){var d,e;return c=g.isObject(c)?g.clone(c):{key:c},c.callback=b,e=g.isNumber(c.key)?c.key:c.key.toUpperCase().charCodeAt(0),null==(d=a.hotkeys)[e]&&(d[e]=[]),a.hotkeys[e].push(c)}}(this))},a.prototype.toggleFormat=function(a,b){var c,d;return c=a.isCollapsed()?this.quill.getContents(Math.max(0,a.start-1),a.end):this.quill.getContents(a),d=0===c.ops.length||!g.all(c.ops,function(a){var c;return null!=(c=a.attributes)?c[b]:void 0}),a.isCollapsed()?this.quill.prepareFormat(b,d,f.sources.USER):this.quill.formatText(a,b,d,f.sources.USER),null!=this.toolbar?this.toolbar.setActive(b,d):void 0},a.prototype._initEnter=function(){var a;return a=[{key:h.KEYS.ENTER},{key:h.KEYS.ENTER,shiftKey:!0}],this.addHotkey(a,function(a){return function(b,c){var e,h,i,j,k,l;return null==b?!0:(k=a.quill.editor.doc.findLineAt(b.start),i=k[0],j=k[1],l=i.findLeafAt(j),h=l[0],j=l[1],e=(new d).retain(b.start).insert("\n",i.formats)["delete"](b.end-b.start),a.quill.updateContents(e,f.sources.USER),g.each(h.formats,function(b,c){a.quill.prepareFormat(c,b),null!=a.toolbar&&a.toolbar.setActive(c,b)}),!1)}}(this))},a.prototype._initDeletes=function(){return this.addHotkey([h.KEYS.DELETE,h.KEYS.BACKSPACE],function(a){return function(b,c){var d,e,g,i;return null!=b&&a.quill.getLength()>0&&(b.start!==b.end?a.quill.deleteText(b.start,b.end,f.sources.USER):c.key===h.KEYS.BACKSPACE?(i=a.quill.editor.doc.findLineAt(b.start),e=i[0],g=i[1],0===g&&(e.formats.bullet||e.formats.list)?(d=e.formats.bullet?"bullet":"list",a.quill.formatLine(b.start,b.start,d,!1)):b.start>0&&a.quill.deleteText(b.start-1,b.start,f.sources.USER)):b.start<a.quill.getLength()-1&&a.quill.deleteText(b.start,b.start+1,f.sources.USER)),!1}}(this))},a.prototype._initHotkeys=function(){return this.addHotkey(a.hotkeys.INDENT,function(a){return function(b){return a._onTab(b,!1),!1}}(this)),this.addHotkey(a.hotkeys.OUTDENT,function(a){return function(a){return!1}}(this)),g.each(["bold","italic","underline"],function(b){return function(c){return b.addHotkey(a.hotkeys[c.toUpperCase()],function(a){return b.toggleFormat(a,c),!1})}}(this)),this._initDeletes(),this._initEnter()},a.prototype._initListeners=function(){return h(this.quill.root).on("keydown",function(a){return function(b){var c;return c=!1,g.each(a.hotkeys[b.which],function(d){var e;return e=h.isMac()?b.metaKey:b.metaKey||b.ctrlKey,!!d.metaKey==!!e&&!!d.shiftKey==!!b.shiftKey&&!!d.altKey==!!b.altKey?(c=d.callback(a.quill.getSelection(),d,b)===!1||c,!0):void 0}),!c}}(this))},a.prototype._onTab=function(a,b){var c;return null==b&&(b=!1),c=(new d).retain(a.start).insert("	")["delete"](a.end-a.start).retain(this.quill.getLength()-a.end),this.quill.updateContents(c,f.sources.USER),this.quill.setSelection(a.start+1,a.start+1)},a}(),f.registerModule("keyboard",e),b.exports=e},{"../quill":30}],24:[function(a,b,c){var d,e,f,g,h,i=function(a,b){function c(){this.constructor=a}for(var d in b)j.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},j={}.hasOwnProperty;e=a("../quill"),f=a("./tooltip"),g=e.require("lodash"),h=e.require("dom"),d=function(a){function b(a,c){this.quill=a,this.options=c,this.options=g.defaults(this.options,f.DEFAULTS),b.__super__.constructor.call(this,this.quill,this.options),h(this.container).addClass("ql-link-tooltip"),this.textbox=this.container.querySelector(".input"),this.link=this.container.querySelector(".url"),this.initListeners()}return i(b,a),b.DEFAULTS={maxLength:50,template:'<span class="title">Visit URL:&nbsp;</span> <a href="#" class="url" target="_blank" href="about:blank"></a> <input class="input" type="text"> <span>&nbsp;&#45;&nbsp;</span> <a href="javascript:;" class="change">Change</a> <a href="javascript:;" class="remove">Remove</a> <a href="javascript:;" class="done">Done</a>'},b.hotkeys={LINK:{key:"K",metaKey:!0}},b.prototype.initListeners=function(){return this.quill.on(this.quill.constructor.events.SELECTION_CHANGE,function(a){return function(b){var c;if(null!=b&&b.isCollapsed())return c=a._findAnchor(b),c?(a.setMode(c.href,!1),a.show(c)):a.container.style.left!==f.HIDE_MARGIN?(a.range=null,a.hide()):void 0}}(this)),h(this.container.querySelector(".done")).on("click",g.bind(this.saveLink,this)),h(this.container.querySelector(".remove")).on("click",function(a){return function(){return a.removeLink(a.range)}}(this)),h(this.container.querySelector(".change")).on("click",function(a){return function(){return a.setMode(a.link.href,!0)}}(this)),this.initTextbox(this.textbox,this.saveLink,this.hide),this.quill.onModuleLoad("toolbar",function(a){return function(b){return a.toolbar=b,b.initFormat("link",g.bind(a._onToolbar,a))}}(this)),this.quill.onModuleLoad("keyboard",function(a){return function(c){return c.addHotkey(b.hotkeys.LINK,g.bind(a._onKeyboard,a))}}(this))},b.prototype.saveLink=function(){var a,b,c;return c=this._normalizeURL(this.textbox.value),null!=this.range&&(b=this.range.end,this.range.isCollapsed()?(a=this._findAnchor(this.range),null!=a&&(a.href=c)):this.quill.formatText(this.range,"link",c,"user"),this.quill.setSelection(b,b)),this.setMode(c,!1)},b.prototype.removeLink=function(a){return a.isCollapsed()&&(a=this._expandRange(a)),this.hide(),this.quill.formatText(a,"link",!1,"user"),null!=this.toolbar?this.toolbar.setActive("link",!1):void 0},b.prototype.setMode=function(a,b){var c;return null==b&&(b=!1),b?(this.textbox.value=a,g.defer(function(b){return function(){return b.textbox.focus(),b.textbox.setSelectionRange(0,a.length)}}(this))):(this.link.href=a,a=this.link.href,c=a.length>this.options.maxLength?a.slice(0,this.options.maxLength)+"...":a,h(this.link).text(c)),h(this.container).toggleClass("editing",b)},b.prototype._findAnchor=function(a){var b,c,d,e;for(e=this.quill.editor.doc.findLeafAt(a.start,!0),b=e[0],d=e[1],null!=b&&(c=b.node);null!=c&&c!==this.quill.root;){if("A"===c.tagName)return c;c=c.parentNode}return null},b.prototype._expandRange=function(a){var b,c,d,e,f;return e=this.quill.editor.doc.findLeafAt(a.start,!0),c=e[0],d=e[1],f=a.start-d,b=f+c.length,{start:f,end:b}},b.prototype._onToolbar=function(a,b){return this._toggle(a,b)},b.prototype._onKeyboard=function(){var a;return a=this.quill.getSelection(),this._toggle(a,!this._findAnchor(a))},b.prototype._toggle=function(a,b){var c;if(a)return b?a.isCollapsed()?void 0:(this.setMode(this._suggestURL(a),!0),c=this.quill.editor.selection._getNativeRange(),this.show(c)):this.removeLink(a)},b.prototype._normalizeURL=function(a){return/^(https?:\/\/|mailto:)/.test(a)||(a="http://"+a),a},b.prototype._suggestURL=function(a){var b;return b=this.quill.getText(a),this._normalizeURL(b)},b}(f),e.registerModule("link-tooltip",d),b.exports=d},{"../quill":30,"./tooltip":28}],25:[function(a,b,c){var d,e,f,g,h,i=function(a,b){function c(){this.constructor=a}for(var d in b)j.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},j={}.hasOwnProperty;f=a("../quill"),d=a("eventemitter2").EventEmitter2,g=f.require("lodash"),h=f.require("dom"),e=function(a){function b(a,b){this.quill=a,this.options=b,this.cursors={},this.container=this.quill.addContainer("ql-multi-cursor",!0),this.quill.on(this.quill.constructor.events.TEXT_CHANGE,g.bind(this._applyDelta,this))}return i(b,a),b.DEFAULTS={template:'<span class="cursor-flag"> <span class="cursor-name"></span> </span> <span class="cursor-caret"></span>',timeout:2500},b.events={CURSOR_ADDED:"cursor-addded",CURSOR_MOVED:"cursor-moved",CURSOR_REMOVED:"cursor-removed"},b.prototype.clearCursors=function(){return g.each(Object.keys(this.cursors),g.bind(this.removeCursor,this)),this.cursors={}},b.prototype.moveCursor=function(a,b){var c;return c=this.cursors[a],c.index=b,h(c.elem).removeClass("hidden"),clearTimeout(c.timer),c.timer=setTimeout(function(a){return function(){return h(c.elem).addClass("hidden"),c.timer=null}}(this),this.options.timeout),this._updateCursor(c),c},b.prototype.removeCursor=function(a){var c;return c=this.cursors[a],this.emit(b.events.CURSOR_REMOVED,c),null!=c&&c.elem.parentNode.removeChild(c.elem),delete this.cursors[a]},b.prototype.setCursor=function(a,c,d,e){var f;return null==this.cursors[a]&&(this.cursors[a]=f={userId:a,index:c,color:e,elem:this._buildCursor(d,e)},this.emit(b.events.CURSOR_ADDED,f)),g.defer(function(b){return function(){return b.moveCursor(a,c)}}(this)),this.cursors[a]},b.prototype.shiftCursors=function(a,b,c){return null==c&&(c=null),g.each(this.cursors,function(d){return function(d,e){return d&&(d.index>a||d.userId===c)?d.index+=Math.max(b,a-d.index):void 0}}(this))},b.prototype.update=function(){return g.each(this.cursors,function(a){return function(b,c){return null!=b?(a._updateCursor(b),!0):void 0}}(this))},b.prototype._applyDelta=function(a){var b;return b=0,g.each(a.ops,function(a){return function(c){var d,e;return d=0,null!=c.insert?(d=c.insert.length||1,a.shiftCursors(b,d,null!=(e=c.attributes)?e.author:void 0)):null!=c["delete"]?a.shiftCursors(b,-1*c["delete"],null):null!=c.retain&&(a.shiftCursors(b,0,null),d=c.retain),b+=d}}(this)),this.update()},b.prototype._buildCursor=function(a,b){var c,d,e,f;return c=document.createElement("span"),h(c).addClass("cursor"),c.innerHTML=this.options.template,e=c.querySelector(".cursor-flag"),f=c.querySelector(".cursor-name"),h(f).text(a),d=c.querySelector(".cursor-caret"),d.style.backgroundColor=f.style.backgroundColor=b,this.container.appendChild(c),c},b.prototype._updateCursor=function(a){var c,d;return c=this.quill.getBounds(a.index),null==c?this.removeCursor(a.userId):(a.elem.style.top=c.top+this.quill.container.scrollTop+"px",a.elem.style.left=c.left+"px",a.elem.style.height=c.height+"px",d=a.elem.querySelector(".cursor-flag"),h(a.elem).toggleClass("top",parseInt(a.elem.style.top)<=d.offsetHeight).toggleClass("left",parseInt(a.elem.style.left)<=d.offsetWidth).toggleClass("right",this.quill.root.offsetWidth-parseInt(a.elem.style.left)<=d.offsetWidth),this.emit(b.events.CURSOR_MOVED,a))},b}(d),f.registerModule("multi-cursor",e),b.exports=e},{"../quill":30,eventemitter2:2}],26:[function(a,b,c){var d,e,f,g,h,i,j=function(a,b){return function(){return a.apply(b,arguments)}};g=a("../quill"),e=a("../core/document"),h=g.require("lodash"),i=g.require("dom"),d=g.require("delta"),f=function(){function a(b,c){var d;this.quill=b,this._onConvert=j(this._onConvert,this),this.container=this.quill.addContainer("ql-paste-manager"),this.container.setAttribute("contenteditable",!0),i(this.quill.root).on("paste",h.bind(this._paste,this)),this.options=h.defaults(c,a.DEFAULTS),null==(d=this.options).onConvert&&(d.onConvert=this._onConvert)}return a.DEFAULTS={onConvert:null},a.prototype._onConvert=function(a){var b,c,f;return c=new e(a,this.quill.options),b=c.toDelta(),f=b.length(),0===f?b:b.compose((new d).retain(f-1)["delete"](1))},a.prototype._paste=function(){var a,b;return a=this.quill.getLength(),b=this.quill.getSelection(),null!=b?(this.container.focus(),h.defer(function(a){return function(){var c,d,e,f,g,h,i;return c=a.options.onConvert(a.container),d=c.length(),d>0&&(b.start>0&&c.ops.unshift({retain:b.start}),c["delete"](b.end-b.start),a.quill.updateContents(c,"user")),a.quill.setSelection(b.start+d,b.start+d),h=a.quill.editor.doc.findLineAt(b.start+d),e=h[0],g=h[1],f=e.node.getBoundingClientRect().bottom,i=document.documentElement.clientHeight,f>i&&e.node.scrollIntoView(!1),a.container.innerHTML=""}}(this))):void 0},a}(),g.registerModule("paste-manager",f),b.exports=f},{"../core/document":8,"../quill":30}],27:[function(a,b,c){var d,e,f,g;d=a("../quill"),f=d.require("lodash"),g=d.require("dom"),e=function(){function a(b,c){if(this.quill=b,this.options=c,(f.isString(this.options)||f.isElement(this.options))&&(this.options={container:this.options}),null==this.options.container)throw new Error("container required for toolbar",this.options);this.container=f.isString(this.options.container)?document.querySelector(this.options.container):this.options.container,this.inputs={},this.preventUpdate=!1,this.triggering=!1,f.each(this.quill.options.formats,function(b){return function(c){return null==a.formats.TOOLTIP[c]?b.initFormat(c,f.bind(b._applyFormat,b,c)):void 0}}(this)),this.quill.on(d.events.FORMAT_INIT,function(b){return function(c){return null==a.formats.TOOLTIP[c]?b.initFormat(c,f.bind(b._applyFormat,b,c)):void 0}}(this)),this.quill.on(d.events.SELECTION_CHANGE,function(a){return function(b){return null!=b?a.updateActive(b):void 0}}(this)),this.quill.on(d.events.TEXT_CHANGE,function(a){return function(){return a.updateActive()}}(this)),this.quill.onModuleLoad("keyboard",function(a){return function(b){return b.addHotkey([g.KEYS.BACKSPACE,g.KEYS.DELETE],function(){return f.defer(f.bind(a.updateActive,a))})}}(this)),g(this.container).addClass("ql-toolbar"),g.isIOS()&&g(this.container).addClass("ios")}return a.DEFAULTS={container:null},a.formats={LINE:{align:"align",bullet:"bullet",list:"list"},SELECT:{align:"align",background:"background",color:"color",font:"font",size:"size"},TOGGLE:{bold:"bold",bullet:"bullet",image:"image",italic:"italic",link:"link",list:"list",strike:"strike",underline:"underline"},TOOLTIP:{image:"image",link:"link"}},a.prototype.initFormat=function(b,c){var d,e,f;return f=".ql-"+b,null!=a.formats.SELECT[b]?(f="select"+f,d="change"):d="click",e=this.container.querySelector(f),null!=e?(this.inputs[b]=e,g(e).on(d,function(a){return function(){var b,f;return f="change"===d?g(e).value():!g(e).hasClass("ql-active"),a.preventUpdate=!0,a.quill.focus(),b=a.quill.getSelection(),null!=b&&c(b,f),a.preventUpdate=!1,!0}}(this))):void 0},a.prototype.setActive=function(a,b){var c,d,e,f;return"image"===a&&(b=!1),d=this.inputs[a],null!=d?(c=g(d),"SELECT"===d.tagName?(this.triggering=!0,f=c.value(d),null==b&&(b=null!=(e=c["default"]())?e.value:void 0),Array.isArray(b)&&(b=""),b!==f&&(null!=b?c.option(b):c.reset()),this.triggering=!1):c.toggleClass("ql-active",b||!1)):void 0},a.prototype.updateActive=function(a,b){var c;return null==b&&(b=null),a||(a=this.quill.getSelection()),null==a||this.preventUpdate?void 0:(c=this._getActive(a),f.each(this.inputs,function(a){return function(d,e){return(!Array.isArray(b)||b.indexOf(e)>-1)&&a.setActive(e,c[e]),!0}}(this)))},a.prototype._applyFormat=function(b,c,d){return this.triggering?void 0:(c.isCollapsed()?this.quill.prepareFormat(b,d,"user"):null!=a.formats.LINE[b]?this.quill.formatLine(c,b,d,"user"):this.quill.formatText(c,b,d,"user"),f.defer(function(a){return function(){return a.updateActive(c,["bullet","list"]),a.setActive(b,d)}}(this)))},a.prototype._getActive=function(a){var b,c;return b=this._getLeafActive(a),c=this._getLineActive(a),f.defaults({},b,c)},a.prototype._getLeafActive=function(a){var b,c,d,e,g;return a.isCollapsed()?(g=this.quill.editor.doc.findLineAt(a.start),d=g[0],e=g[1],b=0===e?this.quill.getContents(a.start,a.end+1):this.quill.getContents(a.start-1,a.end)):b=this.quill.getContents(a),c=f.map(b.ops,"attributes"),this._intersectFormats(c)},a.prototype._getLineActive=function(a){var b,c,d,e,g,h;for(c=[],g=this.quill.editor.doc.findLineAt(a.start),b=g[0],e=g[1],h=this.quill.editor.doc.findLineAt(a.end),d=h[0],e=h[1],null!=d&&d===b&&(d=d.next);null!=b&&b!==d;)c.push(f.clone(b.formats)),b=b.next;return this._intersectFormats(c)},a.prototype._intersectFormats=function(b){return f.reduce(b.slice(1),function(b,c){var d,e,g,h,i;return null==c&&(c={}),d=Object.keys(b),g=null!=c?Object.keys(c):{},h=f.intersection(d,g),i=f.difference(d,g),e=f.difference(g,d),f.each(h,function(d){if(null!=a.formats.SELECT[d])if(Array.isArray(b[d])){if(b[d].indexOf(c[d])<0)return b[d].push(c[d])}else if(b[d]!==c[d])return b[d]=[b[d],c[d]]}),f.each(i,function(c){return null!=a.formats.TOGGLE[c]?delete b[c]:null==a.formats.SELECT[c]||Array.isArray(b[c])?void 0:b[c]=[b[c]]}),f.each(e,function(d){return null!=a.formats.SELECT[d]?b[d]=[c[d]]:void 0}),b},b[0]||{})},a}(),d.registerModule("toolbar",e),b.exports=e},{"../quill":30}],28:[function(a,b,c){var d,e,f,g;d=a("../quill"),f=d.require("lodash"),g=d.require("dom"),e=function(){function a(b,c){this.quill=b,this.options=c,this.container=this.quill.addContainer("ql-tooltip"),this.container.innerHTML=this.options.template,this.hide(),this.quill.on(this.quill.constructor.events.TEXT_CHANGE,function(b){return function(c,d){return b.container.style.left!==a.HIDE_MARGIN?(b.range=null,b.hide()):void 0}}(this))}return a.DEFAULTS={offset:10,template:""},a.HIDE_MARGIN="-10000px",a.prototype.initTextbox=function(a,b,c){return g(a).on("keydown",function(a){return function(d){switch(d.which){case g.KEYS.ENTER:return d.preventDefault(),b.call(a);case g.KEYS.ESCAPE:return d.preventDefault(),c.call(a);default:return!0}}}(this))},a.prototype.hide=function(){return this.container.style.left=a.HIDE_MARGIN,this.range&&this.quill.setSelection(this.range),this.range=null},a.prototype.position=function(a){var b,c,d,e,f,g,h;return null!=a?(g=a.getBoundingClientRect(),f=this.quill.container.getBoundingClientRect(),d=g.left-f.left,e=g.top-f.top,c=g.bottom-f.bottom,b=d+g.width/2-this.container.offsetWidth/2,h=e+g.height+this.options.offset,h+this.container.offsetHeight>this.quill.container.offsetHeight&&(h=e-this.container.offsetHeight-this.options.offset),b=Math.max(0,Math.min(b,this.quill.container.offsetWidth-this.container.offsetWidth)),h=Math.max(0,Math.min(h,this.quill.container.offsetHeight-this.container.offsetHeight))):(b=this.quill.container.offsetWidth/2-this.container.offsetWidth/2,h=this.quill.container.offsetHeight/2-this.container.offsetHeight/2),h+=this.quill.container.scrollTop,[b,h]},a.prototype.show=function(a){var b,c,d;return this.range=this.quill.getSelection(),c=this.position(a),b=c[0],d=c[1],this.container.style.left=b+"px",this.container.style.top=d+"px",this.container.focus()},a}(),d.registerModule("tooltip",e),b.exports=e},{"../quill":30}],29:[function(a,b,c){var d,e,f,g;e=a("../quill"),g=e.require("lodash"),d=e.require("delta"),f=function(){function a(a,b){this.quill=a,this.options=null!=b?b:{},this.lastRecorded=0,this.ignoreChange=!1,this.clear(),this.initListeners()}return a.DEFAULTS={delay:1e3,maxStack:100,userOnly:!1},a.hotkeys={UNDO:{key:"Z",metaKey:!0},REDO:{key:"Z",metaKey:!0,shiftKey:!0}},a.prototype.initListeners=function(){return this.quill.onModuleLoad("keyboard",function(b){return function(c){return c.addHotkey(a.hotkeys.UNDO,function(){return b.quill.editor.checkUpdate(),b.undo(),!1}),c.addHotkey(a.hotkeys.REDO,function(){return b.quill.editor.checkUpdate(),b.redo(),!1})}}(this)),this.quill.on(this.quill.constructor.events.TEXT_CHANGE,function(a){return function(b,c){return a.ignoreChange?void 0:(a.options.userOnly&&c!==e.sources.USER?a._transform(b):a.record(b,a.oldDelta),a.oldDelta=a.quill.getContents())}}(this))},a.prototype.clear=function(){return this.stack={undo:[],redo:[]},this.oldDelta=this.quill.getContents()},a.prototype.record=function(a,b){var c,d,e,f;if(a.ops.length>0){this.stack.redo=[];try{if(f=this.quill.getContents().diff(this.oldDelta),e=(new Date).getTime(),this.lastRecorded+this.options.delay>e&&this.stack.undo.length>0?(c=this.stack.undo.pop(),f=f.compose(c.undo),a=c.redo.compose(a)):this.lastRecorded=e,this.stack.undo.push({redo:a,undo:f}),this.stack.undo.length>this.options.maxStack)return this.stack.undo.unshift()}catch(g){return d=g,console.warn("Could not record change... clearing undo stack."),this.clear()}}},a.prototype.redo=function(){return this._change("redo","undo")},a.prototype.undo=function(){return this._change("undo","redo")},a.prototype._getLastChangeIndex=function(a){var b,c;return c=0,b=0,g.each(a.ops,function(a){return null!=a.insert?c=Math.max(b+(a.insert.length||1),c):null!=a["delete"]?c=Math.max(b,c):null!=a.retain?(null!=a.attributes&&(c=Math.max(b+a.retain,c)),b+=a.retain):void 0}),c},a.prototype._change=function(a,b){var c,d;return this.stack[a].length>0?(c=this.stack[a].pop(),this.lastRecorded=0,this.ignoreChange=!0,this.quill.updateContents(c[a],e.sources.USER),this.ignoreChange=!1,d=this._getLastChangeIndex(c[a]),this.quill.setSelection(d,d),this.oldDelta=this.quill.getContents(),this.stack[b].push(c)):void 0},a.prototype._transform=function(a){var b,c,d,e,f,g,h,i;for(this.oldDelta=a.transform(this.oldDelta,!0),g=this.stack.undo,c=0,e=g.length;e>c;c++)b=g[c],b.undo=a.transform(b.undo,!0),b.redo=a.transform(b.redo,!0);for(h=this.stack.redo,i=[],d=0,f=h.length;f>d;d++)b=h[d],b.undo=a.transform(b.undo,!0),i.push(b.redo=a.transform(b.redo,!0));return i},a}(),e.registerModule("undo-manager",f),b.exports=f},{"../quill":30}],30:[function(a,b,c){var d,e,f,g,h,i,j,k,l,m,n,o=function(a,b){function c(){this.constructor=a}for(var d in b)p.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},p={}.hasOwnProperty,q=[].slice;l=a("lodash"),n=a("../package.json"),d=a("rich-text/lib/delta"),g=a("eventemitter2").EventEmitter2,m=a("./lib/dom"),e=a("./core/document"),f=a("./core/editor"),h=a("./core/format"),i=a("./core/normalizer"),k=a("./lib/range"),j=function(a){function b(a,c){var d,e,g;if(this.container=a,null==c&&(c={}),l.isString(this.container)&&(this.container=document.querySelector(this.container)),null==this.container)throw new Error("Invalid Quill container");if(e=l.defaults(c.modules||{},b.DEFAULTS.modules),d=this.container.innerHTML,this.container.innerHTML="",this.options=l.defaults(c,b.DEFAULTS),this.options.modules=e,this.options.id=this.id="ql-editor-"+(b.editors.length+1),this.modules={},this.root=this.addContainer("ql-editor"),this.editor=new f(this.root,this,this.options),b.editors.push(this),this.setHTML(d,b.sources.SILENT),g=b.themes[this.options.theme],null==g)throw new Error("Cannot load "+this.options.theme+" theme. Are you sure you registered it?");this.theme=new g(this,this.options),l.each(this.options.modules,function(a){return function(b,c){return a.addModule(c,b)}}(this))}return o(b,a),b.version=n.version,b.editors=[],b.modules=[],b.themes=[],b.DEFAULTS={formats:["align","bold","italic","strike","underline","color","background","font","size","link","image","bullet","list"],modules:{keyboard:!0,"paste-manager":!0,"undo-manager":!0},pollInterval:100,readOnly:!1,styles:{},theme:"base"},b.events={FORMAT_INIT:"format-init",MODULE_INIT:"module-init",POST_EVENT:"post-event",PRE_EVENT:"pre-event",SELECTION_CHANGE:"selection-change",TEXT_CHANGE:"text-change"},b.sources=f.sources,b.registerModule=function(a,c){return null!=b.modules[a]&&console.warn("Overwriting "+a+" module"),b.modules[a]=c},b.registerTheme=function(a,c){return null!=b.themes[a]&&console.warn("Overwriting "+a+" theme"),b.themes[a]=c},b.require=function(a){switch(a){case"lodash":return l;case"delta":return d;case"format":return h;case"normalizer":return i;case"dom":return m;case"document":return e;case"range":return k;default:return null}},b.prototype.destroy=function(){var a;return a=this.getHTML(),l.each(this.modules,function(a,b){return l.isFunction(a.destroy)?a.destroy():void 0}),this.editor.destroy(),this.removeAllListeners(),b.editors.splice(l.indexOf(b.editors,this),1),this.container.innerHTML=a},b.prototype.addContainer=function(a,b){var c,d;return null==b&&(b=!1),d=b?this.root:null,c=document.createElement("div"),m(c).addClass(a),this.container.insertBefore(c,d),c},b.prototype.addFormat=function(a,c){return this.editor.doc.addFormat(a,c),this.emit(b.events.FORMAT_INIT,a)},b.prototype.addModule=function(a,c){var d;if(d=b.modules[a],null==d)throw new Error("Cannot load "+a+" module. Are you sure you registered it?");return c===!0&&(c={}),c=l.defaults(c,this.theme.constructor.OPTIONS[a]||{},d.DEFAULTS||{}),this.modules[a]=new d(this,c),this.emit(b.events.MODULE_INIT,a,this.modules[a]),this.modules[a]},b.prototype.deleteText=function(a,c,e){var f,g,h;return null==e&&(e=b.sources.API),h=this._buildParams(a,c,{},e),a=h[0],c=h[1],g=h[2],e=h[3],c>a?(f=(new d).retain(a)["delete"](c-a),this.editor.applyDelta(f,e)):void 0},b.prototype.emit=function(){var a,c;return c=arguments[0],a=2<=arguments.length?q.call(arguments,1):[],b.__super__.emit.apply(this,[b.events.PRE_EVENT,c].concat(q.call(a))),b.__super__.emit.apply(this,[c].concat(q.call(a))),b.__super__.emit.apply(this,[b.events.POST_EVENT,c].concat(q.call(a)))},b.prototype.focus=function(){return this.editor.focus()},b.prototype.formatLine=function(a,b,c,d,e){var f,g,h,i,j;return i=this._buildParams(a,b,c,d,e),a=i[0],b=i[1],f=i[2],e=i[3],j=this.editor.doc.findLineAt(b),g=j[0],h=j[1],null!=g&&(b+=g.length-h),this.formatText(a,b,f,e)},b.prototype.formatText=function(a,b,c,e,f){var g,h,i;return i=this._buildParams(a,b,c,e,f),a=i[0],b=i[1],h=i[2],f=i[3],h=l.reduce(h,function(a){return function(b,c,d){var e;return e=a.editor.doc.formats[d],c&&c!==e.config["default"]||(b[d]=null),b}}(this),h),g=(new d).retain(a).retain(b-a,h),this.editor.applyDelta(g,f)},b.prototype.getBounds=function(a){return this.editor.getBounds(a)},b.prototype.getContents=function(a,b){return null==a&&(a=0),null==b&&(b=null),l.isObject(a)&&(b=a.end,a=a.start),this.editor.delta.slice(a,b)},b.prototype.getHTML=function(){return this.editor.doc.getHTML()},b.prototype.getLength=function(){return this.editor.length},b.prototype.getModule=function(a){return this.modules[a]},b.prototype.getSelection=function(){return this.editor.checkUpdate(),this.editor.selection.getRange()},b.prototype.getText=function(a,b){return null==a&&(a=0),null==b&&(b=null),l.map(this.getContents(a,b).ops,function(a){return l.isString(a.insert)?a.insert:""}).join("")},b.prototype.insertEmbed=function(a,b,c,e){var f,g,h,i;return i=this._buildParams(a,0,b,c,e),a=i[0],g=i[1],h=i[2],e=i[3],f=(new d).retain(a).insert(1,h),this.editor.applyDelta(f,e)},b.prototype.insertText=function(a,b,c,e,f){var g,h,i,j;return j=this._buildParams(a,0,c,e,f),a=j[0],h=j[1],i=j[2],f=j[3],b.length>0?(g=(new d).retain(a).insert(b,i),this.editor.applyDelta(g,f)):void 0},b.prototype.onModuleLoad=function(a,c){return this.modules[a]?c(this.modules[a]):this.on(b.events.MODULE_INIT,function(b,d){return b===a?c(d):void 0})},b.prototype.prepareFormat=function(a,c,d){var e,f;return null==d&&(d=b.sources.API),e=this.editor.doc.formats[a],null!=e&&(f=this.getSelection(),null!=f?f.isCollapsed():void 0)?e.isType(h.types.LINE)?this.formatLine(f,a,c,d):e.prepare(c):void 0},b.prototype.setContents=function(a,c){var e;return null==c&&(c=b.sources.API),a=new d(Array.isArray(a)?a.slice():a.ops.slice()),e=l.last(a.slice(a.length()-1).ops),a["delete"](this.getLength()-1),null!=e&&l.isString(e.insert)&&"\n"===l.last(e.insert)&&a["delete"](1),this.updateContents(a,c)},b.prototype.setHTML=function(a,c){return null==c&&(c=b.sources.API),a.trim()||(a="<"+m.DEFAULT_BLOCK_TAG+"><"+m.DEFAULT_BREAK_TAG+"></"+m.DEFAULT_BLOCK_TAG+">"),this.editor.doc.setHTML(a),this.editor.checkUpdate(c)},b.prototype.setSelection=function(a,c,d){var e;return null==d&&(d=b.sources.API),l.isNumber(a)&&l.isNumber(c)?e=new k(a,c):(e=a,d=c||d),this.editor.selection.setRange(e,d)},b.prototype.setText=function(a,c){var e;return null==c&&(c=b.sources.API),e=(new d).insert(a),this.setContents(e,c)},b.prototype.updateContents=function(a,c){return null==c&&(c=b.sources.API),Array.isArray(a)&&(a={ops:a}),this.editor.applyDelta(a,c)},b.prototype._buildParams=function(){var a,c;return c=1<=arguments.length?q.call(arguments,0):[],l.isObject(c[0])&&c.splice(0,1,c[0].start,c[0].end),l.isString(c[2])&&(a={},a[c[2]]=c[3],c.splice(2,2,a)),null==c[3]&&(c[3]=b.sources.API),c},b}(g),j.registerTheme("base",a("./themes/base")),j.registerTheme("snow",a("./themes/snow")),b.exports=j},{"../package.json":7,"./core/document":8,"./core/editor":9,"./core/format":10,"./core/normalizer":13,"./lib/dom":17,"./lib/range":20,"./themes/base":32,"./themes/snow":33,eventemitter2:2,lodash:1,"rich-text/lib/delta":3}],31:[function(a,b,c){b.exports=''},{}],32:[function(a,b,c){var d,e,f,g;e=a("lodash"),g=a("../../lib/dom"),f=a("./base.styl"),d=function(){function a(b,c){var d;this.quill=b,this.options=c,g(this.quill.container).addClass("ql-container"),this.options.styles&&this.addStyles(f+a.objToCss(this.options.styles)),g.isIE(10)&&(d=g.isIE(9)?"9":"10",g(this.quill.root).addClass("ql-ie-"+d))}return a.OPTIONS={},a.objToCss=function(a){return e.map(a,function(a,b){var c;return c=e.map(a,function(a,b){return b+": "+a+";"}).join(" "),b+" { "+c+" }"}).join("\n")},a.prototype.addStyles=function(b){var c;return e.isObject(b)&&(b=a.objToCss(b)),c=document.createElement("style"),c.type="text/css",c.appendChild(document.createTextNode(b)),document.head.appendChild(c)},a}(),b.exports=d},{"../../lib/dom":17,"./base.styl":31,lodash:1}],33:[function(a,b,c){var d,e,f,g,h,i,j=function(a,b){function c(){this.constructor=a}for(var d in b)k.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},k={}.hasOwnProperty;h=a("lodash"),e=a("../../lib/color-picker"),d=a("../base"),i=a("../../lib/dom"),f=a("../../lib/picker"),g=function(a){function b(a,c){this.quill=a,this.options=c,b.__super__.constructor.apply(this,arguments),i(this.quill.container).addClass("ql-snow"),this.pickers=[],this.quill.on(this.quill.constructor.events.SELECTION_CHANGE,function(a){return function(b){return null!=b?h.invoke(a.pickers,"close"):void 0}}(this)),this.quill.onModuleLoad("multi-cursor",h.bind(this.extendMultiCursor,this)),this.quill.onModuleLoad("toolbar",h.bind(this.extendToolbar,this))}return j(b,a),b.COLORS=["#000000","#e60000","#ff9900","#ffff00","#008A00","#0066cc","#9933ff","#ffffff","#facccc","#ffebcc","#ffffcc","#cce8cc","#cce0f5","#ebd6ff","#bbbbbb","#f06666","#ffc266","#ffff66","#66b966","#66a3e0","#c285ff","#888888","#a10000","#b26b00","#b2b200","#006100","#0047b2","#6b24b2","#444444","#5c0000","#663d00","#666600","#003700","#002966","#3d1466"],b.OPTIONS={"multi-cursor":{template:'<span class="cursor-flag"> <span class="cursor-triangle top"></span> <span class="cursor-name"></span> <span class="cursor-triangle bottom"></span> </span> <span class="cursor-caret"></span>'}},b.prototype.extendMultiCursor=function(a){return a.on(a.constructor.events.CURSOR_ADDED,function(a){var b,c;return b=a.elem.querySelector(".cursor-triangle.bottom"),c=a.elem.querySelector(".cursor-triangle.top"),b.style.borderTopColor=c.style.borderBottomColor=a.color})},b.prototype.extendToolbar=function(a){return i(a.container).addClass("ql-snow"),h.each(["color","background","font","size","align"],function(b){return function(c){var d,g;if(g=a.container.querySelector(".ql-"+c),null!=g){switch(c){case"font":case"size":case"align":d=new f(g);break;case"color":case"background":d=new e(g),h.each(d.container.querySelectorAll(".ql-picker-item"),function(a,b){return 7>b?i(a).addClass("ql-primary-color"):void 0})}return null!=d?b.pickers.push(d):void 0}}}(this)),h.each(i(a.container).textNodes(),function(a){return 0===i(a).text().trim().length?i(a).remove():void 0})},b}(d),b.exports=g},{"../../lib/color-picker":16,"../../lib/dom":17,"../../lib/picker":19,"../base":32,lodash:1}]},{},[15])(15)});
oauth=[];
(function ( $ ) {	$(function () {
	var usedgoog=[];
	$('.material-design').click(function(e){
		var target = e.target;
		var rect = target.getBoundingClientRect();
		var ripple = target.querySelector('.ripple');
		if (!ripple) {
			ripple = document.createElement('span');
			ripple.className = 'ripple';
			ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
			target.appendChild(ripple);
		}
		ripple.classList.remove('show');
		var top = e.pageY - rect.top - ripple.offsetHeight / 2 - document.body.scrollTop;
		var left = e.pageX - rect.left - ripple.offsetWidth / 2 - document.body.scrollLeft;
		ripple.style.top = top + 'px';
		ripple.style.left = left + 'px';
		ripple.classList.add('show');

	});
	$(window).scroll(function(){
		if($(window).width() < 1000)$(".optpoint_toolbar").removeClass('fixed');
		else{
			if ($(window).scrollTop() > 110){
				$(".optpoint_toolbar").addClass('fixed');
			}else $(".optpoint_toolbar").removeClass('fixed');
		}
	});
	$('body').click(function(e){
		if($(e.target).hasClass('drop-dis')){return false;}
		else {
			if(!$(e.target).closest('.optpoint_drop').length || $(e.target).closest('.optpoint_drop').hasClass('optpoint_dropped'))
				$('.optpoint_drop').removeClass('optpoint_dropped');
			else{
				$('.optpoint_drop').removeClass('optpoint_dropped');
				$(e.target).closest('.optpoint_drop').addClass('optpoint_dropped');
			}
		}
	});
"use strict";angular.module("minicolors",[]),angular.module("minicolors").provider("minicolors",function(){this.defaults={theme:"bootstrap",position:"bottom left",defaultValue:"",animationSpeed:50,animationEasing:"swing",change:null,changeDelay:0,control:"hue",hide:null,hideSpeed:100,inline:!1,letterCase:"lowercase",opacity:!1,show:null,showSpeed:100},this.$get=function(){return this}}),angular.module("minicolors").directive("minicolors",["minicolors","$timeout",function(i,n){return{require:"?ngModel",restrict:"A",priority:1,link:function(o,e,r,t){var l=!1,a=function(){var n=angular.extend({},i.defaults,o.$eval(r.minicolors));return n};t.$render=function(){n(function(){var i=t.$viewValue;e.minicolors("value",i)},0,!1)};var u=function(){if(t){var i=a();return i.change=function(i){o.$apply(function(){t.$setViewValue(i)})},e.hasClass("minicolors")&&e.minicolors("destroy"),e.minicolors(i),l?void 0:(n(function(){var i=t.$viewValue;e.minicolors("value",i)},0),void(l=!0))}};u(),o.$watch(a,u,!0)}}}]);
	var timerModule=angular.module("timer",[]).directive("timer",["$compile",function(a){return{restrict:"EA",replace:!1,scope:{interval:"=interval",startTimeAttr:"=startTime",endTimeAttr:"=endTime",countdownattr:"=countdown",finishCallback:"&finishCallback",autoStart:"&autoStart",maxTimeUnit:"="},controller:["$scope","$element","$attrs","$timeout",function(b,c,d,e){function f(){b.timeoutId&&clearTimeout(b.timeoutId)}function g(){void 0!==d.startTime&&(b.millis=new Date-new Date(b.startTimeAttr)),b.maxTimeUnit&&"day"!==b.maxTimeUnit?"second"===b.maxTimeUnit?(b.seconds=Math.floor(b.millis/1e3),b.minutes=0,b.hours=0,b.days=0,b.months=0,b.years=0):"minute"===b.maxTimeUnit?(b.seconds=Math.floor(b.millis/1e3%60),b.minutes=Math.floor(b.millis/6e4),b.hours=0,b.days=0,b.months=0,b.years=0):"hour"===b.maxTimeUnit?(b.seconds=Math.floor(b.millis/1e3%60),b.minutes=Math.floor(b.millis/6e4%60),b.hours=Math.floor(b.millis/36e5),b.days=0,b.months=0,b.years=0):"month"===b.maxTimeUnit?(b.seconds=Math.floor(b.millis/1e3%60),b.minutes=Math.floor(b.millis/6e4%60),b.hours=Math.floor(b.millis/36e5%24),b.days=Math.floor(b.millis/36e5/24%30),b.months=Math.floor(b.millis/36e5/24/30),b.years=0):"year"===b.maxTimeUnit&&(b.seconds=Math.floor(b.millis/1e3%60),b.minutes=Math.floor(b.millis/6e4%60),b.hours=Math.floor(b.millis/36e5%24),b.days=Math.floor(b.millis/36e5/24%30),b.months=Math.floor(b.millis/36e5/24/30%12),b.years=Math.floor(b.millis/36e5/24/365)):(b.seconds=Math.floor(b.millis/1e3%60),b.minutes=Math.floor(b.millis/6e4%60),b.hours=Math.floor(b.millis/36e5%24),b.days=Math.floor(b.millis/36e5/24),b.months=0,b.years=0),b.secondsS=1===b.seconds?"":"s",b.minutesS=1===b.minutes?"":"s",b.hoursS=1===b.hours?"":"s",b.daysS=1===b.days?"":"s",b.monthsS=1===b.months?"":"s",b.yearsS=1===b.years?"":"s",b.secondUnit=function(a,c){return 1===b.seconds?a?a:"second":c?c:"seconds"},b.minuteUnit=function(a,c){return 1===b.minutes?a?a:"minute":c?c:"minutes"},b.hourUnit=function(a,c){return 1===b.hours?a?a:"hour":c?c:"hours"},b.dayUnit=function(a,c){return 1===b.days?a?a:"day":c?c:"days"},b.monthUnit=function(a,c){return 1===b.months?a?a:"month":c?c:"months"},b.yearUnit=function(a,c){return 1===b.years?a?a:"year":c?c:"years"},b.sseconds=b.seconds<10?"0"+b.seconds:b.seconds,b.mminutes=b.minutes<10?"0"+b.minutes:b.minutes,b.hhours=b.hours<10?"0"+b.hours:b.hours,b.ddays=b.days<10?"0"+b.days:b.days,b.mmonths=b.months<10?"0"+b.months:b.months,b.yyears=b.years<10?"0"+b.years:b.years}"function"!=typeof String.prototype.trim&&(String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"")}),b.autoStart=d.autoStart||d.autostart,c.append(0===c.html().trim().length?a("<span>{{millis}}</span>")(b):a(c.contents())(b)),b.startTime=null,b.endTime=null,b.timeoutId=null,b.countdown=b.countdownattr&&parseInt(b.countdownattr,10)>=0?parseInt(b.countdownattr,10):void 0,b.isRunning=!1,b.$on("timer-start",function(){b.start()}),b.$on("timer-resume",function(){b.resume()}),b.$on("timer-stop",function(){b.stop()}),b.$on("timer-clear",function(){b.clear()}),b.$on("timer-reset",function(){b.reset()}),b.$on("timer-set-countdown",function(a,c){b.countdown=c}),b.start=c[0].start=function(){b.startTime=b.startTimeAttr?new Date(b.startTimeAttr):new Date,b.endTime=b.endTimeAttr?new Date(b.endTimeAttr):null,b.countdown||(b.countdown=b.countdownattr&&parseInt(b.countdownattr,10)>0?parseInt(b.countdownattr,10):void 0),f(),h(),b.isRunning=!0},b.resume=c[0].resume=function(){f(),b.countdownattr&&(b.countdown+=1),b.startTime=new Date-(b.stoppedTime-b.startTime),h(),b.isRunning=!0},b.stop=b.pause=c[0].stop=c[0].pause=function(){var a=b.timeoutId;b.clear(),b.$emit("timer-stopped",{timeoutId:a,millis:b.millis,seconds:b.seconds,minutes:b.minutes,hours:b.hours,days:b.days})},b.clear=c[0].clear=function(){b.stoppedTime=new Date,f(),b.timeoutId=null,b.isRunning=!1},b.reset=c[0].reset=function(){b.startTime=b.startTimeAttr?new Date(b.startTimeAttr):new Date,b.endTime=b.endTimeAttr?new Date(b.endTimeAttr):null,b.countdown=b.countdownattr&&parseInt(b.countdownattr,10)>0?parseInt(b.countdownattr,10):void 0,f(),h(),b.isRunning=!1,b.clear()},c.bind("$destroy",function(){f(),b.isRunning=!1}),b.countdownattr?(b.millis=1e3*b.countdownattr,b.addCDSeconds=c[0].addCDSeconds=function(a){b.countdown+=a,b.$digest(),b.isRunning||b.start()},b.$on("timer-add-cd-seconds",function(a,c){e(function(){b.addCDSeconds(c)})}),b.$on("timer-set-countdown-seconds",function(a,c){b.isRunning||b.clear(),b.countdown=c,b.millis=1e3*c,g()})):b.millis=0,g();var h=function(){b.millis=new Date-b.startTime;var a=b.millis%1e3;return b.endTimeAttr&&(b.millis=b.endTime-new Date,a=b.interval-b.millis%1e3),b.countdownattr&&(b.millis=1e3*b.countdown),b.millis<0?(b.stop(),b.millis=0,g(),void(b.finishCallback&&b.$eval(b.finishCallback))):(g(),b.timeoutId=setTimeout(function(){h(),b.$digest()},b.interval-a),b.$emit("timer-tick",{timeoutId:b.timeoutId,millis:b.millis}),void(b.countdown>0?b.countdown--:b.countdown<=0&&(b.stop(),b.finishCallback&&b.$eval(b.finishCallback))))};(void 0===b.autoStart||b.autoStart===!0)&&b.start()}]}}]);"undefined"!=typeof module&&"undefined"!=typeof exports&&module.exports===exports&&(module.exports=timerModule);
	!function(){"use strict";angular.module("as.sortable",[]).constant("sortableConfig",{itemClass:"as-sortable-item",handleClass:"as-sortable-item-handle",placeHolderClass:"as-sortable-placeholder",dragClass:"as-sortable-drag",hiddenClass:"as-sortable-hidden",dragging:"as-sortable-dragging"})}(),function(){"use strict";var mainModule=angular.module("as.sortable");mainModule.factory("$helper",["$document","$window",function($document,$window){return{height:function(element){return element[0].getBoundingClientRect().height},width:function(element){return element[0].getBoundingClientRect().width},offset:function(element,scrollableContainer){var boundingClientRect=element[0].getBoundingClientRect();return scrollableContainer||(scrollableContainer=$document[0].documentElement),{width:boundingClientRect.width||element.prop("offsetWidth"),height:boundingClientRect.height||element.prop("offsetHeight"),top:boundingClientRect.top+($window.pageYOffset||scrollableContainer.scrollTop-scrollableContainer.offsetTop),left:boundingClientRect.left+($window.pageXOffset||scrollableContainer.scrollLeft-scrollableContainer.offsetLeft)}},eventObj:function(event){var obj=event;return void 0!==event.targetTouches?obj=event.targetTouches.item(0):void 0!==event.originalEvent&&void 0!==event.originalEvent.targetTouches&&(obj=event.originalEvent.targetTouches.item(0)),obj},isTouchInvalid:function(event){var touchInvalid=!1;return void 0!==event.touches&&event.touches.length>1?touchInvalid=!0:void 0!==event.originalEvent&&void 0!==event.originalEvent.touches&&event.originalEvent.touches.length>1&&(touchInvalid=!0),touchInvalid},positionStarted:function(event,target,scrollableContainer){var pos={};return pos.offsetX=event.pageX-this.offset(target,scrollableContainer).left,pos.offsetY=event.pageY-this.offset(target,scrollableContainer).top,pos.startX=pos.lastX=event.pageX,pos.startY=pos.lastY=event.pageY,pos.nowX=pos.nowY=pos.distX=pos.distY=pos.dirAx=0,pos.dirX=pos.dirY=pos.lastDirX=pos.lastDirY=pos.distAxX=pos.distAxY=0,pos},calculatePosition:function(pos,event){pos.lastX=pos.nowX,pos.lastY=pos.nowY,pos.nowX=event.pageX,pos.nowY=event.pageY,pos.distX=pos.nowX-pos.lastX,pos.distY=pos.nowY-pos.lastY,pos.lastDirX=pos.dirX,pos.lastDirY=pos.dirY,pos.dirX=0===pos.distX?0:pos.distX>0?1:-1,pos.dirY=0===pos.distY?0:pos.distY>0?1:-1;var newAx=Math.abs(pos.distX)>Math.abs(pos.distY)?1:0;pos.dirAx!==newAx?(pos.distAxX=0,pos.distAxY=0):(pos.distAxX+=Math.abs(pos.distX),0!==pos.dirX&&pos.dirX!==pos.lastDirX&&(pos.distAxX=0),pos.distAxY+=Math.abs(pos.distY),0!==pos.dirY&&pos.dirY!==pos.lastDirY&&(pos.distAxY=0)),pos.dirAx=newAx},movePosition:function(event,element,pos,container,containerPositioning,scrollableContainer){var bounds,useRelative="relative"===containerPositioning;element.x=event.pageX-pos.offsetX,element.y=event.pageY-pos.offsetY,container&&(bounds=this.offset(container,scrollableContainer),useRelative&&(element.x-=bounds.left,element.y-=bounds.top,bounds.left=0,bounds.top=0),element.x<bounds.left?element.x=bounds.left:element.x>=bounds.width+bounds.left-this.offset(element).width&&(element.x=bounds.width+bounds.left-this.offset(element).width),element.y<bounds.top?element.y=bounds.top:element.y>=bounds.height+bounds.top-this.offset(element).height&&(element.y=bounds.height+bounds.top-this.offset(element).height)),element.css({left:element.x+"px",top:element.y+"px"}),this.calculatePosition(pos,event)},dragItem:function(item){return{index:item.index(),parent:item.sortableScope,source:item,sourceInfo:{index:item.index(),itemScope:item.itemScope,sortableScope:item.sortableScope},moveTo:function(parent,index){this.parent=parent,this.isSameParent()&&this.source.index()<index&&(index-=1),this.index=index},isSameParent:function(){return this.parent.element===this.sourceInfo.sortableScope.element},isOrderChanged:function(){return this.index!==this.sourceInfo.index},eventArgs:function(){return{source:this.sourceInfo,dest:{index:this.index,sortableScope:this.parent}}},apply:function(){this.sourceInfo.sortableScope.removeItem(this.sourceInfo.index),this.parent.insertItem(this.index,this.source.modelValue)}}},noDrag:function(element){return void 0!==element.attr("no-drag")||void 0!==element.attr("data-no-drag")},findAncestor:function(el,selector){el=el[0];for(var matches=Element.matches||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector;(el=el.parentElement)&&!matches.call(el,selector););return angular.element(el?el:document.body)}}}])}(),function(){"use strict";var mainModule=angular.module("as.sortable");mainModule.controller("as.sortable.sortableController",["$scope",function($scope){this.scope=$scope,$scope.modelValue=null,$scope.callbacks=null,$scope.type="sortable",$scope.options={},$scope.isDisabled=!1,$scope.insertItem=function(index,itemData){$scope.modelValue.splice(index,0,itemData)},$scope.removeItem=function(index){var removedItem=null;return index>-1&&(removedItem=$scope.modelValue.splice(index,1)[0]),removedItem},$scope.isEmpty=function(){return $scope.modelValue&&0===$scope.modelValue.length},$scope.accept=function(sourceItemHandleScope,destScope,destItemScope){return $scope.callbacks.accept(sourceItemHandleScope,destScope,destItemScope)}}]),mainModule.directive("asSortable",function(){return{require:"ngModel",restrict:"A",scope:!0,controller:"as.sortable.sortableController",link:function(scope,element,attrs,ngModelController){var ngModel,callbacks;ngModel=ngModelController,ngModel&&(ngModel.$render=function(){scope.modelValue=ngModel.$modelValue},scope.element=element,element.data("_scope",scope),callbacks={accept:null,orderChanged:null,itemMoved:null,dragStart:null,dragMove:null,dragCancel:null,dragEnd:null},callbacks.accept=function(){return!0},callbacks.orderChanged=function(){},callbacks.itemMoved=function(){},callbacks.dragStart=function(){},callbacks.dragMove=function(){},callbacks.dragCancel=function(){},callbacks.dragEnd=function(){},scope.$watch(attrs.asSortable,function(newVal){angular.forEach(newVal,function(value,key){callbacks[key]?"function"==typeof value&&(callbacks[key]=value):scope.options[key]=value}),scope.callbacks=callbacks},!0),angular.isDefined(attrs.isDisabled)&&scope.$watch(attrs.isDisabled,function(newVal){angular.isUndefined(newVal)||(scope.isDisabled=newVal)},!0))}}})}(),function(){"use strict";var mainModule=angular.module("as.sortable");mainModule.controller("as.sortable.sortableItemHandleController",["$scope",function($scope){this.scope=$scope,$scope.itemScope=null,$scope.type="handle"}]),mainModule.directive("asSortableItemHandle",["sortableConfig","$helper","$window","$document",function(sortableConfig,$helper,$window,$document){return{require:"^asSortableItem",scope:!0,restrict:"A",controller:"as.sortable.sortableItemHandleController",link:function(scope,element,attrs,itemController){function insertBefore(targetElement,targetScope){targetElement[0].parentNode.insertBefore(placeHolder[0],targetElement[0]),dragItemInfo.moveTo(targetScope.sortableScope,targetScope.index())}function insertAfter(targetElement,targetScope){targetElement.after(placeHolder),dragItemInfo.moveTo(targetScope.sortableScope,targetScope.index()+1)}function fetchScope(element){for(var scope;!scope&&element.length;)scope=element.data("_scope"),scope||(element=element.parent());return scope}function rollbackDragChanges(){placeElement.replaceWith(scope.itemScope.element),placeHolder.remove(),dragElement.remove(),dragElement=null,dragHandled=!1,containment.css("cursor",""),containment.removeClass("as-sortable-un-selectable")}var dragElement,placeHolder,placeElement,itemPosition,dragItemInfo,containment,containerPositioning,dragListen,scrollableContainer,dragStart,dragMove,dragEnd,dragCancel,isDraggable,placeHolderIndex,bindDrag,unbindDrag,bindEvents,unBindEvents,hasTouch,dragHandled,createPlaceholder,isPlaceHolderPresent,isDisabled=!1;hasTouch=$window.hasOwnProperty("ontouchstart"),sortableConfig.handleClass&&element.addClass(sortableConfig.handleClass),scope.itemScope=itemController.scope,element.data("_scope",scope),scope.$watch("sortableScope.isDisabled",function(newVal){isDisabled!==newVal&&(isDisabled=newVal,isDisabled?unbindDrag():bindDrag())}),createPlaceholder=function(itemScope){return angular.element("function"==typeof scope.sortableScope.options.placeholder?scope.sortableScope.options.placeholder(itemScope):"string"==typeof scope.sortableScope.options.placeholder?scope.sortableScope.options.placeholder:$document[0].createElement(itemScope.element.prop("tagName")))},dragListen=function(event){var startPosition,unbindMoveListen=function(){angular.element($document).unbind("mousemove",moveListen),angular.element($document).unbind("touchmove",moveListen),element.unbind("mouseup",unbindMoveListen),element.unbind("touchend",unbindMoveListen),element.unbind("touchcancel",unbindMoveListen)},moveListen=function(e){e.preventDefault();var eventObj=$helper.eventObj(e);startPosition||(startPosition={clientX:eventObj.clientX,clientY:eventObj.clientY}),Math.abs(eventObj.clientX-startPosition.clientX)+Math.abs(eventObj.clientY-startPosition.clientY)>10&&(unbindMoveListen(),dragStart(event))};angular.element($document).bind("mousemove",moveListen),angular.element($document).bind("touchmove",moveListen),element.bind("mouseup",unbindMoveListen),element.bind("touchend",unbindMoveListen),element.bind("touchcancel",unbindMoveListen)},dragStart=function(event){var eventObj,tagName;(hasTouch||2!==event.button&&3!==event.which)&&(hasTouch&&$helper.isTouchInvalid(event)||!dragHandled&&isDraggable(event)&&(dragHandled=!0,event.preventDefault(),eventObj=$helper.eventObj(event),scrollableContainer=angular.element($document[0].querySelector(scope.sortableScope.options.scrollableContainer)).length>0?$document[0].querySelector(scope.sortableScope.options.scrollableContainer):$document[0].documentElement,containment=scope.sortableScope.options.containment?$helper.findAncestor(element,scope.sortableScope.options.containment):angular.element($document[0].body),containment.css("cursor","move"),containment.addClass("as-sortable-un-selectable"),containerPositioning=scope.sortableScope.options.containerPositioning||"absolute",dragItemInfo=$helper.dragItem(scope),tagName=scope.itemScope.element.prop("tagName"),dragElement=angular.element($document[0].createElement(scope.sortableScope.element.prop("tagName"))).addClass(scope.sortableScope.element.attr("class")).addClass(sortableConfig.dragClass),dragElement.css("width",$helper.width(scope.itemScope.element)+"px"),dragElement.css("height",$helper.height(scope.itemScope.element)+"px"),placeHolder=createPlaceholder(scope.itemScope).addClass(sortableConfig.placeHolderClass).addClass(scope.sortableScope.options.additionalPlaceholderClass),placeHolder.css("width",$helper.width(scope.itemScope.element)+"px"),placeHolder.css("height",$helper.height(scope.itemScope.element)+"px"),placeElement=angular.element($document[0].createElement(tagName)),sortableConfig.hiddenClass&&placeElement.addClass(sortableConfig.hiddenClass),itemPosition=$helper.positionStarted(eventObj,scope.itemScope.element,scrollableContainer),scope.itemScope.element.after(placeHolder),scope.itemScope.element.after(placeElement),dragElement.append(scope.itemScope.element),containment.append(dragElement),$helper.movePosition(eventObj,dragElement,itemPosition,containment,containerPositioning,scrollableContainer),scope.sortableScope.$apply(function(){scope.callbacks.dragStart(dragItemInfo.eventArgs())}),bindEvents()))},isDraggable=function(event){var elementClicked,sourceScope,isDraggable;for(elementClicked=angular.element(event.target),sourceScope=fetchScope(elementClicked),isDraggable=sourceScope&&"handle"===sourceScope.type;isDraggable&&elementClicked[0]!==element[0];)$helper.noDrag(elementClicked)&&(isDraggable=!1),elementClicked=elementClicked.parent();return isDraggable},dragMove=function(event){var eventObj,targetX,targetY,targetScope,targetElement;if((!hasTouch||!$helper.isTouchInvalid(event))&&dragHandled&&dragElement){if(event.preventDefault(),eventObj=$helper.eventObj(event),scope.sortableScope.$apply(function(){scope.callbacks.dragMove(itemPosition,containment,eventObj)}),$helper.movePosition(eventObj,dragElement,itemPosition,containment,containerPositioning,scrollableContainer),targetX=eventObj.pageX-$document[0].documentElement.scrollLeft,targetY=eventObj.pageY-($window.pageYOffset||$document[0].documentElement.scrollTop),dragElement.addClass(sortableConfig.hiddenClass),$document[0].elementFromPoint(targetX,targetY),targetElement=angular.element($document[0].elementFromPoint(targetX,targetY)),dragElement.removeClass(sortableConfig.hiddenClass),dragElement.addClass(sortableConfig.dragging),targetScope=fetchScope(targetElement),!targetScope||!targetScope.type)return;if("handle"===targetScope.type&&(targetScope=targetScope.itemScope),"item"!==targetScope.type&&"sortable"!==targetScope.type)return;if("item"===targetScope.type&&targetScope.accept(scope,targetScope.sortableScope,targetScope)){targetElement=targetScope.element;var placeholderIndex=placeHolderIndex(targetScope.sortableScope.element);0>placeholderIndex?insertBefore(targetElement,targetScope):placeholderIndex<=targetScope.index()?insertAfter(targetElement,targetScope):insertBefore(targetElement,targetScope)}"sortable"===targetScope.type&&targetScope.accept(scope,targetScope)&&targetElement[0].parentNode!==targetScope.element[0]&&(isPlaceHolderPresent(targetElement)||(targetElement[0].appendChild(placeHolder[0]),dragItemInfo.moveTo(targetScope,targetScope.modelValue.length)))}},placeHolderIndex=function(targetElement){var itemElements,i;if(targetElement.hasClass(sortableConfig.placeHolderClass))return 0;for(itemElements=targetElement.children(),i=0;i<itemElements.length;i+=1)if(angular.element(itemElements[i]).hasClass(sortableConfig.placeHolderClass))return i;return-1},isPlaceHolderPresent=function(targetElement){return placeHolderIndex(targetElement)>=0},dragEnd=function(event){dragHandled&&(event.preventDefault(),dragElement&&(rollbackDragChanges(),dragItemInfo.apply(),scope.sortableScope.$apply(function(){dragItemInfo.isSameParent()?dragItemInfo.isOrderChanged()&&scope.callbacks.orderChanged(dragItemInfo.eventArgs()):scope.callbacks.itemMoved(dragItemInfo.eventArgs())}),scope.sortableScope.$apply(function(){scope.callbacks.dragEnd(dragItemInfo.eventArgs())}),dragItemInfo=null),unBindEvents())},dragCancel=function(event){dragHandled&&(event.preventDefault(),dragElement&&(rollbackDragChanges(),scope.sortableScope.$apply(function(){scope.callbacks.dragCancel(dragItemInfo.eventArgs())}),dragItemInfo=null),unBindEvents())},bindDrag=function(){element.bind("touchstart",dragListen),element.bind("mousedown",dragListen)},unbindDrag=function(){element.unbind("touchstart",dragListen),element.unbind("mousedown",dragListen)},bindDrag(),angular.element($document[0].body).bind("keydown",function(event){27===event.keyCode&&dragCancel(event)}),bindEvents=function(){angular.element($document).bind("touchmove",dragMove),angular.element($document).bind("touchend",dragEnd),angular.element($document).bind("touchcancel",dragCancel),angular.element($document).bind("mousemove",dragMove),angular.element($document).bind("mouseup",dragEnd)},unBindEvents=function(){angular.element($document).unbind("touchend",dragEnd),angular.element($document).unbind("touchcancel",dragCancel),angular.element($document).unbind("touchmove",dragMove),angular.element($document).unbind("mouseup",dragEnd),angular.element($document).unbind("mousemove",dragMove)}}}}])}(),function(){"use strict";var mainModule=angular.module("as.sortable");mainModule.controller("as.sortable.sortableItemController",["$scope",function($scope){this.scope=$scope,$scope.sortableScope=null,$scope.modelValue=null,$scope.type="item",$scope.index=function(){return $scope.$index},$scope.itemData=function(){return $scope.sortableScope.modelValue[$scope.$index]}}]),mainModule.directive("asSortableItem",["sortableConfig",function(sortableConfig){return{require:["^asSortable","?ngModel"],restrict:"A",controller:"as.sortable.sortableItemController",link:function(scope,element,attrs,ctrl){var sortableController=ctrl[0],ngModelController=ctrl[1];sortableConfig.itemClass&&element.addClass(sortableConfig.itemClass),scope.sortableScope=sortableController.scope,ngModelController?ngModelController.$render=function(){scope.modelValue=ngModelController.$modelValue}:scope.modelValue=sortableController.scope.modelValue[scope.$index],scope.element=element,element.data("_scope",scope)}}}])}();
	!function(a,b){"use strict";function c(a,b){function c(c,d,e){function f(){h.trigger("change")}function g(){h.multipleSelect("refresh")}var h=b(d),i={onClick:f,onCheckAll:f,onUncheckAll:f,filter:!0,single:!1,placeholder:"",selectAll:!0,position:"bottom",keepOpen:!1,isOpen:!1};e.ngMultiSelectFilter&&(i.filter="true"===e.ngMultiSelectFilter.toLowerCase()),e.ngMultiSelectSingle&&(i.single="true"===e.ngMultiSelectSingle.toLowerCase()),e.ngMultiSelectWidth&&(i.width=e.ngMultiSelectWidth),e.ngMultiSelectMaxHeight&&(i.maxHeight=e.ngMultiSelectMaxHeight),e.ngMultiSelectPlaceholder&&(i.placeholder=e.ngMultiSelectPlaceholder),e.ngMultiSelectSelectAll&&(i.selectAll="true"===e.ngMultiSelectSelectAll.toLowerCase()),e.ngMultiSelectPosition&&(i.position=e.ngMultiSelectPosition),e.ngMultiSelectKeepOpen&&(i.keepOpen="true"===e.ngMultiSelectKeepOpen.toLowerCase()),e.ngMultiSelectIsOpen&&(i.isOpen="true"===e.ngMultiSelectIsOpen.toLowerCase()),h.multipleSelect(i),e.ngMultiSelectTrack&&c.$watchCollection(e.ngMultiSelectTrack,function(){a(g,50)}),a(g,50)}return{restrict:"A",link:c}}var d=a.module("ngMultiSelect.directive",[]);d.constant("jQuery",b),d.directive("ngMultiSelect",["$timeout","jQuery",c])}(angular,jQuery);
	(function(){"use strict";var a;a=angular.module("ngQuill",[]),a.service("ngQuillService",function(){this.formats=["link","image","bold","italic","underline","strike","color","background","align","font","size","bullet","list"],this.defaultTranslation={font:"Font",size:"Size",small:"Small",normal:"Normal",large:"Large",huge:"Huge",bold:"Bold",italic:"Italic",underline:"Underline",strike:"Strikethrough",textColor:"Text Color",backgroundColor:"Background Color",list:"List",bullet:"Bullet",textAlign:"Text Align",left:"Left",center:"Center",right:"Right",justify:"Justify",link:"Link",image:"Image",visitURL:"Visit URL",change:"Change",done:"Done",cancel:"Cancel",remove:"Remove",insert:"Insert",preview:"Preview"},this.validateFormats=function(a){var b=[],c=this,d=0;for(d;d<a.length;d+=1)-1!==c.formats.indexOf(a[d])&&b.push(a[d]);return b}}),a.directive("ngQuillEditor",["$timeout","ngQuillService",function(a,b){return{scope:{toolbarEntries:"@?",toolbar:"@?",linkTooltip:"@?",imageTooltip:"@?",theme:"@?",translations:"=?",required:"@?editorRequired",readOnly:"&?",errorClass:"@?",ngModel:"="},require:"ngModel",restrict:"E",templateUrl:"ngQuill/template.html",link:function(c,d,e,f){var g,h={theme:c.theme||"snow",readOnly:c.readOnly||!1,formats:c.toolbarEntries?b.validateFormats(c.toolbarEntries.split(" ")):b.formats,modules:{}},i=!1,j=function(){c.required&&(!c.modelLength||c.modelLength<=1)?(d.addClass("ng-invalid"),d.removeClass("ng-valid"),c.errorClass&&i&&d.hasClass("ng-dirty")&&d.children().addClass(c.errorClass)):(d.removeClass("ng-invalid"),d.addClass("ng-valid"),c.errorClass&&d.children().removeClass(c.errorClass))};c.required&&"true"===c.required?c.required=!0:c.required=!1,c.dict=b.defaultTranslation,c.shouldShow=function(a){var b=!1,c=0;for(c;c<a.length;c+=1)if(-1!==h.formats.indexOf(a[c])){b=!0;break}return b},c.translations&&(c.dict=c.translations),c.linkTooltip&&"true"===c.linkTooltip&&(h.modules["link-tooltip"]={template:'<span class="title">'+c.dict.visitURL+':&nbsp;</span><a href="#" class="url" target="_blank" href="about:blank"></a><input class="input" type="text"><span>&nbsp;&#45;&nbsp;</span><a href="javascript:;" class="change">'+c.dict.change+'</a><a href="javascript:;" class="remove">'+c.dict.remove+'</a><a href="javascript:;" class="done">'+c.dict.done+"</a>"}),c.imageTooltip&&"true"===c.imageTooltip&&(h.modules["image-tooltip"]={template:'<input class="input" type="textbox"><div class="preview"><span>'+c.dict.preview+'</span></div><a href="javascript:;" class="cancel">'+c.dict.cancel+'</a><a href="javascript:;" class="insert">'+c.dict.insert+"</a>"}),g=new Quill(d[0].querySelector(".advanced-wrapper .editor-container"),h),c.toolbar&&"true"===c.toolbar&&a(function(){g.addModule("toolbar",{container:d[0].querySelector(".advanced-wrapper .toolbar-container")}),c.toolbarCreated=!0},0),a(function(){c.$emit("editorCreated",g)}),c.$watch(function(){return c.ngModel},function(a){void 0===a||i||g.setHTML(a)}),c.readOnly&&c.$watch(function(){return c.readOnly()},function(a){g.editor[a?"disable":"enable"]()}),c.regEx=/^([2-9]|[1-9][0-9]+)$/,g.on("text-change",function(){var b=i;i=!0,a(function(){c.modelLength=g.getLength(),b&&j(),f.$setViewValue(g.getHTML())},0)}),d.on("$destroy",function(){g.destroy()})}}}]),a.run(["$templateCache","$rootScope","$window",function(a){return a.put("ngQuill/template.html",'<div id="content-container"><div class="advanced-wrapper"><div class="toolbar toolbar-container" ng-if="toolbar" ng-show="toolbarCreated"><span class="ql-format-group" ng-if="shouldShow([\'font\', \'size\'])"><select title="{{dict.font}}" class="ql-font" ng-if="shouldShow([\'font\'])"><option value="sans-serif" selected="">Sans Serif</option><option value="serif">Serif</option><option value="monospace">Monospace</option></select><select title="{{dict.size}}" class="ql-size" ng-if="shouldShow([\'size\'])"><option value="10px">{{dict.small}}</option><option value="13px" selected="">{{dict.normal}}</option><option value="18px">{{dict.large}}</option><option value="32px">{{dict.huge}}</option></select></span><span class="ql-format-group" ng-if="shouldShow([\'bold\', \'italic\', \'underline\', \'strike\'])"><span title="{{dict.bold}}" class="ql-format-button ql-bold" ng-if="shouldShow([\'bold\'])"></span><span title="{{dict.italic}}" class="ql-format-button ql-italic" ng-if="shouldShow([\'italic\'])"></span><span title="{{dict.underline}}" class="ql-format-button ql-underline" ng-if="shouldShow([\'underline\'])"></span><span title="{{dict.strike}}" class="ql-format-button ql-strike" ng-if="shouldShow([\'strike\'])"></span></span><span class="ql-format-group" ng-if="shouldShow([\'color\', \'background\'])"><select title="{{dict.textColor}}" class="ql-color" ng-if="shouldShow([\'color\'])"><option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected=""></option><option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option><option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option><option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option><option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option><option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option><option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option><option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option><option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option><option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option><option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option><option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option><option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option><option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option><option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option><option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option><option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option><option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option><option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option><option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option><option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option><option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option><option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option><option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option><option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option><option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option><option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option><option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option><option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option><option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option><option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option><option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option><option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option><option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option><option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option></select><select title="{{dict.backgroundColor}}" class="ql-background" ng-if="shouldShow([\'background\'])"><option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)"></option><option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option><option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option><option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option><option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option><option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option><option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option><option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)" selected=""></option><option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option><option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option><option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option><option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option><option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option><option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option><option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option><option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option><option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option><option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option><option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option><option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option><option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option><option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option><option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option><option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option><option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option><option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option><option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option><option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option><option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option><option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option><option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option><option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option><option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option><option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option><option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option></select></span><span class="ql-format-group" ng-if="shouldShow([\'list\', \'bullet\'])"><span title="{{dict.list}}" class="ql-format-button ql-list" ng-if="shouldShow([\'list\'])"></span><span title="{{dict.bullet}}" class="ql-format-button ql-bullet" ng-if="shouldShow([\'bullet\'])"></span></span><span class="ql-format-group" ng-if="shouldShow([\'align\'])"><select title="{{dict.textAlign}}" class="ql-align"><option value="left" label="{{dict.left}}" selected=""></option><option value="center" label="{{dict.center}}"></option><option value="right" label="{{dict.right}}"></option><option value="justify" label="{{dict.justify}}"></option></select></span><span class="ql-format-group" ng-if="shouldShow([\'link\', \'image\'])"><span title="{{dict.link}}" class="ql-format-button ql-link" ng-if="shouldShow([\'link\'])"></span><span title="{{dict.image}}" class="ql-format-button ql-image" ng-if="shouldShow([\'image\'])"></span></span></div><div class="editor-container"></div><input type="text" ng-model="modelLength" ng-if="required" ng-hide="true" ng-pattern="/^([2-9]|[1-9][0-9]+)$/"></div></div>')}])}).call(this);

	var optpoint = angular.module("optpoint",['ngAnimate', 'ngRoute','minicolors','timer','as.sortable','ngMultiSelect.directive','ngQuill']);
	optpoint.controller("optpointctlr", function($scope,$rootScope,$route,$location,$filter,$compile,$http) {
		$scope.$route = $route;
		$scope.data=optpointdata;
		$scope.icons = optpointset.iconlist;
		$scope.svglist = optpointset.svglist;
		$scope.fonts = optpointset.web_fonts.concat(optpointset.goog_fonts);
		$scope.fontsiz = Array.apply(null, {length: 100}).map(Number.call, String);
		if(!isset($scope.data.cforms)){$scope.data.cforms=[{"id": 1,"name": "Form 1","fields":[]}];$scope.data.cformi=1;}
		if(!isset($scope.data.cformi)){$scope.data.cformi=1;}

		$scope.idim = {"l":{"1": "170x170"}};
		$scope.loader = function (a) {
			$scope.isLoading = a;
		};
		$scope.loader(0);
		$rootScope.$on('$routeChangeStart', function() {
			$scope.loader(1);
		});
		$rootScope.$on('$routeChangeSuccess', function() {
			$scope.loader(0);
			var curpage = $route.current.activetab;
		});
		$scope.update_options = function(){
			if($scope.remote.chk())return;
			$scope.remote.lock();
			$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_update',$scope.data)
				.then(function (a) {
					if(a.data == 1)
						$scope.remote.unlock(2);
					else {
						$scope.remote.unlock(3);
						$scope.addErr('Unknown Error! Please try again');
					}
				},function (a) {
					$scope.remote.unlock(3);
					$scope.addErr('Unknown Error! Please try again');
			});
		}
		//theme
		
		$scope.template = [{i:1,n:"Epsilon"},{i:8,n:"Nova"},{i:9,n:"Leo"},{i:0,n:"Basic"}];
		$scope.gettpl = function(i){return $filter('filter')($scope.template, function (d) {return d.i === (i);})[0];}
		$scope.gettheme = function(i){return $filter('filter')($scope.data.themes, function (d) {return parseInt(d.id) === parseInt(i);})[0];}
		$scope.getformbyid = function(i){return $filter('filter')($scope.data.cforms, function (d) {return parseInt(d.id) === parseInt(i);})[0];}
		$scope.getformibyid = function(i){return $scope.data.cforms.indexOf($filter('filter')($scope.data.cforms, function (d) {return parseInt(d.id) === parseInt(i);})[0]);}

		$rootScope.$on('$includeContentRequested', function() {
			$scope.loader(1);
		});
		$rootScope.$on('$includeContentLoaded', function() {
			$scope.loader(0);
		});

		$scope.addErr = function(e){
			$('#errcont').append($compile('<opterr ng-model="opterr" err="'+e+'"></opterr>')($scope));
		}
		$scope.remote ={
			l : 0,
			chk:function(){return $scope.remote.l},
			lock:function(){
				$scope.loader(1);
				$scope.remote.l = 1;
			},
			unlock:function(i){
				$scope.loader(i);
				$scope.remote.l = 0;
			}
		}

		$scope.foredit = {
			theme:false,
			form:false,
			run:function(i,id){
				if(i==0){
					$scope.foredit.form = id;
					$location.path( "/general" );
				}
				else {
					$scope.foredit.theme = id;
					$location.path( "/theme" );
				}
			}
		};
		
	});
	optpoint.controller("optpointthe", function($scope,$sce,$filter) {


		$scope.$on('$viewContentLoaded', function() {
			if($scope.foredit.theme){
				$scope.theme_ctrl.edit($scope.foredit.theme);
				$scope.foredit.theme = false;
				setTimeout(function() {
					$("html, body").stop().animate({
						scrollTop: $('.optpoint_edit').first().offset().top - 100
					}, '500', 'linear');
				}, 10);
			}
		});

		$scope.getSpin = function(spin,pre,color){
			if(!isset(spin))return '';
			if(!isset(pre))pre = 'spindemo';
			if(!isset(color))color = '#717171';
			switch(spin){
				case '1': return $sce.trustAsHtml('<style type="text/css">.'+pre+' .sp1 {border:3px solid '+color+';border-radius:30px;height:30px;width:30px;margin: 0 auto;opacity:0;-webkit-animation: '+pre+'sp1 1s ease-out infinite;animation: '+pre+'sp1 1s ease-out infinite;}@-webkit-keyframes '+pre+'sp1 {0% {-webkit-transform:scale(0.1);opacity: 0;}50% {opacity:1;}100%{-webkit-transform:scale(1.2);opacity:0;}}@keyframes '+pre+'sp1 {0% {transform:scale(0.1);opacity: 0;}50% {opacity:1;}100% {transform:scale(1.2);opacity:0;}}</style><div class="sp1"></div>');
				case '3': return $sce.trustAsHtml('<style type="text/css">.'+pre+' .sp3 {width: 40px;height: 40px;position: relative;margin: -5px auto;}.'+pre+' .sp3:before, .'+pre+' .sp3:after {content: "";width: 100%;height: 100%;border-radius: 50%;background-color: '+color+';opacity: 0.6;position: absolute;top: 0;left: 0;-webkit-animation: '+pre+'sp3 2.0s infinite ease-in-out;animation: '+pre+'sp3 2.0s infinite ease-in-out;}.'+pre+' .sp3:after {-webkit-animation-delay: -1.0s;animation-delay: -1.0s;}@-webkit-keyframes '+pre+'sp3 {0%, 100% { -webkit-transform: scale(0) }50% { -webkit-transform: scale(1) }}@keyframes '+pre+'sp3 {0%, 100% {transform: scale(0)}50% {transform: scale(1)}}</style><div class="sp3"></div>');
				case '7': return $sce.trustAsHtml('<style type="text/css">.'+pre+' .sp7 {margin: 7px auto 0;width: 70px;}.'+pre+' .sp7 > div {width: 18px;height: 18px;background-color: '+color+';border-radius: 100%;display: inline-block;-webkit-animation: '+pre+'sp7 1.4s infinite ease-in-out;animation: '+pre+'sp7 1.4s infinite ease-in-out;-webkit-animation-fill-mode: both;animation-fill-mode: both;}.'+pre+' .sp7 .sp71 {-webkit-animation-delay: -0.32s;animation-delay: -0.32s;}.'+pre+' .sp7 .sp72 {-webkit-animation-delay: -0.16s;animation-delay: -0.16s;}@-webkit-keyframes '+pre+'sp7 {0%, 80%, 100% { -webkit-transform: scale(0.0) }40% { -webkit-transform: scale(1.0) }}@keyframes '+pre+'sp7 {0%, 80%, 100% { transform: scale(0.0);-webkit-transform: scale(0.0);} 40% { transform: scale(1.0);-webkit-transform: scale(1.0);}}</style><div class="sp7"><div class="sp71"></div><div class="sp72"></div><div class="sp73"></div></div>');
				case '8': return $sce.trustAsHtml('<style type="text/css">.'+pre+' .sp8 {margin: 0 auto;width: 50px;height: 30px;}.'+pre+' .sp8 > div {background-color: '+color+';margin-left: 3px;height: 100%;width: 6px;display: inline-block;-webkit-animation: '+pre+'sp8 1.2s infinite ease-in-out;animation: '+pre+'sp8 1.2s infinite ease-in-out;}.'+pre+' .sp8 .sp82 {-webkit-animation-delay: -1.1s;animation-delay: -1.1s;}.'+pre+' .sp8 .sp83 {-webkit-animation-delay: -1.0s;animation-delay: -1.0s;}.'+pre+' .sp8 .sp84 {-webkit-animation-delay: -0.9s;animation-delay: -0.9s;}.'+pre+' .sp8 .sp85 {-webkit-animation-delay: -0.8s;animation-delay: -0.8s;}@-webkit-keyframes '+pre+'sp8 {0%, 40%, 100% { -webkit-transform: scaleY(0.4) }20% { -webkit-transform: scaleY(1.0) }}@keyframes '+pre+'sp8 {0%, 40%, 100% { transform: scaleY(0.4);-webkit-transform: scaleY(0.4);}20% { transform: scaleY(1.0);-webkit-transform: scaleY(1.0);}}</style><div class="sp8"><div class="sp81"></div><div class="sp82"></div><div class="sp83"></div><div class="sp84"></div><div class="sp85"></div></div>');
			}
		}
		$scope.getIcon = function(icon,size,color,attr){
			if(!isset(icon))return '';
			if(!isset(size))size="250";
			if(!isset(color))color="#000";
			if(!isset(attr))attr="1";
			var str,dim,stra,ico;
			ico = ((icon in $scope.icons)?$scope.icons[icon]:((icon in $scope.svglist)?$scope.svglist[icon]:''));
			if(ico == '')return false;
			str=ico.path+(isset(ico.cont)?attr+ico.cont:'');
			dim=(isset(ico.dim)?ico.dim:512);
			stra='<svg xmlns="http://www.w3.org/2000/svg" fill="'+color+'" x="0px" y="0px" width="'+size+'px" height="'+size+'px" viewBox="0 0 '+dim+' '+dim+'" enable-background="new 0 0 '+dim+' '+dim+'" xml:space="preserve">';
			str= stra + str+'</svg>';
			return "url('data:image/svg+xml;base64,"+Base64.encode(str)+"')";
		}
		var msg_edit;
		$scope.$on("editorCreated", function (event, editor) {
			msg_edit = editor;
		});
		$scope.theme_ctrl = {
			sel: -1,
			esel:-1,
			econ: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=theme_opt',
			edit: function(id){
				$scope.theme_ctrl.esel = id;
				$scope.theme_ctrl.sel = -1;
				$scope.theme = $scope.gettheme(id).options;
				//refresh
				if(isset(msg_edit)){
					msg_edit.setHTML($scope.theme.msg || '');
				}

				$('#theme input[type="range"]').each(function(){
					$(this).val($scope.theme[$(this).attr('optbm')]||40).change();
				});

				$('#theme [minicolors]').each(function(){
					if(!$scope.theme[$(this).attr('optbm')])$(this).val('').next().find('.minicolors-swatch-color').removeAttr('style');
				});

			}
		}
		$scope.prev = {
			st:0,
			ty:0,
			switch: function(){
				if($scope.prev.st == 0)$scope.prev.st = 1;
				else $scope.prev.st = 0;
			},
			get: function(){
				var type;
				switch($scope.prev.ty){
					case 0:type="lightbox";break;
					case 1:type="slider";break;
					case 2:type="widget";break;
					case 3:type="addon";break;
				}
				return optinpint_script.ajaxurl+'?action=optinpoint_lite_prev&type='+type+'&theme='+$scope.theme.tpl;
			},
			goto: function(a){
				var scopt=$('[data-setno="'+a+'"]');
				$('html, body').animate({
					scrollTop: scopt.offset().top - 100
				}, 500);	
			}
		}
	});
	optpoint.controller("optpointgen", function($scope,$sce,$filter,$http) {

		$scope.$on('$viewContentLoaded', function() {
			if($scope.foredit.form){
				$scope.form.edit($scope.foredit.form);
				$scope.foredit.form = false;
				setTimeout(function() {
					$("html, body").stop().animate({
						scrollTop: $('.optpoint_edit').first().offset().top - 200
					}, '500', 'linear');
				}, 10);
			}
		});

		$scope.mailserv = {
			list:{
				aw: {name:'Aweber',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[51]) || $scope.mailserv.config.key[51].length == 0){
								$scope.addErr('Enter Authorization Code');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && typeof a.data != "string"){
										$scope.mailserv.config.key = a.data;
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect Authorization Code');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:0,
					extfill:1
				},
				ac: {name:'Active Campaign',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && a.data.status){
										$scope.mailserv.config.acc = a.data.data.account;
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:0
				},
				be: {name:'Benchmark Email',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && !isset(a.data.faultCode)){
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:1
				},
				cm:{name:'CampaignMonitor',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && a.data.http_status_code == 200){
										$scope.mailserv.templist[0] = a.data.response;
										$scope.mailserv.step++;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						},
						function(){
							if(!isset($scope.mailserv.templist[1])){
								$scope.addErr('Select Client');
								return;
							}
							$scope.mailserv.config.acc = $scope.mailserv.templist[1].Name;
							$scope.mailserv.config.key[1] = $scope.mailserv.templist[1].ClientID;
							$scope.mailserv.isConfig = 3;
						}
					],
					ltype:0,
					extfill:0
				},
				cc: {name:'Constant Contact',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter Mashery API Key');
								return;
							}
							$scope.remote.lock();
							oauth=[];
							popup = window.open("https://oauth2.constantcontact.com/oauth2/oauth/siteowner/authorize?response_type=token&client_id="+$scope.mailserv.config.key[0]+"&oauthSignup=true&redirect_uri="+optpointset.plug_url+"service/cc/redirect.php", "Popup", "width=600,height=550");
							popup.focus();
							var interval = window.setInterval(function() {
								try {
									console.log(popup);
									 if (popup == null || popup.closed) {
										window.clearInterval(interval);
										if(oauth.status){
											$scope.mailserv.config.key[1] = oauth.code;
												$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
												.then(function (a) {
													if(a.status == 200 && a.data.http_status == 200){
														$scope.mailserv.config.acc = a.data.data.organization_name;
														$scope.mailserv.isConfig = 3;
														$scope.remote.unlock(2);
													}
													else{
														$scope.addErr('Error');
														$scope.remote.unlock(3);
													}
												},function (a) {
													$scope.remote.unlock(3);
													$scope.addErr('Error');
											});
										}
										else{
											$scope.remote.unlock(3);
											$scope.addErr('Unknown Error!');
										}
									}
								}
								catch (e) {
								}
							}, 1000);
						}
					],
					ltype:1,
					extfill:1
				},
				ck: {name:'ConvertKit',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && a.data.http_status){
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:1
				},
				dp: {name:'Drip',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									console.log(a);
									if(a.status == 200 && a.data.http_status == 200){
										$scope.mailserv.config.acc = a.data.data.accounts[0].name;
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:2,
					extfill:1
				},
				gr: {name:'GetResponse',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && !(isset(a.data.code))){
										$scope.mailserv.config.acc = a.data.companyName;
										$scope.mailserv.config.key[1] = a.data.accountId;
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:0
				},
				hs: {name:'Hubspot',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && a.data.status == 200){
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:0
				},
				ic: {name:'iContact',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && !(isset(a.data.errors))){
										$scope.mailserv.templist[0] = a.data.campaigns;
										$scope.mailserv.step++;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						},
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.templist[1])){
								$scope.addErr('Select Account');
								return;
							}
							$scope.mailserv.config.acc = $scope.mailserv.templist[1].name;
							$scope.mailserv.config.key[3] = $scope.mailserv.templist[1].accountId;
							$scope.mailserv.config.key[4] = $scope.mailserv.templist[1].campaignId;
							$scope.mailserv.config.key[5] = $scope.mailserv.templist[1].clientFolderId;
							$scope.mailserv.isConfig = 3;
							$scope.remote.unlock(2);
						}
					],
					ltype:1,
					extfill:1
				},
				sg: {name:'SendGrid',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && !(isset(a.data.errors))){
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:1
				},
				mm: {name:'Mad Mimi',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && a.data.http_status == 200){
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:1
				},
				ml: {name:'MailerLite',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
								.then(function (a) {
									console.log(a);
									if(a.status == 200 && a.data.http_status == 200){
										$scope.mailserv.config.acc = a.data.data.account.name;
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:1
				},
				mp: {name:'MailPoet 3',
					ltype:1,
					extfill:0,
					disable: (optpointset.mailpoet ? 0 : 1)
				},
				ms: {name:'Mailster (formerly MyMail)',
					ltype:1,
					extfill:1,
					disable: (optpointset.mymail ? 0 : 1)
				},
				vr: {name:'Vertical Response',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter Mashery API Key');
								return;
							}
							if(!isset($scope.mailserv.config.key[1]) || $scope.mailserv.config.key[1].length == 0){
								$scope.addErr('Enter Mashery API Secret');
								return;
							}
							$scope.remote.lock();
							oauth=[];
							popup = window.open("https://vrapi.verticalresponse.com/api/v1/oauth/authorize?client_id="+$scope.mailserv.config.key[0]+"&redirect_uri="+optpointset.plug_url+"service/vr/redirect.php", "Popup", "width=600,height=550");
							popup.focus();
							var interval = window.setInterval(function() {
						        try {
						            if (popup == null || popup.closed) {
						                window.clearInterval(interval);
										if(oauth.status){
											$scope.mailserv.config.key[2] = oauth.code;
											$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_connect&step=0&optinpoint_lite_service=1',$scope.mailserv.config)
												.then(function (a) {
													if(typeof a.data != "string" && a.data.status){
														$scope.mailserv.config.key[2] = a.data.code.access_token;
														$scope.mailserv.isConfig = 3;
														$scope.remote.unlock(2);
													}
													else{
														$scope.addErr('Error');
														$scope.remote.unlock(3);
													}
												},function (a) {
													$scope.remote.unlock(3);
													$scope.addErr('Unknown Error!');
											});
										}
										else{
											$scope.remote.unlock(3);
											$scope.addErr('Unknown Error!');
										}
									}
						        }
						        catch (e) {
						        }
						    }, 100);

						}
					],
					ltype:1,
					extfill:1
				},
				zc: {name:'Zoho Campaigns',
					func:[
						function(){
							if($scope.remote.chk())return;
							if(!isset($scope.mailserv.config.key) || !isset($scope.mailserv.config.key[0]) || $scope.mailserv.config.key[0].length == 0){
								$scope.addErr('Enter API Key');
								return;
							}
							$scope.remote.lock();
							$http.post(optinpint_script.ajaxurl+'?action=optinpoint_mailserv_connect&step=0&optinpoint_service=1',$scope.mailserv.config)
								.then(function (a) {
									if(a.status == 200 && a.data.data.code == 0){
										$scope.mailserv.isConfig = 3;
										$scope.remote.unlock(2);
									}
									else{
										$scope.addErr('Incorrect API Key');
										$scope.remote.unlock(3);
									}
								},function (a) {
									$scope.remote.unlock(3);
									$scope.addErr('Error');
							});
						}
					],
					ltype:1,
					extfill:1
				}
			},
			config:{},
			step:0,
			isConfig:(isset($scope.data.mailserv)?0:1),
			proc:function(){
				$scope.form.step = 1;
				switch($scope.mailserv.isConfig){
					case 0: $scope.mailserv.reset();
							break;
					case 1: if(isset($scope.mailserv.config.id)){
								if($scope.mailserv.config.id == 'ms')
									$scope.mailserv.isConfig = 3;
								else
									$scope.mailserv.isConfig = 2;
							}
							else
								$scope.addErr('Select Mail Service');
							break;
					case 2:	$scope.mailserv.list[$scope.mailserv.config.id].func[$scope.mailserv.step]();
							break;
					case 3: $scope.data.mailserv = angular.copy($scope.mailserv.config);
							$scope.mailserv.cancel();
							break;
				}
			},
			refresh:function(){
				$scope.mailserv.config = {};
				$scope.mailserv.templist = [];
				$scope.mailserv.step = 0;
			},
			reset:function(){
				$scope.mailserv.refresh();
				$scope.mailserv.isConfig = 1;
			},
			cancel:function(){
				$scope.mailserv.refresh();
				$scope.mailserv.isConfig = 0;
			},
			templist:[]
		};

		//initialize sortable table
		$scope.sortableOptions = {containment: '#wpwrap',
			orderChanged: function (event) {
				if(event.source.index == $scope.field.ed)$scope.field.ed=event.dest.index;
				else if(event.dest.index == $scope.field.ed)$scope.field.ed=event.source.index;
			}
		};
		
		$scope.form={
			step:1,
			ed:-1,
			edit:function(i){
				$scope.form.step=1;
				$scope.form.ed = i;
				$scope.form.tform = angular.copy($scope.getformbyid(i));
				$scope.field.ed = -1;
				$scope.edform.load();
			}
		};
		$scope.edform={
			load:function(){
				if($scope.remote.chk())return;
				if(!isset($scope.data.mailserv)){$scope.addErr('Configure Mailing Service');return;}
				$scope.remote.lock();
				$scope.edform.shf = 0;
				if($scope.mailserv.list[$scope.data.mailserv.id].ltype <= 1)
					$scope.edform.getlist();
				if($scope.mailserv.list[$scope.data.mailserv.id].ltype > 1)
					$scope.edform.getfield();
			},
			getlist:function(){
				$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_getlists&optinpoint_lite_service=1',$scope.data.mailserv)
					.then(function (a) {
						if(a.status == 200 && typeof a.data != "string"){
							if(a.data.length == 0){
								$scope.addErr('No Lists');
								$scope.remote.unlock(3);
							}
							else{
								$scope.edform.lists = a.data;
								if($scope.mailserv.list[$scope.data.mailserv.id].ltype == 1)
									$scope.edform.getfield();
								else{
									$scope.remote.unlock(2);
									$scope.form.step = 2;

								}
							}
						}
						else{
							$scope.addErr('Error');
							$scope.remote.unlock(3);
						}
					},function (a) {
						$scope.remote.unlock(3);
						$scope.addErr('Error');
				});
			},
			getfield:function(){
				var opts = [$scope.data.mailserv];
				if(isset($scope.form.tform.list))
					opts.push($scope.form.tform.list.id);
				$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_mailserv_getfields&optinpoint_lite_service=1',opts)
					.then(function (a) {
						if(a.status == 200 && typeof a.data != "string"){
							$scope.edform.fields = a.data;
							if(!isset($scope.form.tform.fields))$scope.form.tform.fields = [];
							$.each(a.data, function( index, v ) {
								if(!$scope.edform.chkfldexst(v) && v.req == 1)
									$scope.form.tform.fields.push(v);
							});
							$scope.remote.unlock(2);
							$scope.form.step = 2;
							$scope.edform.shf = 1;
						}
						else{
							$scope.addErr('Error');
							$scope.remote.unlock(3);
						}
					},function (a) {
						$scope.remote.unlock(3);
						$scope.addErr('Error');
				});
			},
			chkfldexst:function(a){
				if(a.noid)return false;
				for (var i = 0; i < $scope.form.tform.fields.length; i++) {
					if($scope.form.tform.fields[i].id == a.id)return true;
				}
				return false;
			},
			loadfield:function(){
				if($scope.remote.chk())return;
				if( !isset($scope.form.tform.list)){
					$scope.addErr('Select list');
					$scope.remote.unlock(3);
					return;
				}
				$scope.remote.lock();
				$scope.edform.getfield();
			}
		}
		$scope.listchange = function(){
			if($scope.mailserv.list[$scope.data.mailserv.id].ltype < 1){
				$scope.edform.shf = 0;
				$scope.edform.fields = [];
				$scope.form.tform.fields = [];
			}
		}
		$scope.field={
			sel:-1,
			ed:-1,
			del:{
				c:function(i){
					$scope.field.sel = i;
					$scope.field.ed = -1;
				},
				y:function(){
					$scope.form.tform.fields.splice($scope.field.sel, 1);
					$scope.field.sel = -1;
				},
				n:function(){
					$scope.field.sel = -1;
				}
			},
			add:function(){
				$scope.form.tform.fields.push({});
			},
			ok:function(){
				$scope.data.cforms[$scope.getformibyid($scope.form.ed)] = angular.copy($scope.form.tform);
				$scope.form.step = 1;
				$scope.form.tform = {};
			},
			cancel:function(){
				$scope.form.step = 1;
				$scope.form.tform = {};
			},
			edit:function(i){
				if($scope.field.ed == i)
					$scope.field.ed = -1;
				else
					$scope.field.ed = i;
			},
			selector:function(i,f){
				var fl = 1;
				var cu = 1;
				if($scope.form.tform.fields[i].req)fl = 0;
				angular.forEach($scope.form.tform.fields,function (v,k){
					if(isset(v.noid))cu++;
					if(v.id == f.id)fl = 0;
				});
				var t = angular.copy(f);
				if(isset(f.noid))t.id=t.id+cu;
				if(fl)$scope.form.tform.fields[i] = angular.copy(t);
			},
			eftchange:function(i){
				angular.forEach($scope.form.tform.fields,function (v,k){
					if(k != i)v.eft="";
				});
			},
			extra:{
				fill:function(){
					return ($scope.mailserv.list[$scope.data.mailserv.id].extfill);
				},
				add:function(i){
					if(!isset($scope.form.tform.fields[i].extras))$scope.form.tform.fields[i].extras = [];
					if($scope.form.tform.fields[i].type !== "singlecheck")$scope.form.tform.fields[i].extras.push({"name":"New Option"});
					else $scope.form.tform.fields[i].extras.push({"name":"1","label":"New Option"});
				},
				del:function(i,j){
					$scope.form.tform.fields[i].extras.splice(j, 1);
				}
			}
		};
		$scope.usync={
			sync:0,
			tot:0,
			cur:0,
			done:0,
			process:function(i,j,r=null){
				if(!isset(j)){$scope.addErr('Select your Form to sync');return;}
				if(i == 2 && (!isset(r) || r.length == 0)){$scope.addErr('Select User Role to sync');return;}
				if($scope.remote.chk())return;
				$scope.remote.lock();
				$scope.usync.sync=0;
				$scope.usync.cur=0;
				$scope.usync.done=0;
				$scope.usync.needle = 0;
				$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_usync',{t:i,f:j,r:r})
					.then(function (a) {
						if(a.data.length > 0){
							$scope.remote.unlock(2);
							$scope.usync.sync = i;
							$scope.usync.tot = a.data.length;
							$scope.usync.add(a.data,j);
						}
						else {
							$scope.remote.unlock(3);
							$scope.addErr('No Users in the Constraint');
						}
					},function (a) {
						$scope.remote.unlock(3);
						$scope.addErr('Unknown Error! Please try again');
				});
			},
			stack:5,
			needle:0,
			add:function(emails,form){
				if($scope.usync.tot == $scope.usync.done){
					setTimeout(function(){
						$scope.usync.sync=$scope.usync.sync+2;
						$scope.$apply();
					}, 3000);
					return;
				}
				if($scope.usync.stack > $scope.usync.needle && $scope.usync.cur < $scope.usync.tot){
					$scope.usync.needle++;
					$http.post(optinpint_script.ajaxurl+'?action=optinpoint_lite_usync_add&optinpoint_lite_service=1',{e:emails[$scope.usync.cur],f:form})
						.then(function (a) {
							$scope.usync.needle--;
							$scope.usync.done++;
						},function (a) {
							$scope.remote.unlock(3);
							$scope.addErr('Unknown Error! Please try again');
					});
					$scope.usync.cur++;
				}
				setTimeout(function(){$scope.usync.add(emails,form);}, 1000);
			}
		}
		
	});
	optpoint.controller("optpointlit", function($scope) {

	});
	optpoint.controller("optpointsli", function($scope,$sce,$filter) {

	});
	optpoint.controller("optpointwid", function($scope,$sce,$filter) {

	});
	optpoint.controller("optpointadd", function($scope,$sce,$filter) {

	});
	optpoint.controller("optpointadv", function($scope,$sce,$filter) {
		$scope.configure = {
			backup:function(){
				window.open('./admin-ajax.php?action=optinpoint_lite_secure&q=backup',"_self");
			},
			restore:function(){
				$('#file_sel').change($scope.configure.handleFileSelect).click();
			},
			reset:function(){
				$scope.remote.lock();
				$.post('./admin-ajax.php?action=optinpoint_lite_secure&q=reset','',
					function(e){location.reload();
				});
			},
			handleFileSelect:function(evt){
				if($scope.remote.chk())return;
				
				var files = evt.target.files;
				var f = files[0];
			 	var reader = new FileReader();
				reader.readAsText(f);
				reader.onload = function() {
					if(isJson(reader.result)){
						$scope.remote.lock();
						text = JSON.parse(reader.result);
						$.post('./admin-ajax.php?action=optinpoint_lite_secure&q=restore',
							{ 'data' : text},
							function(e){
								location.reload();
						});
					}
					else{
						$scope.addErr('Invalid OptinPoint Backup File');
					}
				}

			}
		};
		function isJson(str) {
		    try {
		        JSON.parse(str);
		    } catch (e) {
		        return false;
		    }
		    return true;
		}
		$scope.feat_buypro = function(){
			window.open("https://codecanyon.net/item/optinpoint-advanced-popup-plugin-for-wordpress/19471969?ref=Voltroid","_blank");
		}
	});
	optpoint.config(function($routeProvider) {
		$routeProvider
			.when('/general', {
				templateUrl	: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=general',
				controller	: 'optpointgen',
				activetab	: 'general'
			})
			.when('/theme', {
				templateUrl	: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=theme',
				controller	: 'optpointthe',
				activetab	: 'theme'
			})
			.when('/lightbox', {
				templateUrl	: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=lightbox',
				controller	: 'optpointlit',
				activetab	: 'lightbox'
			})
			.when('/slider', {
				templateUrl	: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=slider',
				controller	: 'optpointsli',
				activetab	: 'slider'
			})
			.when('/widget', {
				templateUrl	: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=widget',
				controller	: 'optpointwid',
				activetab	: 'widget'
			})
			.when('/addon', {
				templateUrl	: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=addon',
				controller	: 'optpointadd',
				activetab	: 'addon'
			})
			.when('/advanced', {
				templateUrl	: optinpint_script.ajaxurl+'?action=optinpoint_lite_tab&tab=advanced',
				controller	: 'optpointadv',
				activetab	: 'advanced'
			})
			.otherwise({
				redirectTo	: '/general'
			})
	});
	optpoint.directive('opttext', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group optpoint_txt'+(isset(attrs.optclass)?' '+attrs.optclass:'')+'"> '
					+'<input type="text" class="optpoint_text" ng-model="bindedModel" required>'
					+(isset(attrs.optmedup)?'<button class="optpoint_button green material-design optpoint_media_uploader" ng-click="optpoint_media_uploader()">Select Image</button>':'')
					+(isset(attrs.opthint)?'<span class="optpoint_hint" data-hint="'+(isset(attrs.opthint)?attrs.opthint:'')+'"></span>':'')
					+'<span class="highlighter"></span>'
					+'<span class="bar"></span>'
					+'<label>'+(isset(attrs.optlab)?attrs.optlab:'')+'</label>'
					+(isset(attrs.opttext)?decodeURIComponent(attrs.opttext):'')
				+'</div>'
			},
			scope: {
				bindedModel :"=ngModel",
				optpx :"=optpx"
			},
			link:function($scope){
				$scope.optpoint_media_uploader = function(){
					var oppoint_img1;
					if ( undefined !== oppoint_img1 ) {oppoint_img1.open();return;}
					oppoint_img1 = wp.media.frames.oppoint_img1 = wp.media({
						className: 'media-frame optinpoint-img1',
						frame: 'select',
						multiple: false,
						title: 'Get your Image',
						library: {type: 'image'}
					});
					oppoint_img1.on('select', function(){
						var ma = oppoint_img1.state().get('selection').first().toJSON();
						$scope.bindedModel = ma.url;
						$scope.$apply();
					});
					oppoint_img1.open();
				}
			}
		};
	});

	optpoint.directive('optfont', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group">'
							+'<select class="optpoint_sel google_fonts" ng-model="bindedModel.f" ng-options="f for f in fonts track by f">'
								+'<option value="">Font</option>'
							+'</select>'
							+'<select class="optpoint_sel google_fonts_size" ng-model="bindedModel.s" ng-options="f for f in fontsiz track by f">'
								+'<option value="">Size</option>'
							+'</select>'
							+(isset(attrs.optdis)?'':'<select class="optpoint_sel google_fonts_weight" ng-model="bindedModel.w">'
								+'<option value="">Weight</option>'
								+'<option value="normal">Normal</option>'
								+'<option value="bold">Bold</option>'
								+'<option value="lighter">Lighter</option>'
								+'<option value="bolder">Bolder</option>'
								+'<option value="100">100</option>'
								+'<option value="200">200</option>'
								+'<option value="300">300</option>'
								+'<option value="400">400</option>'
								+'<option value="500">500</option>'
								+'<option value="600">600</option>'
								+'<option value="700">700</option>'
								+'<option value="800">800</option>'
								+'<option value="900">900</option>'
							+'</select>'
							+'<select class="optpoint_sel google_fonts_style" ng-model="bindedModel.st">'
								+'<option value="">Style</option>'
								+'<option value="normal">Normal</option>'
								+'<option value="italic">Italic</option>'
								+'<option value="oblique">oblique</option>'
							+'</select>')
						+'</div>'
			},
			scope: {
				bindedModel :"=ngModel"
			},
			link:function($scope){
				$scope.fonts = $scope.$parent.fonts;
				$scope.fontsiz = $scope.$parent.fontsiz;
			}
		};
	});

	optpoint.directive('optcolor', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group optpoint_color">'
							+'<label>'+attrs.optlab+'</label>'
							+'<input minicolors type="text" class="optpoint-color-sel" ng-model="bindedModel" optbm="'+attrs.ngModel.substr(attrs.ngModel.lastIndexOf(".") + 1)+'"/>'
						+'</div>'
			},
			scope: {
				bindedModel :"=ngModel"
			},
			link:function($scope){

			}
		};
	});
	optpoint.directive('opttxts', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group optpoint_txts">'
								+'<label>'+attrs.optlab+'</label>'
								+'<input type="text" class="optpoint_texts" ng-model="bindedModel">'
								+'<span>'+attrs.opttxt+'</span>'
							+'</div>'
			},
			scope: {
				bindedModel :"=ngModel"
			},
			link:function($scope){

			}
		};
	});
	optpoint.directive('optchk', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group optpoint_cb">'
								+'<label><input type="checkbox" ng-true-value="\'1\'" ng-model="bindedModel">  '
								+'<div class="mcheckbox"></div>'+attrs.optlab+'</label>'
								+(isset(attrs.opthint)?'<span class="optpoint_hint" data-hint="'+attrs.opthint+'"></span>':'')
						+'</div>'
			},
			scope: {
				bindedModel :"=ngModel"
			},
			link:function($scope){

			}
		};
	});
	optpoint.directive('optrad', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group optpoint_cb">'
							+'<label><input type="radio" value="'+attrs.optval+'" ng-model="bindedModel"> '
							+attrs.optlab+'</label>'
						+'</div>'
			},
			scope: {
				bindedModel :"=ngModel"
			},
			link:function($scope){

			}
		};
	});
	optpoint.directive('optrange', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '	<div class="optpoint_group optpoint_range">'
							+'<label>'+attrs.optlab+'</label>'
							+'<input type="range" min="0" max="100" class="optpoint-range-sel" ng-model="bindedModel" optbm="'+attrs.ngModel.substr(attrs.ngModel.lastIndexOf(".") + 1)+'">'
						+'</div>'
			},
			scope: {
				bindedModel :"=ngModel"
			},
			link:function($scope,elem,attrs){
				$(elem).find('.optpoint-range-sel')
				.rangeslider({
					polyfill: false,
					onInit: function() {
						$(elem).find('.rangeslider__handle').attr('data-rsval',$scope.bindedModel);
						$scope.$watch('bindedModel', function() {
							$(elem).find('.rangeslider__handle').attr('data-rsval',$scope.bindedModel);
						},true);
					}
				}).val(40).change();
			}
		};
	});
	optpoint.directive('opticon', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group optpoint_dropc ico_sel">'
								+'<label>'+attrs.optlab+'</label>'
								+'<div class="optpoint_drop">'
									+'<div class="optpoint_drop_head"><div ng-class="bindedModel"></div>'
										+'<div class="bar"></div>'
									+'</div>'
									+'<div class="optpoint_drop_body">'
										+'<div class="longcell inone" ng-click="assign(\'inone\')" ng-class="{\'drop-sel\': bindedModel==\'inone\' }"></div>'
										+'<div class="longcell idef" ng-click="assign(\'idef\')" ng-class="{\'drop-sel\': bindedModel==\'idef\' }"></div>'
										+'<div ng-repeat="(k, v) in icons" ng-click="assign(k)" class="{{k}}" ng-class="{\'drop-sel\': k == bindedModel }"></div>'
									+'</div>'
								+'</div>'
							+'</div>'
			},
			scope: {
				bindedModel :"=ngModel"
			},
			link:function($scope){
				$scope.icons = $scope.$parent.icons
				$scope.assign = function(a){
					$scope.bindedModel = a;
				}
			}
		};
	});

	optpoint.directive('optsel', function() {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_group optpoint_dropc">'
						+'<label>'+attrs.optlab+'</label>'
						+'<div class="optpoint_drop">'
							+'<div class="optpoint_drop_head"><div>{{ngHead || '+attrs.opthead+'}}</div>'
							+'<div class="bar"></div>'
							+'</div>'
							+'<div class="optpoint_drop_body">'
							+'<div ng-repeat="(k,v) in ngList" ng-click="sel('+attrs.optclk+')" ng-class="'+attrs.optclass+'">{{'+attrs.optlname+'}}</div>'
							+'</div>'
						+'</div>'
					+'</div>'
			},
			scope: {
				ngList :"=ngList",
				ngClk :"=ngModel",
				ngHead :"=ngHead"
			},
			link:function($scope,elem,attrs){
				$scope.sel = function (k){
					if(isset(attrs.optchange) && $scope.ngClk != k){
						$scope.$parent[attrs.optchange]();
					}
					$scope.ngClk = k;
				}
			}
		};
	});
	optpoint.directive('bindHtmlCompile', ['$compile', function ($compile) {
		return {
			restrict: 'A',
			link: function ($scope, $element, $attrs) {
				$scope.$watch(function () {
					return $scope.$eval($attrs.bindHtmlCompile);
				}, function (value) {
					$element.html(value && value.toString());
					var compileScope = $scope.$parent;
					if ($attrs.bindHtmlScope) {
						compileScope = $scope.$eval($attrs.bindHtmlScope);
					}
					$compile($element.contents())(compileScope);
				});
			}
		};
	}]);
	optpoint.directive('opterr', ['$timeout', function($timeout) {
		return {
			restrict: "E",
			template: function(elem,attrs){
				return '<div class="optpoint_errmsg" ng-if="iserr"><div class="optpoint_errmsgt">'+attrs.err+'</div><div class="optpoint_errmsgc" ng-click="erclo()"></div><div style="clear:both"></div></div>';
			},
			scope: {
				bM :"=ngModel"
			},
			link:function($scope,$element){
				$scope.iserr = 0;
				$scope.iserr = 1;
				$timeout(function(){
					$scope.erclo();
				}, 5000);
				$scope.erclo = function(){
					$scope.iserr = 0;
					$timeout(function(){
						$element.remove();
					}, 1000);
				}
			}
		};
	}]);
	optpoint.filter('livepf',function(){
		return function(input){
			if(input != '' && typeof input !== 'undefined' && usedgoog.indexOf(input) < 0 && optpointset.web_fonts.indexOf(input) < 0){
				usedgoog.push(input);
				requestAnimationFrame(function() {
					WebFont.load({google: {families: [input]}});
				});
			}
			return input;
		};
	});
	optpoint.filter('safe', ['$sce', function($sce){
		return function(text) {
			var decoded = angular.element('<textarea />').html(text).text();
            return $sce.trustAsHtml(decoded);
		};
	}]);
	optpoint.filter('startFrom', function() {
		return function(input, start) {
			start = +start;
			return input.slice(start);
		};
	});

}); }(jQuery));
function isset() {
	var a = arguments,
		l = a.length,
		i = 0,
		undef;
	if (l === 0) {
		throw new Error('Empty isset');
	}
	while (i !== l) {
		if (a[i] === undef || a[i] === null) {
		return false;
		}
		i++;
	}
	return true;
}