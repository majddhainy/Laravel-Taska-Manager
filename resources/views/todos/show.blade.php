{{-- This view will be called by TodosController(show) --}}
{{-- displaying single todo according to the id   --}}

@extends('layouts.app')

@section('content')
    @if ($todo)
            
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="text-center my-5">{{$todo->name}}</h1>
                        <div class="card card-defult">

                            <div class="card-header">
                                Todos
                            </div>

                            <div class="card-body">
                                {{$todo->description}}	
                            </div>


                        </div>
                        <div class="my-2">
                            <form action = "/delete-todo/{{$todo->id}}" method="post">
                            {{-- Link is not related but in order to keep in same line 'style' --}}
                            <a href="/todos/edit/{{$todo->id}}" class="btn btn-info"> Edit </a>
                            @csrf
                            <button type="submit"  class="btn btn-danger my-2"> Delte </button>
                            </form>
                        </div>
                    </div>
                </div>
                

        @else
            {{-- if the id sent by the controller (that comes from the route) is not in the DB --}}
            {{-- for example client tried /20 instead of /5  --}}
            <h3 class="text-center my-5"> Stop Playing </h3>


    @endif
@endsection