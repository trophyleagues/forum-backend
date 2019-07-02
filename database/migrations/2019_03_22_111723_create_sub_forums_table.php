<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'sub_forums',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->string('author_id');
                $table->string('name');
                $table->string('description');
                $table->boolean('is_announce');
                $table->string('slug');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_forums');
    }
}
