<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//php artisan make:model Admin/Member
class Member extends Model
{
    //定义关联的数据表
    protected $table='member';

//    关联模型操作 关联area地区模型 一对一
//    国家
    public function area_country(){
        return $this->hasOne('App\Admin\Area','id','country_id');
    }
//    省
    public function area_province(){
        return $this->hasOne('App\Admin\Area','id','province_id');
    }
//    城市
    public function area_city(){
        return $this->hasOne('App\Admin\Area','id','city_id');
    }
//    区县
    public function area_county(){
        return $this->hasOne('App\Admin\Area','id','county_id');
    }
}
