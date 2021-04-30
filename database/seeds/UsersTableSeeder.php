<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = range(0,20);
        foreach ($arrays as $valor) {
	        DB::table('datos_personales')->insert([	            
	             'nombre' => Str::random(10),
	             'apellido' => Str::random(10),
	             'email' => Str::random(10),
	             'usuario' => Str::random(10),
	        ]);
        }
    }
}
