<?php

namespace App\Http\Controllers\User\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TasksKanbanController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/tasks/TasksKanban');
    }
}
