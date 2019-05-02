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
            'papel' => 'adminSistema',
            'password' => bcrypt('senhateste')
        ]);
        DB::table('users')->insert([
            'nome' => 'servidor',
            'email' => 'usuario@email.com',
            'papel' => 'servidor',
            'password' => bcrypt('senhateste')
        ]);
        DB::table('users')->insert([
            'nome' => 'Victor Hugo',
            'email' => 'hugo.victor.n@gmail.com',
            'papel' => 'adminObjeto',
            'password' => bcrypt('senhateste')
        ]);
    }
}
