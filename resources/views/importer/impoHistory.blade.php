@extends('importer.impolayout')
@section('content')
@section('impo-his', 'active')
    <label class="progress-bar bg-info" role="progressbar">Import Request History</label>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Request ID</th>
        <th scope="col">Gas Name</th>
        <th scope="col">Gas Quantity</th>
        <th scope="col">Estimate Date</th>
        <th scope="col">Status</th>
        <th scope="col">Request Date</th>
        <th scope="col">Reject or Confirm date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($impoh as $itemTh)
        <tr>
            <td>{{ $itemTh->id }}</td>
            <td>{{ $itemTh->gasName }}</td>
            <td>{{ $itemTh->qty}}</td>
            <td>{{ $itemTh->reqDate}}</td>
            <td>{{ $itemTh->status}}</td>
            <td>{{ $itemTh->created_at}}</td>
            @if($itemTh->status!='Pending')
                <td>{{ $itemTh->updated_at}}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

