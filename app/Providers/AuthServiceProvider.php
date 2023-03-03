<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
//        Gate::define('update-book', function(User $user, Book $book) {
//            $book->user()->is($user);
//        });
        $this->registerPolicies();

//        Password::default(fn () =>
//            Password::min(8)
//            ->numbers()
//            ->mixedCase()
//            ->symbols()
//        );
        Password::default(fn () =>
        Password::min(8)->uncompromised() // makes a call to a list of passwords which are known to have been compromised
        );
    }
}
