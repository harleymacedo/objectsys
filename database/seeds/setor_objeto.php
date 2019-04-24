<?php

use Illuminate\Database\Seeder;

class setor_objeto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setor_objeto')->insert([
            'objeto_id' => '1',
            'setor_id' => '1'
        ]);
        DB::table('setor_objeto')->insert([
            'objeto_id' => '2',
            'setor_id' => '1'
        ]);
        DB::table('setor_objeto')->insert([
            'objeto_id' => '3',
            'setor_id' => '2'
        ]);
    }
}
