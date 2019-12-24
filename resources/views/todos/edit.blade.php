{{-- This view will be called by TodosController(edit) --}}
{{-- edit a  todo  --}}

@extends('layouts.app')

@section('content')

    @if ($todo)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center my-5">Edit Task</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
        
                <div class="card card-defult">
        
                    <div class="card-header">
                        Edit this Task
                    </div>
        
                    <div class="card-body">
                        {{-- action can be anything but make sure to make  a new route for it  --}}
                        <form method="post"  action="/update-todo/{{$todo->id}}">
                            @csrf
                            <div class="form-group">
                                <input placeholder="Name" type="text" class="form-control" name="name" value="{{$todo->name}} ">
                            </div>
                            <div class="form-group">
                            <textarea placeholder="Description" rows="5" cols="5" class="form-control" name="description">{{$todo->description}}</textarea>
                            </div>
                            <div class="form-group text-center">
                                {{-- no need to give buttons a name here  --}}
                                <button class="btn btn-success" type="submit">Update Task</button>
                            </div>
                            {{-- NOTE !! --}}
                            {{-- You can send the id in hidden field but preffered to send in action check action above --}}
                            {{-- <input  type="hidden"  name="id" value="{{$todo->id}} "> --}}
                    </div>
        
        
                </div>
            </div>
        </div>

            
        @else
            {{-- if the id sent by the controller (that comes from the route) is not in the DB --}}
            {{-- for example client tried /20 instead of /5  --}}
            <h3 class="text-center my-5"> Stop Playing </h3>
    @endif

@endsection