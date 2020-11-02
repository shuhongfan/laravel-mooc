<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/ProfessionController
class ProfessionController extends Controller
{
    //列表
    public function index(){
//        获取数据
        $data=Profession::orderBy('sort','desc')->get();
//        展示视图
//        return view('admin.profession.index',compact('data'));
        return view('admin.profession.index',['data'=>$data]);
    }
}
