<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->renameColumn('id', 'id_pelanggan');
            $table->renameColumn('name', 'nama_pelanggan');
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->string('username')->unique()->after('nama_pelanggan');
            $table->string('nomor_kwh')->after('password');
            $table->text('alamat')->after('nomor_kwh');
            $table->integer('id_tarif')->unsigned()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->renameColumn('id_pelanggan', 'id');
            $table->renameColumn('nama_pelanggan', 'name');
            $table->string('email')->unique();
            $table->timestamps('email_verified_at');
            $table->dropColumn('username');
            $table->dropColumn('nomor_kwh');
            $table->dropColumn('alamat');
            $table->dropColumn('id_tarif');
        });
    }
}
