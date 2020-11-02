<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//php artisan make:controller Admin/AuthController
class AuthController extends Controller
{
    //列表
    public function index(){
        //查询数据
//        表1:t1
//        表2:t2
//        select t1.*,t2.auth_name as parent_name from auth as t1 left join auth as t2 on t1.pid=t2.id;
        $data=DB::table('auth as t1')
            ->select('t1.*','t2.auth_name as parent_name')
            ->leftJoin('auth as t2','t1.pid','=','t2.id')
            ->get();
        return view('admin.auth.index',compact('data'));
    }
    public function add(Request $request){
//        判断请求类型
        if ($request->method()=='POST'){
//            处理数据
//            数据验证
            $data=$request->except('_token');
            $result=Auth::insert($data);
//            框架自身不支持响应bool值
            return $result?"1":"0";
        }else{
            //查询父级权限
            $parents=Auth::where('pid','=','0')->get();
//            展示视图
            return view('admin.auth.add',compact('parents'));
        }
    }
}
