<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {

        Schema::create('appointements', function (Blueprint $table) {

            $table->id();
            $table->integer('patient_id');
            $table->string('description');
            $table->string('payment_method');
            $table->string('date');
            $table->string('extra_fee')->nullabl();
            $table->string('amount');
            $table->timestamps();

        });

    }

    public function down()
    {
        Schema::dropIfExists('appointements');
    }
};
