<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskStatus::truncate();
        $statuses = ['Complete', 'Pending', 'Cancelled'];

        foreach ($statuses as $status){
            TaskStatus::create([
                'name' => $status,
                'is_default_status' => true,
                'user_id' => null
            ]);
        }
    }
}
