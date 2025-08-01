<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Event;
use App\Models\Company;
use App\Models\Ticket;
use App\Policies\EventPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\TicketPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Event::class => EventPolicy::class,
        Company::class => CompanyPolicy::class,
        Ticket::class => TicketPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
