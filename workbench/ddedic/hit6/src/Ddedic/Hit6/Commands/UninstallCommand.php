<?php namespace Ddedic\Hit6\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class UninstallCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'hit6:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete data, and unistall Hit6.';

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
    }

}