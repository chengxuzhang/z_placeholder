<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <title>离开页面询问是否保存页面修改内容</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="placeholder.js"></script>
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
   备注：<textarea rows="3" cols="17" class="check-number" data-tip="描述下你自己"></textarea>
   </div>
   <input type="button" value="提交" class="submit"/>
  </form>

  <table id="table">
    <input type="file" name="" id="input">
  </table>

  <script>



    $(function(){
      $(".check-number").placeholder();
    })
  </script>


  
  <a href="https://github.com/chengxuzhang/z_placeholder">github</a>
 </body>
</html>