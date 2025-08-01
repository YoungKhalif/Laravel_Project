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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
<<<<<<< HEAD
            $table->string('category');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('location');
            $table->text('address')->nullable();
            $table->enum('event_type', ['in_person', 'online', 'hybrid'])->default('in_person');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('status')->default('published');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null');
=======
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('venue');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('max_attendees');
            $table->decimal('ticket_price', 10, 2);
            $table->foreignId('organizer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'cancelled', 'completed'])->default('active');
            $table->string('category');
            $table->json('tags')->nullable();
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
        Schema::dropIfExists('events');
    }
};
