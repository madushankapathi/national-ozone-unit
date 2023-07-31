@extends('admin.adminlayout')
@section('content')





    <div class="card">
        <div class="card-header">User Details</div>
        <div class="card-body">

            @foreach($userD as $item)
            <form action="{{ url('/userupdate' ,$item->id) }}" method="POST">
                {!! csrf_field() !!}
                @method("PATCH")
                <label>ID</label></br>
                <input type="text" name="id" id="id" value="{{$item->id}}" id="id" readonly /></br>
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{$item->name}}" class="form-control" readonly></br>
                <label>Email</label></br>
                <input type="text" name="email" id="email" value="{{$item->email}}" class="form-control" readonly></br>

                @endforeach

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="myDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User Type
                    </button>
{{--                    <ul class="dropdown-menu" aria-labelledby="myDropdown">--}}
                    <ul class="dropdown-menu" aria-labelledby="myDropdown">
                        <!-- Dropdown items -->
                        <li><a class="dropdown-item"  onclick="handleSelection('technician')">technician</a></li>
                        <li><a class="dropdown-item"  onclick="handleSelection('importer')">importer</a></li>
                        <li><a class="dropdown-item"  onclick="handleSelection('distributor')">distributor</a></li>
                        <li><a class="dropdown-item"  onclick="handleSelection('admin')">admin</a></li>
                        <li><a class="dropdown-item"  onclick="handleSelection('pending')">pending</a></li>
                    </ul>
                </div>
                <input type="hidden" name="userType" id="userType" value="">



                <br/>
                <br/>
                <br/>
                <br/>
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
