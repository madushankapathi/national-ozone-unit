<?php

namespace App\Http\Controllers;

use App\Models\ImpoReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Mime\Header\all;

class impoController extends Controller
{
    //
    public function createReq(Request $request){
        $gasN = $request->input('gasn');
        $qty = $request->input('qty');
        $rdate = $request->input('rdate');
//        dd($gasN,$qty,$rdate);
        $impoId = Auth::id();
        $impo = new ImpoReq();
        $impo->impoId = $impoId;
        $impo->reqDate = $rdate;
        $impo->gasName = $gasN;
        $impo->qty = $qty;
        $impo->save();
        //ReportController::class->impoReqFI;
        return redirect()->back();
    }

    public function hisReq(){
        $impoId = Auth::id();
        $impoh = ImpoReq::where('impoId', $impoId)
            ->get();
//        ReportController impoReqFI;
        return view('importer.impoHistory',['impoh' => $impoh]);
    }

    public function viewReq(){
        $userD = User::where('userType', '=', 'importer')->get();
        $impoReq = ImpoReq::where('status', '=', 'Pending')->get();
        return view ('admin.adminImport',['impoReq' => $impoReq,'userD'=> $userD]);
    }

    public function editReq($data){
        //dd($data);
        //return redirect()->route('/home')->with('alert', $request);
//        $results = MyModel::select('column1', 'column2')
//            ->where('column3', $value)
//            ->where('column4', '>', $anotherValue)
//            ->get();
        $impoR = ImpoReq::where('id', $data)->get();
        $userD = User::where('userType', '=', 'importer')->get();
        //dd($userD);
        // $array2 = ['Item 1', 'Item 2', 'Item 3'];
        //return view('admin.useredit', compact('userD','array2'));
        return view('admin.impoReqEdit',['impoR' => $impoR,'userD'=> $userD]);
    }

    public function updateReq(Request $request){
//        $name = $request->input('rid');
//        dd($name);
        $impo = ImpoReq::findOrFail($request->input('rid'));
        $impo->status = $request->input('userType');
        $impo->save();
        $userD = User::where('userType', '=', 'importer')->get();
        $impoReq = ImpoReq::where('status', '=', 'Pending')->get();
        return view ('admin.adminImport',['impoReq' => $impoReq,'userD'=> $userD]);
    }
}
