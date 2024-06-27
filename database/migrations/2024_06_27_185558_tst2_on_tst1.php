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
        Schema::table('tst2s', function(Blueprint $table){
            $table->foreignId('tst1_id')->after('id')->references('id')->on('tst1s');
            // $table->integer('tst1_id');
            // $table->foreignId('tst1_id')->references('id')->on('tst1s');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tst2s', function(Blueprint $table){
            $table->dropForeign(['tst1_id']);
            $table->dropColumn('tst1_id');
        });
    }
};
