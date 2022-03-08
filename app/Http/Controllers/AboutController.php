<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $aboutModel;

    public function __construct(About $about)
    {
        $this->aboutModel = $about;
    }
    public function index()
    {
        // dd('test');
        $about = $this->aboutModel::first();
        return view('aPanel.about.updateAbout', compact('about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'title' => 'required|min:3',
            'from' => 'required|min:3',
            'live_in' => 'required|min:3',
            'age' => 'required|min:1|max:3',
            'gender' => 'required',
            'description' => 'required|min:5',
            'image' => 'mimes:jpg,png|nullable',
            'cv' => 'mimes:pdf|nullable'
        ]);
        $updateAbout = $this->aboutModel::find(1);
        if ($request->image != null) {
            $fileName =  time() . $request->image->extension();
            $request->image->move(public_path('images/About'), $fileName);
            $data['image'] = 'images/About/' . $fileName;
        }

        if ($request->cv != null) {

            $cvName = time() . $request->cv->extension();
            $request->cv->move(public_path('CvFile'), $cvName);

            $data['cv'] = $cvName;

        }
        // if($updateAbout){
        //     if ($request->image != null) {
        //         $fileName = time() . '_about.' . $request->image->extension();
        //         $request->image->move(public_path('images/About'), $fileName);
        //     } else {
        //         $updateAbout->update([
        //             'name' => $request->name,
        //             'title' => $request->title,
        //             'from' => $request->from,
        //             'live_in' => $request->live_in,
        //             'age' => $request->age,
        //             'gender' => $request->gender,
        //             'description' => $request->description,
        //             'image' => $request->oldImage
        //         ]);
        //     }
        $updateAbout->update($data);
        // }
        session()->flash('done', 'About Was Upadted');
        return redirect(route('admin.about'));
    }
}
