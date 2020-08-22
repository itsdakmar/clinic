@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
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
        <h1>Doctor Information Page</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>List of doctor registered</li>
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
                    <h3 class="card-title"> Doctor's Information</h3>
                </div>
                <!--begin::form-->
                <form action="{{ route('diagnosis.store', $appointment->id)}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6><a href="#">Diagnosis and treatment.</a></h6>
                                        <p class="ul-task-manager__paragraph mb-3">
                                            Detailed about appointment information (e.g., status, examined by, treatment
                                            and etc).
                                        </p>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="font-weight-bold">Appointment date : &nbsp;
                                                    <span class="ul-task-manager__font-date text-muted">{{ $appointment->timeslots->date->format('d F Y') }}</span>
                                                </label>
                                            </div>
                                            <div class="col-12">
                                                <label class="font-weight-bold">Patient : &nbsp;</label>
                                                <a href="{{ route('patients.show', $appointment->user->id) }}" data-animation="true"
                                                   data-toggle="tooltip" data-placement="right"
                                                   data-trigger="hover" title="Click to view more"
                                                   data-original-title="Click to view more"
                                                   class="badge badge-info align-top mt-1">{{ $appointment->user->fullName }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6><a href="#">Diagnosis and treatment.</a></h6>
                                        <p class="ul-task-manager__paragraph mb-3">
                                            Detailed about appointment information (e.g., status, examined by, treatment
                                            and etc).
                                        </p>
                                        <div class="form-row ">
                                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }} mb-4 col-md-3">
                                                <label for="input_temp" class="ul-form__label">Temperature:</label>
                                                <input name="temperature" type="text"
                                                       class="form-control {{ $errors->has('temperature') ? 'is-invalid' : '' }}"
                                                       id="input_temp"
                                                       placeholder="Patient body temperature" required
                                                       value="{{ old('temperature') }}">
                                                <small class="ul-form__text form-text">
                                                    Please enter patient body temperature
                                                </small>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @else
                                                    <div class="invalid-tooltip">Please enter patient body temperature
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('bp') ? 'has-danger' : '' }} mb-4 col-md-3">
                                                <label for="input_bp" class="ul-form__label">Blood Pressure:</label>
                                                <input name="bp" type="text"
                                                       class="form-control {{ $errors->has('bp') ? 'is-invalid' : '' }}"
                                                       id="input_bp"
                                                       placeholder="Patient blood pressure" required
                                                       value="{{ old('bp') }}">
                                                <small class="ul-form__text form-text">
                                                    Please enter patient blood pressure
                                                </small>
                                                @if ($errors->has('bp'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bp') }}</strong>
                                    </span>
                                                @else
                                                    <div class="invalid-tooltip">Please enter patient blood pressure
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('rr') ? 'has-danger' : '' }} mb-4 col-md-3">
                                                <label for="input_rr" class="ul-form__label">Respiratory Rate:</label>
                                                <input name="rr" type="text"
                                                       class="form-control {{ $errors->has('rr') ? 'is-invalid' : '' }}"
                                                       id="input_rr"
                                                       placeholder="Patient respiratory rate" required
                                                       value="{{ old('rr') }}">
                                                <small class="ul-form__text form-text">
                                                    Please enter patient respiratory rate
                                                </small>
                                                @if ($errors->has('rr'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rr') }}</strong>
                                    </span>
                                                @else
                                                    <div class="invalid-tooltip">Please enter patient respiratory rate
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('remark') ? 'has-danger' : '' }} mb-4 col-md-6">
                                                <label for="input_description" class="ul-form__label">Doctor
                                                    remark:</label>
                                                <input name="description" type="text"
                                                       class="form-control {{ $errors->has('remark') ? 'is-invalid' : '' }}"
                                                       id="input_description"
                                                       placeholder="Enter doctor remark" required
                                                       value="{{ old('remark') }}">
                                                <small class="ul-form__text form-text">Please enter doctor remark
                                                </small>
                                                <div class="invalid-tooltip">Please enter doctor remark</div>
                                                @if ($errors->has('remark'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('remark') }}</strong>
                                    </span>
                                                @else
                                                    <div class="invalid-tooltip">Please enter doctor remark</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6><a href="#">Diagnosis and treatment.</a></h6>
                                        <p class="ul-task-manager__paragraph mb-3">
                                            Detailed about appointment information (e.g., status, examined by, treatment
                                            and etc).
                                        </p>
                                        <div class="row row-xs">
                                            <div class="col-md-5">
                                                <label for="findDrug" class="sr-only ul-form__label">Select drug</label>
                                                <div class="input-group">
                                                    <select id='findDrug' class="form-control select">
                                                        <option value=''>Select drug</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please choose a drug.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mt-3 mt-md-0">
                                                <input id="inputQuantity" type="number" class="form-control"
                                                       placeholder="Enter quantity">
                                            </div>
                                            <div class="col-md-2 mt-3 mt-md-0">
                                                <button class="btn btn-primary btn-block btn-add"><i
                                                            class="nav-icon i-Add font-weight-bold text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">

                                        <table class="table table-hover table-borderless" >
                                            <thead class="bg-dark text-white">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price Per Quantity ( RM )</th>
                                                <th scope="col">Price * Quantity ( RM )</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td colspan="5" class="text-center">No drug selected.</td>
                                            </tr>
                                            </tbody>
                                            <tfoot class="bg-dark text-white">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price Per Quantity ( RM )</th>
                                                <th scope="col">Price * Quantity ( RM )</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function () {
            $("#findDrug").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{route('find.drug')}}",
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


            $(document).on('click', '#btn-remove', function(e){
                e.preventDefault();
                e.stopPropagation();

                var removeIndex = newArray.map(function(item) { return item.id; }).indexOf($(this).data('id'));

                newArray.splice(removeIndex, 1);

                regenerateTable();

            });

            var newArray = [];
            $('.btn-add').on('click', function (e) {
                e.stopPropagation();
                e.preventDefault();
                if (!$('#inputQuantity').val()) {
                    alert('Please insert quantity');
                } else {
                    $.ajax({
                        url: "{{ route('drug.get') }}",
                        type: 'POST',
                        data: {
                            id: $('#findDrug').val()
                        },
                        dataType: 'json',
                        success: function (data) {

                            var exists = false;
                            $.each(newArray, function (key, value) {
                                if (data.id === value.id) {
                                    exists = true;
                                    value.quantityUsed = (parseInt(value.quantityUsed) + parseInt($('#inputQuantity').val()));
                                }
                            });
                            if (exists === false && data.id !== "") {
                                data.quantityUsed = $('#inputQuantity').val();
                                newArray.push(data);
                            }

                            regenerateTable();
                        },
                        error: function (request, error) {
                            console.log("Request: " + JSON.stringify(request));
                        }
                    });
                }
            });

            function regenerateTable(){
                $('table> tbody:last').empty();
                if(newArray.length === 0){
                    var row = $('<tr>' +
                        '<td colspan="5" class="text-center">No drug selected.</td>' +
                        '</tr>');

                    $('table> tbody:last').append(row);
                }else {
                    $.each(newArray, function (key, value) {
                        var row = $('<tr>' +
                            '<td>' + value.name + '<input type="hidden" value="'+ value.id +'" name="drugId[]"> </td>' +
                            '<td>' + value.quantityUsed + '<input type="hidden" value="'+ value.quantityUsed +'" name="quantity[]"> </td>' +
                            '<td>' + value.price + '</td>' +
                            '<td>' + (parseInt(value.quantityUsed) * parseFloat(value.price)).toFixed(2) + '</td>' +
                            '<td>  <a href="#" id="btn-remove" type="button" data-id="'+ value.id +'"  class="text-success mr-2">' +
                            '        <i class="nav-icon i-Close-Window text-danger font-weight-bold"></i>' +
                            '      </a></td>' +
                            '</tr>');

                        $('table> tbody:last').append(row);
                    });
                }

            }
        });

    </script>
@endsection