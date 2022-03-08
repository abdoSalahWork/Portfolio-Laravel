<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioCategoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_category_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolioCategoryId');
            $table->foreign('portfolioCategoryId')->references('id')->on('portfolio_categories')->onDelete('cascade');
            $table->unsignedBigInteger('portfolioItemId');
            $table->foreign('portfolioItemId')->references('id')->on('portfolios')->onDelete('cascade');
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
        Schema::dropIfExists('portfolio_category_items');
    }
}
