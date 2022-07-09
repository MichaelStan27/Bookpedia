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
            $table->unsignedBigInteger('detail_transaction_id');
            $table->primary('detail_transaction_id');
            $table->foreign('detail_transaction_id')->references('id')->on('detail_transactions');
            $table->date('deadline')->nullable();
            $table->date('loan_date')->nullable();
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
