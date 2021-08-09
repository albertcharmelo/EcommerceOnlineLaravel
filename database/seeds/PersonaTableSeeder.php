<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            DB::table('personas')->insert([
                // 'nombre' => $faker->name,
                'nombre' => $faker->company,
                'tipo_documento' => 1,
                'num_documento' => ($i+10)*$faker->randomDigit(10),
                'direccion' => $faker->text(120),
                'telefono' =>  $faker->phoneNumber,
                'tipo_persona' => '1',
                // 'email' => Str::random(10).'@gmail.com', 
                'email' => $faker->email,
            ]);
        }
    }
}
