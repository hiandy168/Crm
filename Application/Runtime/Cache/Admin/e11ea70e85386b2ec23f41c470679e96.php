<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/reset.css"/>
    <link rel="stylesheet" href="/Public/css/persion.css"/>
    <script src="/Public/js/jquery-3.1.0.min.js"></script>

    <title><?php echo ($web_title); ?></title>
    <style>
        .xiao{
            color: #ffffff;
            background: #0398cb;
        }
        .li1,.li2,.li3,.li4,.li5,.li6,.li7,.li8{
            display: none;
            position: relative;
            /*position: absolute;*/
            /*left: 100%;*/
            /*top:0;*/
            float: left;
            width: 10%;
            height: 100%;
            color: #333333;
            text-align:left;
            background: #e9ebf0;
        }


    </style>
    <script language="javascript">
	$(document).ready(function(e) {
        $(".liebiao").click(function(){
			$("#jiazai").show();
			$(".liebiao").removeClass("xz");
			iformurl=$(this).attr("id");
			$("#frame").attr("src",iformurl);
			$(this).addClass("xz");
			$("#frame").on("load",this,function(){
				$("#jiazai").hide();
			})
		})
		$(".iform_ck").click(function(){
            $("#jiazai").show();
			iformurl=$(this).attr("id");
			$("#frame").attr("src",iformurl);
			
			$("#frame").on("load",this,function(){
				$(".out").hide()
            	$(".no").css('transition-duration','0.3s').css('transform','rotate(0deg)')
            	user1=1;
				$("#jiazai").hide();
				//alert('加载完成');	
			})
			move();
		})
		
		window.setInterval(showalert, 4000); 
		function showalert() 
		{ 
			//待办
			$.get("<?php echo U("daiban");?>",function(data){
				$("#daiban").html(data);
			})
			//消息
			$.get("<?php echo U("txing");?>",function(json){
					var str=json.str;
			
					if(json.count>0){
			
					Notification.requestPermission(function(permission){
						var notification = new Notification("您有新的提醒哦~",{body:str,icon:'http://c.lzad.cc/Public/images/images/logo.png',dir:'auto'});
					});
					}
			})
		} 
		
    });
	
</script>
<link rel="icon" href="/favicon.ico" /> 
</head>
<body style="overflow:hidden;">

<div class="title clear">
    <div style="float: left">
        <span style="margin-left: 30px;">
        CRM管理控制台
        </span>
    </div>
    <div style="float:right;">
        <span class="xiaoxi iform_ck" id="<?php echo U('Public/usermessage');?>">
                <img src="/Public/images/admin/消息.png" alt="" style="vertical-align: middle;margin-right: 5px;"/>待办
                <span class="badge" id="daiban" style="background:#fe4e4b;">
                    <?php echo ($daiban); ?>
                </span>
        </span><span class="help iform_ck" id="<?php echo U('Public/help');?>">
            <img src="/Public/images/admin/帮助.png" alt="" style="vertical-align: middle;margin-right: 5px;"/>
            <span class="help1">
                帮助
            </span>
        </span><span class="user">
            <img  src="<?php echo (cookie('u_image')); ?>" width="30" height="30" class="img-circle" alt="" style="vertical-align: middle;margin-right: 5px;"/>
            <span class="help1">
               <?php echo (cookie('u_name')); ?>
            </span>
            <img src="/Public/images/admin/下三角.png" alt="" style="vertical-align: middle;" class="no"/>
        </span>
    </div>
    <div class="out">
        <p><a id="<?php echo U("users/updata?id=$sessionuid");?>" class="iform_ck" style=" width:auto; height:auto; text-align:left;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改个人信息</a></p>
        <p><a href="<?php echo U("Public/login_out");?>"><span class="glyphicon glyphicon-off"></span>&nbsp;退出</a></p>
    </div>
    
