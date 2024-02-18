<?php

namespace App\Controllers;

use App\Models\Task;

/**
 * The Task interface.
 *
 * @package App\Controllers
 */
interface TaskInterface
{
    public function handle(Task $task): void;

    public function dateHandler(int $due_date): string;

    public function storeTask(): void;

    public function editTask(): void;

    public function deleteTask(): void;

    public function returnTasks(): false|string;
}