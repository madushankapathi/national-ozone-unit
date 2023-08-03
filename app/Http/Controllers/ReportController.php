<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GasAdd;
use App\Models\GasAddHistory;
use App\Models\GasDistribute;
use Illuminate\Http\Request;
use App\Models\Gas;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function viewUserRepo(){
        //dd('ok');
        $userD = User::where('userType', '<>', 'pending')->get();
        //$pdf = setPaper('A4', 'landscape');
        Pdf::setPaper('A4', 'landscape');
        $pdf = Pdf::loadView('pdf.user' ,['userD' => $userD]);
       //$pdf = Pdf::loadView('pdf.user');

        return $pdf->download('user.pdf');
    }
    public function genareReportGasTrans(){
        $gasN = Gas::all();
        $gasDh = GasDistribute::all();
        $techN = User::where('userType', '=', 'technician')->get();
        $disN = User::where('userType', '=', 'distributor')->get();
        Pdf::setPaper('A4', 'landscape');
        $pdf = Pdf::loadView('pdf.gasTrans' ,['gasDh' => $gasDh, 'gasN' => $gasN, 'techN' => $techN ,'disN' => $disN])->setPaper('A4', 'landscape');
        return $pdf->download('Gas Transaction Details.pdf');

      //  return view('admin.adminGasTrans',['gasDh' => $gasDh, 'gasN' => $gasN, 'techN' => $techN ,'disN' => $disN]);
    }
    public function gasDetailsRepo(){
        $gas = Gas::all();
        //return view('admin.adminGasDe')->with('gas', $gas);
        $pdf = Pdf::loadView('pdf.gasRepo' ,['gas' => $gas]);
        return $pdf->download('Gas Details Report.pdf');
    }
    public function genareReportDisHistory(){
        $gas = Gas::all();
        //return view('admin.adminGasDe')->with('gas', $gas);
        $pdf = Pdf::loadView('pdf.gasRepo' ,['gas' => $gas]);
        return $pdf->download('Gas Details Report.pdf');
    }
}
