<thead>
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Registered at</th>
    <th>Expired at</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($drugs as $key => $drug)
    <tr>
        <td>{{ $drug->name }}</td>
        <td>{{ $drug->description }}</td>
        <td>{{ $drug->quantity }}</td>
        <td>{{ $drug->created_at->format('d / m / Y') }}</td>
        <td>{{ $drug->expired_date->format('d / m / Y') }}</td>
        <td>
            <a href="{{ route('doctors.edit', $drug) }}" class="text-success mr-2">
                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
            </a>
            <a href="#" class="text-danger mr-2 alert-confirm" data-href=" {{ route('doctors.destroy', $drug) }}" data-id="{{ $drug->id }}" >
                <i class="nav-icon i-Close-Window font-weight-bold"></i>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Registered at</th>
    <th>Expired at</th>
    <th>Action</th>
</tr>
</tfoot>
