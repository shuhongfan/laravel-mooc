<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//php artisan make:model Admin/Question
class Question extends Model
{
    //关联数据表
    protected $table='question';
//    关联模型 关联试卷 一对一
    public function paper(){
        return $this->hasOne('App\Admin\Paper','id','paper_id');
    }
}
