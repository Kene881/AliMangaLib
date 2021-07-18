<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{

    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->integer('likes');
            $table->integer('views');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forums');
    }
}
