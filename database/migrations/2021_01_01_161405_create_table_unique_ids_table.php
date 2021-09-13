<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUniqueIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_unique_ids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('res_id')->unsigned();
            $table->string('table_no');
            $table->string('unique_number')->unique();
            $table->timestamps();
            $table->foreign('res_id')->references('id')->on('restaurant_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_unique_ids');
    }
}
