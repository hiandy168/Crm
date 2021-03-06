<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/8
 * Time: 9:45
 */

namespace Admin\Controller;
use Think\Controller;

class AccountController extends CommonController
{
        public function index(){
            $Refund=M("Account");
            //搜索条件
            $type=I('get.searchtype');
            if($type!='')
            {
                if($type=='advertiser')
                {

                    $where.=" and  a.id!='hjd2' and a.appname like '%".I('get.search_text')."%'";

                }

                $this->type=$type;
                $this->ser_txt=I('get.search_text');

            }
            //时间条件
            $time_start=I('get.time_start');
            $time_end=I('get.time_end');
            if($time_start!="" and $time_end!="")
            {
                $time_start=strtotime($time_start);
                $time_end=strtotime($time_end);

                $where.=" and a.ctime > $time_start and a.ctime < $time_end";
                $this->time_start=I('get.time_start');
                $this->time_end=I('get.time_end');
            }
            //审核条件
            $type2=I('get.shenhe');
            if($type2!='')
            {
                if($type2=='k')
                {
                    $where.=" and a.id!='hjd3' ";
                }
                if($type2=='0')
                {
                    $where.=" and a.audit_1=0 and a.audit_2=0";
                }
                if($type2=='1')
                {
                    $where.=" and a.audit_1=1 and a.audit_2=1";
                }
                $this->type2=$type2;
                $this->ser_txt2=I('get.search_text');

            }
            //权限条件
            $q_where=quan_where(__CONTROLLER__,"a");
            $count      = $Refund->field('a.id,a.appname,a.type,a.promote_url,a.a_users,a.ctime,a.a_password,a.fandian,a.ip,a.tel,b.name')->join("a left join __ACCOUNTTYPE__ b on a.type = b.id ")->where("a.id!='0' and ".$q_where.$where)->limit($Page->firstRow.','.$Page->listRows)->order("a.ctime desc")->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
            $list=$Refund->field('a.id,a.appname,a.type,a.promote_url,a.a_users,a.ctime,a.a_password,a.ip,a.fandian,a.tel,b.name')->join("a left join __ACCOUNTTYPE__ b on a.type = b.id ")->where("a.id!='0' and ".$q_where.$where)->limit($Page->firstRow.','.$Page->listRows)->order("a.ctime desc")->select();

            $this->list=$list;
            $this->assign('page',$show);// 赋值分页输出
            $this->display();

    }
    public function add(){
        //代理公司
        $Accounttype=M("Accounttype");
        $this->accounttype=$Accounttype->field("id,name")->order("id asc")->select();

        $this->display();
    }



    public function addru(){

        $Refund=M("Account");
        $Refund->create();
        $Refund->ctime=time();
        if($Refund->add()){
            $this->success("添加成功",U("index"));

        }else
        {
            $this->error("添加失败");
        }


    }
//修改操作
    public  function updata(){
        $id=I('get.id');
        $Refund=M("Account");
        $info=$Refund->find($id);
        $this->info=$info;

        $Accounttype=M("Accounttype");
        $this->accounttype=$Accounttype->field("id,name")->order("id asc")->select();
        $this->display();

    }
    //修改返回
    public function upru(){
        $id=I('post.id');
        $Refund=M("Account");

        $Refund->create();
        if($Refund->where("id=$id")->save())
        {
            $this->success('修改成功',U('index'));
        }else{
            $this->error('修改失败');
        }


    }


    public function delete(){
        $id=I('get.id');
        $Refund=M("Account");
        if($Refund->delete($id))
        {
            $this->success("删除成功",U('index'));
        }else
        {
            $this->error("删除失败");
        }
    }


    //查看合同
    public function show(){
        $id=I('get.id');
        $Refund=M("Account");
        $info=$Refund->find($id);
        $this->info=$info;

        //销售
        $submitusers=users_info($info[submituser]);
        $this->users_info=$submitusers['name'];

        $Accounttype=M("Accounttype");
        $this->accounttype=$Accounttype->field("id,name")->order("id asc")->select();
        $this->display();

    }
}