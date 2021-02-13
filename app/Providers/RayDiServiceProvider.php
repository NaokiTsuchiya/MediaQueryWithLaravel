<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use NaokiTsuchiya\Modules\User\User;
use NaokiTsuchiya\Modules\User\UserModule;
use Ray\Compiler\ScriptInjector;
use Ray\Di\InjectorInterface;

final class RayDiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            InjectorInterface::class,
            static function () {
                return new ScriptInjector(
                    storage_path('injector'),
                    static function () {
                        return new UserModule(
                            resource_path('sql'),
                            'sqlite:' . storage_path('db/mediaQuery')
                        );
                    }
                );
            }
        );

        $this->app->instance(
            User::class,
            $this->app->call(InjectorProxy::class, ['classString' => User::class])
        );
    }
}
