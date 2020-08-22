<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>UTeM Clinic Management System</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    </head>

    <body>
        <div class="auth-layout-wrap" style="background:linear-gradient(45deg, #cadcfb, #60c2c9) !important;">
            <div class="auth-content" style="max-width: 900px!important;width: 900px!important;">
                <div class="card o-hidden">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-4">
                                <div class="auth-logo text-center mb-4">
                                    <img src="{{asset('assets/images/login.svg')}}" alt="" style="width: auto;">
                                </div>
                                <form method="POST" action="{{ route('register.patient') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="input_studentStaff" class="ul-form__label">Student / Staff :</label>
                                        <div class="ul-form__radio-inline">
                                            <label class=" ul-radio__position radio radio-primary form-check-inline">
                                                <input class="userType" type="radio" name="is_student" value="1" {{ old('is_student') == '1' ? 'checked' : '' }} required>
                                                <span class="ul-form__radio-font">Student</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="ul-radio__position radio radio-primary form-check-inline">
                                                <input class="userType" type="radio" name="is_student" value="0" {{ old('is_student') == '0' ? 'checked' : '' }} required>
                                                <span class="ul-form__radio-font">Staff</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="invalid-tooltip show_error">Please select as a staff or student</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input id="firstName"
                                               class="form-control form-control-rounded @error('firstName') is-invalid @enderror"
                                               name="firstName" value="{{ old('firstName') }}" required
                                               autofocus>
                                        @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input id="lastName"
                                               class="form-control form-control-rounded @error('lastName') is-invalid @enderror"
                                               name="lastName" value="{{ old('lastName') }}" required
                                               autofocus>
                                        @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="matricStaffId">Student / Staff id</label>
                                        <input id="matricStaffId"
                                            class="form-control form-control-rounded @error('matricStaffId') is-invalid @enderror"
                                            name="matricStaffId" value="{{ old('matricStaffId') }}" required
                                            autofocus>
                                        @error('matricStaffId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input id="email"
                                               class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password"
                                            class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="false">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirm Password</label>
                                        <input type="password" id="confirm-password"
                                               class="form-control form-control-rounded @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" required autocomplete="false">
                                        @error('confirm-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-rounded btn-primary btn-block mt-2">Sign Up</button>

                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 text-center "
                            style="background-size: cover; background-position:center; background-image: url({{asset('assets/images/login-min.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

        <script src="{{asset('assets/js/script.js')}}"></script>
    </body>

</html>