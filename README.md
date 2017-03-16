# z_placeholder
javascript版placeholder解决一些浏览器不支持placeholder属性的问题

## 预览图

![image](https://github.com/chengxuzhang/z_placeholder/raw/master/show.jpg)

## 说明

下面介绍的是extend.php扩展中的内容，你可以看纯净版本的demo.php，里面只有placeholder的示例。

引入文件resize.min.js  placeholder.min.js

resize.min.js必须引入，因为placeholder中使用到了resize当窗口改变大小的时候做必要的调整

form表单形式(设置data-num会自动有字数限制,如果不设置data-num属性要添加data-tip属性)
```
<form action="" class="form-horizontal">
  <div class="form-group">
  <label for="" class="col-sm-2 control-label">帐号：</label>
  <div class="col-sm-10">
   <input type="text" name="username" class="form-control check-number" data-num=20 /><br/>
  </div>
   </div>
   <div class="form-group">
   <label for="" class="col-sm-2 control-label">密码：</label>
   <div class="col-sm-10">
   <input type="password" name="password" class="form-control check-number" data-num=20 /><br/>
   </div>
   </div>
   <div class="form-group">
   <label for="" class="col-sm-2 control-label">备注：</label>
   <div class="col-sm-10">
   <textarea rows="3" cols="17" class="form-control check-number" data-num=100 data-tip="描述下你自己"></textarea>
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
```

页面中js使用

```
$(function(){
    $(".check-number").placeholder({
      llen:45, // 右下角文字距离左侧的距离
      xlen:5, // placeholder文字距离左侧的距离
      fontSize:12, // placeholder文字大小
      lineHeight:24, // 设置line-height，可使文字居中
    });
})
```

## 图片上传

图片上传后可预览大图，也可以点击删除

图片上传 input属性设置可参见form表单中的实例

尺寸设置
```
<input type="file" name="uploadImg" class="uploadimg" data-wh="200*200" title="图片尺寸为200*200">
```

## 页面离开提示保存

当表单里的内容发生变化后，再离开页面会提示是否保存。

## 其他

样式如果存在问题可以在placeholder.js中手动调节