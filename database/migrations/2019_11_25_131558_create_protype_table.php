<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//php artisan make:migration create_protype_table
//php artisan migrate
class CreateProtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('protype_name',20)->notNull();
            $table->tinyInteger('sort')->notNull()->default('0');
            $table->timestamps();
            $table->enum('status',[1,2])->notNull()->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protype');
    }
}
