<?php

use Illuminate\Database\Seeder;

class setors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setors')->insert([
            'nomeSetor' => 'mecanografia offline',
            'descricaoSetor' => 'Setor dos datashows',
            'responsavelSetor' => '1',
            'id' => '1'
        ]);

        DB::table('setors')->insert([
            'nomeSetor' => 'CTP offline',
            'descricaoSetor' => 'Setor das chaves',
            'responsavelSetor' => '1',
            'id' => '2'
        ]);
    }
}
