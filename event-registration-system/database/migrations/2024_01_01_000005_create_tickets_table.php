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
=======
    public function up()
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
<<<<<<< HEAD
            $table->string('name');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->integer('quantity');
            $table->integer('available');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
=======
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ticket_number')->unique();
            $table->decimal('price', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->text('qr_code');
            $table->timestamp('purchased_at');
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
        Schema::dropIfExists('tickets');
    }
};
