<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * php artisan db:seed
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'       => 'Luis Hernandez',
            'email'      => 'luisestrada.ti@gmail.com',
            'password'   => Hash::make('12345678'),
            'url'        => 'https://donaldo.dev/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name'       => 'Donaldo',
            'email'      => 'luis@donaldo.dev',
            'password'   => Hash::make('12345678'),
            'url'        => 'https://donaldo.dev/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
