<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usersbook_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('usersbook_id')->references('id')->on('users_books');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('deadline');
            $table->date('loan_date');
            $table->date('return_date');
            $table->integer('duration');
            $table->decimal('fine');
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
        Schema::dropIfExists('loan_transactions');
    }
}
