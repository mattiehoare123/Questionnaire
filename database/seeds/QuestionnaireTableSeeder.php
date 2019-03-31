<?php

use Illuminate\Database\Seeder;

class QuestionnaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questionnaires')->insert([
          ['id' => '100', 'user_id' => '1', 'title' => 'Food Review', 'description' => 'Questionnaire About Food'],

        ]);
    }
}
