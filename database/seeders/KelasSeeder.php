<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 10 ; $i++) {
            DB::table('kelas')->insert([
                'level' =>  $faker->randomElement($array = array('X','XI','XII')),
                'jurusan' =>  $faker->randomElement($array = array('RPL', 'MM', 'BC'))
            ]);
        }

    }
}
