<?php namespace Technabit\Core;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;


use Debugbar;

class CoreServiceProvider extends ServiceProvider {

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

        // Confide
        $loader->alias('Confide', 'Zizaco\Confide\Facade');



		$this->package('technabit/core');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//Debugbar::info('Technabit Core Service Provider loaded');

        $this->app->register('Zizaco\Confide\ServiceProvider');

    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
