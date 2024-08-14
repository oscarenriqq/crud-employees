<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        dd($request->all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->all());

        return $employee;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Employee::find($id);
    }

    /**
     * Search by name
     */
    public function search(Request $request) {
        return Employee::where("name","LIKE", "%".$request->name."%")->get();
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
        $employee = Employee::find($id);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->country = $request->country;
        $employee->jobposition = $request->jobposition;

        $employee->save();

        return $employee;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Employee::destroy($id);
    }
}
