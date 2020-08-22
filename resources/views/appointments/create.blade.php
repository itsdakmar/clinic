@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.time.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
          rel="stylesheet"/>

    <style>
        .picker__select--month, .picker__select--year {
            height: auto !important;
        }
    </style>
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Booking Appointment Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>Book appointment page</li>
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
                    <h3 class="card-title">Appointment's Information</h3>
                </div>
                <!--begin::form-->
                <form action="{{ route('appointments.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="col-md-6 form-group mb-4">
                                @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'patient')
                                    <label for="patient" class="ul-form__label">Patient name</label>
                                    <div class="input-group">
                                        <input type="hidden" name="patientId"
                                               value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                        <input type="text" class="form-control" readonly
                                               value="{{ ucwords(strtolower(\Illuminate\Support\Facades\Auth::user()->fullName)) }}">
                                    </div>
                                @else
                                    <label for="findPatient" class="ul-form__label">Select patient</label>
                                    <div class="input-group">
                                        <select id='findPatient' name="patientId" class="form-control select">
                                            <option value=''>Select patient</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label for="findDoctor" class="ul-form__label">Select doctor</label>
                                <div class="input-group">
                                    <select id='findDoctor' name="doctorId" class="form-control select">
                                        <option value=''>Select doctor</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="col-md-6 form-group mb-4">
                                <label for="findService" class="ul-form__label">Select service</label>
                                <div class="input-group">
                                    <select id='findService' name="type" class="form-control select">
                                        <option value=''>Select services</option>
                                        <option value='1'>Kes Ringan & Walk-In (Pesakit Luar)</option>
                                        <option value='2'>Medical Check-Up</option>
                                        <option value='3'>Procedure (Dressing & Lain-lain)</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a service.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group mb-4">
                                <label for="datePicker" class="ul-form__label">Appointment date</label>
                                <div class="input-group">
                                    <input type="text" readonly name="date" id="datePicker" class="form-control select"
                                           placeholder="Enter appointment date" value="{{ old('date') }}" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary text-white" type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                                <small class="ul-form__text form-text ">
                                    Please select your appointment date
                                </small>
                                <div class="invalid-tooltip birth_error">Please select your appointment date</div>
                            </div>
                            <div id="timeslot" class="col-md-6 form-group mb-4" style="display: none">
                                <label for="timePicker" class="ul-form__label">Appointment time</label>
                                <div class="input-group">
                                    <input type="text" readonly name="time" id="timePicker" class="form-control select"
                                           placeholder="Enter appointment time" value="{{ old('time') }}" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary text-white" type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                                <small class="ul-form__text form-text ">
                                    Please select your appointment time
                                </small>
                                <div class="invalid-tooltip birth_error">Please select your appointment time</div>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent">
                            <div class="mc-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn  btn-primary m-1">Submit</button>
                                        <button type="button" class="btn btn-outline-secondary m-1">Cancel</button>
                                        <button type="button" class="btn  btn-danger m-1 footer-delete-right">Reset
                                        </button>
                                    </div>
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
    <script src="{{asset('assets/js/vendor/pickadate/picker.time.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            let timepicker = $('#timePicker').pickatime({
                clear: '',
                interval: 15,
                min: [8, 0],
                max: [17, 0],
                formatSubmit: 'H:i',
                hiddenPrefix: 'prefix__',
                hiddenSuffix: '__suffix',
            });

            // get and save the 'picker' API object
            let timer = timepicker.pickatime('picker');

            $('#datePicker').pickadate({
                min: true,
                format: 'dd / mm / yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenPrefix: 'prefix__',
                hiddenSuffix: '__suffix',
                selectMonths: false,
                selectYears: false,
                firstDay: 1,
                disable: [6, 7],
                onSet: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{route('appointments.check')}}",
                        data: {'date': $("input[name='prefix__date__suffix']").val()},
                        success: function (data) {
                            $('#timeslot').show();
                            timer.set('disable', false);
                            timer.set('disable', $.parseJSON(data));
                        }
                    });
                }
            });

            $("#findPatient").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{route('find.patient')}}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

            $("#findDoctor").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{route('find.doctor')}}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

            $('.needs-validation').on('submit', function (e) {

                $('.select').each(function () {
                    if ($(this).val() === '') {
                        alert('please complete the form');
                        return false;
                        e.preventDefault();
                        e.stopPropagation();

                    }
                });
            });
        });
    </script>
@endsection