<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delay_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->bigInteger('eta')->nullable();
            $table->enum('status', ['ETA', 'QUEUE', 'SOLVED']);
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
        Schema::dropIfExists('delay_reports');
    }
};
