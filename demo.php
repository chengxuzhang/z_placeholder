<?php 
$data = $_GET;
?>

<form action="" method="get" id="test-form">

	姓名：<input type="text" name="name" value="<?= isset($data['name'])?$data['name']:'' ?>" class="check-num" data-num="10">

	年龄：<input type="text" name="age" value="<?= isset($data['name'])?$data['name']:'' ?>" class="check-num" data-tip="请输入年龄">
	
	职业：<input type="text" name="work" value="<?= isset($data['work'])?$data['work']:'' ?>" placeholder="请输入职业">

	性别：
	<select name="sex">
		<option value="0" <?= (isset($data['sex']) && $data['sex'] == 0)?'selected':'' ?>>男</option>	
		<option value="1" <?= (isset($data['sex']) && $data['sex'] == 1)?'selected':'' ?>>女</option>	
		<option value="2" <?= (isset($data['sex']) && $data['sex'] == 2)?'selected':'' ?>>保密</option>	
	</select>

	<button type="submit">提交</button>
	<button type="reset">重置</button>
	
</form>

<script src="jquery.min.js" type="text/javascript"></script>
<script src="placeholder.js" type="text/javascript"></script>
<script>
	$(function(){
	    $(".check-num").placeholder({
	    	llen:45,
	    	xlen:5,
	    	fontSize:12,
	    	lineHeight:24,
	    });
	})
</script>