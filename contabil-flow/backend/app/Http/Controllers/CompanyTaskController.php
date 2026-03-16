<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyTask;

class CompanyTaskController extends Controller
{
    public function index($companyId)
    {
        $tasks = CompanyTask::with('task')
            ->where('company_id', $companyId)
            ->get();

        return response()->json($tasks);
    }

    public function store(Request $request, $companyId)
    {
        $data = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'due_date' => 'required|date'
        ]);

        $data['company_id'] = $companyId;
        $data['status'] = 'pending';

        $task = CompanyTask::create($data);

        return response()->json($task, 201);
    }

    public function update(Request $request, $taskId)
    {
        $task = CompanyTask::findOrFail($taskId);

        $task->update([
            'status' => 'completed',
            'completed_at' => now()
        ]);

        return response()->json($task);
    }    
}
