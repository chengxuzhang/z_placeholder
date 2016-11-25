<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <title>离开页面询问是否保存页面修改内容</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>
                 .uploadimg{
                  width:100%;height:100%;opacity: 0;display: inline;position: absolute;left:0px;top:0px;
                 }
.uploadbox{
  width:44px;
  height: 44px;
  border:1px dashed #eee;
line-height: 38px;
      display: inline-block;
    margin-bottom: 0;
    margin-right:10px;
    font-size: 14px;
    font-weight: 300;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    /*cursor: pointer;*/
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    /*border-radius: 4px;*/
    position: relative;
    color:red;
}
.uploadbox:hover{
  border-color: #333;
  color: #eee;
}

.viewPic{position: absolute;top:0px;left: 0px;width: 100%;height: 100%;display: none;}
                 .viewPic img{vertical-align:top !important;}
                 </style>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="placeholder.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="layer/layer.js"></script>
  <link rel="stylesheet" href="layer/skin/layer.css">
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
 <div style="width:500px;margin-top:20px;">
  <form action="" class="form-horizontal">
  <div class="form-group">
  <label for="" class="col-sm-2 control-label">帐号：</label>
  <div class="col-sm-10">
   <input type="text" name="username" class="form-control check-number" data-num=20/><br/>
  </div>
   </div>
   <div class="form-group">
   <label for="" class="col-sm-2 control-label">密码：</label>
   <div class="col-sm-10">
   <input type="password" name="password" class="form-control check-number" data-num=20/><br/>
   </div>
   </div>
   <div class="form-group">
   <label for="" class="col-sm-2 control-label">备注：</label>
   <div class="col-sm-10">
   <textarea rows="3" cols="17" class="form-control check-number" data-tip="描述下你自己"></textarea>
   </div>
   </div>
   <div class="form-group">
   <label for="" class="col-sm-2 control-label">图片：</label>
   <div class="col-sm-10">
   <div class="uploadbox">
   <span class="glyphicon glyphicon-plus"></span>
   <input type="file" name="uploadImg" class="uploadimg" data-wh="200*200" title="图片尺寸为200*200">
   <div class="viewPic"></div>
   </div>

   <div class="uploadbox">
   <span class="glyphicon glyphicon-plus"></span>
   <input type="file" name="uploadImg" class="uploadimg" data-wh="200*200" title="图片尺寸为200*200">
   <div class="viewPic"></div>
   </div>

   <div class="uploadbox">
   <span class="glyphicon glyphicon-plus"></span>
   <input type="file" name="uploadImg" class="uploadimg" data-wh="200*200" title="图片尺寸为200*200">
   <div class="viewPic"></div>
   </div>
   </div>
   </div>
   <input type="button" value="提交" class="submit btn btn-primary"/>
  </form>
  </div>

<!-- Modal -->
<div class="modal fade" id="ShowImage_Form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">图片预览</h4>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>

<script src="jquery.form.js" type="text/javascript"></script>
  <script>
    $(function(){
      $(".check-number").placeholder();

      var _URL = window.URL || window.webkitURL;
        $(".uploadimg").change(function (e) {
          var _this = $(this);
          var file, img;
          var wh = _this.attr("data-wh").split("*");
          file = this.files[0];
          if(file.type != "image/jpeg" && file.type != "image/jpg"){
                layer.msg('文件格式错误');
                _this.val("");
                return false;
              }
          if (file) {
            img = new Image();
            img.onload = function () {
              if(this.width != wh[0] || this.height != wh[1]){
                layer.msg('图片尺寸错误');
                _this.val("");
                return false;
              }
              uploadImg(_this);
              // alert(this.width + " " + this.height);
            };
            img.src = _URL.createObjectURL(file);
          }
        });

        $(".viewPic").on("click",".delPic",function(){
          $(this).parent().hide().prev().val("").show();
        });

        $(".viewPic").on("click",".iconImg",function(){
          var source = $(this).attr("src");
          $("#ShowImage_Form").find(".modal-body").html("<img src='"+source+"' class='carousel-inner img-responsive img-rounded' />");
         $("#ShowImage_Form").modal();
        })
    });



function uploadImg(obj){
  var curObj = obj;
      curObj.wrap("<form id='ajaxupload' action='upload.php' method='post' enctype='multipart/form-data'></form>");
      $("#ajaxupload").ajaxSubmit({
        dataType:'json',
        type:'POST',
        data:{filename:"uploadImg"},
        success:function(data){
          if(data.status == 200){
            var src = data.data.url;
            var img = '<img src="'+src+'" width="100%" height="100%" class="iconImg"><span style="position:absolute;top:0px;right:-10px;width:10px;height:10px;font-size:6px;overflow:hidden;line-height:6px;display:block;cursor:pointer;color:red;" class="delPic">×</span>';
            curObj.next().show().html(img);
            curObj.hide();
          }else{
            layer.msg(data.msg);
            curObj.val("");
          }
        },
      });
      curObj.unwrap();
}
  </script>


  
  <a href="https://github.com/chengxuzhang/z_placeholder">github</a>
 </body>
</html>