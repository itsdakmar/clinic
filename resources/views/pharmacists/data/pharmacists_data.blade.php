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
@foreach($pharmacists as $key => $pharmacist)
    <tr>
        <td>{{ $pharmacist->matricStaffId }}</td>
        <td>{{ $pharmacist->fullName }}</td>
        <td>{{ $pharmacist->created_at->format('d / m / Y') }}</td>
        <td>{{ $pharmacist->updated_at->format('d / m / Y') }}</td>
        <td>
            <a href="{{ route('pharmacists.edit', $pharmacist) }}" class="text-success mr-2">
                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
            </a>
            <a href="#" class="text-danger mr-2 alert-confirm" data-href=" {{ route('pharmacists.destroy', $pharmacist) }}" data-id="{{ $pharmacist->id }}" >
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
