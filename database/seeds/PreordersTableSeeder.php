<?php

use Illuminate\Database\Seeder;
//use Faker\Factory as Faker;
use Carbon\Carbon;

class PreordersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Wipe the table clean before populating
        DB::table('preorders')->delete();
        DB::table('preorderItems')->delete();

        // Create a Faker/Generator insatance
        $faker = Faker\Factory::create();

        // Sample customers who placed orders
        $customers = array(201, 202, 203);

 
        $preorders = array();
        $preorderItems = array();

        for ($i=1; $i<10; $i++) {
        	$preorders [] = [
                'preorder_id' => $i,
                'customer_id' => $faker->randomElement($customers),
                //'value' => $faker->numberBetween()
                'ready_time' => Carbon::now()->addHours(2), 
                'description' => $faker->realText(),
                'status' => $faker->randomElement(array('pending', 'approved', 'completed')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
                ];
        }

        for ($i=1; $i<4; $i++) {
            $preorderItems [] = [
                'preorder_id' => $i,
                'item_id' => $faker->randomElement(array(1, 2, 3, 4, 5)),
                'qty' => $faker->numberBetween(0,10)
                //'uvalue'
                'item_name' => $
                //'discount'
            ];
        }

        // Uncomment the below lines to run the seeder
        DB::table('preorders')->insert($preorders);
        DB::table('preorderItems')->insert($preorderItems);
    }
}
