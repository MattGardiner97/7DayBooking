<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Schedules', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("CounsellorID");
            $table->date("StartDate");
            $table->date("EndDate");
            $table->text("ScheduleString");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Schedules');
    }
}
