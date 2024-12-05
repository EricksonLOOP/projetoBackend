<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TaskModel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase; 

    public function testCreateTask()
    {
        $data = [
            'title' => 'New Task', 
            'description'=> 'teste description',
            'status' => 'pending'];

        $response = $this->postJson('/api/tasks', $data);
        
        $response->assertStatus(201); 
        $response->assertJsonFragment(['title' => 'New Task']);
    }

    public function testGetAllTasks()
    {
        TaskModel::factory()->create([
            'title' => 'Task 1',
            'description'=> 'teste descriptionasdas', 
            'status' => 'pending']);
        TaskModel::factory()->create([
            'title' => 'Task 2', 
            'description'=> 'teste descriptionaa', 
            'status' => 'completed']);

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }

    public function testUpdateTask()
    {
        $task = TaskModel::factory()->create([
            'title' => 'Old Task', 
            'description'=> 'teste descriptionasdas', 
            'status' => 'pending']);

        $data = [
            'title' => 'Updated Task',
            'status' => 'completed'];

        $response = $this->putJson("/api/tasks/{$task->id}", $data);
       
        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => 'Updated Task']);
    }

    public function testDeleteTask()
    {
        $task = TaskModel::factory()->create([
            'title' => 'Task to delete',
            'description'=> 'teste descriptionasdas', 
            'status' => 'pending']);
        $response = $this->deleteJson("/api/tasks/{$task->id}");
        
        $response->assertStatus(200);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
