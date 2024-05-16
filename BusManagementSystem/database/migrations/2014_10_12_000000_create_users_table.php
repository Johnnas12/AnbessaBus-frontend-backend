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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('username');
            $table->string('phone');
            $table->string('position')->nullable();
            $table->string('age')->nullable();
            $table->string('expriance')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile')->nullable()->default('images/user.png');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');
            $table->boolean('status')->default(1)->nullable();
            $table->rememberToken();
            $table->timestamps();
          
        
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
