<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//1.创建控制器
//php artisan make:controller Admin/PublicController
class PublicController extends Controller
{
    //登录页面展示
    public function login(){
//        返回视图
        return view('admin.public.login');
    }
//    验证数据
    public function check(Request $request){
//        开始自动验证
        $this->validate($request,[
//           需要验证的字段名=>'验证规则1|验证规则2|验证规则3'
            'username'=>'required|min:2|max:20',//用户名必填，长度介于2-20
            'password'=>'required|min:6',//密码 必填 长度6
            'captcha'=>'required|size:4|captcha',//验证码，必填，长度4，必须是合法
        ]);
//        继续开始进行身份核实
        $data=$request->only(['username','password']);
        $data['status']='2';//1表示禁用 2表示启用
        $result=Auth::guard('admin')->attempt($data,$request->get('online'));//判断用户登录信息是不是正确
        if($result){
            return redirect('/admin/index/index');
        }else{
            return redirect('/admin/public/login')->withErrors([
                'loginError'=>'用户名或密码错误...'
            ]);
        }
    }
//    退出登录
    public function logout(){
        Auth::guard('admin')->logout();
//        跳转登录页面
        return redirect('/admin/public/login');
    }
}
