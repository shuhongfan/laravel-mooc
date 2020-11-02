<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//php artisan make:model Admin/Lesson
class Lesson extends Model
{
    //定义关联的表
    protected $table='lesson';

//   关联模型 关联课程 一对一
    public function course(){
        return $this->hasOne('App\Admin\Course','id','course_id');
    }
}
