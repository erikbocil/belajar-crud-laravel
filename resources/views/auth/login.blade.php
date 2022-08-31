@extends('../templates/template')

@section('content')

<div class="container d-flex justify-content-center my-5">
    <div class="col-6">
        @if (Session::has('success'))
            <div class="alert alert-primary">
                <p class="text-primary">{{ session('success') }}</p>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">
                <p class="text-danger">{{ session('error') }}</p>
            </div>
        @endif
        <form action="{{route('login-user')}}" method="POST">
            @csrf 
            <div class="mb-3">
                <label for="title" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="{{old('username')}}">
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="row justify-content-between">
                <a class="text-primary text-decoration-none col-5" href="{{route('register-page')}}">Haven't registered yet? Register Here</a>
                <button type="submit" class="btn btn-primary col-5">Login</button> 
            </div>
        </form>
    </div>
</div>

@endsection