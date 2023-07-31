@extends('distributor.dislayout')
@section('dis-trans', 'active')
@section('content')

    <label class="progress-bar bg-info" role="progressbar">Gas Transaction</label>
    <form action="{{ url('/addgastrans')}}" method="GET">
{{--    <label>Technician Name</label>--}}
        <div class="row">
            <div class="col">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" name="item_id" type="button" id="myDropdown1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Technician Name
            </button>
            {{--                    <ul class="dropdown-menu" aria-labelledby="myDropdown">--}}
            <ul class="dropdown-menu" aria-labelledby="myDropdown">
                <!-- Dropdown items -->
                @foreach($techN as $item)
                    <li><a class="dropdown-item" onclick="handleSelection('{{ $item->name }}', 'dropdownMenuButton1')" value="{{ $item->id }}">{{ $item->name }}</a></li>
                @endforeach
{{--                <li><a class="dropdown-item"  onclick="handleSelection('technician')">technician</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('importer')">importer</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('distributor')">distributor</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('admin')">admin</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('pending')">pending</a></li>--}}
            </ul>
        </div>
            </div>
            <div class="col">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" name="itemG_id" type="button" id="myDropdown2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gas Name
            </button>
            {{--                    <ul class="dropdown-menu" aria-labelledby="myDropdown">--}}
            <ul class="dropdown-menu" aria-labelledby="myDropdown">
                <!-- Dropdown items -->
                @foreach($gasN as $itemG)
                    <li><a class="dropdown-item" onclick="handleSelection('{{ $itemG->gasName }}', 'dropdownMenuButton2')" value="{{ $itemG->id }}">{{ $itemG->gasName }}</a></li>
                @endforeach
{{--                <li><a class="dropdown-item"  onclick="handleSelection('technician')">technician</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('importer')">importer</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('distributor')">distributor</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('admin')">admin</a></li>--}}
{{--                <li><a class="dropdown-item"  onclick="handleSelection('pending')">pending</a></li>--}}
            </ul>
        </div>
        </div>
            <div class="col">
                <input type="text" name="qty" id="qty" class="form-control">
                <label>&nbsp &nbsp &nbsp &nbsp &nbsp Gas Quantity (Kg)</label>
            </div>
            <div class="col">
                <input type="hidden" name="techn" id="techn">
                <input type="hidden" name="gasn" id="gasn">
            <input type="submit" value="Add Gas Transaction" class="btn btn-success"></br>
            </div>
        </div>
    </form>
    </br>
    </br>
    <label class="progress-bar bg-info" role="progressbar">Available Gas</label>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Gas ID</th>
            <th scope="col">Gas Name</th>
            <th scope="col">Gas Quantity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($disGas as $disG)
            <tr>
                <td>{{ $disG->gasId }}</td>
                @foreach($gasN as $itemG)
                    @if($disG->gasId==$itemG->id)
                <td>{{ $itemG->gasName }}</td>
                    @endif
                @endforeach
                <td>{{ $disG->qty }}</td>
                <td>
                <div class="row">
{{--                    <div class="col">--}}
{{--                    <input type="text" name="qty" id="qty" class="form-control"></br>--}}
{{--                    </div>--}}
                    <div class="col">
                <a href="{{ url('/adddisgas'.$disG->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Add Quantity</button></a>
                    </div>
                </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        function handleSelection(selectedItem, dropdownId) {
            console.log(selectedItem);
            if (dropdownId === 'dropdownMenuButton1') {
                document.getElementById('techn').value = selectedItem;
                document.getElementById('myDropdown1').innerHTML = selectedItem;
            } else if (dropdownId === 'dropdownMenuButton2') {
                 document.getElementById('gasn').value = selectedItem;
                document.getElementById('myDropdown2').innerHTML = selectedItem;
            }
        }
    </script>

@endsection



