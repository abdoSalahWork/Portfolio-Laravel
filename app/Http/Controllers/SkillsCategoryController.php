<?php

namespace App\Http\Controllers;

use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillsCategoryController extends Controller
{
    private $skillCategoryModel;
    public function __construct(SkillCategory $skillCategory)
    {
        $this->skillCategoryModel = $skillCategory;
    }

    function index()
    {
        $skillCategories = $this->skillCategoryModel::get();
        return view('aPanel.skills.skillCategoryList', compact('skillCategories'));
    }

    function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $this->skillCategoryModel::create([

            'name' => $request->name

        ]);
        session()->flash('done', 'Category Skill Was Added');
        return redirect(route('admin.skills.categories'));
    }

    function delete($id)
    {

        $skillCategory = $this->skillCategoryModel::find($id);
        if ($skillCategory) {

            $skillCategory->delete();
            session()->flash('done', 'Category Skill Was Delete');
            return redirect(route('admin.skills.categories'));

        }
        return redirect(route('admin.skills.categories'));
    }


    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        $skillCategory = $this->skillCategoryModel::find($id);

        if ($skillCategory)
        {
            $skillCategory->update([
                'name' => $request->name,
            ]);

            session()->flash('done', 'Category Skill Was Update');
            return redirect(route('admin.skills.categories'));

        }
        return redirect(route('admin.skills.categories'));
    }
}
