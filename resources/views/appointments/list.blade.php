@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Appointment Information Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>List of today appointment</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    {{-- end of breadcrumb --}}

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
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
                    <h4 class="card-title mb-3">List of today appointment <span class="float-right">
                            <a href="{{ route('appointments.create') }}"
                               class="btn btn-raised ripple btn-raised-primary m-1">Book appointment</a></span>
                    </h4>
                    <p>This list only shows few information of appointment details only, click on appointment row to view more
                        information.</p>
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
            $('table tbody>tr').on('click', function (e) {
               window.location = $(this).data('href');
            });

            $('.appointment-ongoing').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let url = $(this).data('href');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirmed it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: CSRF_TOKEN},
                        success: function () {
                            swal(
                                'Confirmed!',
                                'Appointment is now ongoing.',
                                'success'
                            ).then(function () {
                                location.reload();
                            });
                        }
                    });
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            '',
                            'error'
                        )
                    }
                })
            });

            $('.appointment-confirmed').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let url = $(this).data('href');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirmed it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: CSRF_TOKEN},
                        success: function () {
                            swal(
                                'Confirmed!',
                                'Successfully confirmed an appointment 😊.',
                                'success'
                            ).then(function () {
                                location.reload();
                            });
                        }
                    });
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            '',
                            'error'
                        )
                    }
                })
            });

            $('.appointment-resolved').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let url = $(this).data('href');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirmed it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: CSRF_TOKEN},
                        success: function () {
                            swal(
                                'Confirmed!',
                                'Successfully confirmed an appointment 😊.',
                                'success'
                            ).then(function () {
                                location.reload();
                            });
                        }
                    });
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            '',
                            'error'
                        )
                    }
                })
            });

            $('.appointment-canceled').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                let url = $(this).data('href');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, cancel it!',
                    cancelButtonText: 'No, back!',
                    confirmButtonClass: 'btn btn-success mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: CSRF_TOKEN},
                        success: function () {
                            swal(
                                'Confirmed!',
                                'Successfully canceled an appointment.',
                                'success'
                            ).then(function () {
                                location.reload();
                            });
                        }
                    });
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            '',
                            'error'
                        )
                    }
                })
            });
        });
    </script>
@endsection