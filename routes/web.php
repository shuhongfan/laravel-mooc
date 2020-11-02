<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HOME
Route::get('/','Home\IndexController@index');
Route::any('/single/{id}','Home\IndexController@single');


//ADMIN
//不需要权限判断
//    后台登录页面
Route::group(['prefix'=>'admin'],function (){
    Route::get('public/login','Admin\PublicController@login')->name('login');
//    后台登录处理页面
    Route::post('public/check','Admin\PublicController@check');
//    后台登出页面
    Route::get('public/logout','Admin\PublicController@logout');
});
//需要权限判断
//后台路由部分
//中间件 auth checkrbac
Route::group(['prefix'=>'admin','middleware'=>['auth:admin','checkrbac']],function (){

//    后台首页
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');

//    管理员管理模块
    Route::get('manager/index','Admin\ManagerController@index');
    Route::any('manager/add','Admin\ManagerController@add');
    Route::any('manager/del','Admin\ManagerController@del');
    Route::any('manager/useron','Admin\ManagerController@useron');
    Route::any('manager/useroff','Admin\ManagerController@useroff');
    Route::any('manager/update/{id}','Admin\ManagerController@update');

    //权限管理模块
    Route::get('auth/index','Admin\AuthController@index');
    Route::any('auth/add','Admin\AuthController@add');

    //角色管理模块
    Route::get('role/index','Admin\RoleController@index');
    Route::any('role/assign','Admin\RoleController@assign');

    //会员管理模块
    Route::get('member/index','Admin\MemberController@index');//列表
    Route::any('member/add','Admin\MemberController@add');//添加
    Route::get('member/getareabyid','Admin\MemberController@getAreaById');//ajax联动
    Route::post('uploader/webuploader','Admin\UploaderController@webuploader');//异步上传

    //专业分类与专业管理
    Route::get('protype/index','Admin\ProtypeController@index');//列表
    Route::get('profession/index','Admin\ProfessionController@index');//列表

    //课程与点播课程管理
    Route::get('course/index','Admin\CourseController@index');//列表
    Route::get('lesson/index','Admin\LessonController@index');//列表
    Route::get('lesson/play','Admin\LessonController@play');//播放页面

    /// //课程与点播课程管理
    Route::get('paper/index','Admin\PaperController@index');//试卷列表
    Route::get('question/index','Admin\QuestionController@index');//试题列表
    Route::get('question/export','Admin\QuestionController@export');//试题导出
    Route::any('question/import','Admin\QuestionController@import');//试题导入

});