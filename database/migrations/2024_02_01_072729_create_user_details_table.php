<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Add other columns specific to user details
            $table->string('address');
            $table->string('phone_number');
            $table->string('education')->nullable();
            // ... other columns
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_details');
    }
};
