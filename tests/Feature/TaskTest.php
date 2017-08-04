<?php

namespace Tests\Feature;
use App\Task;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldNotValidateForMissingDetail()
    {
        $task= new Task([]);
        $this->assertFalse($task->save());
        $this->assertEquals('start date is required',$task->errors[1],'error start date should be filled');
        $this->assertEquals('end date is required',$task->errors[2],'error end date should be filled');
        $this->assertEquals('task description is required', $task->errors[0], 'Error message for address1 is incorrect');
    }

    public function testShouldValidateForMissingDetail()
    {
        $task= new Task(['body'=>'sdfdskfg', 'start_date' => Carbon::now(), 'end_date' => Carbon::now()]);
        $task->save();

        //$this->assertEquals('task description is required', $task->errors[0], 'Error message for address1 is incorrect');
    }


}
