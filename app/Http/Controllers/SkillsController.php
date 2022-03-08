<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    private $skillsModel;
    private $skillCategoryModel;


    function __construct(Skill $skills, SkillCategory $skillCategory)
    {
        $this->skillsModel = $skills;
        $this->skillCategoryModel = $skillCategory;
    }

    function index()
    {

        $skills = $this->skillsModel::with('category')->get();
        $categories = $this->skillCategoryModel::get();
        return view('aPanel.skills.skillList', compact('skills', 'categories'));
    }

    function add()
    {
        $categories = $this->skillCategoryModel::get();
        return view('aPanel.skills.addSkill', compact('categories'));
    }


    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'number' => 'required|min:1|max:3',
            'category_id' => 'required|exists:skill_categories,id'
        ]);

        $this->skillsModel::create([
            'name' => $request->name,
            'number' => $request->number,
            'skillCategoryId' => $request->category_id
        ]);

        session()->flash('done', 'Skill Was Added');
        return redirect(route('admin.skills.add'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3',
            'number' => 'required|min:1|max:3',
            'category_id' => 'required|exists:skill_categories,id'
        ]);

        $updateSkill = $this->skillsModel::find($id);

        if ($updateSkill)
        {
            $updateSkill->update([

                'name' => $request->name,
                'number' => $request->number,
                'skillCategoryId' => $request->category_id
            ]);
            session()->flash('done', 'Skill Was Added');
            return redirect(route('admin.skills'));
        }

        dd('Errror');
    }
    public function delete($id)
    {
        $this->skillsModel::find($id)->delete();
        return redirect(route('admin.skills'));
    }
}
