<?php

use Illuminate\Database\Seeder;

class role_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'user_id' => '1',
            'role_id' => '1'
        ]);
        DB::table('role_user')->insert([
            'user_id' => '2',
            'role_id' => '2'
        ]);
    }
}
