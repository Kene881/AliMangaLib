<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToForumsTable extends Migration
{

    public function up()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->foreignIdFor(User::class)
                ->after('id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        });
    }


    public function down()
    {
        Schema::table('forums', function (Blueprint $table) {
            $key = (new User)->getForeignKey();
            $table->dropForeign([$key]);
            $table->removeColumn($key);
        });
    }
}
