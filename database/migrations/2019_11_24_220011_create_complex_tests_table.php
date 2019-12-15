<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->bigInteger("owner_id")->unsigned();
            $table->bigInteger("subject_id")->unsigned();
            $table->boolean("is_randomized")->default(false);
            $table->boolean("can_pass")->default(true);
            $table->integer("time_to_pass");
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
        Schema::dropIfExists('complex_tests');
    }
}
