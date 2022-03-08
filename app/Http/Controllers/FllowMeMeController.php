<?php

namespace App\Http\Controllers;

use App\Models\FllowMe;
use Illuminate\Http\Request;

class FllowMeMeController extends Controller
{
    private $fllowMeModel;
    public function __construct(FllowMe $FllowMe)
    {
        $this->fllowMeModel = $FllowMe;
    }
    public function index()
    {
        $fllows  = $this->fllowMeModel::get();
        return view('aPanel.Fllowme.fllowList', compact('fllows'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'url' => 'required|url'
        ]);

        $this->fllowMeModel->create($data);
        session()->flash('done', 'FllowMe Was Added');
        return redirect(route('admin.fllows'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'url' => 'required|url'
        ]);
        $updateFllow = $this->fllowMeModel::find($id);
        if ($updateFllow) {
            $updateFllow->update($data);
            session()->flash('done', 'Fllow Was Updated');
        }
        else{
            session()->flash('error', 'Fllow is not Found');

        }
        return redirect(route('admin.fllows'));
    }

    public function delete($id)
    {
        $deleteFllow = $this->fllowMeModel::find($id);
        if ($deleteFllow) {
            $deleteFllow->delete();
            session()->flash('done', 'Fllow Was Deleted');
        }
        else{
            session()->flash('error', 'Fllow is not Found');

        }
        return redirect(route('admin.fllows'));

    }
}
