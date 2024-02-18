<?php

namespace App\Models;

use Core\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Collection;

/**
 * The Task model class.
 *
 * Interacts with the Task data layer.
 *
 * @package App\Models
 */
class Task extends Model
{
    /**
     * @var Capsule
     */
    private Capsule $capsule;

    /**
     * The Task Model constructor.
     */
    public function __construct()
    {
        $this->capsule = new Capsule();
        $this->dBConnection();
    }

    /**
     * Gets the tasks.
     *
     * @param string $category The task category.
     * @return Collection
     */
    public function getTasks(string $category): \Illuminate\Support\Collection
    {
        return $this->capsule
            ->table('tasks')
            ->select(
                'tasks.id as task_id',
                'tasks.title as task_title',
                'tasks.due_date as task_due_date',
                'tasks.status as task_status',
                'tasks.last_modification as task_last_modification',
                'users.username as user_username',
                'users.id as user_id'
            )
            ->join('users_tasks', 'tasks.id', '=', 'task_id')
            ->join('users', 'users.id', '=', 'users_tasks.user_id')
            ->where('category', $category)
            ->orderBy('task_id', 'desc')
            ->get();
    }

    /**
     * Checks if the current logged in user is the owner of the task.
     *
     * @param int $task_id Task ID.
     * @return bool
     */
    public function isUserOwnerOfTask(int $task_id): bool
    {
        // Is the logged-in user the owner of the task?
        $is_user_owner = $this->capsule
            ->table('users_tasks')
            ->where('task_id', $task_id)
            ->where('user_id', $_SESSION['user_id'])
            ->first();
        if (isset($is_user_owner->user_id)) {
            return true;
        }
        return false;
    }

    /**
     * Deletes a task.
     *
     * @param int $task_id
     * @return void
     */
    public function deleteTask(int $task_id): void
    {
        if (isset($_SESSION['logged_in']) && $this->isUserOwnerOfTask($task_id)) {
            $this->capsule
                ->table('users_tasks')
                ->where('task_id', $task_id)
                ->delete();
            $this->capsule
                ->table('tasks')
                ->where('id', $task_id)
                ->delete();
        }
    }

    /**
     * Updates a task.
     *
     * @param string $task_description The task description.
     * @param string $due_date         The task due date.
     * @param int    $task_id          The task ID.
     * @return void
     */
    public function editTask(string $task_description, string $due_date, int $task_id): void
    {
        if (isset($_SESSION['logged_in']) && $this->isUserOwnerOfTask($task_id)) {
            $this->capsule->table('tasks')
                ->where('id', $task_id)
                ->update([
                    'title' => $task_description,
                    'due_date' => strtotime($due_date),
                    'last_modification' => time(),
                ]);
        }
    }

    /**
     * Update task status.
     *
     * @param int    $task_id
     * @param string $status
     * @return void
     */
    public function updateTaskStatus(int $task_id, string $status): void
    {
        if (isset($_SESSION['logged_in'])) {
            if ($status !== 'pending' && $status !== 'done') {
                $status = 'pending';
            }
            if ($this->isUserOwnerOfTask($task_id)) {
                $this->capsule->table('tasks')
                    ->where('id', $task_id)
                    ->update([
                        'status' => $status,
                    ]);
            }
        }
    }

    /**
     * Stores a task.
     *
     * @param string $task_description The task description.
     * @param string $due_date         The task due date.
     * @param string $category         The task category.
     * @return void
     */
    public function storeTask(string $task_description, string $due_date, string $category): void
    {
        if (isset($_SESSION['logged_in'])) {
            $task = $this->capsule->table('tasks')
                ->insertGetId([
                    'title' => $task_description,
                    'due_date' => strtotime($due_date),
                    'last_modification' => time(),
                    'category' => $category,
                    'status' => 'pending',
                ]);

            $this->capsule->table('users_tasks')
                ->insertGetId([
                    'user_id' => $_SESSION['user_id'],
                    'task_id' => $task,
                ]);
        }
    }
}