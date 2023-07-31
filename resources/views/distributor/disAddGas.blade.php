@extends('distributor.dislayout')
@section('content')
    <div class="card">
        <div class="card-header">Add Gas Quantity</div>
        <div class="card-body">

                <form action="{{ url('/addgasqty' ,$var ) }}" method="POST">
                    {!! csrf_field() !!}
                    @method("PATCH")
{{--                    <label>ID</label></br>--}}
                    <input type="hidden" name="id" id="id" value="{{$var}}" id="id" readonly /></br>
                    <label>Gas Quantity (Kg)</label></br>
                    <input type="text" name="qty" id="qty" class="form-control"></br>

                    {{--                <label>Mobile</label></br>--}}
                    {{--                <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"></br>--}}
                    <input type="submit" value="Gas Quantity" class="btn btn-success"></br>
                </form>


        </div>
    </div>
@endsection
