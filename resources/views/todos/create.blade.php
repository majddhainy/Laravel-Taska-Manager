{{-- This view will be called by TodosController(create) --}}
{{-- creating a new todo  --}}

@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center my-5">Create Task</h1>
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
                Create a new Task
            </div>

            <div class="card-body">
                {{-- action can be anything but make sure to make  a new route for it  --}}
                <form method="post"  action="create-todo">
                    @csrf
                    <div class="form-group">
                        <input placeholder="Name" type="text" class="form-control" name="name" >
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Description" rows="5" cols="5" class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group text-center">
                        {{-- no need to give buttons a name here  --}}
                        <button class="btn btn-success" type="submit">Create Task</button>
                    </div>
            </div>


        </div>
    </div>
</div>

@endsection