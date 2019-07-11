<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipos')->insert([
            0 => [
                'id'        => 1,
                'tipo'      => 'administrador',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'    => 2,
                'tipo'  => 'profesor',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'    => 3,
                'tipo'  => 'alumno',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('users')->insert([
            0 => [
                'id'        => 1,
                'tipo_id'   => 2,
                'clave'     => 'P0001',
                'password'   => bcrypt('P0001'),
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'        => 2,
                'tipo_id'   => 2,
                'clave'     => 'P0002',
                'password'   => bcrypt('P0002'),
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'        => 3,
                'tipo_id'   => 3,
                'clave'     => 'A0001',
                'password'   => bcrypt('A0001'),
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'        => 4,
                'tipo_id'   => 3,
                'clave'     => 'A0002',
                'created_at' => '2019-05-27 00:00:00',
                'password'   => bcrypt('A0002'),
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('categorias')->insert([
            0 => [
                'id'        => 1,
                'categoria' => 'documento'
            ],
            1 => [
                'id'        => 2,
                'categoria' => 'audio'
            ],
            2 => [
                'id'        => 3,
                'categoria' => 'video'
            ],
            3 => [
                'id'        => 4,
                'categoria' => 'pagina'
            ],
        ]);
    }
}