</div>
<div class="clear" style="height:95%;">
    <div class="left">
        <p class="suo">
            <img src="/Public/images/admin/三个丨.png" alt="" style="vertical-align: middle;"/>
        </p>
        <p class="fuwu-1">
            <img src="/Public/images/admin/下三角.png" alt="" style="vertical-align: middle;"/>
            <span style="margin-right: 20px;margin-left: 10px;" class="yin">服务列表</span>
            <img src="/Public/images/admin/设置.png"  class="yin" alt="" style="vertical-align: middle"/>
        </p>
            <ul class="client">
                <li>
                    <img src="/Public/images/admin/客户管理.png" alt="" style="vertical-align: middle"/>
                    <span style="margin-left:10px;">客户管理</span>
                    <div class="biao">
                        客户管理
                    </div>
                </li>
                <li>
                    <img src="/Public/images/admin/合同管理.png" alt="" style="vertical-align: middle"/>
                    <span style="margin-left:10px;">合同管理</span>
                    <div class="biao">
                        合同管理
                    </div>
                </li>
                <li>
                    <img src="/Public/images/admin/财务管理.png" alt="" style="vertical-align: middle"/>
                    <span style="margin-left:10px;">财务管理</span>
                    <div class="biao">
                        财务管理
                    </div>
                </li>
                <li>
                    <img src="/Public/images/admin/账户管理.png" alt="" style="vertical-align: middle"/>
                    <span style="margin-left:10px;">账户管理</span>
                    <div class="biao">
                        账户管理
                    </div>
                </li>
                <li>
                    <img src="/Public/images/admin/人事管理.png" alt="" style="vertical-align: middle"/>
                    <span style="margin-left:10px;">人事管理</span>
                    <div class="biao">
                        人事管理
                    </div>
                </li>
            </ul>


        <p class="fuwu-1">
            <img src="/Public/images/admin/下三角.png" alt="" style="vertical-align: middle;"/>
            <span style="margin-right: 20px;margin-left: 10px;" class="yin">用户中心</span>
            <img src="/Public/images/admin/设置.png" alt=""  class="yin" style="vertical-align: middle"/>
        </p>
        <ul class="client1">
            <li>
                <img src="/Public/images/admin/账号管理.png" alt="" style="vertical-align: middle"/>
                <span style="margin-left:10px;">账号管理</span>
                <div class="biao">
                    账号管理
                </div>
            </li>
            <li>
                <img src="/Public/images/admin/消息中心.png" alt="" style="vertical-align: middle"/>
                <span style="margin-left:10px;">消息中心</span>
                <div class="biao">
                    消息中心
                </div>
            </li>
            <li>
                <img src="/Public/images/admin/记事本.png" alt="" style="vertical-align: middle"/>
                <span style="margin-left:10px;">写消息&nbsp;&nbsp;&nbsp;</span>
                <div class="biao">
                    写消息
                </div>
            </li>
        </ul>



    </div>
    <div class="toc">
        <div class="li1">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
               	客户管理
            </div>
            <div class="liebiao" id="<?php echo U('Customer/add');?>">
                <a >新客户意向</a>
            </div>
            <div class="liebiao" id="<?php echo U('Customer/index');?>">
                <a  >客户列表</a>
            </div>
            <div class="liebiao" id="<?php echo U('Mv/index');?>">
                <a  >客户转移</a>
            </div>
        </div>
        <div class="li2">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
                合同管理
            </div>
            <div class="liebiao" id="<?php echo U('Contract/add');?>" >
                <a>新合同意向</a>
            </div>
            <div class="liebiao" id="<?php echo U('Contract/index');?>">
                <a >合同列表</a>
            </div>
            <div class="liebiao" id="<?php echo U('Contract/index?httype=2');?>">
                <a >框架合同列表</a>
            </div>
        </div>
        <div class="li3">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
                财务管理
            </div>
            <div class="liebiao" id="<?php echo U("Diankuan/index");?>">
                <a>垫款管理</a>
            </div>
            <div class="liebiao" id="<?php echo U("Backmoney/index");?>">
                <a>回款管理</a>
            </div>
            <div class="liebiao" id="<?php echo U("Refund/index");?>">
                <a>退款管理</a>
            </div>
            <div class="liebiao" id="<?php echo U("Invoice/index");?>">
                <a>发票管理</a>
            </div>
            <div class="liebiao" id="<?php echo U("RefundInvoice/index");?>">
                <a>退票管理</a>
            </div>
        </div>
        <div class="li4">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
                账户管理
            </div>
            <div class="liebiao" id="<?php echo U("Account/add");?>">
                <a>新账户意向</a>
            </div>
            <div class="liebiao" id="<?php echo U("Account/index");?>">
                <a>账户列表</a>
            </div>
        </div>
        <div class="li5">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
                人事管理
            </div>
            <div class="liebiao" id="<?php echo U("Waichu/index");?>">
                <a>外出</a>
            </div>
            <div class="liebiao" id="<?php echo U("holiday/index");?>">
                <a>请假</a>
            </div>
        </div>
        <div class="li6">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
                账号管理
            </div>
            <div class="liebiao" id="<?php echo U('Users/add');?>" >
                <a>新建账号</a>
            </div>
            <div class="liebiao" id="<?php echo U('Users/index');?>" >
                <a>账号列表</a>
            </div>
            <div class="liebiao" id="<?php echo U('Groupl/add');?>" >
                <a>新建职位</a>
            </div>
            <div class="liebiao" id="<?php echo U('Groupl/index');?>" >
                <a>职位列表</a>
            </div>
            <div class="liebiao" id="<?php echo U('Rbac/add');?>" >
                <a>新建权限</a>
            </div>
            <div class="liebiao" id="<?php echo U('Rbac/index');?>" >
                <a>权限列表</a>
            </div>
        </div>
        <div class="li7">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
                消息中心
            </div>
            <div class="liebiao" id="<?php echo U('Email/message');?>">
                <a>消息列表</a>
            </div>
			<div class="liebiao" id="<?php echo U('Public/log');?>">
                <a>登录日志</a>
            </div>

        </div>
        <div class="li8">
            <img src="/Public/images/admin/收起.png" alt="" class="shou"/>
            <div class="guanli">
                写信
            </div>
            <div class="liebiao"  id="<?php echo U('Email/add');?>">
                <a>新建消息</a>
            </div>
            <div class="liebiao" id="<?php echo U('Email/index');?>">
                <a>已发送消息</a>
            </div>
        </div>
        

    </div>
    <div class="right" style="overflow:hidden; height:92%;">
    	<div id="jiazai"><img src="/Public/images/images/jiazai2.gif" ><br>
		<h2>加载中...</h2>
        </div>
        <iframe src="<?php echo U('Public/usermessage');?>" frameborder="0" id="frame"></iframe>
    </div>
