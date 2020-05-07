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
                <form action="{{ route('patients.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-row ">
                            <div class="form-group mb-4 col-md-2 ">
                                <label for="input_studentStaff" class="ul-form__label">Student / Staff:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline">
                                        <input class="userType" type="radio" name="userType" value="student" required>
                                        <span class="ul-form__radio-font">Student</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary">
                                        <input class="userType" type="radio" name="userType" value="staff" required>
                                        <span class="ul-form__radio-font">Staff</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please select as a staff or student
                                </small>
                                <div class="invalid-tooltip">Please select as a staff or student</div>

                            </div>
                            <div id="student" class="form-group mb-4 col-md-4 student_staff" style="display: none;">
                                <label for="input_matricNo" class="ul-form__label">Matric No:</label>
                                <input name="matricStaffId" type="text" class="form-control" id="input_matricNo"
                                       placeholder="Enter matric no">
                                <div class="invalid-tooltip">Please select as a staff or student</div>
                                <small class="ul-form__text form-text ">
                                    Please enter your matric no
                                </small>
                            </div>
                            <div id="staff" class="form-group mb-4 col-md-4 student_staff" style="display: none;">
                                <label for="input_staffNo" class="ul-form__label">Staff No:</label>
                                <input name="matricStaffId" type="text" class="form-control" id="input_staffNo"
                                       placeholder="Enter staff no">
                                <small class="ul-form__text form-text ">
                                    Please enter your staff no
                                </small>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_firstName" class="ul-form__label">First Name:</label>
                                <input name="firstName" type="text" class="form-control" id="input_firstName"
                                       placeholder="Enter first name" required>
                                <div class="invalid-tooltip">Please select as a staff or student</div>
                                <small class="ul-form__text form-text ">
                                    Please enter your first name
                                </small>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_lastName" class="ul-form__label">Last Name:</label>
                                <input name="lastName" type="text" class="form-control" id="input_lastName"
                                       placeholder="Enter last name">
                                <div class="invalid-tooltip">Please select as a staff or student</div>
                                <small class="ul-form__text form-text ">
                                    Please enter your last name
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-4 col-md-6 ">
                                <label for="inputEmail5" class="ul-form__label">Sex:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline">
                                        <input name="sex" type="radio" value="M">
                                        <span class="ul-form__radio-font">Male</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary">
                                        <input name="sex" type="radio" value="F">
                                        <span class="ul-form__radio-font">Female</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please select your sex
                                </small>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="inputEmail5" class="ul-form__label">Race:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline mr-2">
                                        <input name="race" type="radio" value="M">
                                        <span class="ul-form__radio-font">Malay</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input name="race" type="radio" value="C">
                                        <span class="ul-form__radio-font">Chinese</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input name="race" type="radio" value="I">
                                        <span class="ul-form__radio-font">Indian</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input name="race" type="radio" value="O">
                                        <span class="ul-form__radio-font">Others</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small class="ul-form__text form-text ">
                                    Please select your race
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group mb-4">
                                <label for="datePicker" class="ul-form__label">Birth date</label>
                                <div class="input-group">
                                    <input name="dob" id="datePicker" class="form-control"
                                           placeholder="Enter birth date">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary text-white" type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                                <small class="ul-form__text form-text ">
                                    Please select your birth date
                                </small>
                            </div>
                            <div class="form-group mb-4 col-md-2">
                                <label for="input_weight" class="ul-form__label">Weight (KG):</label>
                                <input name="weight" type="text" class="form-control" id="input_weight"
                                       placeholder="Enter weight (KG)">
                                <small class="ul-form__text form-text ">
                                    Please enter your weight
                                </small>
                            </div>
                            <div class="form-group mb-4 col-md-2">
                                <label for="input_height" class="ul-form__label">Height (CM):</label>
                                <input name="height" type="text" class="form-control" id="input_height"
                                       placeholder="Enter height (CM)">
                                <small class="ul-form__text form-text ">
                                    Please enter your height
                                </small>
                            </div>
                            <div class="col-md-2 form-group mb-4">
                                <label for="input_bloodType" class="ul-form__label">Select blood type</label>
                                <select name="bloodGroup" class="form-control" id="input_bloodType">
                                    <option value="o+">O(+)</option>
                                    <option value="o-">O(-)</option>
                                    <option value="b+">B(+)</option>
                                    <option value="b-">B(-)</option>
                                    <option value="a+">A(+)</option>
                                    <option value="a-">A(-)</option>
                                    <option value="ab+">AB(+)</option>
                                    <option value="ab-">AB(-)</option>
                                </select>
                                <small class="ul-form__text form-text ">
                                    Please select your blood type
                                </small>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_contact" class="ul-form__label">Contact Number:</label>
                                <input name="phone" type="text" class="form-control" id="input_contact"
                                       placeholder="Enter contact number">
                                <small class="ul-form__text form-text ">
                                    Please enter your contact number
                                </small>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_email" class="ul-form__label">Email Address:</label>
                                <input name="email" type="text" class="form-control" id="input_email"
                                       placeholder="Enter email address">
                                <small class="ul-form__text form-text ">
                                    Please enter your email address
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_address_1" class="ul-form__label">Address:</label>
                                <input name="address_1" type="text" class="form-control" id="input_address_1"
                                       placeholder="Enter address">
                                <small class="ul-form__text form-text ">
                                    Please enter your address
                                </small>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="input_address_2" class="ul-form__label">Address:</label>
                                <input name="address_2" type="text" class="form-control" id="input_address_2"
                                       placeholder="Enter address">
                                <small class="ul-form__text form-text ">
                                    Please enter your address
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 form-group mb-4">
                                <label for="input_state" class="ul-form__label">Select state</label>
                                <select name="stateId" class="form-control" id="input_state"
                                        data-href="{{ route('cities.get') }}">
                                    <option value="">Please select your state</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                                <small class="ul-form__text form-text ">
                                    Please select your state
                                </small>
                            </div>
                            <div class="col-md-3 form-group mb-4">
                                <label for="input_city" class="ul-form__label">Select city</label>
                                <select name="cityId" class="form-control" id="input_city">
                                    <option value="">Please select your city</option>
                                </select>
                                <small class="ul-form__text form-text ">
                                    Please select your city
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip03">City</label>
                                <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationTooltip04">State</label>
                                <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationTooltip05">Zip</label>
                                <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid zip.
                                </div>
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
    <script>
        $(document).ready(function () {
            $('#datePicker').pickadate({
                format: 'dd/mm/yyyy',
                selectMonths: true,
                selectYears: 90
            });
            $('.userType').on('change', function () {
                $('.student_staff').hide();
                $('#' + $(this).val()).show();
            });

            $("#input_state").on('change', function () {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let url = $(this).data('href');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {_token: CSRF_TOKEN, stateId: $("#input_state").val()},
                    dataType: 'JSON',
                    success: function (data) {
                        $('#input_city').find('option').remove().end().append($('<option>', {
                            value: '',
                            text: 'Please select your city'
                        }));
                        $.each(data, function (i, datum) {
                            $('#input_city')
                                .append($('<option>', {
                                    value: datum.id,
                                    text: datum.name
                                }));
                        });
                    }
                });
            });

            $('.needs-validation').on('submit', function(e) {
                if (!this.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                $(this).addClass('was-validated');
            });
        });
    </script>
@endsection