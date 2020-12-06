<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          ['name' => '坂本龍馬',
           'number' => '100000',
           'password' => bcrypt('password'),
          ],
          ['name' => '西郷隆盛',
           'number' => '100001',
           'password' => bcrypt('password'),
          ],
          ['name' => '土方歳三',
           'number' => '100002',
           'password' => bcrypt('password'),
          ],
          ['name' => '沖田総司',
           'number' => '100003',
           'password' => bcrypt('password'),
          ],
          ['name' => '近藤勇',
           'number' => '100004',
           'password' => bcrypt('password'),
          ],
          ['name' => '高杉晋作',
           'number' => '100005',
           'password' => bcrypt('password'),
          ],
          ['name' => '東郷平八郎',
           'number' => '100006',
           'password' => bcrypt('password'),
          ],
      ]);
    }
}
