<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderTransactionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('header_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('users');
            $table->foreignId('seller_id')->constrained('users');
            $table->foreignId('delivery_status_id')->constrained('delivery_statuses');
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('header_transactions');
    }
}
