<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    private $companyModel;
    public function __construct(Company $company)
    {
        $this->companyModel = $company;
    }
    public function index()
    {
        $companies = $this->companyModel::get();
        return view('aPanel.company.viewCompany', compact('companies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|mimes:jpg,png,webp,svg',
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/companies'), $fileName);
        $data['image'] = 'images/companies/' . $fileName;
        $this->companyModel::create($data);
        session()->flash('done', 'Company Was Added');
        return redirect(route('admin.companies'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'image' => 'mimes:jpg,png,webp,svg|nullable',
        ]);
        $updateCompany = $this->companyModel->find($id);

        if ($updateCompany) {

            if ($request->image != null) {
                if (File::exists($updateCompany->image)) {
                    unlink($updateCompany->image);
                }
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/companies'), $fileName);

                $data['image'] = 'images/companies/' . $fileName;
            }
            $updateCompany->update($data);
            session()->flash('done', 'Company Was Updated');
        } else {
            session()->flash('error', 'The Company Is Not Found');
        }
        return redirect(route('admin.companies'));
    }

    public function delete($id)
    {
        $deleteCompany = $this->companyModel->find($id);
        if ($deleteCompany) {
            if (File::exists($deleteCompany->image)) {
                unlink($deleteCompany->image);
            }
            $deleteCompany->delete();
            session()->flash('done', 'Company Was Delete');
        } else {
            session()->flash('error', 'The Company Is Not Found');
        }
        return redirect(route('admin.companies'));
    }
}
