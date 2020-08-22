<thead>
<tr>
    <th>Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Registered at</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($suppliers as $key => $supplier)
    <tr>
        <td>{{ $supplier->name }}</td>
        <td>{{ $supplier->address }}</td>
        <td>{{ $supplier->contact }}</td>
        <td>{{ $supplier->created_at->format('d / m / Y') }}</td>
        <td>
            <a href="{{ route('doctors.edit', $supplier) }}" class="text-success mr-2">
                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
            </a>
            <a href="#" class="text-danger mr-2 alert-confirm" data-href=" {{ route('doctors.destroy', $supplier) }}" data-id="{{ $supplier->id }}" >
                <i class="nav-icon i-Close-Window font-weight-bold"></i>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Registered at</th>
    <th>Action</th>
</tr>
</tfoot>
