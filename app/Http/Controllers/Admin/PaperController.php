<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Paper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/PaperController
class PaperController extends Controller
{
    //列表
    public function index(Request $request){
//        查询数据
        $data=Paper::get();
//        展示视图
        return view('admin.paper.index',compact('data'));
    }
}
