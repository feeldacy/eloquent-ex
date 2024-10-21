@extends('auth.layouts')

@section('content')


<div class="container">

    <div class="card w-50 position-absolute top-50 start-50 translate-middle">
        <div class="card-header bg-primary text-light">
          Registration
        </div>
        <div class="card-body">

            <form action="{{ route('store')}}" method="post">
                @csrf
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="form2Example1" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}"/>

                  @if($errors->has('name'))
                    <span class="tetx-danger">{{ $errors->first('name')}}</span>
                  @endif
                  <label class="form-label" for="form2Example1">Name</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="form2Example2" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')}}"/>
                    @if($errors->has('email'))
                        <span class="tetx-danger">{{ $errors->first('email')}}</span>
                    @endif
                  <label class="form-label" for="form2Example2">Email Address</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                    @if($errors->has('password'))
                    <span class="tetx-danger">{{ $errors->first('password')}}</span>
                    @endif
                  <label class="form-label" for="form2Example2">Password</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control" id="password_confirmation" name="password_confirmation"/>
                  <label class="form-label" for="form2Example2">Confirm Password</label>
                </div>

                <!-- Submit button -->
                <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Register</button>

              </form>

        </div>
    </div>


</div>

@endsection
