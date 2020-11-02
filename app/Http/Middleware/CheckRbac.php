<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Route;

//php artisan make:middleware CheckRbac
class CheckRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        RBAC鉴权 排除管理员用户 排除index和welcome页面
        if (Auth::guard('admin')->user()->role_id!='1'){
//            获取当前路由
            $route=Route::currentRouteAction();
//            获取当前用户对应的角色已经具备的权限
            $ac=Auth::guard('admin')->user()->role->auth_ac;
//            添加例外权限
            $ac=strtolower($ac.',indexcontroller@index,indexcontroller@welcome');
//            判断权限
//            字符串转化数组
            $routeArr=explode('\\',$route);
//            获取数组最后一个元素end()方法
//            strpos 在字符串中第一次出现的位置
            if (strpos($ac,strtolower(end($routeArr)))===false){
//                没有权限
                exit('<h1>哈哈哈，你没有访问权限！！！</h1>');
            }
        }
        return $next($request);
    }
}
