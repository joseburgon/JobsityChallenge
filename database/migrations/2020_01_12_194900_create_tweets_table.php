<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_str', 128)->unique();
            $table->unsignedBigInteger('internal_user_id');
            $table->string('profile_image_url');
            $table->text('text');
            $table->string('user_name', 128);
            $table->string('screen_name', 128);
            $table->boolean('hidden')->default(false);
            $table->string('class', 128)->default('twitter-tweet');
            $table->timestamps();

            // Relation
            $table->foreign('internal_user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
