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
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
<<<<<<< HEAD
            $table->foreignId('ticket_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('amount_paid', 10, 2)->default(0.00);
            $table->string('payment_status')->default('pending');
            $table->string('payment_id')->nullable();
            $table->string('registration_number')->unique();
            $table->string('status')->default('registered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
=======
            $table->timestamp('registration_date');
            $table->enum('status', ['registered', 'cancelled'])->default('registered');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->unique(['event_id', 'user_id']);
        });
    }

    public function down()
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    {
        Schema::dropIfExists('event_registrations');
    }
};
