@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/calendar/fullcalendar.min.css')}}">
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Appointment Information Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>List of weekly appointment</li>
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
                    <h4 class="card-title mb-3">List of Weekly appointment <span class="float-right">
                            @hasanyrole('nurse')
                            <a href="{{ route('appointments.create') }}"
                               class="btn btn-raised ripple btn-raised-primary m-1">Book appointment</a></span>
                        @endhasanyrole
                    </h4>
                    <p>This list only shows few information of appointment details only, click on appointment box to view more
                        information.</p>
                    <div id="calendar" data-url="{{ url('/json/appointment') }}"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of col --}}

@endsection
@section('page-js')


    <script src="{{asset('assets/js/vendor/calendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/calendar/fullcalendar.min.js')}}"></script>
    <script>
        var url = $('#calendar').data('url');

        $('#calendar').fullCalendar({
            eventClick: function(info) {
                if (info.event.url) {
                    window.open(info.event.url);
                }
            },
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'resourceTimeGridDay,resourceTimeGridFourDay'
            },
            slotDuration: '00:5:00',
            allDaySlot: false,
            events: function(start, end, timezone, callback) {
                jQuery.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',

                    success: function(doc) {
                        var events = [];
                        if(doc){
                            $.map(doc, function(r) {
                                events.push({
                                    id: r.id,
                                    title: r.title,
                                    start: r.start,
                                    end: r.end,
                                    color: r.color,
                                    textColor: '#FFF',
                                    url: r.url,

                                });
                            });
                        }
                        callback(events);
                    }
                });
            },

            views: {
                custom: {
                    type: 'agendaWeek',
                    duration: {
                        days: 7
                    },

                    title: 'Apertura',
                    columnFormat: 'dddd', // Format the day to only show like 'Monday'
                    hiddenDays: [0, 6] // Hide Sunday and Saturday?
                }
            },
            defaultView: 'custom',
            defaultDate: $.fullCalendar.moment().startOf('week'),
            businessHours: {
                // days of week. an array of zero-based day of week integers (0=Sunday)
                dow: [ 1, 2, 3, 4, 5], // Monday - Thursday

                start: '08:00', // a start time (8 am in this example)
                end: '17:00', // an end time (5pm in this example)
            },
            minTime: "08:00:00",
            maxTime: "17:00:00",
            height: 'auto',
        });
    </script>

@endsection