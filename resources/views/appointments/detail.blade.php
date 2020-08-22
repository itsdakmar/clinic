<div class="card mb-3">
    <div class="card-header d-sm-flex justify-content-sm-start align-items-sm-center">
        Appointment Information
    </div>
    <div class="card-body">
        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
            <div>
                <h6><a href="#">#13123 Appointment Information Details</a></h6>
                <p class="ul-task-manager__paragraph mb-3">
                    Detailed about appointment information (e.g., status, examined by, treatment and etc).
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
                           data-trigger="hover" title="Click to view more" data-original-title="Click to view more"
                           class="badge badge-info align-top p-1">{{ ucwords(strtolower($appointment->user->fullName)) }}</a>
                    </div>
                </div>
            </div>

            <ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">

                <li class="dropdown">
                    <label class="font-weight-bold">Status : &nbsp;</label>
                    {!! $appointment->statusBadge !!}
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
            <div>
                <h6><a href="#">Diagnosis and treatment.</a></h6>
                <p class="ul-task-manager__paragraph mb-3">
                    Detailed about appointment information (e.g., status, examined by, treatment and etc).
                </p>

                @if($appointment->status == \App\Appointment::EXAMINED || $appointment->status == \App\Appointment::RESOLVED)
                    <div class="row">
                        <div class="col-12">
                            <label class="font-weight-bold">Examined By : &nbsp;
                                <span class="ul-task-manager__font-date text-muted">{{ 'Dr. '. ucwords(strtolower($appointment->doctor->fullName)) }}</span>
                            </label>
                        </div>
                        <div class="col-12">
                            <label class="font-weight-bold">Doctor Remark : &nbsp;
                                <span class="ul-task-manager__font-date text-muted">{{ $appointment->remark }}</span>
                            </label>
                        </div>
                        <div class="col-12">
                            <label class="font-weight-bold">Body Temperature : &nbsp;
                                <span class="ul-task-manager__font-date text-muted">{{ $appointment->temperature }}</span>
                            </label>
                        </div>
                        <div class="col-12">
                            <label class="font-weight-bold">Blood Pressure : &nbsp;
                                <span class="ul-task-manager__font-date text-muted">{{ $appointment->bloodPressure }}</span>
                            </label>
                        </div>
                        <div class="col-12">
                            <label class="font-weight-bold">Respiratory Rate : &nbsp;
                                <span class="ul-task-manager__font-date text-muted">{{ $appointment->respiratoryRate }}</span>
                            </label>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <label class="font-weight-bold">Nothing to show.
                            </label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="">

                <h6><a href="#">Prescription.</a></h6>
                <p class="ul-task-manager__paragraph mb-3">
                    Detailed information about prescription.
                </p>


                @if($appointment->status == \App\Appointment::EXAMINED || $appointment->status == \App\Appointment::RESOLVED)
                    <div class="row">
                        <div class="col-12">
                            <label class="font-weight-bold">Prescription : &nbsp;</label>

                            <div class="table-responsive-sm ">
                                <table class="table table-hover table-borderless table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointment->prescription as $key => $drug)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $drug->drug->name }}</td>
                                            <td>{{ $drug->quantityUsed }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <label class="font-weight-bold">Nothing to show.
                            </label>
                        </div>
                    </div>
                @endif


        </div>
    </div>
</div>