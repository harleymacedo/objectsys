<?php

use Illuminate\Database\Seeder;

class permission_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'permission_id' => '1', //Gerenciar o sistema
            'role_id' => '1' //Admin do sistema
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '4', //Gerenciar objestos do sistema
            'role_id' => '1' //Admin do sistema
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '2', //Fazer reservas apenas pra ele
            'role_id' => '3' //Servidor
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '3', //Fazer reserva para outro usuário
            'role_id' => '2' //Admin de objeto
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '4', //Gerenciar objetos do sistema
            'role_id' => '2' //Admin de objeto
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => '5', //Gerenciar usuários do sistema
            'role_id' => '2' //Admin de objeto
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => '5', //Gerenciar usuários do sistema
            'role_id' => '1' //Admin de objeto
        ]);
    }
}
