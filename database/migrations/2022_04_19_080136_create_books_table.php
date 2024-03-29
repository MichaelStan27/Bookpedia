<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->integer('released_year');
            $table->string('publisher');
            $table->string('image');
            $table->text('summary');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->decimal('sale_price', $precision = 12, $scale = 2)->nullable();
            $table->decimal('loan_price', $precision = 12, $scale = 2)->nullable();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('transaction_type_id');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('books');
    }
}
