@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Pharmacist Information Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>List of pharmacist registered</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    {{-- end of breadcrumb --}}

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">List of pharmacist registered <span class="float-right">
                            <a href="{{ route('pharmacists.create') }}"
                               class="btn btn-raised ripple btn-raised-primary m-1">Create new pharmacist</a></span>
                    </h4>
                    <p>This list only shows few information of pharmacist details only, click on pharmacist row to view more
                        information.</p>
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered"
                               style="width:100%">
                            @include('pharmacists.data.pharmacists_data', ['pharmacists' => $pharmacists])
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
        });
    </script>
@endsection