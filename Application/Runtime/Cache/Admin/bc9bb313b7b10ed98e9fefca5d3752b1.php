<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/admin.css">
<script src="/Public/js/jquery-3.1.0.min.js"></script>
</head>

<body>
<div class="container" style="width:100%;">
<h3 class="bor-left-bull" >添加用户<small>Add users</small></h3>
<hr>
<form action="<?php echo U("addru");?>" method="post" enctype="multipart/form-data" id="addusers">
  <div class="form-group">
    <label for="exampleInputEmail1">用户名</label>
    <input type="text" class="form-control" id="users" name="users" placeholder="Users" required  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">重复密码</label>
    <input type="password" class="form-control" name="fpassword" id="fpassword" placeholder="Verify password" required>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">姓名</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
  </div>

  <div class="form-group">
    <label for="exampleInputFile">头像</label>
    <input type="file" name="image" id="image">
    <p class="help-block">如果不上传会生成一个默认头像..</p>
  </div>
  
   <div class="form-group">
    <label for="exampleInputFile">部门</label>
	<select class="form-control" style="width:200px;" name="groupid">
      <?php if(is_array($grouplist)): $i = 0; $__LIST__ = $grouplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$grouplist): $mod = ($i % 2 );++$i;?><option value="<?php echo ($grouplist[id]); ?>"><?php echo ($grouplist[group_name]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    	
    </select>
    
  </div>

	<hr>
  <button type="submit" class="btn btn-primary" style="width:150px;">提交</button>
</form>
</div>

</body>
</html>