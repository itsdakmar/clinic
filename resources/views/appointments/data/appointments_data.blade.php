<thead>
<tr>
    <th>Appointment with</th>
    <th>Status</th>
    <th>Appointment Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($appointments as $key => $appointment)
    <tr data-href="{{ $appointment['url'] }}">
        <td>{{ $appointment['title'] }}</td>
        <td>{!!  $appointment['statusBadge']  !!}</td>
        <td>{{ $appointment['start']->format('d F Y') }}</td>
        <td class="text-center">
            @hasanyrole('nurse')
            @if($appointment['status'] == \App\Appointment::CREATED)
                <a data-toggle="tooltip" data-placement="top" title="Canceled Appointment" href="" data-href="{{ route('appointments.canceled', $appointment['id']) }}"  class="text-success appointment-canceled mr-2">
                    <i class="nav-icon i-Close-Window text-danger font-weight-bold"></i>
                </a>

                <a data-toggle="tooltip" data-placement="top" title="Confirmed Appointment" href="" data-href="{{ route('appointments.confirmed', $appointment['id']) }}"  class="text-success appointment-confirmed mr-2">
                    <i class="nav-icon i-Yes text-success font-weight-bold"></i>
                </a>
            @endif


            @if($appointment['status'] == \App\Appointment::CONFIRMED)
            <a data-toggle="tooltip" data-placement="top" title="Set Appointment To Ongoing" href="#" data-href="{{ route('appointments.ongoing', $appointment['id']) }}"  class="text-success appointment-ongoing mr-2">
                <i class="nav-icon i-Yes text-success font-weight-bold"></i>
            </a>
            @endif
            @endhasanyrole

            @hasanyrole('doctor')
            @if($appointment['status'] == \App\Appointment::ONGOING)
            <a href="{{ route('diagnosis.create', $appointment['id']) }}"  class="text-success  mr-2">
                <i class="nav-icon i-Add text-success font-weight-bold"></i>
            </a>
            @endif
            @endhasanyrole

            @hasanyrole('pharmacist')
            @if($appointment['status'] == \App\Appointment::EXAMINED)
                <a data-toggle="tooltip" data-placement="top" title="Set Appointment To Resolved" href="#" data-href="{{ route('appointments.resolved', $appointment['id']) }}"  class="text-success appointment-resolved mr-2">
                    <i class="nav-icon i-Yes text-success font-weight-bold"></i>
                </a>
            @endif
            @endhasanyrole
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>Appointment with</th>
    <th>Status</th>
    <th>Appointment Date</th>
    <th>Action</th>
</tr>
</tfoot>
