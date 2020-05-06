<thead>
<tr>
    <th>Name</th>
    <th>Sex</th>
    <th>Race</th>
    <th>Date Of Birth</th>
    <th>Weight (KG)</th>
    <th>Height (CM)</th>
    <th>Matric No</th>
    <th>Registered at</th>
    <th>Last Updated at</th>
</tr>
</thead>
<tbody>
@foreach($patients as $key => $patient)
<tr>
    <td>{{ $patient->fullName }}</td>
    <td>{{ $patient->sex }}</td>
    <td>{{ $patient->race }}</td>
    <td>{{ $patient->dob }}</td>
    <td>{{ $patient->weight }}</td>
    <td>{{ $patient->height }}</td>
    <td>{{ $patient->matricNo }}</td>
    <td>{{ $patient->created_at->format('d / m / Y') }}</td>
    <td>{{ $patient->updated_at->format('d / m / Y') }}</td>

</tr>
@endforeach
</tbody>

<tfoot>
<tr>
    <th>Name</th>
    <th>Sex</th>
    <th>Race</th>
    <th>Date Of Birth</th>
    <th>Weight (KG)</th>
    <th>Height (CM)</th>
    <th>Matric No</th>
    <th>Registered at</th>
    <th>Last Updated at</th>
</tr>
</tfoot>
