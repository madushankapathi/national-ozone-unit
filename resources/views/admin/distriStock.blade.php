@extends('admin.adminlayout')
@section('user-dS', 'active')
@section('content')
    {{--    <form action="{{ url('/userupdate' ,$item->id) }}" method="POST">--}}
{{--    <form action="{{ url('/addgasname')}}" method="GET">--}}
{{--        {!! csrf_field() !!}--}}
        <label class="progress-bar bg-info" role="progressbar">View Distributor Gas Stock</label>
{{--        <label>Gas Name</label></br>--}}
{{--        <input type="text" name="name" id="name" class="form-control"></br>--}}

{{--        <input type="submit" value="Add Gas" class="btn btn-success"></br>--}}
{{--    </form>--}}
{{--    <br>--}}
{{--    <label class="progress-bar bg-info" role="progressbar">Available Gas</label>--}}
{{--    <table class="table">--}}
{{--        <thead class="thead-dark">--}}
{{--        <tr>--}}
{{--            <th scope="col">Gas ID</th>--}}
{{--            <th scope="col">Gas Name</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($gas as $item)--}}
{{--            <tr>--}}
{{--                <td>{{ $item->id }}</td>--}}
{{--                <td>{{ $item->gasName }}</td>--}}
{{--                --}}{{--        <td>Raw 01</td>--}}
{{--                --}}{{--        <td>Raw 02</td>--}}
{{--                --}}{{--        <td>--}}
{{--                --}}{{--            --}}{{----}}{{--                    <a href="{{ url('/useredit'.$item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
{{--                --}}{{--            --}}{{----}}{{--                <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
{{--                --}}{{--        </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
@endsection
