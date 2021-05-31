<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name')->default(null);
            $table->string('last_name')->default(null);
            $table->string('job_title')->default(null);
            $table->string('mood')->default(null);
            $table->date('birth')->default(null);
            $table->string('phone_home')->default(null);
            $table->string('phone_office')->default(null);
            $table->string('phone_mobile')->default(null);
            $table->string('country')->default(null);
            $table->string('city')->default(null);
            $table->string('state')->default(null);
            $table->string('street')->default(null);
            $table->text('website')->default(null);
            $table->string('gender')->default(null);
            $table->string('language')->default(null);
            $table->string('foto')->default(null);
            $table->json('image_collection')->default(null);
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
        Schema::dropIfExists('profiles');
    }
}
