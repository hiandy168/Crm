<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/reset.css"/>
    
    <title></title>
    <style>
        .people{
            margin-top: 20px;
            margin-left: 40px;
            width: 90%;
            height: 240px;
            background: #f5f5f5;
            /*border: 1px solid #999999;*/
            box-shadow: 0px 2px 10px #999999;
        }
        .touxiang,.dai{
            float: left;
        }
        .touxiang{
            margin-left: 50px;
        }
        .dai{
            color: #333333;
            font-size: 12px;
            margin-left: 80px;
            margin-top:30px;
        }
        .message{
            color: #ff4e3e;
        }
    </style>
</head>
<body>
<div class="people" style="overflow: hidden;">
    <div class="clear" style="margin-top:25px;">
        <div class="touxiang">
            <p>
                <img src="<?php echo (session('u_image')); ?>" width="80" height="80" class="img-circle" />
            </p>
            <p style="text-align: center;font-size: 12px;color: #333333;">
               <a href="<?php echo U("users/updata?id=$sessionuid");?>"><?php echo (session('u_name')); ?></a>
            </p>
        </div>
        <div class="dai">
            待办:
        </div>
    </div>
    <div class="clear"></div>
    <div style="margin-left:40px;margin-top: 30px; ">
                <span style="color: #999999;font-size: 12px;">
                    <img src="/Public/images/admin/我的消息.png" alt=""/>
                    我的消息(
                    <span class="message">10</span>
                    )

                </span>
                <span style="margin-left: 100px;color: #999999;font-size: 12px;">
                    <span style="font-size: 16px;" class="num">
                        0
                    </span>
                    待办
                </span>
    </div>
</div>
</body>
</html>