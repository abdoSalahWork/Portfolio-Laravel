<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Dotenv\Store\File\Paths;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    private $servicesModel;
    public function __construct(Service $services)
    {
        $this->servicesModel = $services;
    }

    public function index()
    {
        $services =  $this->servicesModel::get();
        return view('aPanel.services.viewServices', compact('services'));
    }

    public function add()
    {
        return view('aPanel.services.addService');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'icon' => 'required'
        ]);

        $this->servicesModel::create([
            'title' => $request->name,
            'discription' => $request->description,
            'icon' => $request->icon

        ]);
        session()->flash('done', 'Service Was Adedd');
        return redirect(route('admin.services.add'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'icon' => 'required'
        ]);
        $updateService = $this->servicesModel->find($id);
        if ($updateService) {
            $updateService->update([
                'title' => $request->name,
                'discription' => $request->description,
                'icon' => $request->icon,
            ]);

            session()->flash('done', 'Service Was Upadted');
        }
        return redirect(route('admin.services'));
    }

    public function delete($id)
    {

        $deleteService = $this->servicesModel->find($id);
        if ($deleteService) {
            $deleteService->delete();
            session()->flash('done', 'Category Skill Was Delete');
        }
        return redirect(route('admin.services'));
    }
}
