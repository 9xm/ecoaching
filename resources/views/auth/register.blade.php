@extends('auth.app')
@section('title', 'Register')
@section('content')
    
<main class="form-signin bg-body-tertiary text-start p-4 rounded">
  <form action="{{ route('register') }}" method="post">
    @csrf
    <!--img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"-->
    <h1 class="h3 mb-3 fw-normal">Sign up</h1>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Enter name">
    </div>
    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Password">
    </div>
    <div class="mb-3">
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
    </div>  
    <div class="mb-3">
      <p class="signup">Already have an account ? <a href="{{ route('login')}}" onclick="toggleForm();">Sign in.</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–{{date('Y')}}, eNews7</p>
    </div>
  </form>
</main>
@endsection
