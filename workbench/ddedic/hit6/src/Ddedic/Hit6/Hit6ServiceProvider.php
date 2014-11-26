<?php namespace Ddedic\Hit6;

use Ddedic\Hit6\Generators\BallGenerator;
use Ddedic\Hit6\Generators\MtRandBallGenerator;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;



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


        // DEPENDENCIES --------
        // Dingo\API
        $loader->alias('API', 'Dingo\Api\Facade\API');


        // HIT 6 ---------------
        // BallGenerator
        $loader->alias('BallGenerator', 'Ddedic\Hit6\Facades\BallGeneratorFacade');







		$this->package('ddedic/hit6');
        $this->bootCommands();



        require_once __DIR__ . '/Support/Helpers/helpers.php';
        require_once __DIR__ . '/Routes/FrontendRoutes.php';
        require_once __DIR__ . '/Routes/BackendRoutes.php';
        require_once __DIR__ . '/Routes/ApiRoutes.php';
        require_once __DIR__ . '/Support/Handlers/ErrorHandler.php';

    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

        // Dingo\API
        $this->app->register('Dingo\Api\Provider\ApiServiceProvider');



        $this->registerCities();
        $this->registerShops();
        $this->registerBalls();
        $this->registerEvents();
        $this->registerBets();

        // Last: Generator Engine
        $this->registerGenerator();

    }





    private function registerBalls()
    {
        $app = $this->app;

        $app->bind('Ddedic\Hit6\Balls\Interfaces\BallInterface', function (Application $app) {
            $repository = new Balls\Repositories\BallRepository(new Balls\Models\Ball);

                //@todo Implement Cache
                return $repository;
        });
    }

    private function registerBets()
    {
        $app = $this->app;

        $app->bind('Ddedic\Hit6\Bets\Interfaces\BetInterface', function (Application $app) {
            $repository = new Bets\Repositories\BetRepository(new Bets\Models\Bet);

            //@todo Implement Cache
            return $repository;
        });
    }

    private function registerCities()
    {
        $app = $this->app;

        $app->bind('Ddedic\Hit6\Cities\Interfaces\CityInterface', function (Application $app) {
            $repository = new Cities\Repositories\CityRepository(new Cities\Models\City);

            //@todo Implement Cache
            return $repository;
        });
    }

    private function registerShops()
    {
        $app = $this->app;

        $app->bind('Ddedic\Hit6\Shops\Interfaces\ShopInterface', function (Application $app) {
            $repository = new Shops\Repositories\ShopRepository(new Shops\Models\Shop);

            //@todo Implement Cache
            return $repository;
        });
    }

    private function registerEvents()
    {
        $app = $this->app;

        $app->bind('Ddedic\Hit6\Events\Interfaces\EventInterface', function (Application $app) {
            $repository = new Events\Repositories\EventRepository(new Events\Models\Event);

            //@todo Implement Cache
            return $repository;
        });
    }





    private function registerGenerator()
    {
        $app = $this->app;

        $app->bindShared('hit6.ball.generator', function(Application $app) {
            // MtRandom Engine
            $generator = new Generators\Engines\MtRandBallGenerator();

            return new BallGenerator($generator, $app->make('Ddedic\Hit6\Balls\Interfaces\BallInterface'));
        });

        /*
        $app->bind('Ddedic\Hit6\Generators\Interfaces\GeneratorInterface', function (Application $app) {
            $generator = new Generators\Engines\MtRandBallGenerator();
            $balls = new Balls\Repositories\BallRepository(new Balls\Models\Ball);

            return new BallGenerator($generator, $balls);
        });
        */
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
