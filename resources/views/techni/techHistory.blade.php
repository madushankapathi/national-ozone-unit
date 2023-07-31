@extends('techni.techlayout')
@section('Tech-His', 'active')
@section('content')
    <label class="progress-bar bg-info" role="progressbar">Gas Distribute History</label>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Distribute ID</th>
            <th scope="col">Distributor Name</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Quantity</th>
            <th scope="col">Send Date</th>
            <th scope="col">Confirmation Type</th>
            <th scope="col">Confirmation Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gasD as $item)
            <tr>
                <td>{{ $item->id }}</td>
                @foreach($disN as $itemDn)
                    @if($item->disId==$itemDn->id)
                        <td>{{ $itemDn->name }}</td>
                    @endif
                @endforeach

                @foreach($gasN as $itemG)
                    @if($item->gasId==$itemG->id)
                        <td>{{ $itemG->gasName }}</td>
                    @endif
                @endforeach
                <td>{{ $item->qty }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
