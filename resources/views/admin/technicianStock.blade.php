@extends('admin.adminlayout')
@section('user-tS', 'active')
@section('content')
    {{--    <form action="{{ url('/userupdate' ,$item->id) }}" method="POST">--}}
{{--    <form action="{{ url('/addgasname')}}" method="GET">--}}
{{--        {!! csrf_field() !!}--}}
        <label class="progress-bar bg-info" role="progressbar">View Technician Gas Stock</label>
{{--        <label>Gas Name</label></br>--}}
{{--        <input type="text" name="name" id="name" class="form-control"></br>--}}

{{--        <input type="submit" value="Add Gas" class="btn btn-success"></br>--}}
{{--    </form>--}}
{{--    <br>--}}
{{--    <label class="progress-bar bg-info" role="progressbar">Available Gas</label>--}}
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Transection ID</th>
            <th scope="col">Transection Name</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Qty</th>
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
