<?php

namespace App\Http\Controllers\Admin\Demo\Tasks;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class TasksListController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/tasks/TasksList');
    }
}
