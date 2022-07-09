<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_transaction_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->foreignId('transaction_type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('detail_transactions');
    }
}
