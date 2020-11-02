<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use App\Admin\Manager;
use App\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/ManagerController
class ManagerController extends Controller
{
    //管理员列表操作
    public function index(){
//        查询数据
        $data=Manager::get();
        return view('/admin/manager/index',compact('data'));
    }
//    添加管理员
    public function add(Request $request){
//        判断请求类型
        if ($request->method()=='POST'){
//            处理数据
//            数据验证
            $this->validate($request,[
                'username'=>'required|min:2|max:20',
                'password'=>'required|min:6|max:6',
                'password2'=>'required|min:6|max:6',
                'gender'=>'required',
                'role_id'=>'required',
                'status'=>'required',
                'email'=>'required|email',
                'mobile'=>'required',
            ]);
//            添加数据
            $data=$request->except('_token','password2');
            $password=bcrypt($request->get('password'));
            $pwd=$request->get('password');
            $data['password']=$password;
            $data['pwd']=$pwd;
            $data['created_at']=date('Y-m-d H:i:s',time());
            $result=Manager::insert($data);
//            框架自身不支持响应bool值
            return $result?"1":"0";
        }else{
            $data=Role::get();
//            展示视图
            return view('/admin/manager/add',compact('data'));
        }
    }
//    删除管理员
    public function del(Request $request){
//        获取删除数据ID
        $id=$request->get('id');
        $result=Manager::destroy($id);
//        返回是否删除成功
        return $result?"1":"0";
    }
//    修改管理员
    public function update(Request $request,$id){
        if ($request->method()=='POST'){
//            处理数据
//            数据验证
            $this->validate($request,[
                'username'=>'required|min:2|max:20',
                'password'=>'required|min:6|max:6',
                'password2'=>'required|min:6|max:6',
                'gender'=>'required',
                'role_id'=>'required',
                'status'=>'required',
                'email'=>'required|email',
                'mobile'=>'required',
            ]);
//            修改用户数据
            $result=Manager::find($id);
            $result->username=$request->username;
            $result->password=bcrypt($request->password);
            $result->pwd=$request->password;
            $result->gender=$request->gender;
            $result->email=$request->email;
            $result->mobile=$request->mobile;
            $result->role_id=$request->role_id;
            $result->status=$request->status;
            $result->save();
            return $result?"1":"0";
        }else{
//            获取数据
            $data=Manager::find($id);
//            获取角色
            $role=Role::get();
//            展示视图
            return view('/admin/manager/update',compact('data','role'));
        }
    }
//    管理员-停用
    public function useroff(Request $request){
        $id=$request->get('id');
        $result=Manager::find($id);
        $result->status=1;
        $result->save();
        return $result?"1":"0";
    }
    //    管理员-启用
    public function useron(Request $request){
        $id=$request->get('id');
        $result=Manager::find($id);
        $result->status=2;
        $result->save();
        return $result?"1":"0";
    }


}
