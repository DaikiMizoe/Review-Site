<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','10');
            //$table->string('email')->unique();
            $table->string('email','30');
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password','100');
            $table->tinyInteger('role');
            $table->tinyInteger('quit_flg')->default(0);
            $table->tinyInteger('del_flg')->default(0);
            //$table->rememberToken('pwd_reset_key','64')->nullable();
            $table->string('pwd_reset_key','64')->nullable();
            $table->timestamp('pwd_reset_at');
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
        Schema::dropIfExists('users');
    }
}
