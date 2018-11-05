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
            'nome' => 'editar',
            'id' => '1'
        ]);

        DB::table('permissions')->insert([
            'nome' => 'reservar',
            'id' => '2'
        ]);
    }
}
