@extends('layouts.master')
@section('main-content')
           <div class="breadcrumb">
                <h1>Reporting</h1>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li>UTeM Clinic Management System</li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <!-- ICON BG -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Patients</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{ \App\User::role('patient')->where('active', 1)->get()->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Financial"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Appointments</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{ \App\Appointment::all()->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Checkout-Basket"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Drugs</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{ \App\Drug::all()->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-UserStar"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Staff</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{ \App\User::role(['nurse','doctor','pharmacist'])->get()->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Number Appointment By Service</div>
                            <div id="echartBar" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Most Prescribed Drug</div>
                            <div id="echartPie" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{--<div class="col-lg-12 col-md-12">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-6 col-md-12">--}}
                            {{--<div class="card card-chart-bottom o-hidden mb-4">--}}
                                {{--<div class="card-body">--}}
                                    {{--<div class="text-muted">Last Month Sales</div>--}}
                                    {{--<p class="mb-4 text-primary text-24">$40250</p>--}}
                                {{--</div>--}}
                                {{--<div id="echart1" style="height: 260px;"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-lg-6 col-md-12">--}}
                            {{--<div class="card card-chart-bottom o-hidden mb-4">--}}
                                {{--<div class="card-body">--}}
                                    {{--<div class="text-muted">Last Week Sales</div>--}}
                                    {{--<p class="mb-4 text-warning text-24">$10250</p>--}}
                                {{--</div>--}}
                                {{--<div id="echart2" style="height: 260px;"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="col-md-12">--}}
                    {{--<div class="card mb-4">--}}
                        {{--<div class="card-body p-0">--}}
                            {{--<h5 class="card-title m-0 p-3">Last 20 Day Leads</h5>--}}
                            {{--<div id="echart3" style="height: 360px;"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>


@endsection

@section('page-js')
     <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
     <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>

     <script>


     </script>
     <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection
