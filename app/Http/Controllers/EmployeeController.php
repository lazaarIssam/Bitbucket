<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class EmployeeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCompanies = DB::table('companies')
                        ->select('companies.*')
                        ->distinct()
                        ->orderBy('companies.created_at', 'desc')
                        ->get();
        $list = DB::table('employees')
                        ->Join('companies', 'employees.companie_id', '=', 'companies.id')
                        ->select('employees.*','companies.Name as compName')
                        ->distinct()
                        ->orderBy('employees.created_at', 'desc')
                        ->paginate(10);
        return view('employees.index',['list' => $list,'listCompanies'=>$listCompanies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $employee = new Employee();
        $employee->companie_id = $request->post('companie_id');
        $employee->FirstName = $request->FirstName;
        $employee->LastName = $request->LastName;
        $employee->Designation = $request->Designation;
        $employee->Email = $request->Email;
        $employee->Address = $request->Address; 
        $employee->Mobile = $request->Mobile;
        $employee->save();

        Session::flash('success', 'Bien enregister');
        // return redirect()->route('employees.index');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $employee = Employee::find($request->id);
        $employee->companie_id = $request->post('companie_id');
        $employee->FirstName = $request->FirstName;
        $employee->LastName = $request->LastName;
        $employee->Designation = $request->post('Designation');
        $employee->Email = $request->Email;
        $employee->Address = $request->Address; 
        $employee->Mobile = $request->Mobile;
        $employee->save();

        Session::flash('success', 'Bien enregister');
        // return redirect()->route('employees.index');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
