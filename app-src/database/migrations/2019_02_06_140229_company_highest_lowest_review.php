<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyHighestLowestReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedInteger('lowest_review_id')->nullable();
            $table->foreign('lowest_review_id')->references('id')->on('reviews')->onDelete('set null');

            $table->unsignedInteger('highest_review_id')->nullable();
            $table->foreign('highest_review_id')->references('id')->on('reviews')->onDelete('set null');
        });
    }
}
