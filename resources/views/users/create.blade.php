@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Add New Guest</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" role="form" method="POST" action="{{route('users.store')}}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
              <label for="firstname" class="col-md-4 control-label">First Name</label>

              <div class="col-md-6">
                  <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                  @if ($errors->has('firstname'))
                      <span class="help-block">
                          <strong>{{ $errors->first('firstname') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
              <label for="lastname" class="col-md-4 control-label">Last Name</label>

              <div class="col-md-6">
                  <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                  @if ($errors->has('lastname'))
                      <span class="help-block">
                          <strong>{{ $errors->first('lastname') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Password</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                  @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Register
                  </button>
              </div>
          </div>
      </form>

      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
    </div>
  </div>
  @stop