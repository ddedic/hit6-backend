<?php namespace Ddedic\Hit6\Seeds;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {


        $this->seedCities();
        $this->seedShops();
        $this->seedBalls();


    }



    private function seedCities()
    {
        $data = array(
            array(
                'name'              => 'Prozor',
                'active'            => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ),
            array(
                'name'              => 'Mostar',
                'active'            => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            )
        );
        DB::table('cities')->insert($data);
        $this->command->info('Cities Table Seeded');
    }


    private function seedShops()
    {
        $data = array(
            array(
                'city_id'              => 1,
                'name'              => 'BetLive 001',
                'note'              => 'Kod Anđe',
                'active'            => 1,
                'eventInterval'     => 180,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ),
            array(
                'city_id'              => 1,
                'name'              => 'BetLive 002',
                'note'              => 'U Motelu',
                'active'            => 0,
                'eventInterval'     => 180,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ),
            array(
                'city_id'              => 1,
                'name'              => 'Miami-Bet',
                'note'              => 'Caffe Miami',
                'active'            => 1,
                'eventInterval'     => 180,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            )
        );
        DB::table('shops')->insert($data);
        $this->command->info('Shops Table Seeded');
    }




    private function seedBalls()
    {

        // svaki 7 broj od 1. = crveni  (1, 8, 15, 22, 29 ... )
        // svaki 7 broj od 2. = zuti
        // svaki 7 broj od 3. = plavi
        // svaki 7 broj od 4. = zuckasto narandzasta
        // svaki 7 broj od 5. = zelen
        // svaki 7 broj od 6. = rozi
        // svaki 7 broj od 7. = ljubicasta
        

        $data = array();

        for ($i=0; $i < 49; $i++) {

            $data[$i] = [
                'number'    =>  ($i+1),
                'color'     =>  '#FFFFFF',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ];

        }

        DB::table('balls')->insert($data);
        $this->command->info('Balls Table Seeded');
    }



}