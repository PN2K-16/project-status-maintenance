<?php

use Illuminate\Database\Seeder;

class PosCusDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_details')->delete();
        $faker=Faker\Factory::create();
        $data=array();
        
        for($i=0;$i<11;$i++){
            $data [] =[
                'cus_id'=>$i,
                'name'=>$faker->unique()->name,
                'telephone_number'=>$faker->phoneNumber,
                'email'=>$faker->unique->email,
                'cus_points'=>$faker->numberBetween(0,10000),
                'addr_no'=>$faker->secondaryAddress,
                'addr_town'=>$faker->city,
                'addr_district'=>$faker->state,
                'password'=>$faker->password,
                'status'=>$faker->numberBetween(0,1),
                'reg_date'=>$faker->dateTimeThisMonth('now'),
                'last_mod'=>$faker->dateTimeThisMonth('now')                   ];
        }
        DB::table('customer_details')->insert($data);
    }
}
