<?php

namespace App\Http\Controllers;

use App\Department;
use App\Distribution;
use App\Product;
use App\User;
use App\PurchaseDetails;
use App\Supplier;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::User()->role == 2) {
            $products = Product::where('status', 1)->get();
            $departments = Department::where('status', 1)->get();
            $suppliers = Supplier::where('status', 1)->get();
            $users = User::where('role', 1)->get();
            $purchaseDetails = PurchaseDetails::orderBy('id', 'desc')->take(10)->get();
            $distributionDetails = Distribution::orderBy('id', 'desc')->take(10)->get();

            $today_date = date('Y-m-d');
            $today = PurchaseDetails::whereDate('date_of_purchase', $today_date)->sum('total');

            $total = PurchaseDetails::all()->sum('total');
            $month_date = date('m');
            $month = PurchaseDetails::whereMonth('date_of_purchase', $month_date)->sum('total');
            $previous_month = PurchaseDetails::whereMonth('date_of_purchase', date('m', strtotime('-1 month')))->sum('total');
            session()->flash('alert-warning',  'Feedback recieved. We love hearing from our students!!');
            return view('home', compact('products', 'departments', 'suppliers', 'purchaseDetails', 'distributionDetails', 'today', 'previous_month',  'month', 'total'))->with('i')->with('j');
        } 
        elseif (Auth::User()->role == 0) {
            return View('home0');
        }
        elseif (Auth::User()->role == 1) {
            $distributionDetails = Distribution::where('department_id', Auth::User()->department_id)->get();    
            return View('home1', compact('distributionDetails'))->with('j');
        }
        else{
            return redirect()->back()->with('alert-danger', 'something went wrong!!');
        }
        

    }

    public function cp(){
        return view('cp');
    }
    public function changePassword(Request $request)
    {
        
        if((Hash::check($request->oldPassword, Auth::user()->password))){
            $a = User::findorFail(Auth::user()->id);
            $a->password = Hash::make($request->password);
            $a->save();
            return redirect('/home')->with('alert-success', 'Password Changed Successfully!!');
        }
        return redirect()->back()->with('alert-danger', 'Old Password is wrong!!');
    }
}
