<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GasAdd;
use App\Models\GasAddHistory;
use App\Models\GasDistribute;
use Illuminate\Http\Request;
use App\Models\Gas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use function Monolog\alert;

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
        $disId = Auth::id();
        $gasH = GasDistribute::where('disId', $disId)
            ->get();
        $gasN = Gas::all();
        $techN = User::where('userType', '=', 'technician')->get();
        Pdf::setPaper('A4', 'landscape');
        $pdf = Pdf::loadView('pdf.disHistory' ,['gasH' => $gasH, 'gasN' => $gasN,'techN' => $techN])->setPaper('A4', 'landscape');;
        return $pdf->download('Distributor Gas History Report.pdf');
    }
    public function gasreqRepo(){
        $techId = Auth::id();
        $gasH = GasDistribute::where('techId', $techId)
            ->get();
        $gasN = Gas::all();
        $disN = User::where('userType', '=', 'distributor')->get();
        Pdf::setPaper('A4', 'landscape');
        $pdf = Pdf::loadView('pdf.techDisReq' ,['gasH' => $gasH, 'gasN' => $gasN,'disN' => $disN])->setPaper('A4', 'landscape');;
        return $pdf->download('technician Gas Distribute Report.pdf');
    }
}
