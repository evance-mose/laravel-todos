<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){

        $todos = Todo::all();

        return view('welcome', compact('todos')); 
    } 


    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        Todo::create($request->all());

        return back()->with('success', 'Todo created successfully.');
    
    }

    public function update(Todo $todo){ 

        $todo->update([
            'completed' => true,
        ]);
 
        return back()->with('success', 'Todo completed successfully.');
    }


    public function destroy(Todo $todo){

        $todo->delete();

        return back()->with('success', 'Todo deleted successfully.');
    }

    
}
