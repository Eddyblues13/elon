@include('layouts.header')

<section class="registration-area pt-60 pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="registration-form bg-light p-5 rounded">
                    <h2 class="text-center mb-4">Create an Account</h2>

                    {{-- Display Success Message --}}
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- Registration Form --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name Field --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Email Field --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Password Field --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Confirm Password Field --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>

                    {{-- Link to Login Page --}}
                    <p class="mt-3 text-center">
                        Already have an account? <a href="{{ route('login') }}">Login here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer') {{-- Assuming 'home.footer' contains the closing HTML tags --}}