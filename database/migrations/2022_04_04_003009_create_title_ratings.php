<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('title_user_id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->integer('rate');

            $table->foreign('title_user_id')->references('id')->on('title_user')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title_ratings');
    }
}
