<div class="card">
    <div class="card-body" id="myTabContent">

        <div class="d-sm-flex mb-5" data-view="print">
            <span class="m-auto"></span>
            <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
        </div>
        <!---===== Print Area =======-->
        @if($appointment->status == \App\Appointment::EXAMINED || $appointment->status == \App\Appointment::RESOLVED  )
            <div id="print-area">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Order Info</h4>
                        <p>#{{ $appointment->id }}</p>
                    </div>
                    <div class="col-md-6 text-sm-right">
                        <p><strong>Order status: </strong> Delivered</p>
                        <p><strong>Order date: </strong> {{ $appointment->timeslots->date->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="mt-3 mb-4 border-top"></div>
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <h5 class="font-weight-bold">Bill From</h5>
                        <p>Pusat Kesihatan Kampus Induk.</p>
                        <span style="white-space: pre-line">Universiti Teknikal Malaysia Melaka,
Hang Tuah Jaya,
76100 Durian Tunggal,
Melaka Malaysia.

                                                +06-2701430
                                            </span>
                    </div>
                    <div class="col-md-6 text-sm-right">
                        <h5 class="font-weight-bold">Bill To</h5>
                        <p>UI Lib</p>
                        <span style="white-space: pre-line">
                                                {{ $appointment->user->fullName }}
                                                {{ $appointment->user->patientDetail->address_1.' '.$appointment->user->patientDetail->address_1.', '.
                                                 $appointment->user->patientDetail->postcode.' '.$appointment->user->patientDetail->city->name.', '.$appointment->user->patientDetail->state->name}}.

                                                +6{{ $appointment->user->patientDetail->phone }}
                                            </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover mb-4">
                            <thead class="bg-gray-300">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $total = 0; @endphp
                            @foreach($appointment->prescription as $key => $drug)
                                @php $total += ($drug->drug->price * $drug->quantityUsed) @endphp
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $drug->drug->name }}</td>
                                <td>{{ $drug->drug->price }}</td>
                                <td>{{ $drug->quantityUsed }}</td>
                                <td>{{ $drug->drug->price * $drug->quantityUsed  }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <div class="invoice-summary">
                            <p>Sub total: <span>RM {{ $total }}</span></p>
                            <p>Consultation Fee: <span>RM 20</span></p>
                            <h5 class="font-weight-bold">Grand Total: <span>RM {{ $total + 20 }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-12">
                    <label class="font-weight-bold">Nothing to show.
                    </label>
                </div>
            </div>
    @endif
    <!--==== / Print Area =====-->
    </div>
</div>