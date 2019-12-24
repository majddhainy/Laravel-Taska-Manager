<!DOCTYPE html>
<html>
<head>
	<title>TODOS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Home</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
              <a class="nav-link" href="/todos">Tasks <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/new-todo"> Create Task <span class="sr-only">(current)</span></a>
              </li>


           </ul>
        </div>
    </nav>


	<div class="container">
		@yield('content')
	</div>

</body>
</html>