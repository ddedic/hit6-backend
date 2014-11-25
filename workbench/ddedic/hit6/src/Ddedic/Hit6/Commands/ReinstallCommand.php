<?php namespace Ddedic\Hit6\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class ReinstallCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'hit6:reinstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete data, and reinstall Hit6.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->comment('Reseting Hit6...');
        $this->call('migrate:reset');
        $this->comment('Done.');
        $this->call('hit6:install');
    }

}