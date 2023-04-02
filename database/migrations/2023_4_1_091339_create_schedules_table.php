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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->time('startTime')->nullable();
            $table->time('endTime')->nullable();
            $table->time('breakTime')->nullable();
            $table->enum('day', ['الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعه', 'السبت', 'الأحد']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
