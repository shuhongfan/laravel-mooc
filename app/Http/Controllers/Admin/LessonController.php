<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/LessonController

class LessonController extends Controller
{
    //列表
    public function index(Request $request){
//        获取数据
        $data=Lesson::orderBy('sort','desc')->get();
//        返回视图
        return view('admin.lesson.index',compact('data'));
    }
//    播放方法
    public function play(Request $request){
//        获取播放的视频id
        $id=$request->get('id');
//        根据视频的id 查询视频地址
        $addr=Lesson::where('id',$id)->value('video_addr');
//        播放视频
        return "<video width='100%' src='$addr' height='100%' autoplay loop controls>您的浏览器不支持 video 标签。</video>";
    }
}
