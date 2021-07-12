<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i =1; $i<=200; $i++) {    
            DB::table('productos')->insert([
                'categoria_id'  => 1,
                'referencia'  => $i,
                'nombre' => $faker->streetName,
                'stock' => 0,
                'precio' => 1000,
                'tipo_unidad' => 1,
                'garantia'=> 3,
                'estado'=> 1,
                'atributo'=> 'ninguno',                
            ]);
            }
        //
    }
}
