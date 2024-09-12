@php
    $seoSetting = \App\Models\SeoSetting::first();
    $generalSetting = \App\Models\GeneralSetting::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; {{ @$seoSetting?->title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <style>
        html,
        #app {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity));
        }

        .form-group label {
            color: white;
        }

        .form-control {
            background-color: #1f2937;
            color: white;
            border-color: #4b5563;
        }

        .form-control:focus {
            border-color: #6b7280;
            box-shadow: none;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
        }

        .login-brand img {
            border-radius: 50%;
        }

        .simple-footer {
            text-align: center;
            margin-top: 15px;
            color: white;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="login-brand">
                            <img src="{{ asset($generalSetting?->logo) }}" alt="logo" width="100">
                        </div>

                        <div class="card card-dark bg-transparent">
                            <div class="card-header">
                                <h4 class="text-white text-center">Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="error-message">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="error-message">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="error-message">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="error-message">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="business_name">Business Name</label>
                                        <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('business_name') }}">
                                        @if ($errors->has('business_name'))
                                            <span class="error-message">{{ $errors->first('business_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                            <span class="error-message">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_person">Contact Person</label>
                                        <input id="contact_person" type="text" class="form-control" name="contact_person" value="{{ old('contact_person') }}">
                                        @if ($errors->has('contact_person'))
                                            <span class="error-message">{{ $errors->first('contact_person') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                            @if ($errors->has('phone'))
                                                <span class="error-message">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="mobile_numbers">Mobile Numbers</label>
                                            <input id="mobile_numbers" type="text" class="form-control" name="mobile_numbers" value="{{ old('mobile_numbers') }}">
                                            @if ($errors->has('mobile_numbers'))
                                                <span class="error-message">{{ $errors->first('mobile_numbers') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                                    </div>

                                    <div class="form-group text-center">
                                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg btn-block">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="simple-footer">
                            Copyright &copy; {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>
