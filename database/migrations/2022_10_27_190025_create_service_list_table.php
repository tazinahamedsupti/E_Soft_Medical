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
        Schema::create('service_list', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->nullable(); 
            $table->string('test_reference')->nullable();
            $table->integer('total')->nullable(); 
            $table->integer('discount')->nullable();
            $table->integer('payment')->nullable();
            $table->integer('due')->nullable();
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->string('time_period')->nullable();
            $table->string('account_status')->nullable();
            $table->string('report_status')->nullable();
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
        Schema::dropIfExists('service_list');
    }
};
