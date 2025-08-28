<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //
    public function index(Request $request){
        $tasks = Task::all();
        return response()->
        view("tasks.index",["tasks"=>$tasks]);

    }

    public function store(Request $request)
    {
        try{
            
            $data = $request->all();
            $validator = Validator::make($data,[
                "title"=>"required|string|max:20",
                "description"=>["required","string","min:3"],
                "order" => ["integer","unique:tasks,order"]
            ]);

            //
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator);
            }
            //
            $title = $data["title"];
            $description = $data["description"];
            $order = $data["order"];
            //
            $task = new Task();
            $task->title = $title;
            $task->description = $description;
            $task->order = $order;

            $task->save();
            //
            return redirect('/task')->with("success","Task has been created successfully!");
        }catch(Exception $e)
        {
            return "<h1 class='alert alert-danger'>Something went wrong</h1>" . $e->getMessage();
        }

    }

    public function create()
    {
        return view("tasks.create");
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return "Deleted successfully";
    }
}
