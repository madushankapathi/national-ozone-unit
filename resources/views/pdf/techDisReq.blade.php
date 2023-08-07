@extends('pdf.pdflayout')
@section('content')
    <h1>Gas Distribute Request Details</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Distribute ID</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Quantity</th>
            <th scope="col">Distributor Name</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gasH as $itemDh)
            <tr>
                <td>{{ $itemDh->id }}</td>

                @foreach($gasN as $itemG)
                    @if($itemDh->gasId==$itemG->id)
                        <td>{{ $itemG->gasName }}</td>
                    @endif
                @endforeach

                <td>{{ $itemDh->qty }}</td>

                @foreach($disN as $itemTn)
                    @if($itemDh->disId==$itemTn->id)
                        <td>{{ $itemTn->name }}</td>
                    @endif
                @endforeach
                <td>{{ $itemDh->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
