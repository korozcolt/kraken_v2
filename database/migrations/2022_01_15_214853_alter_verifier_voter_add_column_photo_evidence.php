<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVerifierVoterAddColumnPhotoEvidence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verified_voters', function (Blueprint $table) {
            $table->string('q1_photo_path', 2048)->nullable();
            $table->string('q2_photo_path', 2048)->nullable();
            $table->string('q3_photo_path', 2048)->nullable();
            $table->string('q4_photo_path', 2048)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
