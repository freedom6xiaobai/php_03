<?php
// 应用公共文件


//获取url参数
use think\facade\Cache;
use think\facade\Db;
use think\facade\Request;

function get_params($key = "")
{
    return Request::instance()->param($key);
}

//设置缓存
function set_cache($key, $value, $date = 86400)
{
    Cache::set($key, $value, $date);
}

//读取缓存
function get_cache($key)
{
    return Cache::get($key);
}

//清空缓存
function clear_cache($key)
{
    Cache::clear($key);
}

//读取系统配置
function get_system_config($name,$key='')
{
    $config=[];
    if (get_cache('system_config' . $name)) {
        $config = get_cache('system_config' . $name);
    } else {
        $conf = Db::name('config')->where('name',$name)->find();
        if($conf['content']){
            $config = unserialize($conf['content']);
        }
        set_cache('system_config' . $name, $config);
    }
    if($key==''){
        return $config;
    }
    else{
        if($config[$key]){
            return $config[$key];
        }
    }
}