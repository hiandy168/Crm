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
		if($("#r_money").val()=="")
		{
			alert("请填写退款金额");
			$("#r_money").select();
			return false;	
		}	
		if($("#r_open_account").val()=="")
		{
			alert("请填写退款开户行");
			$("#r_open_account").select();
			return false;	
		}	
		if($("#r_account").val()=="")
		{
			alert("请填写退款开户账户");
			$("#show_money").select();
			return false;	
		}	
		if($("#r_time").val()=="")
		{
			alert("请选择退款日期");
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
<h3 class="bor-left-bull" >修改退款<small>Refund</small></h3>
<br>
<form action="<?php echo U('upru');?>" method="post" class="form-horizontal" id="formid" >
<input type="hidden" name="id" id="id" value="<?php echo ($info[id]); ?>">
<input type="hidden" name="advertiser" id="advertiser" value="<?php echo ($info[advertiser]); ?>">
<input type="hidden" name="submituser" id="submituser" value="<?php echo ($info[submituser]); ?>">
<h4 class="bor-left-bull" >退款基本信息</h4>
<hr>

  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">广告主公司名称</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" autocomplete="off" name="gongsi" id="gongsi" placeholder="输入客户名称前几个字我们将自动匹配" value="<?php echo ($gongsi); ?>">
    <ul class="dropdown-menu" id="adlist">
	  
    </ul>
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">退款主体</label>
    <div class="col-sm-2">
      <select  class="form-control" name="r_company" id="r_company">        
        <?php if(is_array($agentcompany)): $k = 0; $__LIST__ = $agentcompany;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$agentcompany): $mod = ($k % 2 );++$k;?><option value="<?php echo ($agentcompany["id"]); ?>" title="<?php echo ($agentcompany["title"]); ?>" <?php echo ($info[r_company]==$agentcompany[id]?'selected':''); ?> ><?php echo ($agentcompany["companyname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

      </select>
    </div>
    
  </div>
  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">合同编号</label>
    <div class="col-sm-3">
    	<select  class="form-control" name="contract_no" id="contract_no">
        	 <option value="<?php echo ($info[contract_no]); ?>"><?php echo ($info[contract_no]); ?></option>
    	
        </select>
    </div>
    
    <label for="inputEmail3" class="col-sm-1 control-label">是否开票</label>
    <div class="col-sm-3">
     	<label class="radio-inline">
   	      <input name="ispiao" type="radio" id="type_0" value="0" <?php echo ($info[ispiao]==0?'checked':''); ?> >
   	      未开</label>
   	    <label class="radio-inline">
   	      <input type="radio" name="ispiao" value="1" id="type_1" <?php echo ($info[ispiao]==1?'checked':''); ?>>
   	      已开</label>
    </div>
    </div>
    
   


  
  
  <div class="form-group">
  
    <label for="contract_money" class="col-sm-2 control-label">退款金额</label>
    <div class="col-sm-3">
      	<div class="input-group">
        <input type="text" class="form-control" name="r_money" id="r_money" value="<?php echo ($info[r_money]); ?>">
    	<span class="input-group-addon">元</span>
        </div>
    </div>
    
    <label for="rebates_proportion" class="col-sm-1 control-label">百度账户</label>
    <div class="col-sm-2">      
    	
		<input type="text" class="form-control" name="baiduhu" id="baiduhu" value="<?php echo ($info[baiduhu]); ?>">
    	
    </div>
    
    <label for="show_money" class="col-sm-1 control-label">百度币</label>
    <div class="col-sm-2">      
        <input type="text" class="form-control" name="baidubi" id="baidubi" value="<?php echo ($info[baidubi]); ?>">
       
    </div>
    
  </div>
  <div class="form-group">
  
    <label for="inputEmail3" class="col-sm-2 control-label">退款日期</label>
    <div class="col-sm-3">
    	<input type="text" name="r_time" class="Wdate form-control" id="r_time" onClick="WdatePicker()" value="<?php echo (date("Y-m-d",$info[r_time])); ?>">
    </div>
   


    
  </div>
  
  <h4 class="bor-left-bull" >退款银行信息</h4>
  <hr>
	<div class="form-group">
  
    <label for="payment_type" class="col-sm-2 control-label">退款开户行</label>
    <div class="col-sm-3">
     	<input type="text" name="r_open_account" class="form-control" id="r_open_account" value="<?php echo ($info[r_open_account]); ?>">
    </div>
    
    <label for="payment_time" class="col-sm-1 control-label">退款开户账户</label>
    <div class="col-sm-2">      
		<input type="text" name="r_account" class="form-control" id="r_account" value="<?php echo ($info[r_account]); ?>">
    </div>

    
  </div>
 
  <h4 class="bor-left-bull" >退款备注</h4>
  <hr>
  <div class="form-group">
   <div class="col-sm-12">      
		<textarea class="form-control" name="note" id="note" rows="4"><?php echo ($info[note]); ?></textarea>
   </div>

   </div>
	<h4 class="bor-left-bull" >审核状态</h4>
 	 <hr>
	 <div class="form-group">
    
       <div class="col-sm-12">
       
       <?php echo ($info[audit_1]=='0'?'<span class="shno">一级审核未审核</span>':'<span class="shyes">一级审核已审核</span>'); ?>
       <?php echo ($info[audit_2]=='0'?'<span class="shno">二级审核未审核</span>':'<span class="shyes">二级审核已审核</span>'); ?>  
       </div>
    </div>
    <div class="form-group">
    
       <div class="col-sm-12">
       <button type="submit" class="btn btn-primary">提交申请</button>
       <a href="<?php echo U("shenhe?type=audit_1&id=$info[id]");?>" class="btn btn-primary"  <?php echo ($info[audit_1]!='0'?'style="display:none"':''); ?> >一级审核通过</a>
        <a href="<?php echo U("shenhe?type=audit_2&id=$info[id]");?>" class="btn btn-primary"  <?php echo ($info[audit_2]!='0'?'style="display:none"':''); ?>>二级审核通过</a>
       </div>
    </div>

</form>

</div>
<br>
<br>
<br>

</body>
</html>