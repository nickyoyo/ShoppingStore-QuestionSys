
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuycarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buycar', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('listnumber');
            $table->string('type');
            $table->string('name');
            $table->integer('price');
            $table->string('buyaccount');
            $table->integer('buynumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buycar');
    }
}
