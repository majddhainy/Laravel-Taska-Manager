<?php

namespace App\Http\Controllers;

// in this controller we will create function that will grab all todos from database
// so ofcourse we need to use the model that communicate with table todos
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {
        //fetch all data from the table todos
        //then  calling the view (index) inside the folder (todos)
        // with to send data to the view with(kay,data)
        $todos = Todo::all();
    	return view('todos.index')->with('todos',$todos);
    }

    public function show($todosID){
        
        // Using The Model TODO calls find and takes the id to return a specific TODO
        $todo = Todo::find($todosID);
        return view('todos.show')->with('todo',$todo);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(){

        // you have to validate data from (client) before storing it 
        $this->validate(request(),
        [
            'name' => 'required|min:3|max:30',
            'description' => 'required|min:15|max:350',
            'completed' => 'boolean'
         ]);

        // dd(request()) or dd(request()->all()) to see all request or only sent from the client resp.
        
        $data = request()->all();

        // make new object of the model TODO and set the field that u get from the request(client)
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        // the save method is already defined in the class Model it will store the new todo in DB
        $todo->save();
        
        // store in session an success message 
        session()->flash('success' , 'Task created successfully');
        // after storing the todo redirect the client to todos webpage
        return redirect('/todos');

    }

    public function edit(Todo $todo){
        // Using The Model TODO calls find and takes the id to return a specific TODO
        // !NOTE! : 
        // Route Model Binding is a way to stop finding todo or object again and again
        // just make the name in the route same as the model name but in smallletters
        // Todo | todo and then put type Todo in the parameter
        // then laravel will automatically detect the object u want 
        //SO IN THIS CASE NO NEED TO USE $todo = Todo::find($todosID); !
        return view('todos.edit')->with('todo',$todo);

    }

    public function update($todoid){
        // the todo id is parameter in this function which where send from the action to the route to here !
        // you have to validate data from (client) before editing it 
        $this->validate(request(),
        [
            'name' => 'required|min:3|max:30',
            'description' => 'required|min:15|max:350',
            'completed' => 'boolean'
         ]);
         
         // get new data
         $data = request()->all();
         // update where id = .... 
         Todo::where('id',$todoid)->update(
            [
                'name' => $data['name'],
                'description' => $data['description']
            ]);

        // store in session an success message 
        session()->flash('success' , 'Task updated successfully');
        // after updating the todo redirect the client to todos webpage
        return redirect('/todos');

    }

    public function destory($todoID){
        
        // NOTE force delete request to be POST in order to send CSRF token with it !
        //dd(request()->all());
        //select todo that u need and call function delete() to remove the record
        $todo = Todo::find($todoID);
        $todo->delete();
        // store in session an success message 
        session()->flash('success' , 'Task deleted successfully');
        // after deleting the todo redirect the client to todos webpage
        return redirect('/todos');

    }

    public function complete($todoID){

        // update where id = .... 
        Todo::where('id',$todoID)->update(
           [
               'completed' => true
           ]);

       // store in session an success message 
       session()->flash('success' , 'Task Completed successfully');
       // after completing the todo redirect the client to todos webpage
       return redirect('/todos');
    }

}
