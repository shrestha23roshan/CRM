<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $companies = Company::where('status', '1')->get();
        $employees = Employee::orderBy('created_at','desc')->get();

        return view('admin.employees.index', compact('companies','employees'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        $data = $request->all();
    
        $employee = Employee::create($data);
        if ($employee) {
            return redirect()->route('admin.employee.index')
                ->withSuccessMessage('Employee is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Employee can not be added.');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::where('status', '1')->get();

        return view('admin.employees.edit', compact('employee','companies'));
    }

    public function update(EmployeeUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
       
        $employee = Employee::findOrFail($id)->update($data);
        if ($employee) {
            return redirect()->route('admin.employee.index')->withSuccessMessage('Employee is updated successfully.');
        }
        return redirect()->back()->withInput()->withWarningMessage('Employee can not be updated.');
    }

    public function destroy($id)
    {
        $employee = Employee::destroy($id);

        if ($employee) {
            return response()->json([
                'type' => 'success',
                'message' => 'Employee is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Employee can not be deleted.'
        ], 422);
    }
}
