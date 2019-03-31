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
        //

          DB::table('users')->insert([
              ['id' => 52, 'name' => "Adminstator",
                  'email' => '23655704@admin.com',
                  'password' => bcrypt('password'),
                  'remember_token' => str_random(10),
              ],
              ['id' => 53, 'name' => "Researcher",
                  'email' => '23655704@researcher.com',
                  'password' => bcrypt('password'),
                  'remember_token' => str_random(10),
              ],
          ]);

    }
}
