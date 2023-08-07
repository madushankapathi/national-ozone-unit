@extends('admin.adminlayout')
@section('user-import', 'active')
@section('content')
    <label class="progress-bar bg-info" role="progressbar">Gas Import</label>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Importer Request ID</th>
            <th scope="col">Importer Name</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Qty</th>
            <th scope="col">Estimate Date</th>
            <th scope="col">Request Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($impoReq as $item)
            <tr>
                <td>{{ $item->id }}</td>
                @foreach($userD as $userN)
                    @if($item->impoId==$userN->id)
                        <td>{{ $userN->name }}</td>
                    @endif
                @endforeach
{{--                <td>{{ $item->impoId }}</td>--}}

                <td>{{ $item->gasName }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->reqDate }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ url('/reqedit'.$item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    {{--                <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
