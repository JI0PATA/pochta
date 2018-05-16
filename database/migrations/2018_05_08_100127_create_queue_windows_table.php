<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueWindowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_windows', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('queue_id')->unsigned();
            $table->foreign('queue_id')->references('id')->on('queues')->onDelete('cascade');

            $table->integer('window_id')->unsigned();
            $table->foreign('window_id')->references('id')->on('windows')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queue_windows');
    }
}
