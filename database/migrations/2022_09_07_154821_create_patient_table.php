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
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('p_name')->nullable();
            $table->string('p_age')->nullable(); 
            $table->string('p_mobile')->nullable(); 
            $table->string('p_gender')->nullable(); 
            $table->string('p_blood')->nullable(); 
            $table->string('p_address')->nullable(); 
            $table->string('p_d_name')->nullable(); 
            $table->string('p_r_d_name')->nullable(); 
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
        Schema::dropIfExists('patient');
    }
};
