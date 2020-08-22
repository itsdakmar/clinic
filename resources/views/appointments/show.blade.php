@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/calendar/fullcalendar.min.css')}}">
    <style type="text/css">
        @media print
        {
            .col-4 {
                width: 0%;
            }
            .col-print-12{
                width:100%; float:left;
            }
        }
    </style>
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Appointment Information Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>List of appointment registered</li>
            <li>Appointment details</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    {{-- end of breadcrumb --}}

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card mb-4">
                <div class="card-header">
                    Appointment Information
                </div>
                <div class="card-body">
                    <h5 class="card-title">Patient information details</h5>
                    <div class="row">
                        <div class="col-4">
                            <div class="list-group mb-4" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Appointment Details</a>
                                <a class="list-group-item list-group-item-action" id="list-billings-list" data-toggle="list" href="#list-billings" role="tab" aria-controls="list-billings">Billing / Invoice</a>
                            </div>
                        </div>
                        <div class="col-8 col-print-12">
                            <div class="tab-content pt-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    @include('appointments.detail')
                                </div>
                                <div class="tab-pane fade" id="list-billings" role="tabpanel" aria-labelledby="list-billings-list">
                                    @include('appointments.billing')
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-primary btn-rounded">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end of col --}}

@endsection
@section('bottom-js')
    <script>
        $('.print-invoice').on('click', function() {
            window.print();
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

    </script>
@endsection
