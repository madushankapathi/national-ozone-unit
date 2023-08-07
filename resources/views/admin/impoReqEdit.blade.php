@extends('admin.adminlayout')
@section('content')


    <div class="card">
        <div class="card-header">User Details</div>
        <div class="card-body">

            @foreach($impoR as $item)
                <form action="{{ url('/requpdate' ,$item->id) }}" method="POST">
                    {!! csrf_field() !!}
                    @method("PATCH")
                    <label>Request ID</label></br>
                    <input type="text" name="rid" id="rid" value="{{$item->id}}" id="rid" readonly /></br>
                    <label>Importer Name</label></br>
                    @foreach($userD as $userN)
                        @if($item->impoId==$userN->id)
                            <input type="text" name="name" id="name" value="{{$userN->name}}" class="form-control" readonly></br>
                        @endif
                    @endforeach
                    <label>Gas Name</label></br>
                    <input type="text" name="gasn" id="gasn" value="{{$item->gasName}}" class="form-control" readonly></br>

                    <label>Gas Qty</label></br>
                    <input type="text" name="gasQ" id="gasQ" value="{{$item->qty}}" class="form-control" readonly></br>

                    <label>Estimate Date</label></br>
                    <input type="text" name="ed" id="ed" value="{{$item->reqDate}}" class="form-control" readonly></br>

                    <label>Request Date</label></br>
                    <input type="text" name="rd" id="rd" value="{{$item->created_at}}" class="form-control" readonly></br>

                    @endforeach

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="myDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Comfirm Type
                        </button>
                        {{--                    <ul class="dropdown-menu" aria-labelledby="myDropdown">--}}
                        <ul class="dropdown-menu" aria-labelledby="myDropdown">
                            <!-- Dropdown items -->
                            <li><a class="dropdown-item"  onclick="handleSelection('Reject')">Reject</a></li>
                            <li><a class="dropdown-item"  onclick="handleSelection('Confirm')">Confirm</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="userType" id="userType" value="">

                    <br/>
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
            document.getElementById('userType').value = selectedItem;
            document.getElementById('myDropdown').innerHTML = selectedItem;
        }
    </script>
    {{--    <script>--}}
    {{--        document.addEventListener('DOMContentLoaded', function() {--}}
    {{--            const dropdown = document.getElementById('dropdown');--}}
    {{--            const hiddenDropdown = document.getElementById('userType');--}}

    {{--            dropdown.addEventListener('change', function() {--}}
    {{--                hiddenDropdown.value = this.value;--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}





@endsection
