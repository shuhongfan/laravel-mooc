<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//1.创建迁移文件
//php artisan make:migration create_manager_table
//2.第一次执行迁移文件
//php artisan migrate:install
//3.执行迁移文件
//php artisan migrate
class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        建表方法
        Schema::create('manager', function (Blueprint $table) {
            $table->increments('id');//主键
            $table->string('username',20)->notNull();
            $table->string('password')->notNull();
            $table->enum('gender',[1,2,3])->notNull()->default('1');//性别：1=男，2=女，3=保密
            $table->string('mobile',11);
            $table->string('email',50);
            $table->tinyInteger('role_id');//角色表中的主键id
            $table->timestamps();//created_at和updated_at时间字段
            $table->rememberToken();//记住登录状态字段，用于存储token
            $table->enum('status',[1,2])->notNull()->default('2');//账号状态:1=禁用2=启用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        删表方法
        Schema::dropIfExists('manager');
    }
}
