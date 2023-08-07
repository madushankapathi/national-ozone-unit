<?php

namespace App\Http\Controllers;

use App\Models\GasDistribute;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gas;
use App\Models\GasAdd;
use Illuminate\Support\Facades\Auth;
use function Psr\Log\alert;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usert = Auth()->user()->userType;
            if($usert=='admin'){
                $userD = User::where('userType', '=', 'pending')->get();
                return view('admin.admindashboard')->with('userD', $userD);

            }elseif($usert=='technician'){
                $gasN = Gas::all();
                $disN = User::where('userType', '=', 'distributor')->get();
                $techId = Auth::id();
                $gasD = GasDistribute::where('techId', $techId)
                    ->where('status', 'Pending')
                    ->get();
                return view('techni.techdashboard',['gasD' => $gasD, 'gasN' => $gasN,'disN' => $disN]);

            }elseif($usert=='importer'){
                $gasN = Gas::all();
                return view('importer.impodashboard',['gasN' => $gasN]);

            }elseif($usert=='distributor'){
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
                //return view('distributor.disdashboard');

            }else{
                Auth::logout();
                return redirect('/login')->withErrors('Your login request is under admin process..');
                //return view('pendingdashboard');

            }
        }
    }
    public function loadUser(){
        //$students = Student::all();
        //return view ('students.index')->with('students', $students);
        //$userD = User::all();
        $userD = User::where('userType', '<>', 'pending')->get();
        return view ('admin.userDetails')->with('userD', $userD);
        //return($userw);
    }
    public function editUser($data){
        //dd($data);
        //return redirect()->route('/home')->with('alert', $request);
//        $results = MyModel::select('column1', 'column2')
//            ->where('column3', $value)
//            ->where('column4', '>', $anotherValue)
//            ->get();
        $userD = User::where('id', $data)->get();
        //dd($userD);
       // $array2 = ['Item 1', 'Item 2', 'Item 3'];
        //return view('admin.useredit', compact('userD','array2'));
        return view('admin.useredit')->with('userD', $userD);
    }
    public function updateUser(Request $request){
//        $name = $request->input('userType');
//        dd($name);
        $user = User::findOrFail($request->input('id'));
        $user->userType = $request->input('userType');
        $user->save();
        $userD = User::where('userType', '<>', 'pending')->get();
        return view ('admin.userDetails')->with('userD', $userD);
    }
    public function deleteUser($data){
        $user = User::findOrFail($data);
       // dd($user);
        $user->delete();
        $userD = User::where('userType', '<>', 'pending')->get();
        return view ('admin.userDetails')->with('userD', $userD);
        //dd('ok');
    }
}
