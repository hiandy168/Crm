<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/admin.css">
</head>

<body>
<div class="container">
<h3>添加用户<small>Add users</small></h3>
<hr>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">用户名</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Users">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">姓名</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Name">
  </div>

  <div class="form-group">
    <label for="exampleInputFile">头像</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">如果不上传会生成一个默认头像..</p>
  </div>
  
   <div class="form-group">
    <label for="exampleInputFile">部门</label>
	<select class="form-control" style="width:200px;">
	  <option value="1">部门1</option>
	  <option value="1">部门2</option>
	  <option value="1">部门3</option>
	  <option value="1">部门4</option>
    	
    </select>
    
  </div>


  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>
</body>
</html>