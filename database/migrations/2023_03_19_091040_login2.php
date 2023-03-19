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
        
        Schema::create('login', function(Blueprint $table){
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->foreign('password')->references('password')->on('register')->onDelete(null);
            
            $table->foreign('email')->references('email')->on('register')->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
