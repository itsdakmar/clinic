@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
    <style>
        .picker__select--month, .picker__select--year {
            height: auto !important;
        }
    </style>
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Patient Information Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>List of patient registered</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    {{-- end of breadcrumb --}}

    <!-- begin::main-row -->
    <div class="row">
        <!-- start default action bar -->
        <div class="col-lg-9 col-md-12 mb-3">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="card-title"> Patient's Information</h3>
                </div>
                <!--begin::form-->
                <form action="{{ route('patients.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-row ">
                            <div class="form-group mb-4 col-md-4 ">
                                <label for="input_studentStaff" class="ul-form__label">Student / Staff:</label>
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
                                    {{--<label class="ul-radio__position radio radio-primary form-check-inline">--}}
                                        {{--<input class="userType" type="radio" name="is_student" value="0" {{ old('is_student') == '2' ? 'checked' : '' }} required>--}}
                                        {{--<span class="ul-form__radio-font">Dependent</span>--}}
                                        {{--<span class="checkmark"></span>--}}
                                    {{--</label>--}}
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text">
                                    Please select as a staff or student
                                </small>
                                <div class="invalid-tooltip show_error">Please select as a staff or student</div>
                            </div>
                            <div id="student" class="form-group {{ $errors->has('matricId') ? 'has-danger' : '' }} mb-4 col-md-4 student_staff" style="display: {{ $errors->has('matricId') ? 'block' : 'none' }};">
                                <label for="input_matricNo" class="ul-form__label">Matric No:</label>
                                <input name="matricId" type="text" class="form-control {{ $errors->has('matricId') ? 'is-invalid' : '' }}" id="input_matricNo"
                                       placeholder="Enter matric no" value="{{ old('matricId') }}" >
                                <small class="ul-form__text form-text ">
                                    Please enter your matric no
                                </small>
                                @if ($errors->has('matricId'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('matricId') }}</strong>
                                        </span>
                                @else
                                    <div class="invalid-tooltip">Please enter your matric no</div>
                                @endif
                            </div>
                            <div id="staff" class="form-group {{ $errors->has('StaffId') ? 'has-danger' : '' }} mb-4 col-md-4 student_staff" style="display: {{ $errors->has('StaffId') ? 'block' : 'none' }};">
                                <label for="input_staffNo" class="ul-form__label">Staff No:</label>
                                <input name="StaffId" type="text" class="form-control {{ $errors->has('StaffId') ? 'is-invalid' : '' }}" id="input_staffNo"
                                       placeholder="Enter staff no" value="{{ old('StaffId') }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your staff no
                                </small>

                                @if ($errors->has('StaffId'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('StaffId') }}</strong>
                                        </span>
                                @else
                                    <div class="invalid-tooltip">Please enter your staff no</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group {{ $errors->has('firstName') ? 'has-danger' : '' }} mb-4 col-md-6">
                                <label for="input_firstName" class="ul-form__label">First Name:</label>
                                <input name="firstName" type="text" class="form-control {{ $errors->has('firstName') ? 'is-invalid' : '' }}" id="input_firstName"
                                       placeholder="Enter first name" required value="{{ old('firstName') }}">
                                <small class="ul-form__text form-text">
                                    Please enter your first name
                                </small>
                                <div class="invalid-tooltip">Please enter your first name</div>
                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                @else
                                    <div class="invalid-tooltip">Please enter your first name</div>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('lastName') ? 'has-danger' : '' }} mb-4 col-md-6">
                                <label for="input_lastName" class="ul-form__label">Last Name:</label>
                                <input name="lastName" type="text" class="form-control {{ $errors->has('firstName') ? 'is-invalid' : '' }}" id="input_lastName"
                                       placeholder="Enter last name" required value="{{ old('lastName') }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your last name
                                </small>
                                <div class="invalid-tooltip">Please enter your last name</div>
                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                @else
                                    <div class="invalid-tooltip">Please enter your first name</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group {{ $errors->has('sex') ? 'has-danger' : '' }} mb-4 col-md-6 ">
                                <label for="inputEmail5" class="ul-form__label">Sex:</label>
                                <div class="ul-form__radio-inline form-check">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline">
                                        <input class="sex" name="sex" type="radio" value="M" {{ old('sex') == 'M' ? 'checked' : '' }}>
                                        <span class="ul-form__radio-font">Male</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary">
                                        <input class="sex" name="sex" type="radio" value="F" {{ old('sex') == 'F' ? 'checked' : '' }}>
                                        <span class="ul-form__radio-font">Female</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please select your sex
                                </small>
                                @if ($errors->has('sex'))
                                    <span class="invalid-feedback" style="display: block" role="alert">
                                            <strong>{{ $errors->first('sex') }}</strong>
                                        </span>
                                @else
                                    <div class="invalid-tooltip sex_error">Please select your sex</div>

                                @endif
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="inputEmail5" class="ul-form__label">Race:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline mr-2">
                                        <input class="race" name="race" type="radio" value="M" {{ old('race') == 'M' ? 'checked' : '' }} required>
                                        <span class="ul-form__radio-font">Malay</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input class="race" name="race" type="radio" value="C" {{ old('agreement') == 'C' ? 'checked' : '' }} required>
                                        <span class="ul-form__radio-font">Chinese</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input class="race" name="race" type="radio" value="I" {{ old('agreement') == 'I' ? 'checked' : '' }} required>
                                        <span class="ul-form__radio-font">Indian</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input class="race" name="race" type="radio" value="O" {{ old('agreement') == 'O' ? 'checked' : '' }} required>
                                        <span class="ul-form__radio-font">Others</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small class="ul-form__text form-text ">
                                    Please select your race
                                </small>
                                <div class="invalid-tooltip race_error">Please select your race</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group mb-4">
                                <label for="datePicker" class="ul-form__label">Birth date</label>
                                <div class="input-group">
                                    <input type="text" readonly name="dob" id="datePicker" class="form-control"
                                           placeholder="Enter birth date" value="{{ old('dob') }}" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary text-white" type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                                <small class="ul-form__text form-text ">
                                    Please select your birth date
                                </small>
                                <div class="invalid-tooltip birth_error">Please select your birth date</div>
                            </div>
                            <div class="form-group mb-4 col-md-2">
                                <label for="input_weight" class="ul-form__label">Weight (KG):</label>
                                <input name="weight" type="number" class="form-control" id="input_weight"
                                       placeholder="Enter weight (KG)" onKeyPress="if(this.value.length === 3) return false;" value="{{ old('weight') }}">
                                <small class="ul-form__text form-text ">
                                    Please select your birth date
                                </small>
                                <div class="invalid-tooltip show_error">Please select your birth date</div>
                            </div>
                            <div class="form-group mb-4 col-md-2">
                                <label for="input_height" class="ul-form__label">Height (CM):</label>
                                <input name="height" type="number" class="form-control" id="input_height"
                                       placeholder="Enter height (CM)" onKeyPress="if(this.value.length === 3) return false;" value="{{ old('height') }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your height
                                </small>
                                <div class="invalid-tooltip">Please enter your height</div>
                            </div>
                            <div class="col-md-2 form-group mb-4">
                                <label for="input_bloodType" class="ul-form__label">Select blood type</label>
                                <select name="bloodGroup" class="form-control" id="input_bloodType" required>
                                    <option value="">Please select your blood type</option>
                                    <option value="O+" {{ old('bloodGroup') == 'O+' ? 'selected' : '' }}>O(+)</option>
                                    <option value="O-" {{ old('bloodGroup') == 'O-' ? 'selected' : '' }}>O(-)</option>
                                    <option value="B+" {{ old('bloodGroup') == 'B+' ? 'selected' : '' }}>B(+)</option>
                                    <option value="B-" {{ old('bloodGroup') == 'B-' ? 'selected' : '' }}>B(-)</option>
                                    <option value="A+" {{ old('bloodGroup') == 'A+' ? 'selected' : '' }}>A(+)</option>
                                    <option value="A-" {{ old('bloodGroup') == 'A-' ? 'selected' : '' }}>A(-)</option>
                                    <option value="AB+" {{ old('bloodGroup') == 'AB+' ? 'selected' : '' }}>AB(+)</option>
                                    <option value="AB-" {{ old('bloodGroup') == 'AB-' ? 'selected' : '' }}>AB(-)</option>
                                </select>
                                <small class="ul-form__text form-text ">
                                    Please select your blood type
                                </small>
                                <div class="invalid-tooltip">Please select your blood type</div>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_contact" class="ul-form__label">Contact Number:</label>
                                <input name="phone" type="number" class="form-control" id="input_contact"
                                       placeholder="Enter contact number" onKeyPress="if(this.value.length === 11) return false;" value="{{ old('phone') }}" required>
                                <small class="ul-form__text form-text ">
                                    Please enter your contact number
                                </small>
                                <div class="invalid-tooltip">Please enter your contact number</div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }} mb-4 col-md-6">
                                <label for="input_email" class="ul-form__label">Email Address:</label>
                                <input name="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="input_email"
                                       placeholder="Enter email address" value="{{ old('email') }}" required>
                                <small class="ul-form__text form-text">
                                    Please enter your email address
                                </small>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @else
                                    <div class="invalid-tooltip">Please enter your email address</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_address_1" class="ul-form__label">Address:</label>
                                <input name="address_1" type="text" class="form-control" id="input_address_1"
                                       placeholder="Enter address" value="{{ old('address_1') }}" required>
                                <small class="ul-form__text form-text ">
                                    Please enter your address
                                </small>
                                <div class="invalid-tooltip">Please enter your address</div>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_address_2" class="ul-form__label">Address:</label>
                                <input name="address_2" type="text" class="form-control" id="input_address_2"
                                       placeholder="Enter address" value="{{ old('address_2') }}" required>
                                <small class="ul-form__text form-text ">
                                    Please enter your address
                                </small>
                                <div class="invalid-tooltip">Please enter your address</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 form-group mb-4">
                                <label for="input_state" class="ul-form__label">Select state</label>
                                <select name="stateId" class="form-control" id="input_state"
                                        data-href="{{ route('cities.get') }}" required>
                                    <option value="">Please select your state</option>
                                    @foreach($states as $state)
                                        <option {{ old('stateId') == $state->id ? 'selected' : '' }} value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                                <small class="ul-form__text form-text ">
                                    Please select your state
                                </small>
                                <div class="invalid-tooltip">Please select your state</div>
                            </div>
                            <div class="col-md-3 form-group mb-4">
                                <label for="input_city" class="ul-form__label">Select city</label>
                                <select name="cityId" class="form-control" id="input_city" required>
                                    <option value="">Please select your city</option>
                                    @foreach($cities as $city)
                                        <option {{ old('cityId') == $city->id ? 'selected' : '' }} value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <small class="ul-form__text form-text ">
                                    Please select your city
                                </small>
                                <div class="invalid-tooltip">Please select your city</div>
                            </div>
                            <div class="form-group mb-4 col-md-3">
                                <label for="input_postcode" class="ul-form__label">Postcode:</label>
                                <input name="postcode" type="number" class="form-control" id="input_postcode"
                                       placeholder="Enter postcode" title="please enter number only"
                                       onKeyPress="if(this.value.length === 5) return false;" value="{{ old('postcode') }}" required>
                                <small class="ul-form__text form-text ">
                                    Please enter your postcode
                                </small>
                                <div class="invalid-tooltip">Please enter your postcode</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="mc-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn  btn-primary m-1">Submit</button>
                                    <button type="button" class="btn btn-outline-secondary m-1">Cancel</button>
                                    <button type="button" class="btn  btn-danger m-1 footer-delete-right">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end::form -->
            </div>
        </div>
    </div>
    <!-- end default action bar -->
    {{-- end of col --}}
@endsection
@section('page-js')
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
    <script src="{{ asset('js/patient.js') }}"></script>
@endsection