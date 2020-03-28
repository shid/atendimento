<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Computador',
            'Telefonia',
            'Rede',
            'Internet',
        ];
        foreach($categories as $key => $category){
            (new \App\Category())->updateOrInsert(['id' => ++$key], ['name' => 'Computador', 'status' => true]);
        }
    }
}
