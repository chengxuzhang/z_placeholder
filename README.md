# z_placeholder
javascript版placeholder解决一些浏览器不支持placeholder属性的问题

## 说明

引入文件placeholder.js

form表单形式(设置data-num会自动有字数限制,如果不设置data-num属性要添加data-tip属性)
```
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
```

页面中js使用

```
$(function(){
    $(".check-number").placeholder();
})
```

## 其他

样式如果存在问题可以在placeholder.js中手动调节