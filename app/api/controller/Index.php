<?php


namespace app\api\controller;

use app\api\BaseController;
use think\facade\Db;

class Index extends BaseController
{

    /*
     * @api {post} /index/index
     */
    public function index(){
        echo "api service";
    }

    /*
     * @api {post} /index/login
     * @desc list信息
     */
    public function login(){
        $param = get_params();

        $list = Db::table('dev_test_table')->select();
        $this->apiSuccess('success',['list' => $list]);
        echo $list;
    }
}