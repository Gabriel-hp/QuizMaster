<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>QuizMaster</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand h1 text-light" >QuizMaster</a>
      <div class="justify-end ">
        <div class="col">
          <a class="btn btn-sm btn-success" href={{ route('dashboard') }}>Dashboard</a>
        
          <a class="btn btn-sm btn-success" href="/">Inicio</a>
        </div>
      </div>
      
    </div>
  </nav>
<body >
    <div class="container">
        @yield('content')
      
    </div>
</body>