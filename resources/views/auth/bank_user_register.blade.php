<!DOCTYPE html>
<html lang="en-US" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{ asset('path/to/favicon.ico') }}" type="image/x-icon">
    <title>Register | Bank User</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=2.4.0') }}">
    <link rel="stylesheet" href="{{ asset('admin/scss/sweetalert.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=2.4.0') }}">
</head>

<body class="nk-body npc-crypto bg-white pg-auth">
    <div class="nk-app-root">
        <div class="justify-center card-header">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                <div class="nk-block nk-block-middle nk-auth-body">
                    <center class="brand-logo pb-5">
                        <a href="" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{ asset('assets/img/logo1.png') }}"
                                alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/img/logo1.png') }}"
                                alt="logo-dark">
                        </a>
                    </center>
                    <br>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Sign-Up</h5>
                            <div class="nk-block-des alert alert-pro alert-primary">
                                <p class="alert-text">Register using your details to create an account.</p>
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

                    <form action="{{ route('bank_user.register') }}" method="post">
                        @csrf
                        <!-- First Name -->
                        <div class="form-group">
                            <label class="form-label" for="first_name">First Name</label>
                            <input type="text"
                                class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                id="first_name" placeholder="Enter your first name" name="first_name"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input type="text"
                                class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                id="last_name" placeholder="Enter your last name" name="last_name"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                id="email" placeholder="Enter your last name" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label class="form-label" for="phone_number">Phone Number</label>
                            <input type="tel"
                                class="form-control form-control-lg @error('phone_number') is-invalid @enderror"
                                id="phone_number" placeholder="Enter your phone number" name="phone_number"
                                value="{{ old('phone_number') }}">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Country -->
                        <div class="form-group">
                            <label class="form-label" for="country">Country</label>
                            <select name="country" id="country"
                                class="form-control form-control-lg @error('country') is-invalid @enderror">
                                <option value="">Select Country</option>
                                <option value="United States" {{ old('country')=='United States' ? 'selected' : '' }}>
                                    United States</option>
                                <option value="Nigeria" {{ old('country')=='Nigeria' ? 'selected' : '' }}>Nigeria
                                </option>
                                <option value="United Kingdom" {{ old('country')=='United Kingdom' ? 'selected' : '' }}>
                                    United Kingdom</option>
                            </select>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Currency -->
                        <div class="form-group">
                            <label class="form-label" for="currency">Currency</label>
                            <select name="currency" id="currency"
                                class="form-control form-control-lg @error('currency') is-invalid @enderror">
                                <option value="">Select Currency</option>
                                <option value="USD" {{ old('currency')=='USD' ? 'selected' : '' }}>USD</option>
                                <option value="NGN" {{ old('currency')=='NGN' ? 'selected' : '' }}>NGN</option>
                                <option value="GBP" {{ old('currency')=='GBP' ? 'selected' : '' }}>GBP</option>
                            </select>
                            @error('currency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Account Type -->
                        <div class="form-group">
                            <label class="form-label" for="account_type">Account Type</label>
                            <select name="account_type" id="account_type"
                                class="form-control form-control-lg @error('account_type') is-invalid @enderror">
                                <option value="">Select Account Type</option>
                                <option value="Savings" {{ old('account_type')=='Savings' ? 'selected' : '' }}>Savings
                                </option>
                                <option value="Current" {{ old('account_type')=='Current' ? 'selected' : '' }}>Current
                                </option>
                            </select>
                            @error('account_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                id="password" placeholder="Enter your password" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg" id="password_confirmation"
                                placeholder="Confirm your password" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                        </div>
                    </form>
                </div>
                <div class="nk-block nk-auth-footer" style="margin-top:80px;">
                    <div class="mt-3">
                        <p>&copy; {{ date('Y') }}. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/bundle.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/sweetalert.js') }}"></script>
</body>

</html>