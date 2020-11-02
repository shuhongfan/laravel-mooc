<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

//php artisan make:controller Admin/UploaderController
class UploaderController extends Controller
{
    //
    public function webuploader(Request $request){
//        判断是否有文件上传成功
        if ($request->hasFile('file')&&$request->file('file')->isValid()){
//            有文件上传 重点
//            避免文件名重复 md5 32位 sha1 40位  getClientOriginalExtension扩展名jpg
            $filename=sha1(time().$request->file('file')->getClientOriginalName()).'.'.$request->file('file')->getClientOriginalExtension();
//            文件保存 移动 (ove方法 store方法)
//            高级文件上传 storage门面 /storage/app/public
//            默认情况下浏览器无法访问storage =》创建软连接 php artisan storage:link
//            die($filename);
            Storage::disk('public')->put($filename,file_get_contents($request->file('file')->path()));
//            返回数据
            $result=[
                'errCode'=>'0',
                'errMsg'=>'',
                'succMsg'=>'文件上传成功！！！',
                'path'=>'/storage/'.$filename,
            ];
        }else{
//            没有文件上传
            $result=[
              'errCode'=>'000001',
              'errMsg'=>$request->file('file')->getErrorMessage(),
            ];
        }
//        返回信息
        return response()->json($result);
    }
}
