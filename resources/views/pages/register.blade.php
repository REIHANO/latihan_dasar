<form action="{{ route('register.store') }}" method="POST">
    @csrf
    
    <div class="input-group mb-3">
        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
        </div>
    </div>
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror

    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
        </div>
    </div>
    @error('email') <small class="text-danger">{{ $message }}</small> @enderror

    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password" required>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
        </div>
    </div>
    @error('password') <small class="text-danger">{{ $message }}</small> @enderror

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>
</form>

<a href="{{ route('login') }}" class="text-center">I already have a membership</a>