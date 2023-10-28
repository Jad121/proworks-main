<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\AuthMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect("country/list");
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/index', function () {
    return view('admin.index');
});


// Login Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login',  [AuthController::class, 'login']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//dashboard -admin
// Route::get('/dashboard',[AdminController::class,'index']);
// Route::get('/dashboard/table/{tablename}', [AdminController::class, 'getTable']);
// Route::delete('/dashboard/table/{tablename}/{id}', [AdminController::class, 'delete'])->name('admin.delete');
// Route::put('/dashboard/{tablename}/{id}/edit', [AdminController::class, 'updateRecord'])->name('editRecord');
// Route::post('/dashboard/addRecord/{tablename}',[AdminController::class,'addRecord'])->name('addRecord');


Route::group(['middleware' => AuthMiddleware::class], function () {

    //Country
    Route::get('/country/list', [CountryController::class, 'list'])->name('country.list');
    Route::get('/country/get', [CountryController::class, 'getAll'])->name('country.getAll');
    Route::get('/country/form/copy/{id}', [CountryController::class, 'copy'])->name('country.form');
    Route::get('/country/form/{id?}', [CountryController::class, 'form'])->name('country.form');
    Route::post('/country/add', [CountryController::class, 'addRecord'])->name('country.add');
    Route::post('/country/update/{recordId}', [CountryController::class, 'updateRecord'])->name('country.update');
    Route::post('/country/delete', [CountryController::class, 'deleteRecord'])->name('country.delete');

//Users

Route::get('/user/get', [UserController::class, 'getAll'])->name('user.getAll');
Route::get('/user/list', [UserController::class, 'list']);
Route::get('/getUsers', [UserController::class, 'getAll']);
Route::get('/users/form/{id?}', [UserController::class, 'form'])->name('users.form');
Route::post('/users/submit', [UserController::class, 'submitForm'])->name('users.submit');
Route::post('/users/add', [UserController::class, 'addRecord'])->name('users.add');
Route::post('/users/update/{recordId}', [UserController::class, 'updateRecord'])->name('users.update');
Route::post('/users/delete', [UserController::class, 'deleteRecord'])->name('users.delete');

//Company
Route::get('/company/list', [CompanyController::class, 'list'])->name('company.list');
Route::get('/company/get', [CompanyController::class, 'getAll'])->name('company.getAll');
Route::get('/company/form/{id?}', [CompanyController::class, 'form'])->name('company.form');
Route::post('/company/add', [CompanyController::class, 'addRecord'])->name('company.add');
Route::post('/company/update/{recordId}', [CompanyController::class, 'updateRecord'])->name('company.update');
Route::post('/company/delete', [CompanyController::class, 'deleteRecord'])->name('company.delete');


//Sevice
Route::get('/service/get', [ServiceController::class, 'getAll']);
Route::get('/service/list', [ServiceController::class, 'list']);
Route::get('/service/form/{id?}', [ServiceController::class, 'form'])->name('service.form');
Route::post('/service/submit', [ServiceController::class, 'submitForm'])->name('service.submit');
Route::post('/service/add', [ServiceController::class, 'addRecord'])->name('service.add');
Route::post('/service/update/{recordId}', [ServiceController::class, 'updateRecord'])->name('service.update');
Route::post('/service/delete', [ServiceController::class, 'deleteRecord'])->name('service.delete');

//Status
Route::get('/status/get', [StatusController::class, 'getAll']);
Route::get('/status/list', [StatusController::class, 'list']);
Route::get('/status/form/{id?}', [StatusController::class, 'form'])->name('status.form');
Route::post('/status/submit', [StatusController::class, 'submitForm'])->name('status.submit');
Route::post('/status/add', [StatusController::class, 'addRecord'])->name('status.add');
Route::post('/status/update/{recordId}', [StatusController::class, 'updateRecord'])->name('status.update');
Route::post('/status/delete', [StatusController::class, 'deleteRecord'])->name('status.delete');

//Employee
Route::get('/employee/get', [EmployeeController::class, 'getAll']);
Route::get('/employee/list', [EmployeeController::class, 'list']);
Route::get('/employee/form/{id?}', [EmployeeController::class, 'form'])->name('employee.form');
Route::post('/employee/submit', [EmployeeController::class, 'submitForm'])->name('employee.submit');
Route::post('/employee/add', [EmployeeController::class, 'addRecord'])->name('employee.add');
Route::post('/employee/update/{recordId}', [EmployeeController::class, 'updateRecord'])->name('employee.update');
Route::post('/employee/delete', [EmployeeController::class, 'deleteRecord'])->name('employee.delete');
Route::get('/getSelect', [EmployeeController::class, 'getSelect']);
//User 

// Route::post('/ws_user/addRecord',[WS_UserController::class,'addRecord']);
// Route::post('/ws_user/updateRecord/{recordId}',[WS_UserController::class,'UpdateRecord'])-;
//Route::delete('/ws_user/deleteRecord/{recordId}',[WS_UserController::class,'deleteRecord']);



Route::get('/getCountries', [UserController::class, 'getAllCountries']);
Route::get('/test', function () {

    return view("layouts.dashboard");
});


});


