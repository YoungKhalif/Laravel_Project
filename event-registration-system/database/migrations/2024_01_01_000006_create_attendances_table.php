<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
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
    {
        Schema::dropIfExists('attendances');
    }
};
