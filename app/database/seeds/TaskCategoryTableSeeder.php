<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TaskCategoryTableSeeder extends Seeder {

	public function run()
	{
             DB::table('task_categories')->delete();

			TaskCategory::create([
                'name' => 'Coding'
			]);

            TaskCategory::create([
                'name' => 'Testing'
            ]);

            TaskCategory::create([
                'name' => 'Database Design'
            ]);


	}

}