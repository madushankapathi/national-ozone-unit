@extends('pdf.pdflayout')
@section('content')
    <h1>User Details</h1>
<table class="table" id="data-table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">User Type</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Register ID</th>
    </tr>
    </thead>
    <tbody>
            @foreach($userD as $item)
                <tr>
                    <td>{{ $item->userType }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->id }}</td>
                </tr>
            @endforeach
    </tbody>
</table>
@endsection
