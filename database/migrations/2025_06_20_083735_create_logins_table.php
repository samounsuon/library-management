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
            Schema::create('logins', function (Blueprint $table) {
            $table->string("email"); // fixed typo
            $table->string("password");
            $table->timestamps();
            // $table->foreignId('member_id')
            //     ->constrained('members')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade'); // fixed typo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
