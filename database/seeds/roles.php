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
            'nome' => 'admin',
            'id' => '1'
        ]);

        DB::table('roles')->insert([
            'nome' => 'user',
            'id' => '2'
        ]);
    }
}
