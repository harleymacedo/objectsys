<?php

use Illuminate\Database\Seeder;

class user_setor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_setors')->insert([
            'id' => '1',
            'user_id' => '1',
            'setor_id' => '1'
        ]);

        DB::table('user_setors')->insert([
            'id' => '2',
            'user_id' => '1',
            'setor_id' => '2'
        ]);
    }
}
