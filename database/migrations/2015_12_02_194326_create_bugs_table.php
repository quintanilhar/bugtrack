<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reporter_id')->unsigned()->index();
            $table->integer('engineer_id')->unsigned()->nullable()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('priority_id')->unsigned()->index();
            $table->string('status', 10);
            $table->string('title', 150);
            $table->longText('description');
            $table->timestamps();

            $table->foreign('reporter_id')->references('id')->on('users');
            $table->foreign('engineer_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('priority_id')->references('id')->on('priorities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bugs');
    }
}
