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
            $table->string('complete_name');
            $table->bigInteger('dni');
            $table->double('phone');
            $table->double('phone_two')->nullable()->default(0);
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
            $table->enum('status', ['ACTIVE', 'INACTIVE','SUCCESS','NOT_SUCCESS','WAITING','DUPLICATE'])->default('ACTIVE');
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
