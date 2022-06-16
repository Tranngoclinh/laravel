<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group_roles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_group_id'); //không âm và cùng kiểu 
            $table->foreign('user_group_id')->references('id')->on('user_groups');
            $table->unsignedBigInteger('role_id'); //không âm và cùng kiểu 
            $table->foreign('role_id')->references('id')->on('roles');

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
        Schema::dropIfExists('user_group_roles');
    }
}
