<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ProductPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-admin-panel', function ($user) {
            if ($user->is_admin) {
                return true;
            }

            Log::warning('Unauthorized admin access attempt', [
                'user_id' => $user->id ?? null,
                'email' => $user->email ?? null,
                'time' => now()->toDateTimeString(),
            ]);
            return false;
        });
    }
}
