<?php

use Illuminate\Database\Seeder;
use App\Task;
class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task([
    		'user_id' => 1,
    		'task'=>'Do Homework-AE4'
    	]);
    	$task->save();

    	$task = new Task([
    		'user_id' => 1,
    		'task'=>'Clean the house'
    	]);
    	$task->save();

        $task = new Task([
            'user_id' => 1,
            'task'=>'Do Lab Assignment 4 from SP'
        ]);
        $task->save();

        $task = new Task([
            'user_id' => 2,
            'task'=>'Make cake for birthday'
        ]);
        $task->save();

        $task = new Task([
            'user_id' => 2,
            'task'=>'Do IP Project'
        ]);
        $task->save();

        $task = new Task([
            'user_id' => 3,
            'task'=>'Cook Pizza'
        ]);
        $task->save();

    }
}
