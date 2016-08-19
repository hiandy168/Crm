<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>

<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/admin.css">
<script src="/Public/js/My97DatePicker/WdatePicker.js"></script>
</head>

<body>
<div class="container">
<h3>新增合同<small>New contract</small></h3>
<br>
<form action="<?php echo U('addru');?>" method="post" class="form-horizontal" >
<h4>合同基本信息</h4>
<hr>

  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">广告主公司名称</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">法人代表</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="inputEmail3">
    </div> 
    
    <label for="inputEmail3" class="col-sm-1 control-label">合同编号</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    
  </div>
  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">法定地址</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">代理公司</label>
    <div class="col-sm-2">
      <select  class="form-control">
      	<option>凌众时代</option>
      	<option>谋士</option>
      </select>
    </div>
</div>

<h4>购买产品信息</h4>
<hr>

  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">产品线</label>
    <div class="col-sm-3">
      <select  class="form-control">
      	<option>凌众时代</option>
      	<option>谋士</option>
      </select>
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">推广URL</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div> 

  </div>
  
  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">合同金额</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">返点比例</label>
    <div class="col-sm-1">      
		<input type="text" class="form-control" id="inputEmail3">
    </div>
    
    <label for="inputEmail3" class="col-sm-2 control-label">账户显示金额</label>
    <div class="col-sm-2">      
		<input type="text" class="form-control" id="inputEmail3">
    </div>
    
  </div>
  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">合同有效期</label>
    <div class="col-sm-2">
    	<input id="d4311" class="Wdate form-control" type="text" onFocus="WdatePicker({maxDate:'#F{$dp.$D(\'d4312\')||\'2020-10-01\'}'})"/> 
    </div>
        <div class="col-sm-2">
<input id="d4312" class="Wdate form-control" type="text" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'d4311\')}',maxDate:'2020-10-01'})"/>
    </div>

   

    
  </div>
  
  <h4>付款信息</h4>
  <hr>
	<div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">付款方式</label>
    <div class="col-sm-3">
      <select  class="form-control">
      	<option>凌众时代</option>
      	<option>谋士</option>
      </select>
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">付款日期</label>
    <div class="col-sm-2">      
		<input type="text" class="Wdate form-control" id="inputEmail3" onClick="WdatePicker()">
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">付款金额</label>
    <div class="col-sm-2">      
		<input type="text" class="form-control" id="inputEmail3">
    </div>
    
  </div>
 
  <h4>合同备注</h4>
  <hr>
  <div class="form-group">
   <div class="col-sm-12">      
		<textarea class="form-control" rows="4"></textarea>
   </div>
   <div class="col-sm-2">
   <br>
   <button type="submit" class="btn btn-default">提交</button>
   </div>
   </div>
	

</form>

</div>

</body>
</html>