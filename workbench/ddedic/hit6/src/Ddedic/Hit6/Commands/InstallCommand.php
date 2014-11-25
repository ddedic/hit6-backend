<?php namespace Ddedic\Hit6\Commands;

use File;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class InstallCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'hit6:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run installation for Hit 6.';



    public function __construct()
    {
        parent::__construct();
    }



    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->comment('Installing hit6...');

        // Migrations
        //$this->call('migrate');
        //$this->call('migrate', array('--package' => 'ddedic/nexsell'));
        $this->call('migrate', array('--bench' => 'ddedic/hit6'));

        // Seeds
        $this->comment('Seed Hit6 data...');
        $this->call('db:seed', array('--class' => 'Ddedic\\Hit6\\Seeds\\DatabaseSeeder'));

        // Assets
        // $this->publishAssets();

        // Configuration
        //$this->comment('Publishing configuration...');
        // $this->call('config:publish', array('package' => 'ddedic/hit6'));
        // $this->call('config:publish', array('--bench' => 'ddedic/hit6'));


        $this->comment('Done. Hit6 installed.');
    }


}