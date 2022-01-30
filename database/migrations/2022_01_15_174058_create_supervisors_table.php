<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
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
            $table->foreignId('user_id')->constrained()->nullable();
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
        Schema::dropIfExists('supervisors');
    }
}
