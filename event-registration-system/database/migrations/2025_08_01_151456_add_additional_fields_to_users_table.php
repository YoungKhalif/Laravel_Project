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
        Schema::table('users', function (Blueprint $table) {
            // Add new fields that don't exist in the original migration
            $table->date('date_of_birth')->nullable();
            $table->enum('user_type', ['attendee', 'organizer', 'company'])->default('attendee');
            $table->string('company_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_birth',
                'user_type',
                'company_name',
                'contact_person',
                'website',
                'location',
                'description'
            ]);
        });
    }
};
