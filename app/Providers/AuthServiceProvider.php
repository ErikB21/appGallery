<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Model\Album' => 'App\Policies\AlbumPolicy',
        // 'App\Model\Photo' => 'App\Policies\PhotoPolicy',
        //non necessarie perchè laravel andrà a ispezionare la cartella delle policy in modo autonomo
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-album', function(User $user, Album $album){
            return $user->id === $album->user_id;
        });
    }
}
