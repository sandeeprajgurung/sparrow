<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalServiceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_service_detail', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->LONGTEXT('description');
            $table->string('image');
            $table->unsignedBigInteger('external_service_id');
            $table->foreign('external_service_id')->references('id')->on('external_service')->onDelete('cascade');
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
        // Schema::table('external_service_detail', function(Blueprint $table)
        // {
        //     $table->dropForeign('fk_external_service_id');
        //     $table->dropColumn('external_service_id');
        // });
        Schema::dropIfExists('external_service_detail');
    }
}
