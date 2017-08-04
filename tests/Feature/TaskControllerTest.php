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

    public function testShouldReturnAlltheTasks()
    {

        $response = $this->get('/tasks');
        $data = json_decode($response->getContent(), 1)['data'];

        $this->assertCount(3, $data, 'Should return 3 tasks');
        $tasks = factory(Task::class, 3)->create();
        $this->assertEquals(
            [
                $tasks[0]->id,
                $tasks[1]->id,
                $tasks[2]->id
            ],
            [
                $data[0]['id'],
                $data[1]['id'],
                $data[2]['id'],
            ],
            'Tasks dont match'
        );
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
     *
     *
     *  */

}
