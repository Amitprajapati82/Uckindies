<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FranchisesController;

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

Route::get('/', [Home_Controller::class, 'index'])->name('home.index');
Route::get('/about', [Home_Controller::class, 'about'])->name('home.about');
Route::get('/appointment', [Home_Controller::class, 'appointment'])->name('home.appointment');
Route::get('/call_to_action', [Home_Controller::class, 'callToAction'])->name('home.callToAction');
Route::get('/classes', [Home_Controller::class, 'classes'])->name('home.classes');

Route::get('/contact', [ContactUsController::class, 'contact'])->name('home.contact');
Route::post('/contactform_submit', [ContactUsController::class, 'create'])->name('home.contactform_submit');
// Route::get('/contact', [ContactUsController::class, 'create'])->name('contact.form');



Route::get('/facility', [Home_Controller::class, 'facility'])->name('home.facility');
Route::get('/team', [Home_Controller::class, 'team'])->name('home.team');
Route::get('/testimonial', [Home_Controller::class, 'testimonial'])->name('home.testimonial');
Route::get('/404', [Home_Controller::class, 'not_found'])->name('home.404');
Route::get('/gallery', [Home_Controller::class, 'gallery'])->name('home.gallery');

Route::get('/franchise', [Home_Controller::class, 'franchise'])->name('home.franchise');
Route::get('/enrollment', [Home_Controller::class, 'enrollment'])->name('home.enrollment');
Route::post('/franchiseform_submit', [FranchisesController::class, 'create'])->name('home.franchiseform_submit');

Route::get('/centers', [Home_Controller::class, 'centers'])->name('home.centers');
Route::get('/awards', [Home_Controller::class, 'awards'])->name('home.awards');
Route::get('/join_us', [Home_Controller::class, 'join_us'])->name('home.join_us');
Route::get('states/{state}', [Home_Controller::class, 'state'])->name('home.states');
// Route::get('centers/maharastra', 'App\Http\Controllers\Home_Controller@state');
Route::get('/login', [Home_Controller::class, 'login'])->name('home.login');
Route::get('/forgot_password', [Home_Controller::class, 'forgot_password'])->name('home.forgot_password');

Route::get('admin/dashboard', [Home_Controller::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('state/dashboard', [Home_Controller::class, 'StateDashboard'])->name('admin.state');
Route::get('center/dashboard', [Home_Controller::class, 'CenterDashboard'])->name('admin.center');

// Route::group(['middleware' => ['auth:admin', 'check.role:admin']], function () {
//     Route::get('admin/dashboard', [Home_Controller::class, 'AdminDashboard'])->name('admin.dashboard'); // Routes accessible only to admin
// });
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('admin/dashboard', [Home_Controller::class, 'AdminDashboard'])->name('admin.dashboard');
// });
// Route::middleware(['auth', 'role:state'])->group(function () {
//     Route::get('state/dashboard', [Home_Controller::class, 'StateDashboard'])->name('admin.state');
// });
// Route::middleware(['auth', 'role:center'])->group(function () {
//     Route::get('center/dashboard', [Home_Controller::class, 'CenterDashboard'])->name('admin.center');
// });

// Route::middleware(['auth::admin'])->group(function () {
//     Route::get('admin/dashboard', [Home_Controller::class, 'AdminDashboard'])->name('admin.dashboard')->middleware('role:Admin');
//     Route::get('state/dashboard', [Home_Controller::class, 'StateDashboard'])->name('admin.state')->middleware('role:State');
//     Route::get('center/dashboard', [Home_Controller::class, 'CenterDashboard'])->name('admin.center')->middleware('role:Center');
// });
// Route::get('admin/dashboard', [Home_Controller::class, 'dashboard'])->name('admin.dashboard');

//Login 
Route::post('submit_login','App\Http\Controllers\login_controller@login')->name('login');
Route::post('admin_logout','App\Http\Controllers\login_controller@admin_logout')->name('logout');


// ============= ###### States ###### ==================================================

// view
Route::get('admin/states', 'App\Http\Controllers\Admin_State@view')->name('state.states');
// add
Route::post('admin/add_state', 'App\Http\Controllers\Admin_State@add')->name('state.add');
// Update 
Route::post('admin/update_state', 'App\Http\Controllers\Admin_State@update')->name('state.update');
// get
Route::get('admin/get_state/{id}', 'App\Http\Controllers\Admin_State@get')->name('state.get');
// status
Route::get('admin/status_state/{id}', 'App\Http\Controllers\Admin_State@status')->name('state.status');
// delete
Route::get('admin/delete_state/{id}', 'App\Http\Controllers\Admin_State@delete_state')->name('state.delete');

// ADD validation
Route::get('admin/checkAddStateName/{name}','App\Http\Controllers\Admin_State@checkadd');
// Edit validation
Route::get('admin/checkEditStateName/{id}/{name}','App\Http\Controllers\Admin_State@checkedit');



// ============= ###### Address ###### ==================================================

// view
Route::get('admin/address', 'App\Http\Controllers\Admin_Address@view')->name('address.address');
// add
Route::post('admin/add_address', 'App\Http\Controllers\Admin_Address@add')->name('address.add');
// Update 
Route::post('admin/update_address', 'App\Http\Controllers\Admin_Address@update')->name('address.update');
// get
Route::get('admin/get_address/{id}', 'App\Http\Controllers\Admin_Address@get')->name('address.get');
// status
Route::get('admin/status_address/{id}', 'App\Http\Controllers\Admin_Address@status')->name('address.status');
// delete
Route::get('admin/delete_address/{id}', 'App\Http\Controllers\Admin_Address@delete_address')->name('address.delete');

// // ADD validation
// Route::get('admin/checkAddAddressName/{name}','App\Http\Controllers\Admin_Address@checkadd');
// // Edit validation
// Route::get('admin/checkEditAddressName/{id}/{name}','App\Http\Controllers\Admin_Address@checkedit');
// routes/web.php
Route::get('/getBranche', [Home_Controller::class, 'getBranches'])->name('getbranches');


