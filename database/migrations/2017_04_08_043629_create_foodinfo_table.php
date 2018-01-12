<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodinfo', function (Blueprint $table) {
            //
			$table->increments('id');
            $table->string('name')->nullable();
            $table->string('englishname')->nullable();
            $table->string('description')->nullable();
			$table->double('price')->default(0);
			$table->string('imageurl')->nullable(); // this column will be a VARCHAR with no default value and will also BE NULLABLE
            $table->Integer('restaurantid')->nullable();
			$table->timestamp('createdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('foodinfo');
        // Schema::table('foodinfo', function (Blueprint $table) { 
        // });
    }
}
