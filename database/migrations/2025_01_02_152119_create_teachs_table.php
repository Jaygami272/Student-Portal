<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_id');
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('depart_id');
            $table->foreign('sub_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachs');
    }
}
