<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 9:45
 */

namespace Admin\Controller;
use Think\Controller;

class InvoiceController extends CommonController
{
        public function index(){
            $Refund=M("Invoice");
            //搜索条件
            $type=I('get.searchtype');
            if($type!='')
            {
                if($type=='advertiser')
                {
                    $coustomer=M('Customer');
                    $zsql=$coustomer->field("id")->where(" advertiser like '%".I('get.search_text')."%'")->select(false);
                    $where.=" and  a.id!='hjd2' and a.invoice_head in($zsql)";

                }
                if($type=='contract_no')
                {
                    $where.=" and a.id!='hjd2' and a.contract_no like '%".I('get.search_text')."%'";
                }
                if($type=='appname')
                {
                    $where.=" and a.id!='hjd3' and a.appname like '%".I('get.search_text')."%'";
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
                    $where.=" and (a.audit_1=0 or a.audit_2=0)";
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
            $count      = $Refund->field('a.id,a.invoice_head,a.contract_no,a.money,a.ctime,a.audit_1,a.audit_2,b.advertiser')->join("a left join __CUSTOMER__ b on a.invoice_head = b.id ")->where("a.id!='0' and ".$q_where.$where)->limit($Page->firstRow.','.$Page->listRows)->order("a.ctime desc")->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
            $list=$Refund->field('a.id,a.invoice_head as aid,a.users2,a.invoice_head,a.appname,a.contract_no,a.money,a.ctime,a.audit_1,a.audit_2,b.advertiser')->join("a left join __CUSTOMER__ b on a.invoice_head = b.id ")->where("a.id!='0' and ".$q_where.$where)->limit($Page->firstRow.','.$Page->listRows)->order("a.ctime desc")->select();
            foreach($list as $key => $val)
            {
                //提交人
                $uindo=users_info($val['users2']);
                $list[$key]['submituser']=$uindo[name];
            }
            $this->list=$list;
            $this->assign('page',$show);// 赋值分页输出
            $this->display();

    }
    public function add(){
        //代理公司
        $agentcompany=M("AgentCompany");
        $this->agentcompany=$agentcompany->field("id,companyname,title")->order("id asc")->select();

        $this->display();
    }
    //输入公司名称
    public function keyup_adlist(){
        $Blog = R('Contract/keyup_adlist');
        echo $Blog;
    }
    //匹配公司发票信息
    public function fp_info(){
        $id=I('get.id');
        $Customer=M('Customer')->find($id);
        $this->ajaxReturn($Customer);
    }
    //匹配发票类型
    public function fptype(){
        $p=M("piaotype");
        $id=I("post.id");
        $list=$p->where("advertiser = $id")->select();
        foreach ($list as $key=>$val)
        {
            $str.="<option value=\"$val[id]\">$val[name]</option>";
        }
        echo $str;
    }
    //匹配发票编号
    public function no_list(){
        $NOLIST=R('Refund/no_list');
        echo $NOLIST;

    }
    //添加返回
    public function addru(){

        $Refund=M("Invoice");
        $Refund->create();
        $Refund->ctime=time();
        $Refund->users2=cookie('u_id');
        if($Refund->add()){
            $this->success("申请成功",U("index"));

        }else
        {
            $this->error("提交失败");
        }


    }
//修改操作
    public  function updata(){
        $id=I('get.id');
        $Refund=M("Invoice");
        $info=$Refund->find($id);
        $this->info=$info;

        //产品线
        $product_line=M("ProductLine");
        $this->product_line_list=$product_line->field("id,name,title")->order("id asc")->select();
        //代理公司
        $agentcompany=M("AgentCompany");
        $this->agentcompany=$agentcompany->field("id,companyname,title")->order("id asc")->select();
        //开票类型
        $p=M("piaotype");
        $id=I("post.id");
        $this->list=$p->where("advertiser = $info[main_company]")->select();

        //公司名称
        $gs=kehu($info[advertiser]);
        $this->gongsi=$gs[advertiser];
        $this->kaipinfo=$gs;
        //一级审核人
        $submitusers3=users_info($info[susers1]);
        $this->users_info3=$submitusers3['name'];
        //二级审核人
        $submitusers4=users_info($info[susers2]);
        $this->users_info4=$submitusers4['name'];
        $this->display();

    }
    //修改返回
    public function upru(){
        $id=I('post.id');
        $Refund=M("Invoice");
        //检查是否有这个客户
        $Customer=M("Customer");
        $co=$Customer->where("advertiser='".I('post.gongsi')."'")->count();

        if($co==0)
        {
            $this->error("没有这个公司!");
            exit;
        }
        $Refund->create();
        $Refund->kp_time=strtotime($Refund->kp_time);
        $Refund->users2=cookie('u_id');
        if($Refund->where("id=$id")->save())
        {
            $this->success('修改成功',U('index'));
        }else{
            $this->error('修改失败');
        }


    }


    public function delete(){
        $id=I('get.id');
        $Refund=M("Invoice");
        if($Refund->delete($id))
        {
            $this->success("删除成功",U('index'));
        }else
        {
            $this->error("删除失败");
        }
    }
    //审核操作
    public function shenhe(){
        $type=I('get.type');
        $id=I('get.id');
        //检查是否有权限执行审核操作
        $ispw=shenhe(__CONTROLLER__,$type);
        if($ispw!='200')
        {
            $this->error("您没有权限执行审核操作哦");
        }else
        {
            $table=M("Invoice");
            if(I('get.ju')!=''){
                $shenhe=2;
            }else
            {
                $shenhe=1;
            }
            if($table->where("id=$id")->setField($type,$shenhe))
            {
                $this->success('审核成功',U('index'));
                //修改审核者
                if($type=='audit_1')
                {
                    $table->where("id=$id")->setField('susers1',cookie('u_id'));
                }
                if($type=='audit_2')
                {
                    $table->where("id=$id")->setField('susers2',cookie('u_id'));
                }
            }else
            {
                $this->error('审核失败');
            }
        }
    }

    //查看合同
    public function show(){
        $id=I('get.id');
        $Refund=M("Invoice");
        $info=$Refund->find($id);
        $this->info=$info;
        //销售
        $submitusers=users_info($info[submituser]);
        $this->users_info=$submitusers['name'];
        //提交人
        $submitusers2=users_info($info[users2]);
        $this->users_info2=$submitusers2['name'];
        //一级审核人
        $submitusers3=users_info($info[susers1]);
        $this->users_info3=$submitusers3['name'];
        //二级审核人
        $submitusers4=users_info($info[susers2]);
        $this->users_info4=$submitusers4['name'];
        //代理公司
        $agentcompany=M("AgentCompany");
        $this->agentcompany=$agentcompany->field("id,companyname,title")->order("id asc")->select();
        //开票类型
        $p=M("piaotype");
        $id=I("post.id");
        $this->list=$p->where("advertiser = $info[main_company]")->select();
        //公司名称
        $gs=kehu($info[advertiser]);
        $this->gongsi=$gs[advertiser];
        $this->kaipinfo=$gs;

        $this->display();

    }
}