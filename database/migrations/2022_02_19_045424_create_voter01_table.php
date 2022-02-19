<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoter01Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter01s', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->bigInteger('dni')->unique();
            $table->string('phone')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('gender',['MALE','FEMALE','OTHER','NONE'])->default('NONE');
            $table->string('place')->nullable();
            $table->string('table')->nullable();
            $table->integer('son_number')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('guide')->default(false);
            $table->boolean('witness')->default(false);
            $table->enum('status', ['ACTIVE', 'INACTIVE','CARDENAS','APOLINAR','MIGUEL_AMIN','BESAILE','DE_LUQUE','NOT_SUCCESS','WAITING','DUPLICATE'])->default('ACTIVE');
            $table->enum('call_status', ['NOT_CALLED', 'CALLED','POSITIVE','NEGATIVE','NONE','NOT_ANSWER','BLANK','DONT_KNOW','HANG'])->default('NOT_CALLED');
            $table->bigInteger('lider_dni');
            $table->bigInteger('coordinator_dni');
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
        Schema::dropIfExists('voter01');
    }
}
