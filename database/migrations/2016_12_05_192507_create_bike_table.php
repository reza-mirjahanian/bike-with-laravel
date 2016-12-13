<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('model', 200);
            $table->string('image', 200);
            $table->string('make', 200);
            $table->string('color', 200);
            $table->decimal('price', 14, 2);
            $table->unsignedInteger('cc');
            $table->unsignedInteger('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bikes');
    }
}
