<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user');
            $table->foreignId('folder');
            $table->boolean('isdelete')->default(true);
            $table->boolean('isdownload')->default(true);
            $table->boolean('isready')->default(true);
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
        Schema::dropIfExists('folder_users');
    }
}
