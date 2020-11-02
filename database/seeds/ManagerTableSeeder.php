<?php

use Illuminate\Database\Seeder;
//1.生成填充器文件
//php artisan make:seeder ManagerTableSeeder
//2.
//php artisan db:seed --class=ManagerTableSeeder
class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一个faker实例
//        $faker = \Faker\Factory::create();
//        中国版Faker 本地化faker
        $faker = \Faker\Factory::create('zh_CN');
        //访问具体的属性来获取数据
//        循环生成数据 100条
        $data=[];
        for ($i=0;$i<200;$i++){
            $data=[
                'username'=>$faker->userName,
                'password'=>bcrypt('123456'),//框架内部自带加密
                'gender'=>rand(1,3),
                'mobile'=>$faker->phoneNumber,
                'email'=>$faker->email,
                'role_id'=>rand(1,6),//角色id
                'created_at'=>date('Y-m-d H:i:s',time()),//创建时间
                'status'=>rand(1,2),//账户状态
            ];
            DB::table('manager')->insert($data);
        }

    }
}
