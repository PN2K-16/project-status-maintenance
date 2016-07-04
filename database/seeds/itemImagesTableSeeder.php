<?php

use Illuminate\Database\Seeder;

class itemImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        // Wipe the table clean before populating
        DB::table('itemImages')->delete();

        // Create a Faker/Generator insatance
        $faker = Faker\Factory::create();

        $itemImages = array();

        for ($i=1; $i<7; $i++) {
        	$itemImages [] = [
                'item_id' => $i,
                'img_url' => $faker->imageUrl(240, 200, 'food')
                ];
        }
       
        // Uncomment the below to run the seeder
        DB::table('itemImages')->insert($itemImages);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('itemImages');
    }
}
