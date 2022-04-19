<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usersbook_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('usersbook_id')->references('id')->on('users_books');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('buy_transactions');
    }
}
