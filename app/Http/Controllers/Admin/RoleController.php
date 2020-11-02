<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use App\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/RoleController
class RoleController extends Controller
{
    //列表
    public function index(){
        $data=Role::get();
        return view('admin.role.index',compact('data'));
    }
//    分派权限功能
    public function assign(Request $request){
        //判断请求类型
        if ($request->method()=="POST"){
          $data=$request->only(['id','auth_id']);
          $role=new Role();
          $result=$role->assignAuth($data);
          //输出返回结果
          return $result;
        }else{
//            查询一级权限
            $top=Auth::where('pid','0')->get();
//            查询二级权限
            $cat=Auth::where('pid','!=','0')->get();
            //获取当前角色具备的权限id集合
            $ids=Role::where('id',$request->get('id'))->value('auth_ids');
//            展示视图
            return view('admin.role.assign',compact('top','cat','ids'));
        }
    }
}
