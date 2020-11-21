<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('status')->insert([
          ['status_name' => '受注見込'],
          ['status_name' => '受注確定'],
          ['status_name' => '金額確定'],
          ['status_name' => '完了'],
      ]);
    }
}
