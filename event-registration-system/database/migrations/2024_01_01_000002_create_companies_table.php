<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('is_verified')->default(false);
=======
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('address');
            $table->string('website')->nullable();
            $table->text('description');
            $table->string('logo')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->string('registration_number')->unique();
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
            $table->timestamps();
        });
    }

<<<<<<< HEAD
    /**
     * Reverse the migrations.
     */
    public function down(): void
=======
    public function down()
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    {
        Schema::dropIfExists('companies');
    }
};
