<?php namespace Ddedic\Hit6\Seeds;


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        $this->call('Ddedic\Hit6\Seeds\InitialSeeder');
    }
}