@extends('techni.techlayout')
@section('content')
    <div class="card">
        <div class="card-header">Update Gas Transaction Details</div>
        <div class="card-body">

            @foreach($dHis as $item)
                <form action="{{ url('/updateTrans' ,$item->id) }}" method="POST">
                    {!! csrf_field() !!}
                    @method("PATCH")
                    <label>Transaction ID</label></br>
                    <input type="text" name="id" id="id" value="{{$item->id}}" id="id" readonly /></br>
                    <label>Gas Name</label></br>
                    @foreach($gasN as $itemGn)
                        @if($item->gasId==$itemGn->id)
                            <input type="text" name="gname" id="gname" value="{{$itemGn->gasName}}" class="form-control" readonly></br>
                        @endif
                    @endforeach
                    <label>Distributor Name</label></br>
                    @foreach($disN as $itemDn)
                        @if($item->disId==$itemDn->id)
                            <input type="text" name="dname" id="dname" value="{{$itemDn->name}}" class="form-control" readonly></br>
                        @endif
                    @endforeach
                    <label>Gas Quantity</label></br>
                    <input type="text" name="gq" id="gq" value="{{$item->qty}}" class="form-control" readonly></br>
                    <label>Transfer Date</label></br>
                    <input type="text" name="gq" id="gq" value="{{$item->created_at}}" class="form-control" readonly></br>

                    @endforeach

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="myDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Confirmation Type
                        </button>
                        {{--                    <ul class="dropdown-menu" aria-labelledby="myDropdown">--}}
                        <ul class="dropdown-menu" aria-labelledby="myDropdown">
                            <!-- Dropdown items -->
                            <li><a class="dropdown-item"  onclick="handleSelection('Confirm')">Confirm</a></li>
                            <li><a class="dropdown-item"  onclick="handleSelection('Reject')">Reject</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="cType" id="cType" value="">

                    <br/>
                    <br/>
                    <br/>


                    {{--                <label>Mobile</label></br>--}}
                    {{--                <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"></br>--}}
                    <input type="submit" value="Update" class="btn btn-success"></br>
                </form>


        </div>
    </div>
    {{--    @foreach($userD as $item)--}}
    {{--        <h1>{{ $item->id }}</h1>--}}
    {{--    @endforeach--}}

    <script>
        function handleSelection(selectedItem) {
            console.log(selectedItem);
            // $('#userType').val(selectedItem);
            //$selectedItem = $request => input(selectedItem);
            document.getElementById('cType').value = selectedItem;
            document.getElementById('myDropdown').innerHTML = selectedItem;
        }
    </script>
@endsection
