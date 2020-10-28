<?php

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

/*
Route::get('/admin-home', function () {
    return view('index');
});*/


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


Route::get('locale/{locale}', function ($locale){

    App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();

});



Route::get('/admin-home', 'Controller@index');
Route::get('/user/profile', 'Controller@profile');
Route::post('/user/profile/update', 'Controller@profileUpdate');

Route::get('/', function () {
    if (Auth::check()) {
        return Redirect::to('/admin-home');
    }
    return view('pages.login.login');
});


Route::get('/login', function () {
    return view('pages.login.login');
});

Route::post('/login-check', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@doLogout');


//Manage user
Route::get('/user/create', 'UserController@create');
Route::get('/user/show', 'UserController@index');
Route::post('/user/store', 'UserController@store');
Route::get('/user/edit/{user_id}', 'UserController@edit');
Route::post('/user/update', 'UserController@update');
Route::get('/user/destroy/{user_id}', 'UserController@destroy');

//Manage user Role
Route::get('/user/role/create', 'RoleController@create');
Route::get('/user/role/show', 'RoleController@index');
Route::post('/user/role/store', 'RoleController@store');
Route::get('/user/role/edit/{role_id}', 'RoleController@edit');
Route::post('/user/role/update', 'RoleController@update');
Route::get('/user/role/destroy/{role_id}', 'RoleController@destroy');

//Manage Outlet
Route::get('/outlet/create', 'OutletController@create');
Route::get('/outlet/show', 'OutletController@index');
Route::post('/outlet/store', 'OutletController@store');
Route::get('/outlet/edit/{outlet_id}', 'OutletController@edit');
Route::post('/outlet/update', 'OutletController@update');
Route::get('/outlet/destroy/{outlet_id}', 'OutletController@destroy');

//Manage Products Category
Route::get('/product/category/create', 'ProductsCategoryController@create');
Route::get('/product/category/show', 'ProductsCategoryController@index');
Route::post('/product/category/store', 'ProductsCategoryController@store');
Route::get('/product/category/edit/{product_category_id}', 'ProductsCategoryController@edit');
Route::post('/product/category/update', 'ProductsCategoryController@update');
Route::get('/product/category/destroy/{product_category_id}', 'ProductsCategoryController@destroy');

//Manage Products
Route::get('/products/create', 'ProductController@create');
Route::get('/products/show', 'ProductController@index');
Route::post('/products/store', 'ProductController@store');
Route::get('/products/edit/{product_id}', 'ProductController@edit');
Route::post('/products/update', 'ProductController@update');
Route::get('/products/destroy/{product_id}/{details_id}', 'ProductController@destroy');

Route::get('/products/import', 'ProductController@import');
Route::post('/product/import/save', 'ProductController@save');

//manage sell
Route::post('/products/payment', 'SellController@payment');       // sadhan need to check

//Manage Expense Category
Route::get('/expense/category/create', 'ExpenseCategoryController@create');
Route::get('/expense/category/show', 'ExpenseCategoryController@index');
Route::post('/expense/category/store', 'ExpenseCategoryController@store');
Route::get('/expense/category/edit/{expense_category_id}', 'ExpenseCategoryController@edit');
Route::post('/expense/category/update', 'ExpenseCategoryController@update');
Route::get('/expense/category/destroy/{expense_category_id}', 'ExpenseCategoryController@destroy');

//Manage Expense
Route::get('/expense/create', 'ExpenseController@create');
Route::get('/expense/show', 'ExpenseController@index');
Route::post('/expense/store', 'ExpenseController@store');
Route::get('/expense/edit/{expense_id}', 'ExpenseController@edit');
Route::post('/expense/update', 'ExpenseController@update');
Route::get('/expense/destroy/{expense_id}', 'ExpenseController@destroy');

//Manage Supplier
Route::get('/supplier/create', 'SupplierController@create');
Route::get('/supplier/show', 'SupplierController@index');
Route::post('/supplier/store', 'SupplierController@store');
Route::get('/supplier/edit/{supplier_id}', 'SupplierController@edit');
Route::post('/supplier/update', 'SupplierController@update');
Route::get('/supplier/destroy/{supplier_id}', 'SupplierController@destroy');

//Manage Customer
Route::get('/customer/create', 'CustomerController@create');
Route::get('/customer/show', 'CustomerController@index');
Route::post('/customer/store', 'CustomerController@store');
Route::get('/customer/edit/{customer_id}', 'CustomerController@edit');
Route::post('/customer/update', 'CustomerController@update');
Route::get('/customer/destroy/{customer_id}', 'CustomerController@destroy');

//Save by angular

Route::post('/customer-js/store', 'CustomerController@storeCustomer');
Route::post('/customer/get', 'CustomerController@getCustomer');

//Manage Vat
Route::get('/vat/create', 'VatController@create');
Route::get('/vat/show', 'VatController@index');
Route::post('/vat/store', 'VatController@store');
Route::get('/vat/edit/{vat_id}', 'VatController@edit');
Route::post('/vat/update', 'VatController@update');
Route::get('/vat/destroy/{vat_id}', 'VatController@destroy');

//Manage Products Discount
Route::get('/sell/discount/create', 'DiscountController@create');
Route::get('/sell/discount/show', 'DiscountController@index');
Route::post('/sell/discount/store', 'DiscountController@store');
Route::get('/sell/discount/edit/{discount_id}', 'DiscountController@edit');
Route::post('/sell/discount/update', 'DiscountController@update');
Route::get('/sell/discount/destroy/{discount_id}', 'DiscountController@destroy');

//Manage Unit
Route::get('/unit/create', 'UnitController@create');
Route::get('/unit/show', 'UnitController@index');
Route::post('/unit/store', 'UnitController@store');
Route::get('/unit/edit/{vat_id}', 'UnitController@edit');
Route::post('/unit/update', 'UnitController@update');
Route::get('/unit/destroy/{vat_id}', 'UnitController@destroy');

//Manage Purchase
Route::get('/purchase/create', 'PurchaseController@create');
Route::get('/purchase/show', 'PurchaseController@index');
Route::post('/purchase/store', 'PurchaseController@store');
Route::get('/purchase/edit/{purchase_id}', 'PurchaseController@edit');
Route::post('/purchase/update', 'PurchaseController@update');
Route::get('/purchase/destroy/{purchase_id}', 'PurchaseController@destroy');
Route::post('/purchase/search', 'PurchaseController@search');

//Manage Ingredient
Route::get('/ingredient/purchase/create', 'IngredientController@create');
Route::get('/ingredient/purchase/show', 'IngredientController@index');
Route::post('/ingredient/purchase/store', 'IngredientController@store');
Route::get('/ingredient/purchase/edit/{purchase_id}', 'IngredientController@edit');
Route::post('/ingredient/purchase/update', 'IngredientController@update');
Route::get('/ingredient/purchase/destroy/{purchase_id}', 'IngredientController@destroy');
Route::post('/ingredient/purchase/search', 'IngredientController@search');


//Manage Sells
Route::get('/sell/list', 'SellController@index');
Route::post('/sell/pay', 'SellController@duepay');
Route::post('/sell/search', 'SellController@search');
Route::get('/sells/details/{invoice}', 'SellController@show');
Route::get('/sells/payment/details/{invoice}', 'SellController@showPayments');
Route::get('/sells/delete/{invoice}/{id}', 'SellController@destroy');
Route::get('/sells/pos/{invoice}', 'SellController@posPrint');
Route::get('/sell/list/due', 'SellController@dueList');
Route::get('/sell/list/paid', 'SellController@paidList');


//Manage Stock
Route::get('/stock/create', 'StockController@create');
Route::get('/stock/show', 'StockController@show');
Route::post('/stock/store', 'StockController@store');

//
Route::get('/stock-history/show', 'StockHistoryController@show');


Route::get('/home', 'HomeController@index')->name('home');

//Manage POS
Route::get('/pos', 'PosController@index');

//Manage Report
Route::any('/report/profit/show', 'ReportController@profit');

Route::any('/report/sell', 'ReportController@sellReport');
Route::any('/report/sell/product', 'ReportController@sellByProductReport');
Route::any('/report/sell/salesman', 'ReportController@sellBySalesmanReport');
Route::any('/daily/report/show', 'ReportController@dailySellReport');
Route::any('/daily/report/profit/loss/show', 'ReportController@dailyProfitLoss');
Route::any('/current-week/report/profit/loss/show', 'ReportController@currentWeekProfitLoss');
Route::any('/current-month/report/profit/loss/show', 'ReportController@currentMonthProfitLoss');



//Manage Daily Sell
Route::get('/daily-sale', 'DailySaleController@index');

// Route::get('/daily-sale/product', 'DailySaleController@productView');

Route::get('/daily-sale/product/result', 'DailySaleController@productResult');
Route::get('/daily-sale/report', 'DailySaleController@report');
Route::get('/daily-sale/product/', 'DailySaleController@testproductView');
Route::any('/daily-sale/product/data', 'DailySaleController@testproductData');
Route::post('/daily-sale/product/data/update', 'DailySaleController@testproductDataUpdate');
Route::any('/daily-details/data', 'DailySaleController@dailyDetails');
Route::get('/daily-sale/report', 'DailySaleController@report');
// Route::get('/daily-sale/report', 'DailySaleController@report');


//Manage Sales-Man
Route::get('/sales-man/create', 'SalesManController@create');
Route::get('/sales-man/show', 'SalesManController@index');
Route::post('/sales-man/store', 'SalesManController@store');
Route::get('/sales-man/edit/{sales_man_id}', 'SalesManController@edit');
Route::post('/sales-man/update', 'SalesManController@update');
Route::get('/sales-man/destroy/{sales_man_id}', 'SalesManController@destroy');




//Manage Report
Route::get('/setting/shop', 'SettingController@shopSetting');
Route::get('/test', 'SettingController@test');

Route::get('/clear-cache', function() {

    return DB::table('stocks')->where('product_id',1)->decrement('quantity', 2);

    return DB::table('stocks')->where('product_id',1)->get();
    $exitCode = Artisan::call('cache:clear');



    $exitCode = Artisan::call('config:cache');

    $exitCode = Artisan::call('view:clear');


    $exitCode = Artisan::call('cache:clear');
    // return what you want
});


