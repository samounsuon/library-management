<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('return_books', function (Blueprint $table) {
            $table->id();
            $table->date("returnbook");
            $table->foreignId('borrow_id')
                ->constrained('borrows')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('book_id')
                ->constrained('books')
                ->onUpdate('cascade');
            $table->foreignId('member_id')
                ->constrained('members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string("status")->default("returned");
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_books');
    }
};
