<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_voters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voter_id')->constrained();
            $table->foreignId('verifier_id')->constrained();
            $table->integer('q1')->nullable();
            $table->integer('q2')->nullable();
            $table->integer('q3')->nullable();
            $table->integer('q4')->nullable();
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
        Schema::dropIfExists('verified_voters');
    }
}
