<?php

use Illuminate\Database\Seeder;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'nome' => 'gerenciarSistema',
            'id' => '1'
        ]);

        DB::table('permissions')->insert([
            'nome' => 'fazerReserva',
            'id' => '2'
        ]);
        DB::table('permissions')->insert([
            'nome' => 'fazerReservaOutro',
            'id' => '3'
        ]);

        DB::table('permissions')->insert([
            'nome' => 'gerenciarObjetos',
            'id' => '4'
        ]);
        DB::table('permissions')->insert([
            'nome' => 'gerenciarUsuarios',
            'id' => '5'
        ]);
    }
}
