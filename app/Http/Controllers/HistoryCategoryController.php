<?php

namespace App\Http\Controllers;

use App\Models\HistoryCategory;
use Illuminate\Http\Request;

class HistoryCategoryController extends Controller
{
    private $historyCategoriesModel;

    public function __construct(HistoryCategory $historyCategory)
    {
        $this->historyCategoriesModel = $historyCategory;
    }

    public function index()
    {
        $historyCategories = $this->historyCategoriesModel::get();
        return view('aPanel.history.historyCategoryList', compact('historyCategories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $this->historyCategoriesModel->create([
            'name' => $request->name,
        ]);
        session()->flash('done', 'Category History Was Adedd');

        return redirect(route('admin.history.categories'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $historyCategory = $this->historyCategoriesModel::find($id);
        if ($historyCategory) {
            $historyCategory->update([
                'name' => $request->name,
            ]);
            session()->flash('done', 'Category History Was Updated');
        }
        return redirect(route('admin.history.categories'));
    }

    public function delete($id){

        $historyCategory = $this->historyCategoriesModel::find($id);

        if($historyCategory){
            $historyCategory->delete();
            session()->flash('done', 'Category History Was deleted');
        }
        return redirect(route('admin.history.categories'));
    }
}
