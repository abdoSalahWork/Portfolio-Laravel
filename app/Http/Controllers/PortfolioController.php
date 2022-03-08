<?php

namespace App\Http\Controllers;


use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioCategoryItem;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private $portfolioModel;

    public function __construct(Portfolio $portfolio)
    {
        $this->portfolioModel = $portfolio;
    }
    public function index()
    {
        $portfolios = $this->portfolioModel->get();

        return view('aPanel.portfolios.viewPortfolios', compact('portfolios'));
    }

    public function add()
    {
        return view('aPanel.portfolios.addPortfolio');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3',
            'image' => 'required|mimes:jpg,png,webp',
        ]);

        $fileName =   time() . $request->image->extension();
        $request->image->move(public_path('images/portfolios'), $fileName);
        $data['image'] = 'images/portfolios/' . $fileName;

        $this->portfolioModel::create($data);

        session()->flash('done', 'Portfolio Was Added');
        return redirect(route('admin.portfolio.add'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3',
            'image' => 'mimes:jpg,png,webp|nullable',
        ]);

        $updatePortfolio = $this->portfolioModel->find($id);

        if ($updatePortfolio) {
            if ($request['image']) {
                $fileName = time()  . $request->image->extension();
                $request->image->move(public_path('images/portfolios'), $fileName);
                $data['image'] = 'images/portfolios/' . $fileName;
            }

            $updatePortfolio->update($data);

            session()->flash('done', 'Portfolio Was Updated');
            return redirect(route('admin.portfolios'));
        }
        session()->flash('error', 'Portfolio Is Not Found');

        return redirect(route('admin.portfolios'));
    }

    public function delete($id)
    {

        $deletePortfolio = $this->portfolioModel->find($id);
        if ($deletePortfolio) {
            $deletePortfolio->delete();
            session()->flash('Portfolio Was Deleted');
            return redirect(route('admin.portfolios'));

        }
        session()->flash('error', 'Portfolio Is Not Found');
        return redirect(route('admin.portfolios'));
    }
}
