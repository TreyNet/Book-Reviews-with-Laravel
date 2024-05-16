<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Define a new anonymous class that extends the Migration class.
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //Create the 'reviews' table.
        Schema::create('reviews', function (Blueprint $table) {
            // Add an auto-incrementing primary key column.
            $table->id();
            // Add a text column for the review content.
            $table->text('review');
            // Add an unsigned tiny integer column for the rating.
            $table->unsignedTinyInteger('rating');

            $table->timestamps();
            // Add a foreign key constraint for the 'book_id' column.
            $table->foreignId('book_id')->constrained()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Drop the 'reviews' table if it exists.
        Schema::dropIfExists('reviews');
    }
};
