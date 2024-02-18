<?php

namespace App\Controllers;

use App\Models\Task;
use Core\Controller;

/**
 * The Task controller class.
 *
 * @package App\Controllers
 */
class TaskController extends Controller implements TaskInterface
{
    /**
     * @var Task
     */
    private Task $task;

    /**
     * The TaskController constructor.
     */
    public function __construct()
    {
        $this->task = new Task();
    }

    /**
     * Renders the index page.
     *
     * @param Task $task
     * @return void
     */
    public function handle(Task $task): void
    {
        include_once(__DIR__ . '/../../templates/index.php');
    }

    /**
     * Formats the timestamp to a human-readable date.
     *
     * @param int $due_date The `due date` timestamp.
     * @return string
     */
    public function dateHandler(int $due_date): string
    {
        if (date('Ymd') == date('Ymd', $due_date)) {
            return '📅 Today';
        } elseif (date('Ymd', $due_date) == date('Ymd', strtotime('+1 day'))) {
            return '📅 Tomorrow ' . date('h:i A', $due_date);
        } else {
            return '📅 ' . date('M j Y', $due_date);
        }
    }

    /**
     * Stores a task.
     *
     * @return void
     */
    public function storeTask(): void
    {
        $this->task->storeTask($_POST['task_description'], $_POST['due_date'], $_POST['category']);
    }

    /**
     * Updates a task.
     *
     * @return void
     */
    public function editTask(): void
    {
        $this->task->editTask($_POST['task_description'], $_POST['due_date'], $_POST['task_id']);
    }

    /**
     * Deletes a task.
     *
     * @return void
     */
    public function deleteTask(): void
    {
        $this->task->deleteTask($_POST['task_id']);
    }

    /**
     * Updates the status of a task.
     *
     * @return void
     */
    public function updateTaskStatus(): void
    {
        $this->task->updateTaskStatus($_POST['task_id'], $_POST['status']);
    }

    /**
     * Returns the task list as JSON data.
     *
     * @return false|string
     */
    public function returnTasks(): false|string
    {
        $tasks = $this->task->getTasks($_POST['category']);
        $tasks_data = [];
        foreach ($tasks as $task) {
            $tasks_data[] = [
                'task_id' => $task->task_id,
                'task_title' => htmlentities($task->task_title),
                'task_date' => $this->dateHandler($task->task_due_date),
                'formatted_date' => date("Y-m-d", $task->task_due_date) . "T" . date("H:i", $task->task_due_date),
                'user_username' => $task->user_username,
                'user_id' => $task->user_id,
                'status' => $task->task_status,
                'current_user_id' => $_SESSION['user_id'] ?? 0,
            ];
        }
        return json_encode($tasks_data);
    }
}