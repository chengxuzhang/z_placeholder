<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <title>离开页面询问是否保存页面修改内容</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript">
  var changeFlag=false;
  //标识文本框值是否改变，为true，标识已变 
  $(document).ready(function(){
       //文本框值改变即触发     
   $("input[type='text']").change(function(){
     changeFlag=true;     
   }); 
   //文本域改变即触发
   $("textarea").change(function(){
     changeFlag=true;     
   }); 
  });

  //  //离开页面时保存文档   
  //  window.onbeforeunload = function(e) {
  //  	e = e || window.event; 
  //  	if(e){
  //  		alert(111);
  //  	}
  //    if(changeFlag ==true){
  //     //如果changeFlag的值为true则提示 
  //     if(confirm("页面值已经修改，是否要保存？")){
  //      //处理信息保存...
  //    alert("即将执行保存操作...");
  //     }else{
  //      //不保存数据...
  //    alert("不保存信息...");
  //     }
  //    }
  //  } 
  window.onbeforeunload = function(e)//绑定刷新等事件
{
if(changeFlag == true){
// var message = '你还没有保存确定要离开？'//设定提示消息
// if ('Netscape' == navigator.appName) return e.preventDefault(),message//针对Netscape内核的提示方式,阻止默认动作 後返回提示消息即可
// window.event.returnValue = message//针对IE等的提示方式
e = e || window.event;  
        // 兼容IE8和Firefox 4之前的版本  
        if (e) {  
            e.returnValue = '关闭提示';  
//            e.returnValue = false;  
        }  
        // Chrome, Safari, Firefox 4+, Opera 12+ , IE 9+  
        return '关闭提示';  
//        return false; 
}
}

$(function(){
	$(".submit").click(function(){
		changeFlag = false;
		var timer = setTimeout(function(){
			window.location.href = 'http://www.baidu.com';
		},2000)
	})
})
 </script>
 </head>
 <body>
  <form action="">
  <div class="form-group">
   帐号：<input type="text" name="username" class="check-number" data-num=20/><br/>
   </div>
   <div class="form-group">
   密码：<input type="text" name="password" class="check-number" data-num=20/><br/>
   </div>
   <div class="form-group">
   备注：<textarea rows="3" cols="17" class="check-number" data-num=100></textarea>
   </div>
   <input type="button" value="提交" class="submit"/>
  </form>

  <table id="table">
    <input type="file" name="" id="input">
  </table>

  <script>

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

    $(function(){
$(".check-number").placeholder();

      $("#input").change(function(){
        alert(111);
      });
    })
  </script>


  
  <a href="http://www.111cn.net">一聚教程网</a>
 </body>
</html>