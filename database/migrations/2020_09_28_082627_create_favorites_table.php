<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('music_id')->unsigned();
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //外部キー参照
            // $table->foreign('music_id')->references('id')->on('musics')->onDelete('cascade'); //外部キー参照
            $table->unique(['user_id','music_id'],'uq_roles');//laravelは複合主キーが扱いにくいのでユニークで代用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('favorites');
    }
}
