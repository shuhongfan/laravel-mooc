<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Protype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/ProtypeController
class ProtypeController extends Controller
{
    //列表
    public function index(){
//        获取数据
        $data=Protype::orderBy('sort','desc')->get();
//        返回视图
        return view('admin.protype.index',compact('data'));
    }
}
