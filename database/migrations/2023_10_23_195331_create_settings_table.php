<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  

    public function up()
    {
        
        Schema::create('settings', function (Blueprint $table) {
            
            $table->id();
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
