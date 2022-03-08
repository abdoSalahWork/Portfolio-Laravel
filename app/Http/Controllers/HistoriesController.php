<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\HistoryCategory;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{

    private $historyModel, $historyCategoryModel;

    public function __construct(History $history, HistoryCategory $historyCategory)
    {
        $this->historyModel = $history;
        $this->historyCategoryModel = $historyCategory;
    }
    public function index()
    {
        $histories = $this->historyModel::with('category')->get();
        $historyCategories = $this->historyCategoryModel::get();
        return view('aPanel.history.viewHistoryList', compact('histories', 'historyCategories'));
    }

    public function add()
    {
        $historyCategories = $this->historyCategoryModel::get();
        return view('aPanel.history.addHistory', compact('historyCategories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'year' => 'required|min:4',
            'slug' => 'required',
            'description' => 'min:5|required',
            'category_id' => 'required|exists:history_categories,id'
        ]);
        if ($request->status == null) {
            $request->status = '0';
        }
        // dd($request->status);
        $this->historyModel->create([
            'name' => $request->name,
            'year' => $request->year,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'historyCategoryId' => $request->category_id
        ]);

        session()->flash('done', 'History Was Added');
        return redirect(route('admin.histories.add'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'year' => 'required|min:4',
            'slug' => 'required',
            'description' => 'min:5|required',
            'category_id' => 'required|exists:history_categories,id'
        ]);

        if ($request->status == null) {
            $request->status = '0';
        }

        $updateHistory = $this->historyModel->find($id);
        if ($updateHistory) {
            $updateHistory->update([
                'name' => $request->name,
                'year' => $request->year,
                'slug' => $request->slug,
                'description' => $request->description,
                'status' => $request->status,
                'historyCategoryId' => $request->category_id
            ]);

            session()->flash('done', 'History Was Updated');
        }
        return redirect(route('admin.histories'));
    }

    public function delete($id){
        $deleteHistory = $this->historyModel->find($id);
        if($deleteHistory){

            $deleteHistory->delete();
            session()->flash('done', 'History Was Deleted');

        }
        return redirect(route('admin.histories'));
    }
}
