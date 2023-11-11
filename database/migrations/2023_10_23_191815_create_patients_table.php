<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('patient_number');
            $table->string('age');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('genders');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
