<?php

use Illuminate\Database\Seeder;

class tabelaUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'admin',
            'email' => 'admin@email.com',
            'papel' => 'admin',
            'password' => bcrypt('senhateste')
        ]);
        DB::table('users')->insert([
            'nome' => 'usuario',
            'email' => 'usuario@email.com',
            'papel' => 'user',
            'password' => bcrypt('senhateste')
        ]);
    }
}
