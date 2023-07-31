@extends('admin.adminlayout')
@section('user-request', 'active')
@section('content')

{{--    <div class="input-group mb-3">--}}
{{--        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">--}}
{{--        <div class="input-group-append">--}}
{{--            <button class="btn btn-outline-secondary" type="button">Button</button>--}}
{{--        </div>--}}
{{--    </div>--}}

<label class="progress-bar bg-info" role="progressbar">User Request</label>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Register ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">User Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach($userD as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->userType }}</td>
            <td>
                <a href="{{ url('/useredit'.$item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                {{--                <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
