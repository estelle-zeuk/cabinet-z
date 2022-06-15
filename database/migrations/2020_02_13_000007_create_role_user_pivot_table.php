<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->integer('role_id');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id', 'user_id_fk_1001484')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id', 'role_id_fk_1001484')->references('id')->on('roles')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','role_id']);
        });
    }
}
