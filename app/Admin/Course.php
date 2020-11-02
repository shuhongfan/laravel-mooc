<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//php artisan make:model Admin/Course
class Course extends Model
{
    //定义关联的表
    protected $table='course';

//    专业与课程 关联模型 一对一
    public function profession(){
        return $this->hasOne('App\Admin\Profession','id','profession_id');
    }
}
