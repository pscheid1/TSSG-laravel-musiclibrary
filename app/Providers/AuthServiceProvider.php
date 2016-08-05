<?php

namespace App\Providers;

use App\Style;
use App\Policies\StylePolicy;
use App\Tempo;
use App\Policies\TempoPolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Style::class => StylePolicy::class,
        Tempo::class => TempoPolicy::class
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
/*
        //
        $gate->define('super-admin-access', function($user)
        {
            return $user->role == 'super-admin';
        });

        $gate->define('admin-access', function($user)
        {
            return $user->role == 'admin';
        });

        $gate->define('band-manager-access', function($user)
        {
            return $user->role == 'manager';
        });

        $gate->define('alumnus-access', function($user)
        {
            return $user->role == 'alumnus';
        });
        
        $gate->define('composer-access', function($user)
        {
            return $user->role == 'composer';
        });
                
        $gate->define('event-contact-access', function($user)
        {
            return $user->role == 'event-contact';
        });
        
        $gate->define('groupie-access', function($user)
        {
            return $user->role == 'groupie';
        });
        
        $gate->define('musician-access', function($user)
        {
            return $user->role == 'musician';
        });
        
        $gate->define('publisher-access', function($user)
        {
            return $user->role == 'publisher';
        });
        
        $gate->define('substitute-musician-access', function($user)
        {
            return $user->role == 'substitute';
        });
        
        $gate->define('supplier-access', function($user)
        {
            return $user->role == 'supplier';
        });
        
        $gate->define('venue-contact-access', function($user)
        {
            return $user->role == 'venue-contact';
        });
        
        $gate->define('guest-access', function($user)
        {
            return $user->role == 'guest';
        });
*/
    }

}
