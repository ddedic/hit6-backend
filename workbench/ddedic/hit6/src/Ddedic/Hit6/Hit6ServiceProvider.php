<?php namespace Ddedic\Hit6;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;



class Hit6ServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        $loader = AliasLoader::getInstance();

        // EventGenerator
        // $loader->alias('EventGenerator', 'Ddedic\Hit6\Facades\EventGeneratorFacade');





		$this->package('ddedic/hit6');

        $this->bootCommands();






        require_once __DIR__.'/../../helpers.php';
        require_once __DIR__.'/../../routes.php';
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

        $this->app->singleton('Ddedic\Hit6\Interfaces\BallInterface', 'Ddedic\Hit6\Models\Ball');
        $this->app->singleton('Ddedic\Hit6\Interfaces\BetInterface', 'Ddedic\Hit6\Models\Bet');
        $this->app->singleton('Ddedic\Hit6\Interfaces\CityInterface', 'Ddedic\Hit6\Models\City');
        $this->app->singleton('Ddedic\Hit6\Interfaces\EventInterface', 'Ddedic\Hit6\Models\Event');
        $this->app->singleton('Ddedic\Hit6\Interfaces\ShopInterface', 'Ddedic\Hit6\Models\Shop');

        $this->app->singleton('Ddedic\Hit6\Interfaces\BallGeneratorInterface', 'Ddedic\Hit6\Generators\MtRandBallGenerator');


    }










    public function bootCommands()
    {
        // Add install command to IoC
        $this->app['hit6.commands.install'] = $this->app->share(function($app) {
            return new Commands\InstallCommand;
        });


        // Add reinstall command to IoC
        $this->app['hit6.commands.reinstall'] = $this->app->share(function($app) {
            return new Commands\ReinstallCommand;
        });


        // Add unistall command to IoC
        $this->app['hit6.commands.uninstall'] = $this->app->share(function($app) {
            return new Commands\UninstallCommand;
        });

        // Now register all the commands
        $this->commands('hit6.commands.install', 'hit6.commands.reinstall', 'hit6.commands.uninstall');
    }






    /**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('hit6.event.generator');
	}

}
