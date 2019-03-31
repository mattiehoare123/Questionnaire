<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Truncate tables code
         *
         * commented out but kept in-case we need it later for something unknown at this stage.
         */

        //disable foreign key check for this connection before running seeders
        /*DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::unguard();

        Category::truncate();
        User::truncate();
        Article::truncate();

        Model::reguard();
        //re-enable foreign key check for this connection
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');*/


        /*
         * Run seed files so known data is created first
         */
        $this->call(UserTableSeeder::class);

        /*
         * run factories
         */
        factory(User::class, 50)->create();



    }
}
