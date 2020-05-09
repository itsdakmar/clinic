<thead>
<tr>
    <th>Matric No / Staff Id</th>
    <th>Name</th>
    <th>Sex</th>
    <th>Race</th>
    <th>Date Of Birth</th>
    <th>Weight (KG)</th>
    <th>Height (CM)</th>
    <th>Registered at</th>
    <th>Last Updated at</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($patients as $key => $patient)
    <tr>
        <td>{{ $patient->matricStaffId }}</td>
        <td>{{ $patient->fullName }}</td>
        <td>{{ $patient->patientDetail->sex }}</td>
        <td>{{ $patient->patientDetail->race }}</td>
        <td>{{ $patient->patientDetail->dob->format('d / m / Y') }}</td>
        <td>{{ $patient->patientDetail->weight }}</td>
        <td>{{ $patient->patientDetail->height }}</td>
        <td>{{ $patient->created_at->format('d / m / Y') }}</td>
        <td>{{ $patient->updated_at->format('d / m / Y') }}</td>
        <td>
            <a href="{{ route('patients.edit', $patient) }}" class="text-success mr-2">
                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
            </a>
            <a href="#" class="text-danger mr-2 alert-confirm" data-href=" {{ route('patients.destroy', $patient) }}" data-id="{{ $patient->id }}" >
                <i class="nav-icon i-Close-Window font-weight-bold"></i>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>Matric No / Staff Id</th>
    <th>Name</th>
    <th>Sex</th>
    <th>Race</th>
    <th>Date Of Birth</th>
    <th>Weight (KG)</th>
    <th>Height (CM)</th>
    <th>Registered at</th>
    <th>Last Updated at</th>
    <th>Action</th>
</tr>
</tfoot>
