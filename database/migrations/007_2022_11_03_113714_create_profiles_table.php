<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // The data fields in profiles are nullable since all of this information will be 
        // optional to fill in apart from the profile picture which has a default image if not
        // selected. (The default image path is just an example/placeholder for now).
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('DoB')->nullable();
            $table->string('status')->nullable();
            $table->string('location')->nullable();
            $table->string('profile_picture')->default('default/profile/image');
            $table->bigInteger('user_id')->unsigned()->unique();

            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');

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
};
