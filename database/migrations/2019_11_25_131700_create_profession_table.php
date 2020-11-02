<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//php artisan make:migration create_profession_table
//php artisan migrate
class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name',20)->notNull();
            $table->tinyInteger('protype_id')->notNull();
            $table->string('teachers_ids')->notNull();
            $table->string('description')->notNull();
            $table->string('cover_img');
            $table->integer('view_count')->notNull()->default('500');
            $table->timestamps();
            $table->tinyInteger('sort')->notNull()->default('0');
            $table->tinyInteger('duration');
            $table->decimal('price',7,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profession');
    }
}
