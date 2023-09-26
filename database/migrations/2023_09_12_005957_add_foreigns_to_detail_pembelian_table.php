<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('detail_pembelian', function (Blueprint $table) {
            $table
            ->foreign('pembelian_id')
            ->references('id')
            ->on('pembelian')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

        $table
            ->foreign('barang_id')
            ->references('id')
            ->on('barang')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pembelian', function (Blueprint $table) {
            //
        });
    }
};