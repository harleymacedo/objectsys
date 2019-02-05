<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(objetos::class);
        $this->call(tabelaUsuarios::class);
        $this->call(permissions::class);
        $this->call(roles::class);
        $this->call(permission_role::class);
        $this->call(role_user::class);
        $this->call(setors::class);
        $this->call(user_setor::class);
    }
}
