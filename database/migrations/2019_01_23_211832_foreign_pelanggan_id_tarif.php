<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignPelangganIdTarif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif', function (Blueprint $table) {
            $table->increments('id_tarif');
            $table->float('daya');
            $table->decimal('tarifperkwh', 15,2);
        });

        Schema::table('pelanggan', function (Blueprint $table) {
            $table->foreign('id_tarif')->references('id_tarif')->on('tarif')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarif');
    }
}
