<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('titulo');
            $table->string('imagen')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('palabras_clave')->nullable();
            $table->bigInteger('heart')->default(0);
            $table->smallInteger('status_pay')->default(0);
            $table->string('token')->nullable();
            $table->string('slug')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('title_user');
    }
}
