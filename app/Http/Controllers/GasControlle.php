<?php

namespace App\Http\Controllers;

use App\Models\GasAdd;
use App\Models\GasAddHistory;
use App\Models\GasDistribute;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Gas;
use Illuminate\Support\Facades\Auth;

class GasControlle extends Controller
{
    public function addGas(Request $request){
        $name = $request->input('name');
        $gas = new Gas;
        $gas->gasName = $name;
        $gas->save();
        return redirect()->back()->with('success', 'Gas add successfully!');
    }
    public function viewGas(){
        $gas = Gas::all();
        return view('admin.adminGasDe')->with('gas', $gas);
    }
    public function addGasQty($data){
        //dd($data);
        return view('distributor.disAddGas', ['var' => $data]);
    }
    public function updateGasQty(Request $request){
       // dd($request->input('id'),$request->input('qty'));
        $disGas = GasAdd::where('id', '=', ($request->input('id')))->get();
        //dd($disGas[0]->qty);
        $aviqty = $disGas[0]->qty;
        $nowqty = $request->input('qty');
        $upqty = $aviqty+$nowqty;
        //dd($upqty);
        $gasDisUp = GasAdd::findOrFail($request->input('id'));
        $gasDisUp->qty = $upqty;
        $gasDisUp->save();

        $gid = $disGas[0]->gasId;
        $gasah = new GasAddHistory;
        $gasah->disId = Auth::id();
        $gasah->gasId = $gid;
        $gasah->qty = $nowqty;
        $gasah->save();

        $gasN = Gas::all();
        $techN = User::where('userType', '=', 'technician')->get();
        $disId = Auth::id();
        for ($i = 0; $i < count($gasN); $i++) {
            $row = $gasN[$i];
            $gasId = $row->id;
            $exists =GasAdd::where('disId', $disId)
                ->where('gasId', $gasId)
                ->exists();

            if ($exists) {
                // Row exists for the current $columnValue
                //echo "exsists"."disId" . $disId . ": gasid " . $gasId ."<br>";
            } else {
                // Row does not exist for the current $columnValue
                //echo "Not exsists"."disId" . $disId . ": gasid " . $gasId ."<br>";
                $gasAdd = new GasAdd;
                $gasAdd->disId = $disId;
                $gasAdd->gasId = $gasId;
                $gasAdd->save();
            }
        }
        $disGas = GasAdd::where('disId', '=', $disId)->get();
        return view('distributor.disdashboard',['techN' => $techN, 'gasN' => $gasN,'disGas' => $disGas]);

    }
    public function addGasTrans(Request $request){
       // dd($request->input('qty'),$request->input('techn'),$request->input('gasn'));
        $tech = User::where('name', '=', $request->input('techn'))->get();
        $techId = $tech[0]->id;
        $gas = Gas::where('gasName', '=', $request->input('gasn'))->get();
        $gasId = $gas[0]->id;
        $disId = Auth::id();
        $transQ = $request->input('qty');
        //dd($techId,$gasId,$request->input('qty'));
        $distr = new GasDistribute;
        $distr->disId = $disId;
        $distr->qty = $transQ;
        $distr->techId = $techId;
        $distr->gasId = $gasId;
        $distr->save();

        $resultsG = GasAdd::where('disId', $disId)
            ->where('gasId', $gasId )
            ->get();
        $aGasI = $resultsG[0]->id;
        $avaiQ = $resultsG[0]->qty;
        $upQ = $avaiQ-$transQ;
        $gasDisUp = GasAdd::findOrFail($aGasI);
        $gasDisUp->qty = $upQ;
        $gasDisUp->save();
        return redirect()->back();


//        $name = $request->input('name');
//        $gas = new Gas;
//        $gas->gasName = $name;
//        $gas->save();
//        return redirect()->back()->with('success', 'Gas add successfully!');
    }
    public function disHistory(){
        $disId = Auth::id();
        $gasH = GasDistribute::where('disId', $disId)
            ->get();
        $gasN = Gas::all();
        $techN = User::where('userType', '=', 'technician')->get();
        return view('distributor.disHistory',['gasH' => $gasH, 'gasN' => $gasN,'techN' => $techN]);
    }
    public function disGasAddHistory(){
        $disId = Auth::id();
        $gasH = GasAddHistory::where('disId', $disId)
            ->get();
        $gasN = Gas::all();
        return view('distributor.disGassAddHistory',['gasH' => $gasH, 'gasN' => $gasN]);
    }
    public function adminVewGT(){
        $gasN = Gas::all();
        $gasDh = GasDistribute::all();
        $techN = User::where('userType', '=', 'technician')->get();
        $disN = User::where('userType', '=', 'distributor')->get();
        return view('admin.adminGasTrans',['gasDh' => $gasDh, 'gasN' => $gasN, 'techN' => $techN ,'disN' => $disN]);
    }
    public function editTrans($data){
        $gasN = Gas::all();
        $disN = User::where('userType', '=', 'distributor')->get();
        $dHis = GasDistribute::where('id', $data)
            ->get();
        return view('techni.techTransEdit',['dHis' => $dHis, 'gasN' => $gasN,'disN' => $disN]);
    }
    public function updateTrans(Request $request){
        if ($request->input('cType')=='Confirm'){
           // dd('Confirm');
            $gt = GasDistribute::findOrFail($request->input('id'));
            $gt->status = $request->input('cType');
            $gt->save();
        }else{
            //dd('reject');
            $gt = GasDistribute::findOrFail($request->input('id'));
            $gt->status = $request->input('cType');
            $gt->save();
            $gth = GasDistribute::where('id', '=', $request->input('id'))->get();
            $gasI = $gth[0]->gasId;
            $gQ = $gth[0]->qty;
            $dI = $gth[0]->disId;
            $gasD = GasAdd::where('disId', $dI)
                ->where('gasId', $gasI)
                ->get();
            $gasAid = $gasD[0]->id;
            $gasAqt = $gasD[0]->qty;
            $upQty = $gQ+$gasAqt;
            $gat = GasAdd::findOrFail($gasAid);
            $gat->qty = $upQty;
            $gat->save();
        }
        $gasN = Gas::all();
        $disN = User::where('userType', '=', 'distributor')->get();
        $techId = Auth::id();
        $gasD = GasDistribute::where('techId', $techId)
            ->where('status', 'Pending')
            ->get();
        return view('techni.techdashboard',['gasD' => $gasD, 'gasN' => $gasN,'disN' => $disN]);
    }
    public function viewTransHi(){
        $techId = Auth::id();
        $gasD = GasDistribute::where('techId', $techId)
            ->where('status', '<>', 'Pending')
            ->get();
        $disN = User::where('userType', '=', 'distributor')->get();
        $gasN = Gas::all();
        return view('techni.techHistory',['gasD' => $gasD, 'gasN' => $gasN,'disN' => $disN]);
    }
    public function adminVewTS(){
//        $technicianIds = User::where('userType', 'technician')->pluck('id');
//        $gasD = GasDistribute::where('status', '!=', 'Pending')
//            ->where('status', '!=', 'Reject')
//            ->whereIn('techId', $technicianIds)
//            ->get();
//        $gasN = Gas::all();
//        $techN = User::where('userType', '=', 'technician')->get();
//        return view('admin.technicianStock' ,['gasD' => $gasD, 'gasN' => $gasN,'techN' => $techN]);
        return view('admin.technicianStock');
//        return view('techni.techHistory',['gasD' => $gasD, 'gasN' => $gasN,'disN' => $disN]);
    }
    public function adminVewDS(){
        return view('admin.distriStock');
    }
}
