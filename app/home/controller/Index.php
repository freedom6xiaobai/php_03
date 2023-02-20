<?php

namespace app\home\controller;

use app\home\BaseController;
use think\facade\Db;


class Index extends BaseController
{
    public function index()
    {
        return "home111";
    }

    /*
    * @api {get} /home_llist
    * @desc list信息
    */
    public function homeList()
    {
        $param = get_params();
        $list = Db::table('dev_test_table')->select();
        return  $list;
        $this->apiSuccess('success', ['list' => $list]);
//        echo $list;
        return $list;
    }
}
