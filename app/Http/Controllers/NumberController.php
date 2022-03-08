<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    private $numberModel;
    public function __construct(Number $number)
    {
        $this->numberModel = $number;
    }
    public function index()
    {
        $numbers = $this->numberModel::get();
        return view('aPanel.number.numberList', compact('numbers'));
    }

    public function store(Request $request)
    {
        // dd('done');
        $request->validate([
            'name' => 'required|min:3',
            'number' => 'required|min:2|max:3'
        ]);

        $this->numberModel->create([
            'name' => $request->name,
            'number' => $request->number
        ]);
        session()->flash('done', 'Number Was Added');
        return redirect(route('admin.number'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'number' => 'required|min:2|max:3'
        ]);
        $updateNumber = $this->numberModel::find($id);
        if ($updateNumber) {
            $updateNumber->update([
                'name' => $request->name,
                'number' => $request->number
            ]);
            session()->flash('done', 'Number Was Updated');
        }
        return redirect(route('admin.number'));
    }

    public function delete($id)
    {
        $deleteNumber = $this->numberModel::find($id);
        if ($deleteNumber) {
            $deleteNumber->delete();
            session()->flash('done', 'Number Was Deleted');
        }
        return redirect(route('admin.number'));

    }
}