</div>
<script>
	/*
    $(".liebiao").hover(function(){
        $(this).css("color","#666666").css("background","#ffffff")
    },function(){
        $(this).css("color","#333333").css("background",'#e9ebf0')
    })
	*/
    var flag= 1,flag1= 1,toc= 1,li1= 1;

    $(".fuwu-1").eq(0).click(function(){
        if(flag==1){
            $(this).find("img").eq(0).attr("src","/Public/images/admin/右三角.png")
            $(".client").slideUp();
            flag=0;
        }else if(flag==0){
            $(this).find("img").eq(0).attr("src","/Public/images/admin/下三角.png")
            $(".client").slideDown();
            flag=1;
        }
    });
    $(".fuwu-1").eq(1).click(function(){
        if(flag1==1){
            $(this).find("img").eq(0).attr("src","/Public/images/admin/右三角.png")
            $(".client1").slideUp();
            flag1=0;
        }else if(flag1==0){
            $(this).find("img").eq(0).attr("src","/Public/images/admin/下三角.png")
            $(".client1").slideDown();
            flag1=1;
        }
    })

    function move(){
        xuan=1;
        li1=1;
        li2=1;
        li3=1;
        li4=1;
        li5=1;
        li6=1;
        li7=1;
        li8=1;
        xuan2=1;
        xuan3=1;
        xuan4=1;
        xuan5=1;
        xuan6=1;
        xuan7=1;
        xuan8=1;
        $(".li1").hide().siblings().hide();
        $(".client1 li").css("color","#999999").css('background','#3d3f46')
        $(".client li").css("color","#999999").css('background','#3d3f46');
        $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
        $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
        $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
        $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
        $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
        $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
        $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')
        $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }

    }
    var xuan=1;
    $(".left li").eq(0).hover(function(){
        if(xuan==1){
            $(this).find("img").attr("src",'/Public/images/admin/客户管理1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }

        if(suojin==0){
            $(".biao").eq(0).show();
        }
    },function(){
        if(xuan==1){
            $(this).find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }
        if(suojin==0){
            $(".biao").eq(0).hide();
        }
    }).click(function(){
        if(li1==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
            $(".li1").show().siblings().hide();
//            $(".li1").show().siblings().hide();
            $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
            $(".client1 li").css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/客户管理1.png')
//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
            $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
            $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
            $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
            $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
            $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')
            $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')



//            toc=0;
            if(suojin==1){
                $(".right").width("78%")
            }else{
                $(".right").width("85%")
            }
            xuan=0;
            li1=0
            li2=1
            li3=1
            li4=1
            li5=1
            li6=1
            li7=1
            li8=1
            xuan2=1
            xuan3=1
            xuan4=1
            xuan5=1
            xuan6=1
            xuan7=1
            xuan8=1


        }else{
            $(".li1").hide();
            if(suojin==1){
                $(".right").width("88%")
            }else{
                $(".right").width("95%")
            }
            $(this).css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/客户管理.png')

            xuan=1;
//            toc=1;
            li1=1;
//            $(this).bind("hover");
        }

    });
    $(".shou").eq(0).click(function(){
//        $(".left li").eq(0).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')

        $(".li1").hide();
//        toc=1;
        xuan=0;
        li1=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })

//    ========================================================================================================================================
        var li2= 1,xuan2=1;
    $(".left li").eq(1).hover(function(){
        if(xuan2==1){
            $(this).find("img").attr("src",'/Public/images/admin/合同管理1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }

        if(suojin==0){
            $(".biao").eq(1).show();
        }
    },function(){
        if(xuan2==1){
            $(this).find("img").attr("src",'/Public/images/admin/合同管理.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }

        if(suojin==0){
            $(".biao").eq(1).hide();
        }
    }).click(function(){
        if(li2==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
            $(".li2").show().siblings().hide();

//            $(".li1").show().siblings().hide();
            $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
            $(".client1 li").css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/合同管理1.png')
            $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
            $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
            $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
            $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
            $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')
            $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')

//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')
            xuan2=0;
            toc=0;
            if(suojin==1){
                $(".right").width("78%")
            }else{
                $(".right").width("85%")
            }
            li2=0
            li1=1
            li3=1
            li4=1
            li5=1
            li6=1
            li7=1
            li8=1
            xuan=1
            xuan3=1
            xuan4=1
            xuan5=1
            xuan6=1
            xuan7=1
            xuan8=1

        }else{
            $(".li2").hide();
            if(suojin==1){
                $(".right").width("88%")
            }else{
                $(".right").width("95%")
            }
            $(this).css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/合同管理.png')
            xuan2=1;
            toc=1;
            li2=1;
//            $(this).bind("hover");
        }
    })

    $(".shou").eq(1).click(function(){
//        $(".left li").eq(1).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/合同管理.png')

        $(".li2").hide();
        toc=1;
        xuan2=0;
        li2=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })
//==============================================================================================================================================
    var li3= 1,xuan3=1;
    $(".left li").eq(2).hover(function(){
        if(xuan3==1){
            $(this).find("img").attr("src",'/Public/images/admin/财务管理1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }

        if(suojin==0){
            $(".biao").eq(2).show();
        }
    },function(){
        if(xuan3==1){
            $(this).find("img").attr("src",'/Public/images/admin/财务管理.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }
        if(suojin==0){
            $(".biao").eq(2).hide();
        }
    }).click(function(){
        if(li3==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
            $(".li3").show().siblings().hide();

//            $(".li1").show().siblings().hide();
            $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
            $(".client1 li").css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/财务管理1.png')
            $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
            $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
            $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
            $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
            $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')
            $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')

//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')

            toc=0;
            if(suojin==1){
                $(".right").width("78%")
            }else{
                $(".right").width("85%")
            }
            xuan3=0;
            li3=0
            li1=1
            li2=1
            li4=1
            li5=1
            li6=1
            li7=1
            li8=1
            xuan=1
            xuan2=1
            xuan4=1
            xuan5=1
            xuan6=1
            xuan7=1
            xuan8=1

        }else{
            $(".li3").hide();
            if(suojin==1){
                $(".right").width("88%")
            }else{
                $(".right").width("95%")
            }
            $(this).css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/财务管理.png')
            xuan3=1;
            toc=1;
            li3=1;
//            $(this).bind("hover");
        }
    })

    $(".shou").eq(2).click(function(){
//        $(".left li").eq(1).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/合同管理.png')

        $(".li3").hide();
        toc=1;
        xuan3=0;
        li3=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })
//    ============================================================================================================

    var li4= 1,xuan4=1;
    $(".left li").eq(3).hover(function(){
        if(xuan4==1){
            $(this).find("img").attr("src",'/Public/images/admin/账户管理1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }
        if(suojin==0){
            $(".biao").eq(3).show();
        }
    },function(){
        if(xuan4==1){
            $(this).find("img").attr("src",'/Public/images/admin/账户管理.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }
        if(suojin==0){
            $(".biao").eq(3).hide();
        }
    }).click(function(){
        if(li4==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
            $(".li4").show().siblings().hide();

//            $(".li1").show().siblings().hide();
            $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
            $(".client1 li").css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/账户管理1.png')
            $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
            $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
            $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
            $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
            $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')
            $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')

//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')

            toc=0;
            if(suojin==1){
                $(".right").width("78%")
            }else{
                $(".right").width("85%")
            }
            xuan4=0;
            li4=0
            li1=1
            li2=1
            li3=1
            li5=1
            li6=1
            li7=1
            li8=1

            xuan=1
            xuan2=1
            xuan3=1
            xuan5=1
            xuan6=1
            xuan7=1
            xuan8=1

        }else{
            $(".li4").hide();
            if(suojin==1){
                $(".right").width("88%")
            }else{
                $(".right").width("95%")
            }
            $(this).css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/账户管理.png')
            xuan4=1;
            toc=1;
            li4=1;
//            $(this).bind("hover");
        }
    })

    $(".shou").eq(3).click(function(){
//        $(".left li").eq(1).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/合同管理.png')

        $(".li4").hide();
        toc=1;
        xuan4=0;
        li4=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })
    //    ============================================================================================================
    var li5=1,xuan5=1;
    $(".left li").eq(4).hover(function(){
        if(xuan5==1){
            $(this).find("img").attr("src",'/Public/images/admin/人事管理1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }

        if(suojin==0){
            $(".biao").eq(4).show();
        }
    },function(){
        if(xuan5==1){
            $(this).find("img").attr("src",'/Public/images/admin/人事管理.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }

        if(suojin==0){
            $(".biao").eq(4).hide();
        }
    }).click(function(){
        if(li5==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
            $(".li5").show().siblings().hide();

//            $(".li1").show().siblings().hide();
            $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
            $(".client1 li").css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/人事管理1.png')
            $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
            $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
            $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
            $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
            $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')
            $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')

//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')

            toc=0;
            if(suojin==1){
                $(".right").width("78%")
            }else{
                $(".right").width("85%")
            }
            xuan5=0;
            li5=0
            li1=1
            li2=1
            li3=1
            li4=1
            li6=1
            li7=1
            li8=1
            xuan=1
            xuan2=1
            xuan3=1
            xuan4=1
            xuan6=1
            xuan7=1
            xuan8=1

        }else{
            $(".li5").hide();
            if(suojin==1){
                $(".right").width("88%")
            }else{
                $(".right").width("95%")
            }
            $(this).css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/人事管理.png')
            xuan5=1;
            toc=1;
            li5=1;
//            $(this).bind("hover");
        }
    })

    $(".shou").eq(4).click(function(){
//        $(".left li").eq(1).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/合同管理.png')

        $(".li5").hide();
        toc=1;
        xuan5=0;
        li5=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })
    //    ============================================================================================================
    var li6=1,xuan6=1;
    $(".left li").eq(5).hover(function(){
        if(xuan6==1){
            $(this).find("img").attr("src",'/Public/images/admin/账号管理1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }
        if(suojin==0){
            $(".biao").eq(5).show();
        }
    },function(){
        if(xuan6==1){
            $(this).find("img").attr("src",'/Public/images/admin/账号管理.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }
        if(suojin==0){
            $(".biao").eq(5).hide();
        }
    }).click(function(){
        if(li6==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
            $(".li6").show().siblings().hide();

//            $(".li1").show().siblings().hide();
            $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
            $(".client li").css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/账号管理1.png')
            $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
            $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
            $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
            $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
            $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')
            $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')

//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')

            toc=0;
            if(suojin==1){
                $(".right").width("78%")
            }else{
                $(".right").width("85%")
            }
            xuan6=0;
            li6=0
            li1=1
            li2=1
            li3=1
            li4=1
            li5=1
            li7=1
            li8=1
            xuan=1
            xuan2=1
            xuan3=1
            xuan4=1
            xuan5=1
            xuan7=1
            xuan8=1

        }else{
            $(".li6").hide();
            if(suojin==1){
                $(".right").width("88%")
            }else{
                $(".right").width("95%")
            }
            $(this).css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/账号管理.png')
            xuan6=1;
            toc=1;
            li6=1;
//            $(this).bind("hover");
        }
    })

    $(".shou").eq(5).click(function(){
//        $(".left li").eq(1).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/合同管理.png')

        $(".li6").hide();
        toc=1;
        xuan6=0;
        li6=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })
    //    ============================================================================================================
    var li7=1,xuan7=1;
    $(".left li").eq(6).hover(function(){
        if(xuan7==1){
            $(this).find("img").attr("src",'/Public/images/admin/消息中心1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }

        if(suojin==0){
            $(".biao").eq(6).show();
        }
    },function(){
        if(xuan7==1){
            $(this).find("img").attr("src",'/Public/images/admin/消息中心.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }
        if(suojin==0){
            $(".biao").eq(6).hide();
        }
    }).click(function(){
        if(li7==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
            $(".li7").show().siblings().hide();

//            $(".li1").show().siblings().hide();
            $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
            $(".client li").css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/消息中心1.png')
            $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
            $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
            $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
            $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
            $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
            $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
            $(".left li").eq(7).find("img").attr("src",'/Public/images/admin/记事本.png')

//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')

            toc=0;
            if(suojin==1){
                $(".right").width("78%")
            }else{
                $(".right").width("85%")
            }
            xuan7=0;
            li7=0
            li1=1
            li2=1
            li3=1
            li4=1
            li5=1
            li6=1
            li8=1
            xuan=1
            xuan2=1
            xuan3=1
            xuan4=1
            xuan5=1
            xuan6=1
            xuan8=1

        }else{
            $(".li7").hide();
            if(suojin==1){
                $(".right").width("88%")
            }else{
                $(".right").width("95%")
            }
            $(this).css("color","#999999").css('background','#3d3f46')
            $(this).find("img").attr("src",'/Public/images/admin/消息中心.png')
            xuan7=1;
            toc=1;
            li7=1;
//            $(this).bind("hover");
        }
    })

    $(".shou").eq(6).click(function(){
//        $(".left li").eq(1).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/合同管理.png')

        $(".li7").hide();
        toc=1;
        xuan7=0;
        li7=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })
    //    ============================================================================================================
    var li8=1,xuan8=1;
    $(".left li").eq(7).hover(function(){
        if(xuan8==1){
            $(this).find("img").attr("src",'/Public/images/admin/记事本1.png')
            $(this).css("color","#ffffff").css('background','#394555')
        }
        if(suojin==0){
            $(".biao").eq(7).show();
        }
    },function(){
        if(xuan8==1){
            $(this).find("img").attr("src",'/Public/images/admin/记事本.png')
            $(this).css("color","#999999").css('background','#3d3f46')
        }
//        $(this).find("img").attr("src",'/Public/images/admin/记事本.png')
        if(suojin==0){
            $(".biao").eq(7).hide();
        }
    }).click(function(){
                if(li8==1){
//            $(this).unbind();
//            $(this).unbind("mouseenter").unbind("mouseleave");
                    $(".li8").show().siblings().hide();

//            $(".li1").show().siblings().hide();
                    $(this).css("color","#ffffff").css('background','#0398cb').siblings().css("color","#999999").css('background','#3d3f46')
                    $(".client li").css("color","#999999").css('background','#3d3f46')
                    $(this).find("img").attr("src",'/Public/images/admin/记事本1.png')
                    $(".left li").eq(0).find("img").attr("src",'/Public/images/admin/客户管理.png')
                    $(".left li").eq(1).find("img").attr("src",'/Public/images/admin/合同管理.png')
                    $(".left li").eq(2).find("img").attr("src",'/Public/images/admin/财务管理.png')
                    $(".left li").eq(3).find("img").attr("src",'/Public/images/admin/账户管理.png')
                    $(".left li").eq(4).find("img").attr("src",'/Public/images/admin/人事管理.png')
                    $(".left li").eq(5).find("img").attr("src",'/Public/images/admin/账号管理.png')
                    $(".left li").eq(6).find("img").attr("src",'/Public/images/admin/消息中心.png')

//            $(this).siblings().css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/客户管理.png')

                    toc=0;
                    if(suojin==1){
                        $(".right").width("78%")
                    }else{
                        $(".right").width("85%")
                    }
                    xuan8=0;
                    li8=0
                    li1=1
                    li2=1
                    li3=1
                    li4=1
                    li5=1
                    li6=1
                    li7=1
                    xuan=1
                    xuan2=1
                    xuan3=1
                    xuan4=1
                    xuan5=1
                    xuan6=1
                    xuan7=1

                }else{
                    $(".li8").hide();
                    if(suojin==1){
                        $(".right").width("88%")
                    }else{
                        $(".right").width("95%")
                    }
                    $(this).css("color","#999999").css('background','#3d3f46')
                    $(this).find("img").attr("src",'/Public/images/admin/记事本.png')
                    xuan8=1;
                    toc=1;
                    li8=1;
//            $(this).bind("hover");
                }
            })

    $(".shou").eq(7).click(function(){
//        $(".left li").eq(1).css("color","#999999").css('background','#3d3f46').find("img").attr("src",'/Public/images/admin/合同管理.png')

        $(".li8").hide();
        toc=1;
        xuan8=0;
        li8=1;
        if(suojin==1){
            $(".right").width("88%")
        }else{
            $(".right").width("95%")
        }
//		 $(".right").width("88%");
    })
    //    ============================================================================================================
var suojin=1;

    $(".suo").click(function(){
        if(suojin==1){
            $(".left").width("5%");
            if(toc==0){
                $(".right").width("85%");
            }else{
                $(".right").width("95%");
            }


            $(this).find("img").attr("src","/Public/images/admin/三个横.png")
            $(".yin").hide();
            $(".client span").hide();
            $(".client1 span").hide();
            suojin=0;
        }else if(suojin==0){
            $(".left").width("12%");
            if(toc==0){
                $(".right").width("78%");
            }else{
                $(".right").width("88%");
            }

            $(this).find("img").attr("src","/Public/images/admin/三个丨.png")
            $(".yin").show();
            $(".client span").show();
            $(".client1 span").show();
            suojin=1;
        }
	
    })

    var user1=1;

    $(".user").click(function(){
        if(user1==1){
            $(".out").show()
            $(".no").css('transition-duration','0.3s').css('transform','rotate(180deg)')
            user1=0;
        }else{
            $(".out").hide()
            $(".no").css('transition-duration','0.3s').css('transform','rotate(0deg)')
            user1=1;
        }
    })
   /* $(".out p").click(function(){
        $(".out").hide();
        user1=1;
    })*/
</script>
</body>
</html>