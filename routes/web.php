<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\FllowMeMeController;
use App\Http\Controllers\HistoriesController;
use App\Http\Controllers\HistoryCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\PortfolioCategoriesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioItemCategoriesController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SkillsCategoryController;
use App\Http\Controllers\SkillsController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);
Route::post('/sendEmail', [MailController::class, 'sendEmail'])->name('sendEmail');
Route::get('/downloadCv', [HomeController::class, 'downloadCv'])->name('downloadCv');

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login/page', [AuthController::class, 'loginPage'])->name('loginPage');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
});


//===============      Login        ===============//


Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/logout', [AuthController::class, 'logOut'])->name('admin.logOut');


    //===============      Skills        ===============//

    Route::get('/admin/skills', [SkillsController::class, 'index'])->name('admin.skills');
    Route::get('/admin/skills/add', [SkillsController::class, 'add'])->name('admin.skills.add');
    Route::post('/admin/skills/store', [SkillsController::class, 'store'])->name('admin.skills.store');
    Route::put('/admin/skills/update/{id}', [SkillsController::class, 'update'])->name('admin.skills.update');
    Route::delete('/admin/skills/delete/{id}', [SkillsController::class, 'delete'])->name('admin.skills.delete');

    Route::get('/admin/skills/categories', [SkillsCategoryController::class, 'index'])->name('admin.skills.categories');
    Route::post('/admin/skills/category/store', [SkillsCategoryController::class, 'store'])->name('admin.skills.categories.store');
    Route::put('/admin/skills/category/update/{category_id}', [SkillsCategoryController::class, 'update'])->name('admin.skills.categories.update');
    Route::delete('/admin/skills/category/delete/{category_id}', [SkillsCategoryController::class, 'delete'])->name('admin.skills.categories.delete');

    //===============      Services        ===============//

    Route::get('/admin/services', [ServicesController::class, 'index'])->name('admin.services');
    Route::get('/admin/services/add', [ServicesController::class, 'add'])->name('admin.services.add');
    Route::post('/admin/services/store', [ServicesController::class, 'store'])->name('admin.services.store');
    Route::put('/admin/services/update/{id}', [ServicesController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/delete/{id}', [ServicesController::class, 'delete'])->name('admin.services.delete');



    //===============      About        ===============//

    Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
    Route::put('/admin/about/update', [AboutController::class, 'update'])->name('admin.about.update');




    //===============      History        ===============//

    Route::get('/admin/histories', [HistoriesController::class, 'index'])->name('admin.histories');
    Route::get('/admin/histories/add', [HistoriesController::class, 'add'])->name('admin.histories.add');
    Route::post('/admin/histories/store', [HistoriesController::class, 'store'])->name('admin.histories.store');
    Route::put('/admin/histories/update/{id}', [HistoriesController::class, 'update'])->name('admin.histories.update');
    Route::delete('/admin/histories/delete/{id}', [HistoriesController::class, 'delete'])->name('admin.histories.delete');

    Route::get('/admin/history/categories', [HistoryCategoryController::class, 'index'])->name('admin.history.categories');
    Route::post('/admin/history/category/store', [HistoryCategoryController::class, 'store'])->name('admin.history.categories.store');
    Route::put('/admin/history/category/update/{category_id}', [HistoryCategoryController::class, 'update'])->name('admin.history.categories.update');
    Route::delete('/admin/history/category/delete/{category_id}', [HistoryCategoryController::class, 'delete'])->name('admin.history.categories.delete');



    //===============      Numbers       ===============//

    Route::get('/admin/number', [NumberController::class, 'index'])->name('admin.number');
    Route::post('/admin/numbers/store', [NumberController::class, 'store'])->name('admin.number.store');
    Route::put('/admin/number/update/{id}', [NumberController::class, 'update'])->name('admin.number.update');
    Route::delete('/admin/number/delete/{id}', [NumberController::class, 'delete'])->name('admin.number.delete');


    //===============      Numbers       ===============//

    Route::get('/admin/fllows', [FllowMeMeController::class, 'index'])->name('admin.fllows');
    Route::post('/admin/fllow/store', [FllowMeMeController::class, 'store'])->name('admin.fllow.store');
    Route::put('/admin/fllow/update/{id}', [FllowMeMeController::class, 'update'])->name('admin.fllow.update');
    Route::delete('/admin/fllow/delete/{id}', [FllowMeMeController::class, 'delete'])->name('admin.fllow.delete');



    //===============      Numbers       ===============//

    Route::get('/admin/contacts', [ContactMeController::class, 'index'])->name('admin.contacts');
    Route::post('/admin/contact/store', [ContactMeController::class, 'store'])->name('admin.contact.store');
    Route::put('/admin/contact/update/{id}', [ContactMeController::class, 'update'])->name('admin.contact.update');
    Route::delete('/admin/contact/delete/{id}', [ContactMeController::class, 'delete'])->name('admin.contact.delete');




    //===============      Portfolios       ===============//

    Route::get('/admin/portfolios', [PortfolioController::class, 'index'])->name('admin.portfolios');
    Route::get('/admin/portfolio/add', [PortfolioController::class, 'add'])->name('admin.portfolio.add');
    Route::post('/admin/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::put('/admin/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('/admin/portfolio/delete/{id}', [PortfolioController::class, 'delete'])->name('admin.portfolio.delete');

    Route::get('/admin/portfolio/categories', [PortfolioCategoriesController::class, 'index'])->name('admin.portfolio.categories');
    Route::post('/admin/portfolio/category/store', [PortfolioCategoriesController::class, 'store'])->name('admin.portfolio.category.store');
    Route::put('/admin/portfolio/category/update/{id}', [PortfolioCategoriesController::class, 'update'])->name('admin.portfolio.category.update');
    Route::delete('/admin/portfolio/category/delete/{id}', [PortfolioCategoriesController::class, 'delete'])->name('admin.portfolio.category.delete');

    Route::get('/admin/portfolio/item/categories/{itemId}', [PortfolioItemCategoriesController::class, 'index'])->name('admin.portfolio.itemCategories');
    Route::post('/admin/portfolio/item/category/store', [PortfolioItemCategoriesController::class, 'store'])->name('admin.portfolio.itemCategory.store');
    Route::put('/admin/portfolio/item/category/update/{id}', [PortfolioItemCategoriesController::class, 'update'])->name('admin.portfolio.itemCategory.update');
    Route::delete('/admin/portfolio/item/category/delete/{id}', [PortfolioItemCategoriesController::class, 'delete'])->name('admin.portfolio.itemCategory.delete');


    //===============      Clints       ===============//

    Route::get('/admin/companies', [CompanyController::class, 'index'])->name('admin.companies');
    Route::post('/admin/company/store', [CompanyController::class, 'store'])->name('admin.company.store');
    Route::put('/admin/company/update/{id}', [CompanyController::class, 'update'])->name('admin.company.update');
    Route::delete('/admin/company/delete/{id}', [CompanyController::class, 'delete'])->name('admin.company.delete');

    //===============      Companies       ===============//

    Route::get('/admin/clients', [ClientController::class, 'index'])->name('admin.clients');
    Route::get('/admin/client/add', [ClientController::class, 'add'])->name('admin.client.add');
    Route::post('/admin/client/store', [ClientController::class, 'store'])->name('admin.client.store');
    Route::put('/admin/client/update/{id}', [ClientController::class, 'update'])->name('admin.client.update');
    Route::delete('/admin/client/delete/{id}', [ClientController::class, 'delete'])->name('admin.client.delete');
});





//===============      Contacts       ===============//

// Route::post(function(Request $request){
//     // dd($request);
//     return view('index');
// })->name('user.send');

Route::post('index', [HomeController::class, 'send'])->name('user.send');
