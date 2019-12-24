 {{-- This view will be called by TodosController(index) --}}
{{-- displaying all todos  --}}
@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h1 class="text-center my-5">Tasks Manager</h1>
			@if (session()->has('success'))
				<div class="alert alert-success">
					{{ session()->get('success') }}
				</div>
		    @endif
			<div class="card card-defult">

				<div class="card-header">
					Todos
				</div>

				<div class="card-body">
					{{-- u can see if $todos is really sent to ur view by typing $KEY(not data !) ex: {{ $todos }}  --}}
					<ul class="list-group">
					@foreach ($todos as $key => $todo)
						{{-- all rows are saved as $todos[0,1,2,3,..] and $todos[$i]->colname to get colValue  {{$key}} --}}
						<li class="list-group-item"> 
							{{$todo->name}}
							<form class="float-right" action = "/complete-todo/{{$todo->id}}" method="post">
								{{-- show id in href dynamically  --}}
								{{-- url current is better to avoid /x/x ..  --}}
								{{-- Link is not related but in order to keep in same line 'style' --}}
								<a href="{{url()->current()}}/{{$todo->id}}" class="btn btn-primary btn-sm"> View </a>
								@if (!$todo->completed)
								@csrf
								<button type="submit" style="color:white" class="btn btn-warning btn-sm mx-2"> Complete </button>	
								@endif
							</form>
						</li>
					@endforeach
					</ul>
					
				</div>


			</div>
		</div>
	</div>
@endsection
