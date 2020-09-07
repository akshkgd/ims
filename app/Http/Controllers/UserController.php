<?php

namespace App\Http\Controllers;

use App\Department;
use App\User as AppUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
// use User;

class UserController extends Controller
{
    public function index()
    {
    $userDetails = AppUser::where('role', 1)->get();  
    return view('user.index', compact('userDetails'))->with('i');  
    }
    public function create(){
        $departments = Department::where('status', 1)->get();
        return view('user.add', compact('departments'));
    }
    public function store(Request $request){
        $a = New AppUser();
        $a->name = $request->name;
        $a->email = $request->email;
        $a->department_id = $request->department_id;
        $a->password = bcrypt($request->password);
        $a->role = 1;
        $a->save();

        return redirect('/user')->with('alert-success', 'guest User Added');

    }

    public function destroy($id)
    {
        $a = AppUser::findorFail($id);
        User::destroy($a->id);
        return redirect('/user')->with('alert-warning', 'User Deleted!!');
    }
}
