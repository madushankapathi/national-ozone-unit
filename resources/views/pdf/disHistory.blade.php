@extends('pdf.pdflayout')
@section('content')
    <h1>Gas Distribution History</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Transection ID</th>
            <th scope="col">Technician Name</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Transfer date</th>
            <th scope="col">Reject or Confirm date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gasH as $itemTh)
            <tr>
                <td>{{ $itemTh->id }}</td>

                @foreach($techN as $itemTn)
                    @if($itemTh->techId==$itemTn->id)
                        <td>{{ $itemTn->name }}</td>
                    @endif
                @endforeach

                @foreach($gasN as $itemG)
                    @if($itemTh->gasId==$itemG->id)
                        <td>{{ $itemG->gasName }}</td>
                    @endif
                @endforeach
                <td>{{ $itemTh->qty }}</td>
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
