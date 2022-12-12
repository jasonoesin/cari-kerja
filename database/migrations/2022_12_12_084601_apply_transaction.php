<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplyTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_job')->references('id')->on('job')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_user')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('apply_date');
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
        Schema::dropIfExists('apply_trasaction');
    }
}
