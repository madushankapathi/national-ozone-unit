@extends('importer.impolayout')
@section('content')
@section('impo-req', 'active')
    <label class="progress-bar bg-info" role="progressbar">Import Request</label>
<form action="{{ url('/impoReq')}}" method="GET">
    {{--    <label>Technician Name</label>--}}
    <div class="col">
        <label>Gas Name</label>
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
            </ul>
        </div>
    </div>
    <br>
    <div class="col">
        <input type="text" name="qty" id="qty" class="form-control">
        <label>&nbsp &nbsp &nbsp &nbsp &nbsp Gas Quantity (Kg)</label>
    </div>
    <div class="col">
        <label for="rdate">Estimate Date:</label>
        <input type="hidden" name="gasn" id="gasn">
        <input type="date" id="rdate" name="rdate">
        <br>
        <br>
        <input type="submit" value="Add Gas Import Request" class="btn btn-success"></br>
    </div>
</form>

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

