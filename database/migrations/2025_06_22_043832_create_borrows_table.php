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
    Schema::create('borrows', function (Blueprint $table) {
        $table->id();
         $table->date('borrow_date');
        $table->timestamps();
        $table->foreignId('book_id')
            ->constrained('books')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        $table->foreignId('member_id')
            ->constrained('members')
            ->onUpdate('cascade')
            ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
