<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned()->unique();
            $table->string('string_id', 32)->unique()->comment('加密ID');
            $table->string('phone', 20)->unique()->comment('手机号');
            $table->string('password', 60)->comment('密码');
            $table->string('name', 60)->comment('昵称');
            $table->string('avatar', 60)->comment('头像');
            $table->boolean('sex')->default(false)->comment('性别')->index();
            $table->smallInteger('age')->unsigned()->default(0)->comment('年龄');
            $table->string('qq', 20)->default('')->comment('QQ号');
            $table->string('weixin', 30)->default('')->comment('微信号');
            $table->string('openid', 30)->default('')->comment('openid');
            $table->string('unionid', 30)->default('')->comment('unionid')->index();
            $table->boolean('status')->default(true)->comment('状态 1正常 0封禁')->index();
            $table->rememberToken();
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
