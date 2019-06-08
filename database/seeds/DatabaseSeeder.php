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
            ]
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

        \DB::table('libro_semestre_subsistema')->insert([
            0 => [
                'id'            => 1,
                'subsistema_id' => 3,
                'semestre_id'   => 1,
                'libro_id'      => 1,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'            => 2,
                'subsistema_id' => 3,
                'semestre_id'   => 1,
                'libro_id'      => 2,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            2 => [
                'id'            => 3,
                'subsistema_id' => 3,
                'semestre_id'   => 3,
                'libro_id'      => 3,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'            => 4,
                'subsistema_id' => 3,
                'semestre_id'   => 3,
                'libro_id'      => 4,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'            => 5,
                'subsistema_id' => 3,
                'semestre_id'   => 1,
                'libro_id'      => 5,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'            => 6,
                'subsistema_id' => 3,
                'semestre_id'   => 1,
                'libro_id'      => 6,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'            => 7,
                'subsistema_id' => 4,
                'semestre_id'   => 2,
                'libro_id'      => 7,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            7 => [
                'id'            => 8,
                'subsistema_id' => 4,
                'semestre_id'   => 2,
                'libro_id'      => 8,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'            => 9,
                'subsistema_id' => 7,
                'semestre_id'   => 2,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            9 => [
                'id'            => 10,
                'subsistema_id' => 7,
                'semestre_id'   => 2,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            10 => [
                'id'            => 11,
                'subsistema_id' => 7,
                'semestre_id'   => 3,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            11 => [
                'id'            => 12,
                'subsistema_id' => 7,
                'semestre_id'   => 3,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            12 => [
                'id'            => 13,
                'subsistema_id' => 7,
                'semestre_id'   => 5,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            13 => [
                'id'            => 14,
                'subsistema_id' => 7,
                'semestre_id'   => 5,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            14 => [
                'id'            => 15,
                'subsistema_id' => 1,
                'semestre_id'   => 2,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            15 => [
                'id'            => 16,
                'subsistema_id' => 7,
                'semestre_id'   => 2,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            16 => [
                'id'            => 17,
                'subsistema_id' => 1,
                'semestre_id'   => 3,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            17 => [
                'id'            => 18,
                'subsistema_id' => 1,
                'semestre_id'   => 3,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            18 => [
                'id'            => 19,
                'subsistema_id' => 1,
                'semestre_id'   => 5,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            19 => [
                'id'            => 20,
                'subsistema_id' => 1,
                'semestre_id'   => 5,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            20 => [
                'id'            => 21,
                'subsistema_id' => 6,
                'semestre_id'   => 2,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            21 => [
                'id'            => 22,
                'subsistema_id' => 6,
                'semestre_id'   => 2,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            22 => [
                'id'            => 23,
                'subsistema_id' => 6,
                'semestre_id'   => 3,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            23 => [
                'id'            => 24,
                'subsistema_id' => 6,
                'semestre_id'   => 3,
                'libro_id'      => 10,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            24 => [
                'id'            => 25,
                'subsistema_id' => 6,
                'semestre_id'   => 5,
                'libro_id'      => 9,
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            25 => [
                'id'            => 26,
                'subsistema_id' => 6,
                'semestre_id'   => 5,
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
                'categoria'  => 'Guia del docente',
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
            // 0 => [
            //     'id'        => 1,
            //     'libro_id'  => 3,
            //     'titulo'    => 'Tutorial iGrade Majestic-Docentes',
            //     'categoria_id' => 14,
            //     'url'       => null,
            //     'created_at' => '2019-05-27 00:00:00',
            //     'updated_at' => '2019-05-27 00:00:00'
            // ],
            0 => [
                'id'        => 1,
                'libro_id'  => 3,
                'titulo'    => 'The Best-DGTI TG Book 3 Test',
                'categoria_id' => 13,
                'url'       => '0B4lctXErlSvzSXVUd3pZelVoakU',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            1 => [
                'id'        => 2,
                'libro_id'  => 3,
                'titulo'    => 'The Best of English 3 SR',
                'categoria_id' => 8,
                'url'       => '0B4lctXErlSvzNEEtd1NFeXlCYXc',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            // 3 => [
            //     'id'        => 4,
            //     'libro_id'  => 3,
            //     'titulo'    => 'The Best of English 3 SD',
            //     'categoria_id' => 6,
            //     'url'       => null,
            //     'created_at' => '2019-05-27 00:00:00',
            //     'updated_at' => '2019-05-27 00:00:00'
            // ],
            2 => [
                'id'        => 3,
                'libro_id'  => 3,
                'titulo'    => 'The Best of English 3 CR',
                'categoria_id' => 8,
                'url'       => '0B4lctXErlSvzMmNlT1ZxX3c5OXM',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            3 => [
                'id'        => 4,
                'libro_id'  => 3,
                'titulo'    => 'Teacher´s The Best-DGETI Book 3',
                'categoria_id' => 13,
                'url'       => '0B4lctXErlSvzXzdSN2RpVkF2UWs',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            4 => [
                'id'        => 5,
                'libro_id'  => 3,
                'titulo'    => 'Resumen Ejecutivo Estrategia Nacional de Inglés',
                'categoria_id' => 10,
                'url'       => '1-Hl-NVE5XajF790G0J1KuGFldF3fVPUP',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            5 => [
                'id'        => 6,
                'libro_id'  => 3,
                'titulo'    => 'Qué es ConstruyeT 2017-2018',
                'categoria_id' => 10,
                'url'       => '1npP6xY5KgCQQroBmj-icC_z0cYjcg4nF',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            6 => [
                'id'        => 7,
                'libro_id'  => 3,
                'titulo'    => 'Oferta de talleres para personal docente 2018 OF',
                'categoria_id' => 11,
                'url'       => '1QbAh4704MRNVlC2MFucC5mloqWrZ0oql',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            7 => [
                'id'        => 8,
                'libro_id'  => 3,
                'titulo'    => 'Oferta de talleres para personal docente 2017 OF',
                'categoria_id' => 15,
                'url'       => '0B4lctXErlSvza3Z1cFU4VnhHX3c',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            8 => [
                'id'        => 9,
                'libro_id'  => 3,
                'titulo'    => 'Oferta certificación inglés-2017',
                'categoria_id' => 11,
                'url'       => '1c602wm_7INZE4wKzWM1ZFx74ASdt0Znv',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            9 => [
                'id'        => 10,
                'libro_id'  => 3,
                'titulo'    => 'Nuevo Modelo Educativo-Gral',
                'categoria_id' => 10,
                'url'       => '14CNQN2z5jWzALzUW2raiWO55I5a5eX0F',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            10 => [
                'id'        => 11,
                'libro_id'  => 3,
                'titulo'    => 'Ingles-III',
                'categoria_id' => 10,
                'url'       => '1p0npd-ByuFL9TEyv03EKpuscMdwPYpH_',
                'created_at' => '2019-05-27 00:00:00',
                'updated_at' => '2019-05-27 00:00:00'
            ],
            // 13 => [
            //     'id'        => 14,
            //     'libro_id'  => 3,
            //     'titulo'    => 'iGrade Best of English 3 Teachers',
            //     'categoria_id' => 14,
            //     'url'       => null,
            //     'created_at' => '2019-05-27 00:00:00',
            //     'updated_at' => '2019-05-27 00:00:00'
            // ],
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
        ]);
    }
}
