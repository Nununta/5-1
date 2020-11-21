<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->BIGINTEGER('id')->autoIncrement();
            $table->unsignedBigInteger('user_id'); //外部キー
            $table->string('body', 255)->nullable($value = true);
            $table->TIMESTAMP('created_at')->nullable($value = true);
            $table->TIMESTAMP('updated_at')->nullable($value = true);
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
