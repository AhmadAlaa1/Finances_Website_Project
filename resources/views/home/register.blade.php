@extends('layouts.app')

@section('body')

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 500px;">
      <h2 class="text-center mb-4 p-5">Register</h2>
      <form class="row g-3" method="POST" action="{{route('home.store')}}">
        @csrf
        <div class="col-12 mb-4">
          <input type="text" class="form-control" name="username" id="inputName" placeholder="Enter your full name">
        </div>
        <div class="col-12 mb-4">
          <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter your email">
        </div>
        <div class="col-12 mb-4">
          <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Enter your password">
        </div>
        <div class="col-12 mb-4">
          <input type="password" class="form-control" name="password_confirmation" id="confirmPassword" placeholder="Confirm your password">
        </div>
        <div class="col-12 mb-4">
          <button type="submit" class="btn btn-primary mt-4 w-100">Sign up</button>
        </div>
      </form>
      <div class="text-center mt-3">
        <p class="mb-0">Already have an account? <a href="/login" class="text-primary fw-bold">Log in</a></p>
      </div>
    </div>
  </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
@endsection('body')