<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::where('status', 1)->get();
        return view('department.index', compact('departments'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Department();
        $a->name = $request->name;
        $a->save();
        session()->flash('alert-warning',  'Department Added');
        return redirect('/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $id = Crypt::decrypt($id);    
        $department = Department:: findorFail($id);
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $department)
    {
        $department = Crypt::decrypt($department); 
        $a = Department::findorFail($department);
        $a->name = $request->name;
        $a->save();
        session()->flash('alert-warning',  'Department Updated');
        return redirect('/department');
    }

    public function del( $department)
    {
        $department = Crypt::decrypt($department);
        $a = Department::findorFail($department);
        $a->status = 0;
        $a->save();
        session()->flash('alert-warning',  'Department Removed');
        return redirect('/department');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
