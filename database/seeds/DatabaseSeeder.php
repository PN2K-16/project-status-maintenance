<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(); // This turns off Mass assignment constraint of Models

        // $this->call(UserTableSeeder::class);

        // Seed Preorder table
        $this->call('PreordersTableSeeder');
        // Seed itemImages table
        $this->call('itemImagesTableSeeder'); 

        Model::reguard();
    }
}
