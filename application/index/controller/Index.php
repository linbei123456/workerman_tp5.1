<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Index extends Controller
{
    public function index()
    {
        $fromid = input("fromid");
        $toid = input('toid');
        $this->assign('fromid',$fromid);
        $this->assign('toid',$toid);
        return $this->fetch();
    }

    public function lists()
    {
        $id = 85;
        $this->assign('fromid',$id);
        return $this->fetch();
    }
}
