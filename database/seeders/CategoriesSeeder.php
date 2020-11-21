<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
          ['category_name' => 'ディレクション'],
          ['category_name' => 'デザイン'],
          ['category_name' => 'Webサイト構築・ページ制作'],
          ['category_name' => '撮影'],
      ]);
    }
}
