<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodosController extends Controller
{
    //
    public function todo(){
        $todos =Todo::orderby('created_at','desc')->get();
        return view('todos.todo',compact('todos'));
    }
     public function create(Request $request){
        $request->validate([
            'todo'=>'required'
        ]);
        $todo =new Todo();
        $todo->todo= $request->todo;
        $todo->save();

        return redirect()->back()->with('success','Todo Created Succefully');

    }

    public function destroy(Request $request,$id){
        $todo=Todo::findOrFail($id);
        $todo->delete();
        return redirect()->back()->with('success','Todo Deletes Succefully');

  

    
}}
