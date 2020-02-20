<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            'posts',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->string('sub_forum_id');
                $table->string('author_id');
                $table->string('title');
                $table->text('content');
                $table->boolean('is_open');
                $table->string('slug')->unique();
                $table->string('visualization')->default(0);
                $table->integer('in_like')->default(0);
                $table->integer('un_like')->default(0);
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
}
