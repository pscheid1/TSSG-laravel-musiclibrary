<?php

namespace App\Providers;

use App\Style;
use App\Policies\StylePolicy;
use App\Tempo;
use App\Policies\TempoPolicy;
use App\User;
use App\Policies\UserPolicy;
use App\Contact;
use App\Policies\ContactPolicy;
use App\Musiclibrary;
use App\Policies\MusicLibraryPolicy;
use App\Role;
use App\Policies\RolePolicy;
use App\Group;
use App\Policies\GroupPolicy;


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
        Tempo::class => TempoPolicy::class,
        User::class => UserPolicy::class,
        Musiclibrary::class => MusicLibraryPolicy::class,
        Contact::class => ContactPolicy::class,
        Role::class => RolePolicy::class,
        Group::class => GroupPolicy::class
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
    }

}
