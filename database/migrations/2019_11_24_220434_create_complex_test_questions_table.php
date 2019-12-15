<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex_test_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("test_id")->unsigned();
            $table->bigInteger("owner_id")->unsigned();
            $table->json("answers")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complex_test_questions');
    }
}
