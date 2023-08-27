<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5"-->
    <title>@yield('title')</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  	<link href="{{asset('assets/summernote/summernote-bs5.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/dashboard.css?t='.time())}}" rel="stylesheet">

    <script src="{{asset('assets/js/jquery-3.7.0.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/summernote/summernote-bs5.js')}}"></script>
    
  </head>
  <body>
 
    
<nav class="navbar navbar-expand-md fixed-top lh-1 py-3 bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">eNews7</a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <!--form class="d-flex me-auto" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form-->
      <div class="me-auto"></div>
      <ul class="navbar-nav  mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('home')}}">
            <svg class="bi mx-auto" width="24" height="18"><use xlink:href="#svg-home"></use></svg> 
            Home
          </a>
        </li>
        @auth
        <li class="nav-item">
        @if(auth()->user()->role == 'subscriber')
          <a class="nav-link active" href="{{route('student.dashboard')}}">
            <svg class="bi mx-auto" width="24" height="18"><use xlink:href="#people-circle"></use></svg> 
            {{auth()->user()->name}}
          </a>
        @else
          <a class="nav-link active" href="{{route('admin.users.edit', ['user'=> auth()->user()->id])}}">
            <svg class="bi mx-auto" width="24" height="18"><use xlink:href="#people-circle"></use></svg> 
            {{auth()->user()->name}} ({{auth()->user()->role}})
          </a>
          @endif
        </li>
        
        <li class="nav-item">
      			<form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                <svg class="bi mx-auto" width="24" height="18"><use xlink:href="#bi-logout"></use></svg>  Logout</a>
            </form>
        </li>
        @else
        <li class="nav-item">
          <a  href="{{route('login')}}" class="nav-link"> 
          <svg class="bi mx-auto" width="24" height="18"><use xlink:href="#people-circle"></use></svg> 
              Login
            </a>   
</li>        
         @endif
      </ul>
      
    </div>
  </div>
</nav>
<main class="container">
  <div class="row g-5">
    <div class="col-md-12">
		@yield('content')
    </div>
  </div>
</main>
@include('admin.svg')

    </body>
</html>
