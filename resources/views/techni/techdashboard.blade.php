@extends('techni.techlayout')
@section('Tech-Req', 'active')
@section('content')
    <label class="progress-bar bg-info" role="progressbar">Gas Distribute Request</label>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Distribute ID</th>
            <th scope="col">Distributor Name</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Quantity</th>
            <th scope="col">Date</th>
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
                <td>
                    <a href="{{ url('/transTedit'.$item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    {{--                <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
