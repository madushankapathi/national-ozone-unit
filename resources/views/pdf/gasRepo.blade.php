@extends('pdf.pdflayout')
@section('content')
    <h1>Gas Details</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Gas ID</th>
            <th scope="col">Gas Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gas as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->gasName }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
