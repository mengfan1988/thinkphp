<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    //功能类似构造方法  该类率先执行的方法
	public function _initialize(){
		

		//用户的登陆检测  master:管理员
		$userId = $_SESSION['master']['id'];
		if(!$userId){
			$this->error('您还没有登陆,请先登录哦 !!', U('Admin/Login/login'),1);
		}
		
		//超级管理员检测
		if($_SESSION['master']['id'] == 1){
            return true;
        }
	    // 检测权限
		$rule = CONTROLLER_NAME.'/'.ACTION_NAME;
		//实例化验证类
		$auth = new \Think\Auth();

        if(!$auth->check($rule,$userId)){
            $this -> error("你没有权限",U("Home/Index/index"),1);
        }
	}
}