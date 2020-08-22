@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Patient Information Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>Patient information page</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    {{-- end of breadcrumb --}}

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Patient information details <span class="float-right">
                           @hasanyrole('patient|nurse')
                            <a href="{{ route('patients.edit', $profile->id) }}"
                               class="btn btn-raised ripple btn-raised-primary m-1">Update Information</a></span>
                        @endhasanyrole
                    </h4>
                    <p>This page shows information of your details information, click on update profile to update your
                        information.</p>
                    @if (session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-card alert-success text-center" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6><a href="#">#{{ $profile->id }} Appointment Information Details</a></h6>
                                    <p class="ul-task-manager__paragraph mb-3">
                                        Detailed about appointment information (e.g., status, examined by, treatment and
                                        etc).
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Staff / Matric Id :
                                                            &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->matricStaffId }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Full Name : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->fullName }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Type : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ ($profile->is_student) ? 'Student' : 'Staff' }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Sex : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->sex }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Race : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->race }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Date of birth : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->dob }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Weight ( KG ) : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->weight }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Height ( KG ) : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->height }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Blood type : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->bloodGroup }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Contact No. : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->phone }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-0">
                                                        <label class="font-weight-bold">Address : &nbsp;</label>
                                                    </td>
                                                    <td class="py-0">
                                                        <span class="ul-task-manager__font-date text-muted">{{ $profile->patientDetail->address_1.' '.$profile->patientDetail->address_2.', '.$profile->patientDetail->postcode.' '.$profile->patientDetail->city->name.'. '.$profile->patientDetail->state->name }}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
                                    <li class="dropdown">
                                        <label class="font-weight-bold">Status : &nbsp;Active </label>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div class="col-12">
                                    <h6><a href="#">History Appointment.</a></h6>
                                    <p class="ul-task-manager__paragraph mb-3">
                                        Detailed about appointment information (e.g., status, examined by, treatment and etc).
                                    </p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="zero_configuration_table" class="display table table-striped table-bordered table-hover"
                                                       style="width:100%">
                                                    @include('appointments.data.appointments_data', ['appointments' => $appointments])
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of card--}}


        </div>
        {{-- end of col --}}

        @endsection
        @section('page-js')
            <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
            <script src="{{asset('assets/js/datatables.script.js')}}"></script>
            <script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
            <script src="{{asset('js/swal-confirm.js')}}"></script>

            <script type="application/javascript">
                $(document).ready(function () {
                    $('#zero_configuration_table_filter, #zero_configuration_table_paginate').addClass('float-right');
                    $("#zero_configuration_table_filter input").css("width", "250px");
                    $('table tbody>tr').on('click', function () {
                        window.location = $(this).data('href');
                    });
                });
            </script>
@endsection