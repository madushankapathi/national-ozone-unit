@extends('admin.adminlayout')
@section('user-details', 'active')
@section('content')
    {{--    <div class="input-group mb-3">--}}
    {{--        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">--}}
    {{--        <div class="input-group-append">--}}
    {{--            <button class="btn btn-outline-secondary" type="button">Button</button>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <label class="progress-bar bg-info" role="progressbar">User Details</label>
    <table class="table" id="data-table">
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
{{--                <a href="{{ url('/useredit'.$item->id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
                <a href="{{ url('/useredit'.$item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                <form method="POST" action="{{ url('/deleteuser'.$item->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ url('/genareReport')}}" title="Report"> <button class="p-3 mb-2 bg-success text-white"> Generate Report</button></a>
@endsection

