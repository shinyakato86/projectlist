<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departments')->insert([
          ['department_name' => 'ディレクション'],
          ['department_name' => 'デザイン'],
          ['department_name' => 'Webサイト構築・ページ制作'],
          ['department_name' => 'テスト・デバッグ'],
      ]);
    }
}
