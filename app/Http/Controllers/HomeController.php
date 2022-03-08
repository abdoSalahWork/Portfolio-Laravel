<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\About;
use App\Models\Client;
use App\Models\Company;
use App\Models\ContactMe;
use App\Models\FllowMe;
use App\Models\HistoryCategory;
use App\Models\Number;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Service;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        $about = About::first();
        $categorySkills = SkillCategory::with('skills')->get();
        $historyCategories = HistoryCategory::with('histories')->get();
        $services = Service::get();
        $numbers = Number::get();
        $portfolioItem = Portfolio::with('ItemCategories')->get();
        $portfolioCategories = PortfolioCategory::get();
        $companies = Company::get();
        $clients = Client::get();
        $fllows = FllowMe::get();
        $contacts = ContactMe::get();
        // dd($portfolioItem[0]->ItemCategories[0]->category);
        return view('index', compact([
            'about',
            'categorySkills',
            'historyCategories',
            'services',
            'numbers',
            'portfolioItem',
            'portfolioCategories',
            'companies',
            'clients',
            'fllows',
            'contacts'
        ]));
    }
    public function send(Request $request)
    {
        Mail::to('abdo.salah2910@gmail.com')->send(new SendMail($request));
        echo "Yes";
    }
    public function downloadCv()
    {
        $fileCV = About::first('cv');
        // dd();
        //PDF file is stored under project/public/download/info.pdf
        // $file = public_path('imagesAbout') . $fileCV;
        // dd($file);
        // return Response::download($file);
        // dd(public_path("CvFile\\" . $fileCV->cv));
        return response()->download(public_path("CvFile\\") . $fileCV->cv);
    }
}
