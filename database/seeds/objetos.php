<?php

use Illuminate\Database\Seeder;

class objetos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objetos')->insert([
            'id'=> '1',
            'nomeObj' => 'Chave 2',
            'descricaoObj' => 'Descricao do objeto chave 2',
            'situacaoObj' => 'livre',
            'categoriaObj' => 'Chave',
            'setorObj' => '1'
        ]);
        DB::table('objetos')->insert([
            'id'=> '2',
            'nomeObj' => 'Chave 3',
            'descricaoObj' => 'Descricao do objeto chave 2',
            'situacaoObj' => 'livre',
            'categoriaObj' => 'Chave',
            'setorObj' => '1'
        ]);
        DB::table('objetos')->insert([
            'id'=> '3',
            'nomeObj' => 'DataShow',
            'descricaoObj' => 'Descricao do objeto chave 2',
            'situacaoObj' => 'reservado',
            'categoriaObj' => 'Chave',
            'setorObj' => '2'
        ]);
    }
}
