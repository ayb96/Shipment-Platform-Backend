<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        \App\Models\User::all()->each(function ($user) use ($faker){
            foreach (range(1, 30) as $i){
                \App\Models\Shipment::create([
                    'address'=>$faker->address,
                    'waybill'=>$faker->sentence,
                    'name'=>$faker->name,
                    'phone'=>$faker->phoneNumber,
                    'user_id'=>$user->getKey(),
                ]);
            }
        });
    }
}
