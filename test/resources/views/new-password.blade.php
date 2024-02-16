@extends('layout')
@section('title','forgot')
@section('content')
    <div class="container">
      <div class="mt-5">
        @if($errors->any())
          <div class="col-12">
            @foreach ($errors->all as $error )
              <div class="alert alert-danger">{{$error}}</div>
            @endforeach
          </div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
      </div>
        <form class="ms-auto me-auto mt-3" style="width: 500px" action="" method="POST">
            @csrf
            <input type="text" hidden value="{{$token}}" name="token">
              <div class="mb-3">
                <label  class="form-label">Enter new password</label>
                <input type="password" class="form-control"  name="password">
              </div>
              <div class="mb-3">
                <label  class="form-label">Confirm password</label>
                <input type="password" class="form-control"  name="password-confirmation">
              </div>
           
            <button type="submit" class="btn btn-primary">Forgot</button>
          </form>
    </div>
@endsection