<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>

<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/admin.css">

<style type="text/css">
	#adlist{ margin-left:15px;}
	#adlist li a{ cursor:pointer;}
	.bzj{ display:none;}
</style>
</head>

<body>
<form action="#" method="post" class="form-horizontal" id="formid" >

<div class="container" style="width:100%;">
<h4 class="bor-left-bull" >请假详细信息</h4>
<hr>
<div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">部门</label>
    <div class="col-sm-2">
     	<label  class="control-label"><strong><?php echo ($info[bumen]); ?></strong></label>

    </div>
    
    <label for="contract_money" class="col-sm-1 control-label">职务</label>
    <div class="col-sm-2">
     	<label  class="control-label"><strong><?php echo ($info[zhiwu]); ?></strong></label>
    </div>
    
      	<label for="inputEmail3" class="col-sm-1 control-label">请假类型</label>
    <div class="col-sm-2">
     	<label  class="control-label"><strong><?php echo ($info[type]); ?></strong></label>
    </div>
  
  </div>
  <div class="form-group">


    
    </div>

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">请假时间</label>
    <div class="col-sm-2">
     	<label  class="control-label"><strong><?php echo (date("Y-m-d",$info[starttime])); ?></strong></label>到
     	<label  class="control-label"><strong><?php echo (date("Y-m-d",$info[endtime])); ?></strong></label>
    </div>
    
	    <label for="inputEmail3" class="col-sm-1 control-label">说明</label>
    <div class="col-sm-3">
     	<label  class="control-label"><strong><?php echo ($info[shuoming]); ?></strong></label>
    </div>
    
  </div>

 
  <h4 class="bor-left-bull" >请假事由</h4>
  <hr>
  <div class="form-group">
   <div class="col-sm-12">      
     	<label  class="control-label"><strong><?php echo ($info[shiyou]); ?></strong></label>
   </div>

   </div>
<br>
<br>


	<h4 class="bor-left-bull" >审核状态</h4>
 	 <hr>
	 <div class="form-group">
    
       <div class="col-sm-12">
       
       <?php echo ($info[audit_1]=='0'?'<span class="shno">未审核</span>':'<span class="shyes">已审核</span>'); ?>
       </div>
    </div>
    <div class="form-group">
    
       <div class="col-sm-12">
        <button type="button" class="btn btn-primary" onClick="javascript:history.go(-1)">返回</button>
       <a href="<?php echo U("shenhe?type=audit_1&id=$info[id]");?>" class="btn btn-primary"  <?php echo ($info[audit_1]!='0'?'style="display:none"':''); ?> >审核通过</a>
       </div>
    </div>

</form>

</div>
<br>
<br>
<br>

</body>
</html>