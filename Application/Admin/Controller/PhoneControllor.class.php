<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class PhoneController extends Controller{
    public function add(){		
            $style = M('type');
            //在属性表里把网络的值取出来
            $net = $style->where("name='网络'")->find();
            $netzhi = $style->where('pid='.$net['id'])->select();
            //把颜色值取出来
            $color = $style->where("name='颜色'")->find();
            $colorzhi = $style->where("pid=".$color['id'])->select();
            //系列的值取出来
            $series = $style->where("name='系列'")->find();
            $serieszhi = $style->where("pid=".$series['id'])->select();
            //型号的值取出来
            $type = $style->where("name='机型'")->find();
            $typezhi = $style->where("pid=".$type['id'])->select();
            $this->assign('netzhi', $netzhi);
            $this->assign('colorzhi', $colorzhi);
            $this->assign('serieszhi', $serieszhi);
            $this->assign('typezhi', $typezhi);
            $this->display();
	}
}
