// resize小插件
(function($,h,c){var a=$([]),e=$.resize=$.extend($.resize,{}),i,k="setTimeout",j="resize",d=j+"-special-event",b="delay",f="throttleWindow";e[b]=250;e[f]=true;$.event.special[j]={setup:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.add(l);$.data(this,d,{w:l.width(),h:l.height()});if(a.length===1){g()}},teardown:function(){if(!e[f]&&this[k]){return false}var l=$(this);a=a.not(l);l.removeData(d);if(!a.length){clearTimeout(i)}},add:function(l){if(!e[f]&&this[k]){return false}var n;function m(s,o,p){var q=$(this),r=$.data(this,d);r.w=o!==c?o:q.width();r.h=p!==c?p:q.height();n.apply(this,arguments)}if($.isFunction(l)){n=l;return m}else{n=l.handler;l.handler=m}}};function g(){i=h[k](function(){a.each(function(){var n=$(this),m=n.width(),l=n.height(),o=$.data(this,d);if(m!==o.w||l!==o.h){n.trigger(j,[o.w=m,o.h=l])}});g()},e[b])}})(jQuery,this);

$(function(){
	$.fn.extend({
	    placeholder:function(){
	        var changeAttr = false;
	        var _this = this;
	        // ie9存在bug,当内容减少时不会触发
	        _this.bind('input propertychange', function(){
	            var input = $(this);
	            var txt = input.val();
	            var num = parseInt(input.attr("data-num"));
	            var len = txt.length;
	            if(txt == '' || typeof(txt) == undefined){
	                input.attr("clr",0);// 为0时说为空
	                input.prev().show();
	            }
	            if(len>0 && input.attr("clr") == 0 && changeAttr == true){
	                input.prev().hide();
	                input.attr("clr",1);// 为1时不为空
	            }
	            if(len>num && input.attr("data-num") != undefined){
	                var newtxt = txt.substr(0, num);
	                input.val(newtxt);
	            }
	        });
	        _this.each(function(k,v){
	            var vobj = $(v);
	            var vtxt = vobj.val();
	            var div = document.createElement("div");
	            var vw = vobj.width();
	            var vh = vobj.outerHeight();
	            var tip = vobj.attr("data-tip") == undefined?"限制"+vobj.attr("data-num")+"个字":vobj.attr("data-tip");
	            vobj.parent().css({"position":"relative"});
	            vobj.css({"position":"relative"});
	            var vl = vobj.position().left;
	            $(div).css({"position":"absolute","left":(vl+13)+"px","top":"0px","width":vw+"px","height":vh+"px","line-height":"20px","color":"#999999","pointer-events":"none","z-index":"1"}).html(tip);
	            if(vtxt == '' || typeof(vtxt) == undefined){
	                vobj.attr("clr",0);// 为0时为空
	                $(div).css({"display":"block"});
	            }else{
	                vobj.attr("clr",1);// 为1时不为空
	                $(div).css({"display":"none"});
	            }
	            vobj.before(div);
	        });
	        _this.focus(function(){
	            changeAttr = true;
	        });
	        _this.resize(function(){
	            _this.each(function(k,v){
	                var vobj = $(v);
	                var vl = vobj.position().left;
	                vobj.prev().css({"left":(vl+13)+"px"});
	            });
	        });
	    }
	});
})