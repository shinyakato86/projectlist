<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clients')->insert([
          ['client_name' => '株式会社A'],
          ['client_name' => '株式会社B'],
          ['client_name' => '株式会社C'],
          ['client_name' => '株式会社D'],
          ['client_name' => '株式会社E'],
          ['client_name' => '株式会社F'],
          ['client_name' => '株式会社G'],
      ]);
    }
}
