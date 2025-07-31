<?php

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\CurrentDeviceLogout;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Events
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the event / listener mappings for your
    | application. This includes any user-defined events as well as a
    | mapping of Laravel's built-in events to their default listeners.
    |
    */

    'listen' => [
        Registered::class => [
            \App\Listeners\SendWelcomeEmail::class,
        ],

        Login::class => [
            \App\Listeners\LogUserLogin::class,
        ],

        Logout::class => [
            \App\Listeners\LogUserLogout::class,
        ],

        \App\Events\EventRegistered::class => [
            \App\Listeners\SendRegistrationConfirmation::class,
            \App\Listeners\SendTicketQRCode::class,
        ],

        \App\Events\TicketScanned::class => [
            \App\Listeners\RecordAttendance::class,
            \App\Listeners\SendAttendanceNotification::class,
        ],

        \App\Events\EventCancelled::class => [
            \App\Listeners\SendCancellationNotification::class,
            \App\Listeners\ProcessRefunds::class,
        ],

        \App\Events\PaymentProcessed::class => [
            \App\Listeners\SendPaymentConfirmation::class,
            \App\Listeners\GenerateTicket::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Auto-Discovery
    |--------------------------------------------------------------------------
    |
    | If enabled, Laravel will automatically discover and register event
    | listeners in your application. This includes listeners in your
    | application's "Listeners" directory as well as any listeners
    | defined in your service providers.
    |
    */

    'discover' => true,

    /*
    |--------------------------------------------------------------------------
    | Discovery Paths
    |--------------------------------------------------------------------------
    |
    | When auto-discovery is enabled, Laravel will search for listeners
    | in the following paths. You may add additional paths as needed.
    |
    */

    'discovery' => [
        app_path('Listeners'),
    ],

];
