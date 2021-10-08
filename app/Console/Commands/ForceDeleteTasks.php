<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ForceDeleteTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete tasks that is more than 30 days in trash';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tasks = Task::where('deleted_at','!=',null)->where('deleted_at', '<', Carbon::now()->subDays(30)->toDateString())->get();

        foreach ($tasks as $task){
            $task->forceDelete();
        }

        $this->info('Successfully deleted tasks');
    }
}
