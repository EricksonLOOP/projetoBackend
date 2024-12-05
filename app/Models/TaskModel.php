<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TaskModel extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'task_model';


    protected $fillable = [
        'title',
        'description',
        'status',
    ];


    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';

    
    protected $casts = [
        'id' => 'string', 
        'status' => 'string', 
    ];
}
