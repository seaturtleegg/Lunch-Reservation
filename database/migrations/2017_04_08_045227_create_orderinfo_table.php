<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderinfo', function (Blueprint $table) {
            //
			$table->increments('id');
            $table->integer('userid')->nullable();
            $table->string('ordernum')->nullable();
            $table->integer('foodid')->nullable();
			$table->string('foodname')->nullable();
			$table->double('foodprice')->default(0);
			$table->double('finalprice')->default(0); // this column will be a VARCHAR with no default value and will also BE NULLABLE
            $table->string('addons')->nullable();
			$table->timestamp('createdate');
			$table->integer('isconfirmed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('orderinfo');
    }
}
