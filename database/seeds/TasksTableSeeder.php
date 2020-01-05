<?php

use App\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();
        $total = 10;
        foreach (range(1, $total) as $index) {
            Task::create([
                'title' => 'Task ' . $index,
                'completed' => rand(0, 1),
                'created_at' => Carbon::now()->subDays($total - $index),
                'updated_at' => Carbon::now()->subDays($total - $index)->addHours(rand(1, 12)),
            ]);
        }
    }
}
