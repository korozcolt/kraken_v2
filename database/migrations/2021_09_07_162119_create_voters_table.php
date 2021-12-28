<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->bigInteger('dni')->unique();
            $table->double('phone');
            $table->double('phone_two')->nullable()->default(0);
            $table->string('address')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('son_number')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE','UNIVERSITY','WITNESS'])->default('ACTIVE');
            $table->enum('call_status', ['NOT_CALLED', 'CALLED','POSITIVE','NEGATIVE','NONE','NOT_ANSWER','BLANK','DONT_KNOW','HANG'])->default('NOT_CALLED');
            $table->foreignId('lider_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('voters');
    }
}
