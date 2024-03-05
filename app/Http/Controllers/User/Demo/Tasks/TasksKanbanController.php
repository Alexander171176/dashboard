<?php

namespace App\Http\Controllers\User\Demo\Tasks;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class TasksKanbanController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/tasks/TasksKanban');
    }
}
