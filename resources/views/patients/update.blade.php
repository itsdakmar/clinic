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
                    <h3 class="card-title"> Default Action Bar</h3>
                </div>
                <!--begin::form-->
                <form action="{{ route('patients.update', $patient)}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-row ">
                            <div class="form-group mb-4 col-md-2 ">
                                <label for="input_studentStaff" class="ul-form__label">Student / Staff:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline">
                                        <input class="userType" type="radio" name="is_student" value="1" required @if($patient->is_student) checked @endif>
                                        <span class="ul-form__radio-font">Student</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary">
                                        <input class="userType" type="radio" name="is_student" value="0" required @if(!$patient->is_student) checked @endif>
                                        <span class="ul-form__radio-font">Staff</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please select as a staff or student
                                </small>
                                <div class="invalid-tooltip show_error">Please select as a staff or student</div>
                            </div>
                            <div id="student" class="form-group mb-4 col-md-4 student_staff" style="display: {{($patient->is_student) ? "block" : "none" }}">
                                <label for="input_matricNo" class="ul-form__label">Matric No:</label>
                                <input name="matricId" type="text" class="form-control" id="input_matricNo"
                                       placeholder="Enter matric no" value="{{ old('matricId' , $patient->matricStaffId) }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your matric no
                                </small>
                                <div class="invalid-tooltip">Please enter your matric no</div>
                            </div>
                            <div id="staff" class="form-group mb-4 col-md-4 student_staff" style="display: {{(!$patient->is_student) ? "block" : "none" }};">
                                <label for="input_staffNo" class="ul-form__label">Staff No:</label>
                                <input name="StaffId" type="text" class="form-control" id="input_staffNo"
                                       placeholder="Enter staff no" value="{{ old('matricId' , $patient->matricStaffId) }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your staff no
                                </small>
                                <div class="invalid-tooltip">Please enter your staff no</div>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_firstName" class="ul-form__label">First Name:</label>
                                <input name="firstName" type="text" class="form-control" id="input_firstName"
                                       placeholder="Enter first name" required value="{{ old('firstName' , $patient->firstName) }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your first name
                                </small>
                                <div class="invalid-tooltip">Please enter your first name</div>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_lastName" class="ul-form__label">Last Name:</label>
                                <input name="lastName" type="text" class="form-control" id="input_lastName"
                                       placeholder="Enter last name" required value="{{ old('lastName' , $patient->lastName) }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your last name
                                </small>
                                <div class="invalid-tooltip">Please enter your last name</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-4 col-md-6 ">
                                <label for="inputEmail5" class="ul-form__label">Sex:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline">
                                        <input class="sex" name="sex" type="radio" value="M" @if($patient->patientDetail->sex == 'MALE') checked @endif>
                                        <span class="ul-form__radio-font">Male</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary">
                                        <input class="sex" name="sex" type="radio" value="F" @if($patient->patientDetail->sex == 'FEMALE') checked @endif>
                                        <span class="ul-form__radio-font">Female</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please select your sex
                                </small>
                                <div class="invalid-tooltip sex_error">Please select your sex</div>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="inputEmail5" class="ul-form__label">Race:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline mr-2">
                                        <input class="race" name="race" type="radio" value="M" required @if($patient->patientDetail->race == 'MALAY') checked @endif>
                                        <span class="ul-form__radio-font">Malay</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input class="race" name="race" type="radio" value="C" required @if($patient->patientDetail->race == 'CHINESE') checked @endif>
                                        <span class="ul-form__radio-font">Chinese</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input class="race" name="race" type="radio" value="I" required @if($patient->patientDetail->race == 'INDIAN') checked @endif>
                                        <span class="ul-form__radio-font">Indian</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input class="race" name="race" type="radio" value="O" required @if($patient->patientDetail->race == 'OTHERS') checked @endif>
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
                                    <input type="text" name="dob" id="datePicker" class="form-control"
                                           placeholder="Enter birth date" required value="{{ old('dob' , $patient->patientDetail->dob->format('d / m / Y')) }}">
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
                                <input name="weight" type="text" class="form-control" id="input_weight"
                                       placeholder="Enter weight (KG)" required value="{{ old('weight' , $patient->patientDetail->weight) }}">
                                <small class="ul-form__text form-text ">
                                    Please select your birth date
                                </small>
                                <div class="invalid-tooltip show_error">Please select your birth date</div>
                            </div>
                            <div class="form-group mb-4 col-md-2">
                                <label for="input_height" class="ul-form__label">Height (CM):</label>
                                <input name="height" type="text" class="form-control" id="input_height"
                                       placeholder="Enter height (CM)" required value="{{ old('height' , $patient->patientDetail->height) }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your height
                                </small>
                                <div class="invalid-tooltip">Please enter your height</div>
                            </div>
                            <div class="col-md-2 form-group mb-4">
                                <label for="input_bloodType" class="ul-form__label">Select blood type</label>
                                <select name="bloodGroup" class="form-control" id="input_bloodType" required>
                                    <option value="">Please select your blood type</option>
                                    <option value="o+" @if($patient->bloodGroup == 'o+') selected @endif >O(+)</option>
                                    <option value="o-" @if($patient->bloodGroup == 'o-') selected @endif >O(-)</option>
                                    <option value="b+" @if($patient->bloodGroup == 'b+') selected @endif >B(+)</option>
                                    <option value="b-" @if($patient->bloodGroup == 'b-') selected @endif >B(-)</option>
                                    <option value="a+" @if($patient->bloodGroup == 'a+') selected @endif >A(+)</option>
                                    <option value="a-" @if($patient->bloodGroup == 'a-') selected @endif >A(-)</option>
                                    <option value="ab+" @if($patient->bloodGroup == 'ab+') selected @endif >AB(+)</option>
                                    <option value="ab-" @if($patient->bloodGroup == 'ab-') selected @endif >AB(-)</option>
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
                                <input name="phone" type="text" class="form-control" id="input_contact"
                                       placeholder="Enter contact number" required value="{{ old('phone' , $patient->patientDetail->phone) }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your contact number
                                </small>
                                <div class="invalid-tooltip">Please enter your contact number</div>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_email" class="ul-form__label">Email Address:</label>
                                <input name="email" type="text" class="form-control" id="input_email"
                                       placeholder="Enter email address" required value="{{ old('email' , $patient->email) }}">
                                <small class="ul-form__text form-text">
                                    Please enter your email address
                                </small>
                                <div class="invalid-tooltip">Please enter your email address</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_address_1" class="ul-form__label">Address:</label>
                                <input name="address_1" type="text" class="form-control" id="input_address_1"
                                       placeholder="Enter address" required value="{{ old('address_1' , $patient->patientDetail->address_1) }}">
                                <small class="ul-form__text form-text ">
                                    Please enter your address
                                </small>
                                <div class="invalid-tooltip">Please enter your address</div>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_address_2" class="ul-form__label">Address:</label>
                                <input name="address_2" type="text" class="form-control" id="input_address_2"
                                       placeholder="Enter address" required value="{{ old('address_2' , $patient->patientDetail->address_2) }}">
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
                                        <option value="{{$state->id}}" @if($patient->patientDetail->stateId == $state->id) selected @endif >{{$state->name}}</option>
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
                                        <option value="{{$city->id}}" @if($patient->patientDetail->cityId == $city->id) selected @endif >{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <small class="ul-form__text form-text ">
                                    Please select your city
                                </small>
                                <div class="invalid-tooltip">Please select your city</div>
                            </div>
                            <div class="form-group mb-4 col-md-3">
                                <label for="input_postcode" class="ul-form__label">Postcode:</label>
                                <input name="postcode" type="text" class="form-control" id="input_postcode"
                                       placeholder="Enter postcode" required value="{{ old('postcode' , $patient->patientDetail->postcode) }}">
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