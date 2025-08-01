<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
=======
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'System Administrator',
            'email' => 'admin@eventpro.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '+1234567890',
            'email_verified_at' => now(),
        ]);

        // Create Companies
        $companies = [
            [
                'name' => 'TechEvents Pro',
                'email' => 'info@techevents.com',
                'phone' => '+1234567891',
                'address' => '123 Tech Street, Silicon Valley, CA 94105',
                'website' => 'https://techevents.com',
                'description' => 'Leading technology event management company',
                'registration_number' => 'TE12345',
                'is_verified' => true,
            ],
            [
                'name' => 'Global Conferences Ltd',
                'email' => 'contact@globalconf.com',
                'phone' => '+1234567892',
                'address' => '456 Business Ave, New York, NY 10001',
                'website' => 'https://globalconf.com',
                'description' => 'International business conference organizer',
                'registration_number' => 'GC67890',
                'is_verified' => true,
            ],
            [
                'name' => 'Creative Arts Events',
                'email' => 'hello@creativearts.com',
                'phone' => '+1234567893',
                'address' => '789 Art District, Los Angeles, CA 90028',
                'website' => 'https://creativearts.com',
                'description' => 'Arts and culture event specialists',
                'registration_number' => 'CA11223',
                'is_verified' => false,
            ],
        ];

        foreach ($companies as $companyData) {
            Company::create($companyData);
        }

        // Create Organizers
        $organizers = [
            [
                'name' => 'John Smith',
                'email' => 'john@techevents.com',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'phone' => '+1234567894',
                'company_id' => 1,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah@globalconf.com',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'phone' => '+1234567895',
                'company_id' => 2,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Mike Wilson',
                'email' => 'mike@creativearts.com',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'phone' => '+1234567896',
                'company_id' => 3,
                'email_verified_at' => now(),
            ],
        ];

        foreach ($organizers as $organizerData) {
            User::create($organizerData);
        }

        // Create Attendees
        $attendees = [
            [
                'name' => 'Alice Brown',
                'email' => 'alice@example.com',
                'password' => Hash::make('password'),
                'role' => 'attendee',
                'phone' => '+1234567897',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Bob Davis',
                'email' => 'bob@example.com',
                'password' => Hash::make('password'),
                'role' => 'attendee',
                'phone' => '+1234567898',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Carol White',
                'email' => 'carol@example.com',
                'password' => Hash::make('password'),
                'role' => 'attendee',
                'phone' => '+1234567899',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($attendees as $attendeeData) {
            User::create($attendeeData);
        }

        // Create Events
        $events = [
            [
                'title' => 'Tech Innovation Summit 2025',
                'description' => 'Join us for the biggest technology event of the year featuring latest innovations in AI, blockchain, and IoT.',
                'start_date' => '2025-08-15',
                'end_date' => '2025-08-17',
                'start_time' => '09:00:00',
                'end_time' => '18:00:00',
                'venue' => 'San Francisco Convention Center',
                'address' => '747 Howard St, San Francisco, CA 94103',
                'city' => 'San Francisco',
                'state' => 'California',
                'country' => 'United States',
                'max_attendees' => 1000,
                'ticket_price' => 299.99,
                'organizer_id' => 2,
                'company_id' => 1,
                'status' => 'active',
                'category' => 'technology',
                'tags' => ['AI', 'blockchain', 'IoT', 'innovation'],
            ],
            [
                'title' => 'Global Business Conference',
                'description' => 'Network with industry leaders and discover new business opportunities in this exclusive conference.',
                'start_date' => '2025-09-20',
                'end_date' => '2025-09-22',
                'start_time' => '08:30:00',
                'end_time' => '17:30:00',
                'venue' => 'Javits Center',
                'address' => '429 11th Ave, New York, NY 10001',
                'city' => 'New York',
                'state' => 'New York',
                'country' => 'United States',
                'max_attendees' => 500,
                'ticket_price' => 499.99,
                'organizer_id' => 3,
                'company_id' => 2,
                'status' => 'active',
                'category' => 'business',
                'tags' => ['networking', 'business', 'leadership'],
            ],
            [
                'title' => 'Digital Art Showcase',
                'description' => 'Experience the future of digital art with interactive exhibitions and live performances.',
                'start_date' => '2025-10-10',
                'end_date' => '2025-10-12',
                'start_time' => '10:00:00',
                'end_time' => '20:00:00',
                'venue' => 'Los Angeles Art Center',
                'address' => '1234 Art Street, Los Angeles, CA 90028',
                'city' => 'Los Angeles',
                'state' => 'California',
                'country' => 'United States',
                'max_attendees' => 300,
                'ticket_price' => 89.99,
                'organizer_id' => 4,
                'company_id' => 3,
                'status' => 'active',
                'category' => 'arts',
                'tags' => ['digital art', 'exhibition', 'performance'],
            ],
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }

        // Create Sample Tickets and Registrations
        $event1 = Event::find(1);
        $event2 = Event::find(2);

        // Create registrations and tickets for attendees
        foreach ([5, 6, 7] as $userId) {
            // Register for event 1
            EventRegistration::create([
                'event_id' => 1,
                'user_id' => $userId,
                'registration_date' => now(),
                'status' => 'registered',
            ]);

            // Create ticket for event 1
            Ticket::create([
                'event_id' => 1,
                'user_id' => $userId,
                'ticket_number' => 'TKT-' . strtoupper(uniqid()),
                'price' => 299.99,
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'card',
                'qr_code' => base64_encode('TKT-' . uniqid() . '-1-' . $userId),
                'purchased_at' => now(),
            ]);
        }

        // Create some tickets for event 2
        foreach ([5, 6] as $userId) {
            EventRegistration::create([
                'event_id' => 2,
                'user_id' => $userId,
                'registration_date' => now(),
                'status' => 'registered',
            ]);

            Ticket::create([
                'event_id' => 2,
                'user_id' => $userId,
                'ticket_number' => 'TKT-' . strtoupper(uniqid()),
                'price' => 499.99,
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'paypal',
                'qr_code' => base64_encode('TKT-' . uniqid() . '-2-' . $userId),
                'purchased_at' => now(),
            ]);
        }
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    }
}
