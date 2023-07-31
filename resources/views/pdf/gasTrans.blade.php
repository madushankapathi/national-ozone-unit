@extends('pdf.pdflayout')
@section('content')
    <h1>Gas Transaction Details</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Transection ID</th>
            <th scope="col">Technician Name</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Quantity</th>
            <th scope="col">Distributor Name</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gasDh as $itemDh)
            <tr>
                <td>{{ $itemDh->id }}</td>

                @foreach($techN as $itemTn)
                    @if($itemDh->techId==$itemTn->id)
                        <td>{{ $itemTn->name }}</td>
                    @endif
                @endforeach

                @foreach($gasN as $itemG)
                    @if($itemDh->gasId==$itemG->id)
                        <td>{{ $itemG->gasName }}</td>
                    @endif
                @endforeach

                <td>{{ $itemDh->qty }}</td>

                @foreach($disN as $itemDn)
                    @if($itemDh->disId==$itemDn->id)
                        <td>{{ $itemDn->name }}</td>
                    @endif
                @endforeach

                <td>{{ $itemDh->status}}</td>
                <td>{{ $itemDh->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
