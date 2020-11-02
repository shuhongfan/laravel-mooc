<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/CourseController
class CourseController extends Controller
{
    //列表
    public function index(Request $request){
        //获取数据
        $data=Course::orderBy('sort','desc')->get();
//        展示视图
        return view('admin.course.index',compact('data'));
    }
}
