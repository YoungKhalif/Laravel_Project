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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
<<<<<<< HEAD
            $table->foreignId('registration_id')->constrained('event_registrations')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('check_in_time');
            $table->string('check_in_method')->default('qr_code'); // qr_code, manual, etc.
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
=======
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            $table->timestamp('attended_at');
            $table->enum('check_in_method', ['qr_code', 'manual'])->default('qr_code');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->unique(['ticket_id']);
        });
    }

    public function down()
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    {
        Schema::dropIfExists('attendances');
    }
};
