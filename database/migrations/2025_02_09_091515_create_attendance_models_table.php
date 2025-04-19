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
        Schema::create('attendance_models', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->date('date');
            $table->string('in_time');
            $table->string('out_time');
            $table->string('late_status');
            $table->string('early_out_status');
            $table->string('status');
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
        Schema::dropIfExists('attendance_models');
    }
};
