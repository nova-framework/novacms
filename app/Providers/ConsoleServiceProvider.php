<?php
namespace App\Providers;

use Shared\Commands\MakeCmsModuleCommand;
use Nova\Support\ServiceProvider;


class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('command.cms.module.make', function()
        {
            return new MakeCmsModuleCommand;
        });

        $this->commands('command.cms.module.make');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('command.cms.module.make');
    }

}

