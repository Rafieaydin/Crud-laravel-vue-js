<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <= 30 ; $i++) {
            DB::table('siswa')->insert([
                'nipd' => '0000000',
                'nama' => $faker->name,
                'no_telp' => $faker->phoneNumber,
                'id_kelas' => $faker->randomElement($array = array(1,2,3,4,5,6,7,8,9,10)),
                'alamat' => $faker->address,
            ]);
        }

    }
}
