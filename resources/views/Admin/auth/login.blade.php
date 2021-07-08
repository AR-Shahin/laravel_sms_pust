@extends('layouts.app')

@section('app_content')
    <div class="login-page">
        <div class="login-box">
            <div class="login-logo">
              <h2 href=""><b>Admin </b>Login</h2>
            </div>

            <!-- /.login-logo -->
            <div class="card">
              <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="admin@mail.com">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <span class="text-danger">{{($errors->has('email'))? ($errors->first('email')) : ''}}</span>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <span class="text-danger">{{($errors->has('password'))? ($errors->first('password')) : ''}}</span>
                  <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                          Remember Me
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>


                {{-- <p class="mb-1">
                  <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                  <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
              </div>
              <!-- /.login-card-body -->
            </div>
          </div>
    </div>
@endsection
