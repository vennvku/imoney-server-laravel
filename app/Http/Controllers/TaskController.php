<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function create(Request $request) {

        $task = Task::create($request->all());

        return response()->json($task);
    }

    public function update($id, Request $request) {

        $task = Task::findOrFail($id);
        $task->update($request->all());
        $task->save();

        return response()->json($task);
    }

    public function destroy($id) {

        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json($task);
    }

}
