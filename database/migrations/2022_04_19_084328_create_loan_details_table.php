<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDetailsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id');
            $table->primary('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->date('deadline');
            $table->date('loan_date');
            $table->date('return_date')->nullable();
            $table->integer('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('loan_details');
    }
}
