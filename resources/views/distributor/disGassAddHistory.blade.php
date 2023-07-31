@extends('distributor.dislayout')
@section('dis-add-his', 'active')
@section('content')
    <label class="progress-bar bg-info" role="progressbar">Gas Add History</label>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Quantity</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gasH as $itemTh)
            <tr>
                @foreach($gasN as $itemG)
                    @if($itemTh->gasId==$itemG->id)
                        <td>{{ $itemG->gasName }}</td>
                    @endif
                @endforeach
                <td>{{ $itemTh->qty }}</td>
                <td>{{ $itemTh->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
