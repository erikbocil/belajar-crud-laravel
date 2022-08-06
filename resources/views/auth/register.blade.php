@extends('../templates/template')

@section('content')

<div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="col-6">
        <form action="{{route('register-user')}}" method="POST">
            @csrf 
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{old('email')}}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter Username" value="{{old('username')}}">
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password" value="{{old('password')}}">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Password Again</label>
                <input type="password" class="form-control @error('password-confirmation') is-invalid @enderror" id="password-confirmation" name="password-confirmation" placeholder="Enter password">
                @error('password-confirmation')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="row justify-content-between">
                <a class="text-primary text-decoration-none col-5" href="{{route('login-page')}}">Already registered? Login Here</a>
                <button type="submit" class="btn btn-primary col-5">Register</button> 
            </div>
        </form>
    </div>
</div>

@endsection