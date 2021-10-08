<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();

        $faker = Faker::create();
        $statuses = TaskStatus::all();
        $users = User::all();

        foreach($users as $user){
            for($count = 0; $count < 20; $count++){

                Task::create([
                    'user_id' => $user->id,
                    'status_id' => $statuses->random(1)->first()->id,
                    'name' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'is_child' => false,
                    'parent_task_id' => null,
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now(),
                    'order' => $count + 1
                ]);
            }
        }
    }
}
