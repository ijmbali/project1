<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judulpage')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <ul class="nav">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('teman.index') }}">Teman</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
    </li>
    </ul>
    </div>
    @yield('konten')
  </body>
</html>