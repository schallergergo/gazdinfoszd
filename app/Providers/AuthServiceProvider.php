<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

        'App\Models\Event'   => 'App\Policies\EventPolicy',
        'App\Models\Expense'   => 'App\Policies\ExpensePolicy',
        'App\Models\HorseMessage'   => 'App\Policies\HorseMessagePolicy',
        'App\Models\Horse'   => 'App\Policies\HorsePolicy',
        'App\Models\Income'   => 'App\Policies\IncomePolicy',
        'App\Models\InventoryItem'   => 'App\Policies\InventoryItemPolicy',
        'App\Models\Inventory'   => 'App\Policies\InventoryPolicy',
        'App\Models\Lesson'   => 'App\Policies\LessonPolicy',
        'App\Models\Owner'   => 'App\Policies\OwnerPolicy',
        'App\Models\Rider'   => 'App\Policies\RiderPolicy',
        'App\Models\TaskMessage'   => 'App\Policies\TaskMessagePolicy',
        'App\Models\Task'   => 'App\Policies\Task',
        'App\Models\Treatment'   => 'App\Policies\TreatmentPolicy',
        'App\Models\User'   => 'App\Policies\UserPolicy',
        'App\Models\Venue'   => 'App\Policies\VenuePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
