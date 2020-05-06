@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
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
                <form action="">
                    <div class="card-body">
                        <div class="form-row ">
                            <div class="form-group col-md-2 ">
                                <label for="input_studentStaff" class="ul-form__label">Student / Staff:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline">
                                        <input class="userType" type="radio" name="userType" value="student">
                                        <span class="ul-form__radio-font">Student</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary">
                                        <input class="userType" type="radio" name="userType" value="staff">
                                        <span class="ul-form__radio-font">Staff</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please select as a staff or student
                                </small>
                            </div>
                            <div id="staff_student" class="form-group col-md-4" style="display: none;">
                                <label for="input_matricNo" class="ul-form__label">:</label>
                                <input type="text" class="form-control" id="input_matricNo"
                                       placeholder="Enter matric no">
                                <small class="ul-form__text form-text ">
                                    Please enter your matric no
                                </small>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="input_firstName" class="ul-form__label">First Name:</label>
                                <input type="text" class="form-control" id="input_firstName"
                                       placeholder="Enter first name">
                                <small class="ul-form__text form-text ">
                                    Please enter your first name
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_lastName" class="ul-form__label">Last Name:</label>
                                <input type="text" class="form-control" id="input_lastName"
                                       placeholder="Enter last name">
                                <small class="ul-form__text form-text ">
                                    Please enter your last name
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label for="inputEmail5" class="ul-form__label">Sex:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline">
                                        <input type="radio" name="sex" value="M">
                                        <span class="ul-form__radio-font">Male</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary">
                                        <input type="radio" name="sex" value="F">
                                        <span class="ul-form__radio-font">Female</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please select your sex
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail5" class="ul-form__label">Race:</label>
                                <div class="ul-form__radio-inline">
                                    <label class=" ul-radio__position radio radio-primary form-check-inline mr-2">
                                        <input type="radio" name="race" value="M">
                                        <span class="ul-form__radio-font">Malay</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input type="radio" name="race" value="C">
                                        <span class="ul-form__radio-font">Chinese</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input type="radio" name="race" value="I">
                                        <span class="ul-form__radio-font">Indian</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="ul-radio__position radio radio-primary mr-2">
                                        <input type="radio" name="race" value="O">
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
                            <div class="col-md-6 form-group">
                                <label for="datePicker" class="ul-form__label">Birth date</label>
                                <div class="input-group">
                                    <input id="datePicker" class="form-control" placeholder="Enter birth date"
                                           name="dp">
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
                            <div class="form-group col-md-2">
                                <label for="input_weight" class="ul-form__label">Weight (KG):</label>
                                <input type="text" class="form-control" id="input_weight"
                                       placeholder="Enter weight (KG)">
                                <small class="ul-form__text form-text ">
                                    Please enter your weight
                                </small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="input_height" class="ul-form__label">Height (CM):</label>
                                <input type="text" class="form-control" id="input_height"
                                       placeholder="Enter height (CM)">
                                <small class="ul-form__text form-text ">
                                    Please enter your height
                                </small>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="input_bloodType" class="ul-form__label">Select blood type</label>
                                <select class="form-control" id="input_bloodType">
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
                            <div class="form-group col-md-6">
                                <label for="input_contact" class="ul-form__label">Contact Number:</label>
                                <input type="text" class="form-control" id="input_contact"
                                       placeholder="Enter contact number">
                                <small class="ul-form__text form-text ">
                                    Please enter your contact number
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_email" class="ul-form__label">Email Address:</label>
                                <input type="text" class="form-control" id="input_email"
                                       placeholder="Enter email address">
                                <small class="ul-form__text form-text ">
                                    Please enter your email address
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input_address_1" class="ul-form__label">Address:</label>
                                <input type="text" class="form-control" id="input_address_1"
                                       placeholder="Enter address">
                                <small class="ul-form__text form-text ">
                                    Please enter your address
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_address_2" class="ul-form__label">Address:</label>
                                <input type="text" class="form-control" id="input_address_2"
                                       placeholder="Enter address">
                                <small class="ul-form__text form-text ">
                                    Please enter your address
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 form-group">
                                <label for="input_state" class="ul-form__label">Select state</label>
                                <select class="form-control" id="input_state">
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
                                    Please select your state
                                </small>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="input_city" class="ul-form__label">Select city</label>
                                <select class="form-control" id="input_city">
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
                                    Please select your city
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent">
                        <div class="mc-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn  btn-primary m-1">Submit</button>
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
            $('#datePicker').pickadate();
            $('.userType').on('change', function(){
                $('#staff_student > .ul-form__label').text($(this).val().substr(0,1).toUpperCase()+$(this).val().substr(1)+' No.');
                $('#staff_student').show();
            });
        });
    </script>
@endsection