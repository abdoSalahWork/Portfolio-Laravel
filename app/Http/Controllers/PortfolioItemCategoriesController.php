<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioCategoryItem;
use Illuminate\Http\Request;

class PortfolioItemCategoriesController extends Controller
{
    private $portfolioCategoryItemModel, $portfolioModel, $portfolioCategoryModel;
    public function __construct(Portfolio $portfolio, PortfolioCategory $portfolioCategory, PortfolioCategoryItem $portfolioCategoryItem)
    {
        $this->portfolioCategoryItemModel = $portfolioCategoryItem;
        $this->portfolioModel = $portfolio;
        $this->portfolioCategoryModel = $portfolioCategory;

        // $this->$portfolioModel = $portfolio;
    }

    public function index($id)
    {
        $portfolioItem = $this->portfolioModel::with('ItemCategories')->find($id);
        $categories = $this->portfolioCategoryModel->get();
        return view('aPanel.portfolios.portfolioItemCategories', compact(['portfolioItem', 'categories']));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'portfolioCategoryId' => 'required',
            'portfolioItemId' => 'required',
        ]);
        $createPortfolioCategoryItem = $this->portfolioCategoryItemModel->where('portfolioCategoryId', '=', $request->portfolioCategoryId)
            ->where('portfolioItemId', '=', $request->portfolioItemId)->first();
        if (!$createPortfolioCategoryItem) {
            $portfolioItem = $this->portfolioModel->find($request->portfolioItemId);
            $portfolioCategory = $this->portfolioCategoryModel->find($request->portfolioCategoryId);

            if ($portfolioItem &&  $portfolioCategory) {
                $this->portfolioCategoryItemModel::create($data);
                session()->flash('done', 'The relationship between class and item has been added');
            } else {
                session()->flash('error', 'The Item Or Category  Is Not Found');
            }
        } else {
            session()->flash('error', 'Tis Category Is Found');
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'portfolioCategoryId' => 'required',
        ]);

        $createPortfolioCategoryItem = $this->portfolioCategoryItemModel->where('portfolioCategoryId', '=', $request->portfolioCategoryId)
            ->where('portfolioItemId', '=', $request->portfolioItemId)->first();

        if (!$createPortfolioCategoryItem) {
            $portfolioCategoryItem = $this->portfolioCategoryItemModel->find($id);

            if ($portfolioCategoryItem) {

                $portfolioCategoryItem->update($data);
                session()->flash('done', 'The relationship between class and item has been Updated');
            } else {
                session()->flash('error', 'The Item Or Category  Is Not Found');
            }
        } else {
            session()->flash('error', 'Tis Category Is Found');
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $portfolioCategoryItem = $this->portfolioCategoryItemModel->find($id);
        if($portfolioCategoryItem)
        {
            $portfolioCategoryItem->delete();
            session()->flash('done', 'The relationship between class and item has been Deleted');
        }else{
            session()->flash('error', 'The Item Or Category  Is Not Found');
        }
        return redirect()->back();
    }
}
