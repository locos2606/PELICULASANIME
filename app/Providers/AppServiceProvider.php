<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use App\Http\Livewire\CommentComponent;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    
    /**
     * Bootstrap any application services.
     */
    //aqui vamos a registrar los persimos para el admin
    public function boot(): void
    {
        Schema::defaultStringLength(191);


        Livewire::component('comment-component', CommentComponent::class);
        //admin mode
        Gate::define('see-reports',function(User $user){
            return $user->role ==User::ROLE_ADMINISTRATOR;
        });

        //mangaka mode
        Gate::define('post-content',function(User  $user){
            return $user->role ==User::ROLE_MANGAKA;
        });
        
        //reader mode
        Gate::define('read-content',function(User  $user){
            return $user->role ==User::ROLE_READER;
        });
    }
}
