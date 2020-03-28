<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        (new \App\User())->updateOrInsert(['id' => $id++], ['name' => 'Lucio Ishida', 'email' => 'lucio@shid.com.br', 'provider' => 'google', 'provider_id' => '101373070122162788891']);
        (new \App\User())->updateOrInsert(['id' => $id++], ['name' => 'Lucio I.', 'email' => 'lucio.ishida@gmail.com', 'provider' => 'google', 'provider_id' => '115086335250002150920']);
    }
}
