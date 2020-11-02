<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Area;
use App\Admin\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//php artisan make:controller Admin/MemberController
class MemberController extends Controller
{
    //列表方法
    public function index(){
//        查询数据
        $data=Member::get();
//        展示视图
        return view('admin.member.index',compact('data'));
    }
    //添加方法
    public function add(Request $request){
//        判断请求类型
        if ($request->method()=='POST'){
//            实现数据的保存
//            自动验证
            $result=Member::insert([
               'username'=>$request->get('username'),
//                'password'=>bcrypt('password'),
               'password'=>bcrypt($request->get('password')),
                'pwd'=>$request->get('password'),
               'gender'=>$request->get('gender'),
               'mobile'=>$request->get('mobile'),
               'email'=>$request->get('email'),
               'avatar'=>$request->get('avatar'),
               'country_id'=>$request->get('country_id'),
               'province_id'=>$request->get('province_id'),
               'city_id'=>$request->get('city_id'),
               'county_id'=>$request->get('county_id'),
               'type'=>$request->get('type'),
               'status'=>$request->get('status'),
               'created_at'=>date('Y-m-d H:i:s'),
            ]);
//            返回输出
            return $result?'1':'0';
        }else{
//            查询数据 国家数据
//            DB::table('area')->where('pid','0')->get();
            $country=Area::where('pid','0')->get();
//            返回视图
            return view('admin.member.add',compact('country'));
        }
    }
//    ajax四级联动获取下属地区
    public function getAreaById(Request $request){
//        接收id
        $id=$request->get('id');
//        根据id去查询下属地区
        $data=Area::where('pid',$id)->get();
//        返回json数据
        return response()->json($data);
    }
}
