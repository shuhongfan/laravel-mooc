<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/QuestionController
use Excel;
class QuestionController extends Controller
{
    //列表
    public function index(Request $request){
//        查询数据
        $data=Question::get();
//        展示视图
        return view('admin.question.index',compact('data'));
    }

//    导出方法
    public function export(){
        //Excel文件导出功能
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
//        使用excel类 参数1是文件名
        Excel::create('学生成绩',function($excel) use ($cellData){
//            在此处可以使用celldata
            $excel->sheet('score', function($sheet) use ($cellData){
//                写入行数据
                $sheet->rows($cellData);
            });
        })->export('xls');//导出
    }
}
