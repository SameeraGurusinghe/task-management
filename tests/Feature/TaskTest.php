<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** Check if the "/api/tasks" endpoint returns a 200 status code **/

    // public function testTasksEndpoint()
    // {
    //     $response = $this->get('/api/tasks');
    //     $response->assertStatus(200);
    // }



    /** Check whether Task can create **/
    public function test_can_create_task()
    {
        $data = [
            'title' => 'Create new Test task 2',
            'description' => 'This is a test task for check to can create 2',
            'due_date' => '2023-03-31',
            'completed' => false
        ];

        $response = $this->json('POST', '/api/tasks', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', $data);
    }



    /** Check whether Task can update **/
    // public function test_can_update_task()
    // {
    //     //$task = Task::factory()->create();
    //     $task = Task::factory()->create([
    //         'title' => 'Test task by unit',
    //         'description' => 'This is a test task bu unit',
    //         'due_date' => '2023-03-31',
    //         'completed' => false
    //     ]);

    //     $updatedData = [
    //         'title' => 'Updated task',
    //         'description' => 'This is an updated test task',
    //         'due_date' => '2023-03-31',
    //         'completed' => false
    //     ];

    //     $response = $this->json('PUT', '/api/tasks/'.$task->id, $updatedData);

    //     $response->assertStatus(200);
    //     $this->assertDatabaseHas('tasks', $updatedData);
    // }



    /** Check whether Task can delete **/
    // public function test_can_delete_task()
    // {
    //     //$task = Task::factory()->create();
    //     $task = Task::factory()->create([
    //         'title' => 'Test task for check delete',
    //         'description' => 'This is a test task for check delete',
    //         'due_date' => '2023-03-31',
    //         'completed' => false
    //     ]);

    //     $response = $this->json('DELETE', '/api/tasks/'.$task->id);

    //     $response->assertStatus(204);
    //     $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    // }

}
