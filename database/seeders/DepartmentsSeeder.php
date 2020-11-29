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
          ['department_name' => '営業部門A'],
          ['department_name' => '営業部門B'],
          ['department_name' => '営業部門C'],
          ['department_name' => '営業部門D'],
          ['department_name' => '営業部門E'],
          ['department_name' => '営業部門F'],
          ['department_name' => '営業部門G'],
      ]);
    }
}
