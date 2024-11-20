@include('layouts.header')


<section class="login-area pt-60 pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login-form bg-light p-5 rounded">
                    <h2 class="text-center mb-4">Login to Your Account</h2>

                    {{-- Display Error Message --}}
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    {{-- Login Form --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email Field --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required autofocus>
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

                        {{-- Remember Me Checkbox --}}
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{
                                old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    {{-- Links --}}
                    <p class="mt-3 text-center">
                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </p>
                    <p class="mt-1 text-center">
                        Don't have an account? <a href="{{ route('register') }}">Register here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer') {{-- Assuming 'home.footer' contains the closing HTML tags --}}