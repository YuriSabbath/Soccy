<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowerTable extends Migration
{
    protected $primaryKey = ['follower_id', 'following_id'];

    public function up()
    {
        Schema::create('user_follower', function (Blueprint $table) {
            $table->foreignId('follower_id')->references('id')->on('users')->unsignedInteger();;
            $table->foreignId('following_id')->references('id')->on('users')->unsignedInteger();
            $table->primary(['follower_id', 'following_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_follower');
    }
}