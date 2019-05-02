<?php

use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nome' => 'adminSistema',
            'id' => '1'
        ]);
        
        DB::table('roles')->insert([
            'nome' => 'adminObjeto',
            'id' => '2'
        ]);


        DB::table('roles')->insert([
            'nome' => 'servidor',
            'id' => '3'
        ]);
    }
}
