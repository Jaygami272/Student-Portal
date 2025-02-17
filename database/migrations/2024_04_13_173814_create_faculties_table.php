<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('phone_no');
            $table->unsignedBigInteger('depart_id');
            $table->unsignedBigInteger('user_id');
            
            $table->timestamps();
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
