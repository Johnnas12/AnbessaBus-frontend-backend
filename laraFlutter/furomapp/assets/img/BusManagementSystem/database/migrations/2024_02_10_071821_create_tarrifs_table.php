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
        Schema::create('tarrifs', function (Blueprint $table) {
            $table->id();
            $table->integer('busnum');
            $table->string('from');
            $table->string('to');
            $table->string('via');
            $table->float('distance');
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarrifs');
    }
};
