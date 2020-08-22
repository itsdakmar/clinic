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
@foreach($nurses as $key => $nurse)
    <tr>
        <td>{{ $nurse->matricStaffId }}</td>
        <td>{{ $nurse->fullName }}</td>
        <td>{{ $nurse->created_at->format('d / m / Y') }}</td>
        <td>{{ $nurse->updated_at->format('d / m / Y') }}</td>
        <td>
            <a href="{{ route('nurses.edit', $nurse) }}" class="text-success mr-2">
                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
            </a>
            <a href="#" class="text-danger mr-2 alert-confirm" data-href=" {{ route('nurses.destroy', $nurse) }}" data-id="{{ $nurse->id }}" >
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
