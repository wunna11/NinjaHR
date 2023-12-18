<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\Employee\storeRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('title')->get();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = new User();
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->password = Hash::make($request->password);
        $employee->department_id = $request->department_id;
        $employee->nrc_number = $request->nrc_number;
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->date_of_join = $request->date_of_join;
        $employee->is_present = $request->is_present;
        $employee->save();
        return redirect()->route('employee.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
