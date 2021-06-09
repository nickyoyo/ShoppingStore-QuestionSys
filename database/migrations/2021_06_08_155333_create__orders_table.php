<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_email')->index();
            $table->timestamps();
        });
    }
//$table->foreign('user_email')->references("email")->on('users')->onDelete("cascade");
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_orders');
    }
}
