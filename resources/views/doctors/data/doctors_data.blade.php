<thead>
<tr>
    <th>Matric No / Staff Id</th>
    <th>Name</th>
    <th>Registered at</th>
    <th>Last Updated at</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($doctors as $key => $doctor)
    <tr>
        <td>{{ $doctor->matricStaffId }}</td>
        <td>{{ $doctor->fullName }}</td>
        <td>{{ $doctor->created_at->format('d / m / Y') }}</td>
        <td>{{ $doctor->updated_at->format('d / m / Y') }}</td>
        <td>
            <a href="{{ route('doctors.edit', $doctor) }}" class="text-success mr-2">
                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
            </a>
            <a href="#" class="text-danger mr-2 alert-confirm" data-href=" {{ route('doctors.destroy', $doctor) }}" data-id="{{ $doctor->id }}" >
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
    <th>Registered at</th>
    <th>Last Updated at</th>
    <th>Action</th>
</tr>
</tfoot>
