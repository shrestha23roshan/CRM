<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at','desc')->get();
        return view('admin.companies.index', compact('companies'));
    }

    public function store(CompanyStoreRequest $request)
    {
        // dd($request->all());
        $destinationpath = 'uploads/companies/';
        $data = $request->except('logo');
        $imageFile = $request->logo;

        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "company_" . time();
            $attachment = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['logo'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $company = Company::create($data);
        if ($company) {
            return redirect()->route('admin.company.index')
                ->withSuccessMessage('Company is added successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Company can not be added.');
    }
    
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        // dd($request->all());
        $destinationpath = 'uploads/companies/';
        $data = $request->except('_token', '_method', 'logo');
        $imageFile = $request->logo;

        if ($imageFile) {
        
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'company_' . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['logo'] = isset($image) ? $new_file_name . $extension : null;
        }
        $company = Company::where('id', $id)->update($data);
        if ($company) {
            return redirect()->route('admin.company.index')->withSuccessMessage('Company is updated successfully.');
        }
        return redirect()->back()->withInput()->withWarningMessage('Company can not be updated.');
    }

    public function destroy($id)
    {
        $company = Company::destroy($id);

        if ($company) {
            return response()->json([
                'type' => 'success',
                'message' => 'Company is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Company can not be deleted.'
        ], 422);
    }
}
