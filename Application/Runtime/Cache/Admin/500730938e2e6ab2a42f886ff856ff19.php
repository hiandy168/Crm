<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>

<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/admin.css">
<script src="/Public/js/My97DatePicker/WdatePicker.js"></script>
<script src="/Public/js/jquery-3.1.0.min.js"></script>
<script language="javascript">
	$(document).ready(function(e) {
				
		//动态加载公司名称
		$("#gongsi").keyup(function(){
			//$("#hjd").html($("#hjd").html()+"1");
			val=$(this).val();
			$.post("<?php echo U('keyup_adlist');?>",{val:val},function(data){
					$("#adlist").html(data);
			})
			$("#adlist").show();
		})
		
		$("#adlist").on("click","a",function(){
			
			$.post("<?php echo U('no_list');?>",{id:$(this).attr("id")},function(data){
					$("#contract_no").html(data);
			})
			
			$("#advertiser").val($(this).attr("id"));
			$("#submituser").val($(this).attr("title"));
			$("#gongsi").val(($(this).html()));
			$("#adlist").hide();
			//$("#gongsi").html(data);
		})
		


				
		$("#formid").submit(function(){
	
		if($("#gongsi").val()=="")
		{
			alert("请填写公司名称");
			$("#gongsi").select();
			return false;	
		}	
		if($("#contract_no").val()=="")
		{
			alert("请选择合同编号");
			return false;	
		}	
		if($("#d_money").val()=="")
		{
			alert("请填写垫款金额");
			$("#d_money").select();
			return false;	
		}	

		if($("#r_time").val()=="")
		{
			alert("请选择垫款日期");
			return false;	
		}	
		if($("#back_money_time").val()=="")
		{
			alert("请选择垫款日期");
			return false;	
		}	


				
	})
    });
</script>
<style type="text/css">
	#adlist{ margin-left:15px;}
	#adlist li a{ cursor:pointer;}
	.bzj{ display:none;}
</style>
</head>

<body>
<?php echo ($hjd); ?>
<span id="hjd"></span>
<div class="container" style="width:100%;">
<h3 class="bor-left-bull" >添加垫款<small>Refund</small></h3>
<br>
<form action="<?php echo U('addru');?>" method="post" class="form-horizontal" enctype="multipart/form-data"  id="formid" >
<input type="hidden" name="advertiser" id="advertiser">
<input type="hidden" name="submituser" id="submituser">
<h4 class="bor-left-bull" >垫款基本信息</h4>
<hr>

  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">广告主公司名称</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" autocomplete="off" name="gongsi" id="gongsi" placeholder="输入客户名称前几个字我们将自动匹配">
    <ul class="dropdown-menu" id="adlist">
	  
    </ul>
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">垫款主体</label>
    <div class="col-sm-2">
      <select  class="form-control" name="d_company" id="d_company">        
        <?php if(is_array($agentcompany)): $k = 0; $__LIST__ = $agentcompany;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$agentcompany): $mod = ($k % 2 );++$k;?><option value="<?php echo ($agentcompany["id"]); ?>" title="<?php echo ($agentcompany["title"]); ?>"><?php echo ($agentcompany["companyname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

      </select>
    </div>
    
  </div>
  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">合同编号</label>
    <div class="col-sm-3">
    	<select  class="form-control" name="contract_no" id="contract_no">
        	 
    	
        </select>
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">是否开票</label>
    <div class="col-sm-3">
     	<label class="radio-inline">
   	      <input name="ispiao" type="radio" id="type_0" value="0" checked>
   	      未开</label>
   	    
   	    <label class="radio-inline">
   	      <input type="radio" name="ispiao" value="1" id="type_1">
   	      已开</label>
    </div>
    </div>
    
   


  
  
  <div class="form-group">
  
    <label for="contract_money" class="col-sm-2 control-label">垫款金额</label>
    <div class="col-sm-3">
      	<div class="input-group">
        <input type="text" class="form-control" name="d_money" id="d_money">
    	<span class="input-group-addon">元</span>
        </div>
    </div>
    
    <label for="rebates_proportion" class="col-sm-1 control-label">垫款账户名称</label>
    <div class="col-sm-2">      
    	
		<input type="text" class="form-control" name="d_account_name" id="d_account_name">
    	
    </div>
    
    <label for="show_money" class="col-sm-1 control-label">APP名称</label>
    <div class="col-sm-2">      
        <input type="text" class="form-control" name="appName" id="appName">
       
    </div>
    
  </div>
  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">垫款日期</label>
    <div class="col-sm-3">
    	<input type="text" name="d_time" class="Wdate form-control" id="d_time" onClick="WdatePicker()">
    </div>
    <label for="inputEmail3" class="col-sm-1 control-label">预计回款日期</label>
    <div class="col-sm-2">
    	<input type="text" name="back_money_time" class="Wdate form-control" id="back_money_time" onClick="WdatePicker()">
    </div>
   

   

    
  </div>
  
  <h4 class="bor-left-bull" >上传垫款客户确认文件</h4>
  <hr>
	<div class="form-group">
  
    <label for="payment_type" class="col-sm-2 control-label">选择文件</label>
    <div class="col-sm-3">
        <input name="file[]" type="file" multiple>
    </div>

    
  </div>
  <h4 class="bor-left-bull" >垫款备注</h4>
  <hr>
  <div class="form-group">
   <div class="col-sm-12">      
		<textarea class="form-control" name="note" id="note" rows="4"></textarea>
   </div>

   </div>
	
    <div class="form-group">
    
       <div class="col-sm-2">
       <button type="submit" class="btn btn-primary">提交申请</button>
       </div>
    </div>

</form>

</div>
<br>
<br>
<br>

</body>
</html>