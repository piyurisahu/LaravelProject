<?php

namespace Tests\Feature;

use App\Task;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldReturnAlltheTasks()
    {
        $tasks = factory(Task::class, 3)->create();
        $response = $this->get('/tasks');
        self::assertEquals($tasks[0]->id,1);
        self::assertEquals($tasks[1]->id,2);
        self::assertEquals($tasks[2]->id,3);
        self::assertEquals(sizeof($tasks),3);
        $response->assertStatus(200);
    }

    public function testShouldReturnTaskById()
    {

        $task = factory(Task::class)->create();

        $response = $this->json('GET', '/tasks/' . $task->id);
        $expected = array(
            'id' => $task->id,
            'body' => $task->body,
            'created_at' => json_decode(json_encode($task->created_at), 1),
            'updated_at' => json_decode(json_encode($task->updated_at), 1)
        );

        $response
            ->assertStatus(200)
            ->assertJson($expected);
    }

    public function testShouldReturnBadRequestIfTaskNotPresnet()
    {
        $response = $this->json('GET', '/tasks/100');
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }

}
