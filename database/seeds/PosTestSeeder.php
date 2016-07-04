<?php

use Illuminate\Database\Seeder;

class PosTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test')->delete();
        $faker = Faker\Factory::create();
        $data=array();
        for ($i=1; $i<10; $i++) {
            $data [] = ['id' => $i, 
                        'name' => $faker->name, 
                        'desc' => $faker->realText()
                       ];
        }
        DB::table('test')->insert($data);
        
    }
}
