<?php
namespace Tests\Unit; 

use PHPUnit\Framework\TestCase;
use Mockery;
use App\Services\TaskService;
use App\Repositories\TaskRepository;
class TaskServiceTest extends TestCase
{
    protected $taskService;
    protected $taskRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = Mockery::mock(TaskRepository::class);
        $this->taskService = new TaskService($this->taskRepository);
    }
    public function testGetTaksByStatusOrAllTasks()
    {
        
        $tasks = collect([
            (object)[
                'id' => 1, 
                'title' => 'Task 1',
                'description'=> 'teste descriptionasdas', 
                'status' => 'pending'],
            (object)[
                'id' => 2, 
                'title' => 'Task 2',
                'description'=> 'teste descriptionaa', 
                'status' => 'completed'],
        ]);

        $this->taskRepository
            ->shouldReceive('getTasksByStatus')
            ->once()
            ->with('pending')
            ->andReturn($tasks);

       
        $result = $this->taskService->getTasks('pending');

        $this->assertCount(2, $result);
        $this->assertEquals('Task 1', $result[0]->title);
    }

    public function testCreateTask()
    {
       
        $data = [
            'title' => 'New Task',
            'description'=> 'teste descriptionasdas', 
            'status' => 'pending'];

        
        $this->taskRepository
            ->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn((object)array_merge($data, ['id' => 1]));

        
        $result = $this->taskService->createTask($data);

        $this->assertEquals('New Task', $result->title);
        $this->assertEquals('pending', $result->status);
        $this->assertObjectHasProperty('id', $result);
    }
    
    public function testFindByIdTask()
    {
       
        $data = [
            'title' => 'New Task',
            'description'=> 'teste descriptionasdas', 
            'status' => 'pending'];

        
        $this->taskRepository
            ->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn((object)array_merge($data, ['id' => 1]));

        
        $result = $this->taskService->createTask($data);

        $this->assertEquals('New Task', $result->title);
        $this->assertEquals('pending', $result->status);
        $this->assertObjectHasProperty('id', $result);
    }

    
}
