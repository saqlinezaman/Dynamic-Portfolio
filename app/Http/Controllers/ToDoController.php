<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = ToDo::latest()->paginate(6);
        return view('dashboard.todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToDoRequest $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
    ]);

    ToDo::create($request->all());

    return redirect()->route('todo.index')->with('success', 'Task added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToDoRequest $request, ToDo $toDo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $toDo)
    {
        //
    }
    public function todo_delete($id){
        $todo = ToDo::where('id',$id)->first();
        if($todo->id == 'delete'){
            unlink($todo);
        }
        ToDo::find($todo->id)->delete();
        return redirect()->route('todo.index')->with('service_create_success','Tusk Completed Successfully');

    }
}
