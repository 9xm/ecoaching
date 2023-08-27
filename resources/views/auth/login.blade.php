@extends('auth.app')
@section('title', 'Login')
@section('content')

<main class="form-signin bg-body-tertiary text-start p-4 rounded">
  <form action="{{ route('login') }}" method="post">
    @csrf
    <!--img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"-->
    <h1 class="h3 mb-3 fw-normal">Sign in</h1>

    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="name@example.com">
    </div>
    <div class="mb-3">
    <label class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <div class="mb-3">
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </div>
    <div class="mb-3">
      <p class="signup">New user create account ? <a href="{{ route('register')}}" onclick="toggleForm();">Sign up.</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–{{date('Y')}}, eNews7</p>
    </div>
  </form>
</main>
@endsection