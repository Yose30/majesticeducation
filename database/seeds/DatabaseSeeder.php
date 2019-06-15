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
        // $this->call(UsersTableSeeder::class);
        \DB::table('tipos')->insert([
            0 => [
                'id'        => 1,
                'tipo'      => 'Administrador',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'    => 2,
                'tipo'  => 'Profesor',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'    => 3,
                'tipo'  => 'Alumno',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'    => 4,
                'tipo'  => 'Especial',
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
            4 => [
                'id'        => 5,
                'tipo_id'   => 4,
                'clave'     => 'E0001',
                'created_at' => '2019-05-27 00:00:00',
                'password'   => bcrypt('E0001'),
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('libros')->insert([
            0 => [
                'id'            => 1,
                'tipo'       => 1, 
                'clave'         => '000119A',
                'titulo'        => 'Tecnologías de la Información y la Comunicación',
                'sinopsis'      => 'Actividades para trabajar habilidades sociemocionales, lecturas con temas integradores, dossier con los ejercicios de esfuerzo, material adicional en plataforma.',
                'image_url'     => 'tics.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //DGETI, 1er semestre
            ],
            1 => [
                'id'            => 2,
                'tipo'       => 2, 
                'clave'         => '000219A',
                'titulo'        => 'Tecnologías de la Información y la Comunicación',
                'sinopsis'      => 'Actividades para trabajar habilidades sociemocionales, lecturas con temas integradores, dossier con los ejercicios de esfuerzo, material adicional en plataforma.',
                'image_url'     => 'tics.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //DGETI, 1er semestre
            ],
            2 => [
                'id'            => 3,
                'tipo'       => 1, 
                'clave'         => '000319A',
                'titulo'        => 'Best of English 3',
                'sinopsis'      => 'Para bachillerato tecnológico: actividades, lecturas literarias, ejercicios para ejercitar las 4 habilidades y alcanzar un nivel B2 del MCC. Con audios y apoyo adicional en plataforma.',
                'image_url'     => 'the-best-of-english-3.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //DGETI, 3er semestre
            ],
            3 => [
                'id'            => 4,
                'tipo'       => 2, 
                'clave'         => '000419A',
                'titulo'        => 'Best of English 3',
                'sinopsis'      => 'Para bachillerato tecnológico: actividades, lecturas literarias, ejercicios para ejercitar las 4 habilidades y alcanzar un nivel B2 del MCC. Con audios y apoyo adicional en plataforma.',
                'image_url'     => 'the-best-of-english-3.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //DGETI, 3er semestre
            ],
            4 => [
                'id'            => 5,
                'tipo'       => 1, 
                'clave'         => '000519A',
                'titulo'        => 'Química 1',
                'sinopsis'      => 'Actividades para trabajar habilidades socioemocinales, lecturas con temas integradores, dossier con los ejercicios de esfuerzo, material adicional en plataforma.',
                'image_url'     => 'quimica-1.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //DGETI, 1er semestre
            ],
            5 => [
                'id'            => 6,
                'tipo'       => 2, 
                'clave'         => '000619A',
                'titulo'        => 'Química 1',
                'sinopsis'      => 'Actividades para trabajar habilidades socioemocionales, lecturas con temas integradores, dossier con los ejercicios de esfuerzo, material adicional en plataforma.',
                'image_url'     => 'quimica-1.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //DGETI, 1er semestre
            ],
            6 => [
                'id'            => 7,
                'tipo'       => 1, 
                'clave'         => '000719A',
                'titulo'        => 'Manejo de aplicaciones por Medios Digitales',
                'sinopsis'      => 'Acordes a los programas de CONALEP, actividades de refuerzo a los programas <<Yo no abandono>> y <<Constrúye T>>. Con apoyos y ejercicios en plataforma.',
                'image_url'     => 'mdap-medios-digitales.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //CONALEP, 2do semestre
            ],
            7 => [
                'id'            => 8,
                'tipo'       => 2, 
                'clave'         => '000819A',
                'titulo'        => 'Manejo de aplicaciones por Medios Digitales',
                'sinopsis'      => 'Acordes a los programas de CONALEP, actividades de refuerzo a los programas <<Yo no abandono>> y <<Constrúye T>>. Con apoyos y ejercicios en plataforma.',
                'image_url'     => 'mdap-medios-digitales.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //CONALEP, 2do semestre
            ],
            8 => [
                'id'            => 9,
                'tipo'       => 1, 
                'clave'         => '000919A',
                'titulo'        => 'Manual de actividades experimentales de Química 3',
                'sinopsis'      => 'Para el trabajo en laboratorio, sigue paso a paso el método científico, con información para tus investigaciones, medidas de precaución, manejo de residuos y material adicional en plataforma.',
                'image_url'     => 'mdae-quimica-3.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //CCH, DGB, Cecyt-IPN, 2, 3, 5 semestre
            ],
            9 => [
                'id'            => 10,
                'tipo'       => 2, 
                'clave'         => '001019A',
                'titulo'        => 'Manual de actividades experimentales de Química 3',
                'sinopsis'      => 'Para el trabajo en laboratorio, sigue paso a paso el método científico, con información para tus investigaciones, medidas de precaución, manejo de residuos y material adicional en plataforma.',
                'image_url'     => 'mdae-quimica-3.jpg',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00' //CCH, DGB, Cecyt-IPN, 2, 3, 5 semestre
            ],
        ]);
        
        \DB::table('subsistemas')->insert([
            0 => [
                'id'        => 1,
                'subsistema'     => 'DGB',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'        => 2,
                'subsistema'     => 'EPOEM',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'        => 3,
                'subsistema'     => 'DGETI',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'        => 4,
                'subsistema'     => 'CONALEP',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'        => 5,
                'subsistema'     => 'Colegio de Bachilleres',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'        => 6,
                'subsistema'     => 'Cecyt-IPN',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'        => 7,
                'subsistema'     => 'CCH',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('semestres')->insert([
            0 => [
                'id'        => 1,
                'semestre'     => 'Semestre 1',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'        => 2,
                'semestre'     => 'Semestre 2',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'        => 3,
                'semestre'     => 'Semestre 3',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'        => 4,
                'semestre'     => 'Semestre 4',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'        => 5,
                'semestre'     => 'Semestre 5',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'        => 6,
                'semestre'     => 'Semestre 6',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('libro_semestre')->insert([
            0 => [
                'id'            => 1,
                'semestre_id'   => 1,
                'libro_id'      => 1,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'            => 2,
                'semestre_id'   => 1,
                'libro_id'      => 2,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'            => 3,
                'semestre_id'   => 3,
                'libro_id'      => 3,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'            => 4,
                'semestre_id'   => 3,
                'libro_id'      => 4,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'            => 5,
                'semestre_id'   => 1,
                'libro_id'      => 5,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'            => 6,
                'semestre_id'   => 1,
                'libro_id'      => 6,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'            => 7,
                'semestre_id'   => 2,
                'libro_id'      => 7,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            7 => [
                'id'            => 8,
                'semestre_id'   => 2,
                'libro_id'      => 8,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'            => 9,
                'semestre_id'   => 2,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            9 => [
                'id'            => 10,
                'semestre_id'   => 2,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            10 => [
                'id'            => 11,
                'semestre_id'   => 3,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            11 => [
                'id'            => 12,
                'semestre_id'   => 3,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            12 => [
                'id'            => 13,
                'semestre_id'   => 5,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            13 => [
                'id'            => 14,
                'semestre_id'   => 5,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('libro_subsistema')->insert([
            0 => [
                'id'            => 1,
                'subsistema_id' => 3,
                'libro_id'      => 1,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'            => 2,
                'subsistema_id' => 3,
                'libro_id'      => 2,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'            => 3,
                'subsistema_id' => 3,
                'libro_id'      => 3,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'            => 4,
                'subsistema_id' => 3,
                'libro_id'      => 4,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'            => 5,
                'subsistema_id' => 3,
                'libro_id'      => 5,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'            => 6,
                'subsistema_id' => 3,
                'libro_id'      => 6,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'            => 7,
                'subsistema_id' => 4,
                'libro_id'      => 7,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            7 => [
                'id'            => 8,
                'subsistema_id' => 4,
                'libro_id'      => 8,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'            => 9,
                'subsistema_id' => 7,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            9 => [
                'id'            => 10,
                'subsistema_id' => 7,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            10 => [
                'id'            => 11,
                'subsistema_id' => 1,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            11 => [
                'id'            => 12,
                'subsistema_id' => 1,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            12 => [
                'id'            => 13,
                'subsistema_id' => 6,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            13 => [
                'id'            => 14,
                'subsistema_id' => 6,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('songs')->insert([
            0 => [
                'id'            => 1,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 001',
                'url'           => '0B4lctXErlSvzLUc1SlF3NWM4UVE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'            => 2,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 002',
                'url'           => '0B4lctXErlSvzaEl0N0RMWjhSU3c',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'            => 3,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 003',
                'url'           => '0B4lctXErlSvzWk5hbWdCamdRLVE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'            => 4,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 004',
                'url'           => '0B4lctXErlSvzelREQ3JVY2JqYWs',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'            => 5,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 005',
                'url'           => '0B4lctXErlSvzc29PRTZhMzdWSWc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'            => 6,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 006',
                'url'           => '0B4lctXErlSvzZ2Q0MWRaQVZFLTA',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'            => 7,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 007',
                'url'           => '0B4lctXErlSvzZWhBU2RHR1B3Vm8',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            // 7 => [
            //     'id'            => 8,
            //     'libro_id'      => 3,
            //     'titulo'        => 'the best english 3 008',
            //     'url'           => null,
            //     'created_at' => '2019-05-27 00:00:00',
            //     'updated_at' => '2019-05-27 00:00:00'
            // ],
            7 => [
                'id'            => 8,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 009',
                'url'           => '0B4lctXErlSvzQXJ1OS1ERVdzdnM',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'            => 9,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 010',
                'url'           => '0B4lctXErlSvzRWt3c1hjbk1ib0U',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            9 => [
                'id'            => 10,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 011',
                'url'           => '0B4lctXErlSvzMzRnQkJ6ckR5aTA',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            10 => [
                'id'            => 11,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 012',
                'url'           => '0B4lctXErlSvzRlkwNk1HTEhMd1E',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            11 => [
                'id'            => 12,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 013',
                'url'           => '0B4lctXErlSvzbW1lanFacXZYVEU',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            12 => [
                'id'            => 13,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 014',
                'url'           => '0B4lctXErlSvzYzFEZjlueUR1dUU',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            13 => [
                'id'            => 14,
                'libro_id'      => 3,
                'titulo'        => 'the best english 3 015',
                'url'           => '0B4lctXErlSvzNUxFcHFfekJ4VVk',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            // Audios Alumno The Best English 3
            14 => [
                'id'            => 15,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 001',
                'url'           => '0B4lctXErlSvzTmVON0l0Q3FlZkk',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            15 => [
                'id'            => 16,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 002',
                'url'           => '0B4lctXErlSvzRktNYnlxbnI1eVE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            16 => [
                'id'            => 17,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 003',
                'url'           => '0B4lctXErlSvzNmV0SUJEdnRQZ0k',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            17 => [
                'id'            => 18,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 004',
                'url'           => '0B4lctXErlSvzT3d0SFQySXAxLWc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            18 => [
                'id'            => 19,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 005',
                'url'           => '0B4lctXErlSvzdTkyZHR3NU9zRUE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            19 => [
                'id'            => 20,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 006',
                'url'           => '0B4lctXErlSvzTTc2a0VDQmJpa2M',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            20 => [
                'id'            => 21,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 007',
                'url'           => '0B4lctXErlSvzdTl5ZmZuRWhYR3M',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            21 => [
                'id'            => 22,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 008',
                'url'           => '0B4lctXErlSvzN3pVdXljeGlKTXM',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
          
            22 => [
                'id'            => 23,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 009',
                'url'           => '0B4lctXErlSvzX2oxZDVpYndBc00',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            23 => [
                'id'            => 24,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 010',
                'url'           => '0B4lctXErlSvzS3VaQndZYXBZUHc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            24 => [
                'id'            => 25,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 011',
                'url'           => '0B4lctXErlSvzSGktUnRXU1Q3ZGc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            25 => [
                'id'            => 26,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 012',
                'url'           => '0B4lctXErlSvzQVNkSGhxbmdPZUE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            26 => [
                'id'            => 27,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 013',
                'url'           => '0B4lctXErlSvzTjdJd2NYUXpTMnM',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            27 => [
                'id'            => 28,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 014',
                'url'           => '0B4lctXErlSvzVGNGWjRZQk5fLTA',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            28 => [
                'id'            => 29,
                'libro_id'      => 4,
                'titulo'        => 'the best english 3 015',
                'url'           => '0B4lctXErlSvzRFhSM3hYcF9EazA',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('categorias')->insert([
            0 => [
                'id'         => 1,
                'categoria'  => 'Reactivos adicionales',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'         => 2,
                'categoria'  => 'Guía del docente',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'         => 3,
                'categoria'  => 'Conoce más',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'         => 4,
                'categoria'  => 'Cuadernillo de tareas',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'         => 5,
                'categoria'  => 'Evaluación diagnostica',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'         => 6,
                'categoria'  => 'ECAS',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'         => 7,
                'categoria'  => 'Recursos adicionales',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            7 => [
                'id'         => 8,
                'categoria'  => 'Cuadernillo de actividades de acuerdo al nuevo modelo educativo con y sin respuestas',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'         => 9,
                'categoria'  => 'Habilidades socioeconomicas',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            9 => [
                'id'         => 10,
                'categoria'  => 'Planes y programas vigentes',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            10 => [
                'id'         => 11,
                'categoria'  => 'Talleres para personal docente',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            11 => [
                'id'         => 12,
                'categoria'  => 'Para saber más',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            12 => [
                'id'         => 13,
                'categoria'  => 'Teacher Book',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            13 => [
                'id'         => 14,
                'categoria'  => 'Evaluaciones IGRADE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
        ]);

        \DB::table('documentos')->insert([
           
            0 => [
                'id'        => 1,
                'libro_id'  => 3,
                'titulo'    => 'The Best-DGTI TG Book 3 Test',
                'categoria_id' => 13,
                'url'       => '0B4lctXErlSvzSXVUd3pZelVoakU',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'        => 2,
                'libro_id'  => 3,
                'titulo'    => 'The Best of English 3 SR',
                'categoria_id' => 8,
                'url'       => '0B4lctXErlSvzNEEtd1NFeXlCYXc',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'        => 3,
                'libro_id'  => 3,
                'titulo'    => 'The Best of English 3 CR',
                'categoria_id' => 8,
                'url'       => '0B4lctXErlSvzMmNlT1ZxX3c5OXM',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'        => 4,
                'libro_id'  => 3,
                'titulo'    => 'Teacher´s The Best-DGETI Book 3',
                'categoria_id' => 13,
                'url'       => '0B4lctXErlSvzXzdSN2RpVkF2UWs',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'        => 5,
                'libro_id'  => 3,
                'titulo'    => 'Resumen Ejecutivo Estrategia Nacional de Inglés',
                'categoria_id' => 10,
                'url'       => '1-Hl-NVE5XajF790G0J1KuGFldF3fVPUP',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            
            5 => [
                'id'        => 6,
                'libro_id'  => 3,
                'titulo'    => '(Solo Vista Preliminar)iGrade Best of English 3 Teachers',
                'categoria_id' => 14,
                'url'       => '1EnBNrwKZVoRjBFjCHmMJ8rqUvUK3uWPe',
                'url_otro'        =>'1YC17nYYwwfMEoe502kx8pAd0qriiILjd',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'        => 7,
                'libro_id'  => 3,
                'titulo'    => 'Tutorial iGrade Majestic-Docentes',
                'categoria_id' => 14,
                'url'       => '1g0HxEeiFbb4lwJ_KAx0MpJ8eectAOE3U',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            
            7 => [
                'id'        => 8,
                'libro_id'  => 3,
                'titulo'    => 'Oferta de talleres para personal docente 2019',
                'categoria_id' => 11,
                'url'       => '1_aHOZRDU30lxOfEZZ2lk-xXpmNiMVS12',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'        => 9,
                'libro_id'  => 3,
                'titulo'    => 'Ingles-III',
                'categoria_id' => 10,
                'url'       => '1p0npd-ByuFL9TEyv03EKpuscMdwPYpH_',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            //The Best English 3 Alumno 
            9 => [
                'id'        => 10,
                'libro_id'  => 4,
                'titulo'    => 'The Best of English 3 Cuadernillo actividades alumno',
                'categoria_id' => 8,
                'url'       => '0B4lctXErlSvzSHZBUmpNUXlTdnM',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],


            10 => [
                'id'        => 11,
                'libro_id'  => 4,
                'titulo'    => 'Tutorial iGrade Majestic-Alumnos',
                'categoria_id' => 14,
                'url'       => '1L83GityYJzSYjT0mqqSdFweMQJAOo2w-',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            11 => [
                'id'        => 12,
                'libro_id'  => 4,
                'titulo'    => '(Solo Vista Preliminar) The Best of English 3 Module 1 Student',
                'categoria_id' => 14,
                'url'       => '1uffThyKmOobXVyR3D51hvgc0_OMtg6kj',
                'url_otro'        => '10AhX7yHiS4KtisBayztH0jv0Ug7RCRx4',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],


            //TIC´s Profesor
            12 => [
                'id'        => 13,
                'libro_id'  => 1,
                'titulo'    => 'Oferta de talleres para personal docente 2019',
                'categoria_id' => 11,
                'url'       => '1P4jgPbMxgo2MY6cUKa9ITp1RhJatNK7r',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            13 => [
                'id'        => 14,
                'libro_id'  => 1,
                'titulo'    => 'Guía del docente TIC´s',
                'categoria_id' => 2,
                'url'       => '1UZLStZkIj1AAcIl-6HUFxPEcHatvvuqR',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            14 => [
                'id'        => 15,
                'libro_id'  => 1,
                'titulo'    => 'Reactivos adicionales con respuesta',
                'categoria_id' => 1,
                'url'       => '1uQKWfZb4_f47YaE_ZIndlr6b4EEYQCrS',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            15 => [
                'id'        => 16,
                'libro_id'  => 1,
                'titulo'    => 'Reactivos adicionales sin respuesta',
                'categoria_id' => 1,
                'url'       => '1PpI3VVxjwKKUVODdbWcvvb9VkN84rVGv',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            16 => [
                'id'        => 17,
                'libro_id'  => 1,
                'titulo'    => 'Cuadernillo de tareas',
                'categoria_id' => 4,
                'url'       => '1TiU0FPekcxeLsTVt6YMGx4ktUagw-VTR',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            17 => [
                'id'        => 18,
                'libro_id'  => 1,
                'titulo'    => 'Estrategia Centrada en el Aprendizaje',
                'categoria_id' => 6,
                'url'       => '1zkwbVbFcGEtt8oHr7l9NgH871hyzAX-G',
                'url_otro'   => '1SARcYBgNaqrVZ7Dc4QckRd2I6y_iHIG7',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            //TIC´s Alumno
            18 => [
                'id'        => 19,
                'libro_id'  => 2,
                'titulo'    => 'Cuadernillo de tareas',
                'categoria_id' => 4,
                'url'       => '1nC41OCcj77b9YCBxvEDffWp3a3HIpjTD',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //Química 1 Profesor
            
            19 => [
                'id'        => 20,
                'libro_id'  => 5,
                'titulo'    => 'Oferta de talleres para personal docente 2019',
                'categoria_id' => 11,
                'url'       => '19lsd8URJh4DhVgZjfwOAM619uMxzXSJI',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            20 => [
                'id'        => 21,
                'libro_id'  => 5,
                'titulo'    => 'Unidad 1 ECA',
                'categoria_id' => 6,
                'url'       => '1GC_kRUc3HshiLGXXQfE3kvCgV4MaAAWf',
                'url_otro'        => '1yLSvs7fOOHKnzGGX_BoSwh_IDphgbW42',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
           
            21 => [
                'id'        => 22,
                'libro_id'  => 5,
                'titulo'    => 'Química 1 guía del docente',
                'categoria_id' => 2,
                'url'       => '18fSW7ryt0Xrbp0R_o5NsQaJaV4Vz7LF_',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            22 => [
                'id'        => 23,
                'libro_id'  => 5,
                'titulo'    => 'Evaluaciones adicionales con respuesta',
                'categoria_id' => 1,
                'url'       => '1T-MofbVXX6IovuI-eX8Rxv7NzSaLaHBv',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            23 => [
                'id'        => 24,
                'libro_id'  => 5,
                'titulo'    => 'Evaluaciones adicionales sin respuesta',
                'categoria_id' => 1,
                'url'       => '14Erub2fcnXZLnkOTA3GkBp1nspSsXR5U',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            
            24 => [
                'id'        => 25,
                'libro_id'  => 5,
                'titulo'    => 'Cuadernillo de tareas con respuesta',
                'categoria_id' => 4,
                'url'       => '1SH7rEw9leZQGD1Kr_X69MKL3xw0TDtFn',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            25 => [
                'id'        => 26,
                'libro_id'  => 5,
                'titulo'    => 'Unidad 2 ECA',
                'categoria_id' => 6,
                'url'       => '1hleoBSxBsS-8doTZv2sddVRPOY5Pdalm',
                'url_otro'        => '1jeToEIPnuLJCZKjgj41lckbzzHZeraFx',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            26 => [
                'id'        => 27,
                'libro_id'  => 5,
                'titulo'    => 'Unidad 3 ECA',
                'categoria_id' => 6,
                'url'       => '1Y-NPR3ASiNGVLUwJfc9bhnZXUNR1T6ls',
                'url_otro'        => '1SeribUoooJ0a4bHFP8a6Q93cw29NuRTu',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            27 => [
                'id'        => 28,
                'libro_id'  => 5,
                'titulo'    => 'Cuadernillo de tareas sin respuesta',
                'categoria_id' => 4,
                'url'       => '1wZJq_6mAyuBdI6rltcd1xSKlZBS5bmDM',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //Quimica 1 Alumno
            28 => [
                'id'        => 29,
                'libro_id'  => 6,
                'titulo'    => 'Cuadernillo de tareas con respuesta',
                'categoria_id' => 4,
                'url'       => '10rpqZrG89aWGyzMNTEiymd27p9PTfxA7',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

             //Manejo de Aplicaciones por Medios Digitales Profesor
            
             29 => [
                'id'        => 30,
                'libro_id'  => 7,
                'titulo'    => 'Oferta de talleres para personal docente 2019',
                'categoria_id' => 11,
                'url'       => '1wbMDptwPokFDphjzRVpvucB8ua5p9Yvo',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            
            //Manual de actividades experimentales Química 3 Profesor
            30 => [
                'id'        => 31,
                'libro_id'  => 9,
                'titulo'    => 'Oferta de talleres para personal docente 2019',
                'categoria_id' => 11,
                'url'       => '1gJj4cWEJYFdqzhfRDezIutAejtLI6KxE',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
           

            31 => [
                'id'        => 32,
                'libro_id'  => 9,
                'titulo'    => 'Reactivos adicionales con respuesta',
                'categoria_id' => 1,
                'url'       => '1x2kMqnNKBvTihwlb43rIYghwRzBeH6DU',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            32 => [
                'id'        => 33,
                'libro_id'  => 9,
                'titulo'    => 'Reactivos adicionales sin respuesta',
                'categoria_id' => 1,
                'url'       => '1CDO2n8sBps3lDppLBboipHqiC6EcYqOx',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            33 => [
                'id'        => 34,
                'libro_id'  => 9,
                'titulo'    => 'Cuadernillo de tareas con respuesta',
                'categoria_id' => 4,
                'url'       => '1CbZzsLlm_ZHtyedzoIYDm6sDTWqW7L_P',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            34 => [
                'id'        => 35,
                'libro_id'  => 9,
                'titulo'    => 'Cuadernillo de tareas sin respuesta',
                'categoria_id' => 4,
                'url'       => '1V-giKp7WQldheImbVrsaWnVJClBYiuTs',
                'url_otro'        => null,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

           
            
        ]);

        \DB::table('videos')->insert([
            0 => [
                'id'        => 1,
                'libro_id'  => 3,
                'titulo'    => '¡Adelante, inventa palabras nuevas!',
                'url'       => 'https://embed.ted.com/talks/lang/es/erin_mckean_go_ahead_make_up_new_words',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'        => 2,
                'libro_id'  => 3,
                'titulo'    => 'Everyday compassion at Google',
                'url'       => 'https://embed.ted.com/talks/chade_meng_tan_everyday_compassion_at_google',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            //The Best English 3 Alumno
            2 => [
                'id'        => 3,
                'libro_id'  => 4,
                'titulo'    => '¡Adelante, inventa palabras nuevas!',
                'url'       => 'https://embed.ted.com/talks/lang/es/erin_mckean_go_ahead_make_up_new_words',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
          
            3 => [
                'id'        => 4,
                'libro_id'  => 4,
                'titulo'    => 'Everyday compassion at Google',
                'url'       => 'https://embed.ted.com/talks/chade_meng_tan_everyday_compassion_at_google',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //TIC´s Profesor
            4 => [
                'id'        => 5,
                'libro_id'  => 1,
                'titulo'    => '5 Trucos de Word que te Facilitarán la Vida',
                'url'       => 'https://www.youtube.com/embed/dMr-aM633lM',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            
            5 => [
                'id'        => 6,
                'libro_id'  => 1,
                'titulo'    => 'De Pobre Point a Power Point (Cómo Hacer Presentaciones en Power Point)',
                'url'       => 'https://www.youtube.com/embed/pW8cfsEwyIE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'        => 7,
                'libro_id'  => 1,
                'titulo'    => 'Consejos para navegar de forma segura por internet',
                'url'       => 'https://www.youtube.com/embed/lR8fI4q_8ls',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            7 => [
                'id'        => 8,
                'libro_id'  => 1,
                'titulo'    => 'Hoy aprendí office 365 un truco en... One Drive',
                'url'       => 'https://www.youtube.com/embed/7tMg6AQdxNc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'        => 9,
                'libro_id'  => 1,
                'titulo'    => 'Copy - Paste (Buscadores en internet y veracidad de información en la red)',
                'url'       => 'https://www.youtube.com/embed/xT3Satf4WEA',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            9 => [
                'id'        => 10,
                'libro_id'  => 1,
                'titulo'    => 'Hardware & Software - Problemas comunes de rendimiento',
                'url'       => 'https://www.youtube.com/embed/HakGmwQ45xs',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //TIC's Alumno
            10 => [
                'id'        => 11,
                'libro_id'  => 2,
                'titulo'    => '5 Trucos de Word que te Facilitarán la Vida',
                'url'       => 'https://www.youtube.com/embed/dMr-aM633lM',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            
            11 => [
                'id'        => 12,
                'libro_id'  => 2,
                'titulo'    => 'De Pobre Point a Power Point (Cómo Hacer Presentaciones en Power Point)',
                'url'       => 'https://www.youtube.com/embed/pW8cfsEwyIE',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            12 => [
                'id'        => 13,
                'libro_id'  => 2,
                'titulo'    => 'Consejos para navegar de forma segura por internet',
                'url'       => 'https://www.youtube.com/embed/lR8fI4q_8ls',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            13 => [
                'id'        => 14,
                'libro_id'  => 2,
                'titulo'    => 'Hoy aprendí office 365 un truco en... One Drive',
                'url'       => 'https://www.youtube.com/embed/7tMg6AQdxNc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            14 => [
                'id'        => 15,
                'libro_id'  => 2,
                'titulo'    => 'Copy - Paste (Buscadores en internet y veracidad de información en la red)',
                'url'       => 'https://www.youtube.com/embed/xT3Satf4WEA',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            15 => [
                'id'        => 16,
                'libro_id'  => 2,
                'titulo'    => 'Hardware & Software - Problemas comunes de rendimiento',
                'url'       => 'https://www.youtube.com/embed/HakGmwQ45xs',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //Química 1 Profesor
            16 => [
                'id'        => 17,
                'libro_id'  => 5,
                'titulo'    => 'Alquimia, magia o ciencia ',
                'url'       => 'https://www.youtube.com/embed/Qn575e7OOlU',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            17 => [
                'id'        => 18,
                'libro_id'  => 5,
                'titulo'    => 'Las Leyes de la Termodinámica',
                'url'       => 'https://www.youtube.com/embed/Bvfn6eUhUAc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            18 => [
                'id'        => 19,
                'libro_id'  => 5,
                'titulo'    => 'Los modelos atómicos',
                'url'       => 'https://www.youtube.com/embed/za-nxN1QCrk',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            19 => [
                'id'        => 20,
                'libro_id'  => 5,
                'titulo'    => 'Estados de Agregación de la Materia, Introducción.',
                'url'       => 'https://www.youtube.com/embed/Yarf9BEf-Z4',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            20 => [
                'id'        => 21,
                'libro_id'  => 5,
                'titulo'    => 'Origen del Universo: el Big Bang',
                'url'       => 'https://www.youtube.com/embed/uQZWTD_WV-A',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            21 => [
                'id'        => 22,
                'libro_id'  => 5,
                'titulo'    => 'Anhídridos, Óxidos Ácidos',
                'url'       => 'https://www.youtube.com/embed/F07KMzAHa6Y',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            //Química 1 Alumno
            22 => [
                'id'        => 23,
                'libro_id'  => 6,
                'titulo'    => 'Alquimia, magia o ciencia ',
                'url'       => 'https://www.youtube.com/embed/Qn575e7OOlU',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            23 => [
                'id'        => 24,
                'libro_id'  => 6,
                'titulo'    => 'Las Leyes de la Termodinámica',
                'url'       => 'https://www.youtube.com/embed/Bvfn6eUhUAc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            24 => [
                'id'        => 25,
                'libro_id'  => 6,
                'titulo'    => 'Los modelos atómicos',
                'url'       => 'https://www.youtube.com/embed/za-nxN1QCrk',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            25 => [
                'id'        => 26,
                'libro_id'  => 6,
                'titulo'    => 'Estados de Agregación de la Materia, Introducción.',
                'url'       => 'https://www.youtube.com/embed/Yarf9BEf-Z4',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            26 => [
                'id'        => 27,
                'libro_id'  => 6,
                'titulo'    => 'Origen del Universo: el Big Bang',
                'url'       => 'https://www.youtube.com/embed/uQZWTD_WV-A',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            27 => [
                'id'        => 28,
                'libro_id'  => 6,
                'titulo'    => 'Anhídridos, Óxidos Ácidos',
                'url'       => 'https://www.youtube.com/embed/F07KMzAHa6Y',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //Manejo de Aplicaciones por Medios Digitales Profesor
            28 => [
                'id'        => 29,
                'libro_id'  => 7,
                'titulo'    => 'What would happen if we upload our brains to computers?',
                'url'       => 'https://embed.ted.com/talks/robin_hanson_what_would_happen_if_we_upload_our_brains_to_computers',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            29 => [
                'id'        => 30,
                'libro_id'  => 7,
                'titulo'    => 'Dont fear intelligent machines. Work with them',
                'url'       => 'https://embed.ted.com/talks/garry_kasparov_don_t_fear_intelligent_machines_work_with_them',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            30 => [
                'id'        => 31,
                'libro_id'  => 7,
                'titulo'    => 'How better tech could protect us from distraction',
                'url'       => 'https://embed.ted.com/talks/tristan_harris_how_better_tech_could_protect_us_from_distraction',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            //Manejo de Aplicaciones por Medios Digitales Alumno
            31 => [
                'id'        => 32,
                'libro_id'  => 8,
                'titulo'    => 'What would happen if we upload our brains to computers?',
                'url'       => 'https://embed.ted.com/talks/robin_hanson_what_would_happen_if_we_upload_our_brains_to_computers',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            32 => [
                'id'        => 33,
                'libro_id'  => 8,
                'titulo'    => 'Dont fear intelligent machines. Work with them',
                'url'       => 'https://embed.ted.com/talks/garry_kasparov_don_t_fear_intelligent_machines_work_with_them',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            33 => [
                'id'        => 34,
                'libro_id'  => 8,
                'titulo'    => 'How better tech could protect us from distraction',
                'url'       => 'https://embed.ted.com/talks/tristan_harris_how_better_tech_could_protect_us_from_distraction',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //Manual de actividades experimentales Química 3 Profesor
            34 => [
                'id'        => 35,
                'libro_id'  => 9,
                'titulo'    => 'Hidrocarburos',
                'url'       => 'https://www.youtube.com/embed/3Q7B4zbfb68',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            35 => [
                'id'        => 36,
                'libro_id'  => 9,
                'titulo'    => 'Ley de Avogadro (vinagre y bicarbonato de sodio)',
                'url'       => 'https://www.youtube.com/embed/kDK6pq1m8gs',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            36 => [
                'id'        => 37,
                'libro_id'  => 9,
                'titulo'    => 'Cálculo de la Normalidad de una solución.',
                'url'       => 'https://www.youtube.com/embed/qGytaIEc4x4',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            37 => [
                'id'        => 38,
                'libro_id'  => 9,
                'titulo'    => 'Leyes de los gases',
                'url'       => 'https://www.youtube.com/embed/BVES2mPBtP0',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            38 => [
                'id'        => 39,
                'libro_id'  => 9,
                'titulo'    => 'Preparación de soluciones y diluciones',
                'url'       => 'https://www.youtube.com/embed/cX0HhZd54E0',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            39 => [
                'id'        => 40,
                'libro_id'  => 9,
                'titulo'    => 'Celdas galvánicas y electrolíticas/PSU Química/clase n°31',
                'url'       => 'https://www.youtube.com/embed/IsKNEm4o7Oc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],


             //Manual de actividades experimentales Química 3 Alumno
             40 => [
                'id'        => 41,
                'libro_id'  => 10,
                'titulo'    => 'Hidrocarburos',
                'url'       => 'https://www.youtube.com/embed/3Q7B4zbfb68',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            41 => [
                'id'        => 42,
                'libro_id'  => 10,
                'titulo'    => 'Ley de Avogadro (vinagre y bicarbonato de sodio)',
                'url'       => 'https://www.youtube.com/embed/kDK6pq1m8gs',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            42 => [
                'id'        => 43,
                'libro_id'  => 10,
                'titulo'    => 'Cálculo de la Normalidad de una solución.',
                'url'       => 'https://www.youtube.com/embed/qGytaIEc4x4',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            43 => [
                'id'        => 44,
                'libro_id'  => 10,
                'titulo'    => 'Leyes de los gases',
                'url'       => 'https://www.youtube.com/embed/BVES2mPBtP0',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            44 => [
                'id'        => 45,
                'libro_id'  => 10,
                'titulo'    => 'Preparación de soluciones y diluciones',
                'url'       => 'https://www.youtube.com/embed/cX0HhZd54E0',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            45 => [
                'id'        => 46,
                'libro_id'  => 10,
                'titulo'    => 'Celdas galvánicas y electrolíticas/PSU Química/clase n°31',
                'url'       => 'https://www.youtube.com/embed/IsKNEm4o7Oc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],






        ]);

        \DB::table('links')->insert([
            0 => [
                'id'        => 1,
                'libro_id'  => 3,
                'titulo'    => 'Free resources for teens to help improve your English',
                'url'       => 'http://learnenglishteens.britishcouncil.org/',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
             //The Best English 3 Alumno
             1 => [
                'id'        => 2,
                'libro_id'  => 4,
                'titulo'    => 'Free resources for teens to help improve your English',
                'url'       => 'http://learnenglishteens.britishcouncil.org/',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],

            //Manejo de Aplicaciones por Medios Digitales Profesor
            3 => [
                'id'        => 3,
                'libro_id'  => 7,
                'titulo'    => 'Glosario de Informática e Internet',
                'url'       => 'https://www.internetglosario.com/',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'        => 4,
                'libro_id'  => 7,
                'titulo'    => 'Evaluación Diagnostica',
                'url'       => 'https://docs.google.com/forms/d/e/1FAIpQLSfE1wWarzbCJ0sUNI82Pc4y_J8_p_GInth6dTrCutHMRfjsRA/viewform?c=0&w=1',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],      
             //Manejo de Aplicaciones por Medios Digitales Alumno
             3 => [
                'id'        => 3,
                'libro_id'  => 8,
                'titulo'    => 'Glosario de Informática e Internet',
                'url'       => 'https://www.internetglosario.com/',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'        => 4,
                'libro_id'  => 8,
                'titulo'    => 'Evaluación Diagnostica',
                'url'       => 'https://docs.google.com/forms/d/e/1FAIpQLSfE1wWarzbCJ0sUNI82Pc4y_J8_p_GInth6dTrCutHMRfjsRA/viewform?c=0&w=1',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],              
        ]);
    }
}
