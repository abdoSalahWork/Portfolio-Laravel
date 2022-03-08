<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoriesController extends Controller
{
    private $portfolioCategoryModel;
    public function __construct(PortfolioCategory $portfolioCategory)
    {
        $this->portfolioCategoryModel = $portfolioCategory;
    }
    public function index()
    {


        $categorires =  $this->portfolioCategoryModel->get();
        return view('aPanel.portfolios.portfolioCategoryList', compact('categorires'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'alpha_dash|required|min:3|unique:portfolio_categories,name',
        ]);

        $this->portfolioCategoryModel->create([
            'name' => $request->name
        ]);
        session()->flash('done', 'Product Category Was Added');
        return redirect(route('admin.portfolio.categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'alpha_dash|required|min:3|unique:portfolio_categories,name,' . $id,
        ]);
        $updateportfolioCategory = $this->portfolioCategoryModel->find($id);

        if ($updateportfolioCategory) {
            $updateportfolioCategory->update([
                'name' => $request->name
            ]);
            session()->flash('done', 'Portfolio Category Was Updated');
        }
        return redirect(route('admin.portfolio.categories'));
    }

    public function delete($id)
    {
        $deleteportfolioCategory = $this->portfolioCategoryModel->find($id);

        if ($deleteportfolioCategory) {
            $deleteportfolioCategory->delete();
            session()->flash('done', 'Portfolio Category Was Deleted');
        }
        return redirect(route('admin.portfolio.categories'));
    }
}
