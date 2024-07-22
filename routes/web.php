<?php

use App\Http\Controllers\AboutControlller;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FranchisesController;
use App\Http\Controllers\Admin_State;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Models\Testimonial;

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
Route::get('units/{units}', [Home_Controller::class, 'Units'])->name('home.Units');
// Route::get('centers/maharastra', 'App\Http\Controllers\Home_Controller@state');
Route::get('/login', [Home_Controller::class, 'login'])->name('home.login');
Route::get('/forgot_password', [Home_Controller::class, 'forgot_password'])->name('home.forgot_password');

Route::get('admin/dashboard', [Home_Controller::class, 'AdminDashboard'])->name('admin.dashboard');
// Route::get('state/dashboard', [Home_Controller::class, 'StateDashboard'])->name('admin.state');
Route::get('center/dashboard', [Home_Controller::class, 'CenterDashboard'])->name('admin.center');



Route::post('/contact_us', [Home_Controller::class, 'ContactUs'])->name('admin.contact_us');
Route::post('/franchise_enquiry', [Home_Controller::class, 'enquiryForm'])->name('admin.enquiry');

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
// Route::delete('admin/delete_states', [Admin_State::class,'delete_state'])->name('state.delete');
Route::delete('admin/delete', [Admin_State::class,'delete_state'])->name('state.delete');

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
Route::get('admin/units', [Home_Controller::class, 'getUnitsData'])->name('getUnits');

// Banners

Route::get('admin/banner',[BannerController::class,'index'])->name('admin.index');
Route::post('admin/add_Banner',[BannerController::class,'addBanner'])->name('admin.add');
Route::get('admin/checkAddBannerName/{name}', [BannerController::class,'checkAddBannerName'])->name('addBannerName');
Route::get('admin/checkEditBannerName/{id}/{name}', [BannerController::class,'checkEditBannerName'])->name('editBannerName');
Route::get('admin/checkAddBannerPosition/{name}', [BannerController::class,'checkAddBannerPosition'])->name('checkBannerPosition');
Route::get('admin/checkEditBannerPosition/{id}/{name}', [BannerController::class,'checkEditBannerPosition'])->name('editBannerName');


    // Update 
Route::get('admin/editBannerData',[BannerController::class,'editBannerData']);
Route::post('admin/bannerEdit',[BannerController::class,'bannerUpdate'])->name('BannerUpdate');
// Delete
Route::get('admin/bannerDelete/{id}','App\Http\Controllers\Admin_Banner_Controller@bannerDelete');
// status
Route::get('admin/bannerstatus/{id}', 'App\Http\Controllers\Admin_Banner_Controller@Status');
Route::get('admin/bannerDelete/{id}', 'App\Http\Controllers\BannerController@bannerDelete');

// Banner Validation START

// About_us

Route::get('admin/about', [AboutControlller::class,'index'])->name('about.index');
Route::post('admin/about/store', [AboutControlller::class,'store'])->name('about.store');
Route::get('admin/get_about_data', [AboutControlller::class,'getAboutData'])->name('about.AboutData');
Route::post('admin/about/update', [AboutControlller::class,'update'])->name('about.update');
Route::delete('admin/about/delete', [AboutControlller::class,'delete'])->name('about.delete');

// Gallery

Route::get('admin/gallery',[GalleryController::class,'index'])->name('admin.gallery');
Route::post('admin/gallery/store',[GalleryController::class,'store'])->name('admin.galleryStore');
Route::put('admin/gallery/update',[GalleryController::class,'update'])->name('admin.galleryUpdate');
Route::delete('admin/gallery/delete',[GalleryController::class,'delete'])->name('admin.galleryUpdate');
Route::get('admin/galleryData',[GalleryController::class,'getGalleryData'])->name('admin.galleryData');

// Testimonial
Route::get('admin/testimonial',[TestimonialController::class,'index'])->name('admin.testimonials');
Route::post('admin/testimonial/store',[TestimonialController::class,'store'])->name('admin.testimonialStore');
Route::put('admin/testimonial/update',[TestimonialController::class,'update'])->name('admin.testimonialUpdate');
Route::delete('admin/testimonial/delete',[TestimonialController::class,'delete'])->name('admin.testimonialDelete');
Route::get('admin/testimonial_id',[TestimonialController::class,'getDataTestimonial'])->name('admin.getTestimonialData');

// Events
Route::get('admin/events',[EventController::class,'index'])->name('admin.events');
Route::post('admin/events/store',[EventController::class,'store'])->name('admin.eventStore');
Route::put('admin/events/update',[EventController::class,'update'])->name('admin.eventUpdate');
Route::delete('admin/events/delete',[EventController::class,'delete'])->name('admin.eventDelete');
Route::get('admin/eventEdit',[EventController::class,'getEventData'])->name('admin.eventData');


// Our Team

Route::get('admin/our_team',[TeamController::class,'index'])->name('admin.team');
Route::post('admin/our_team/store',[TeamController::class,'store'])->name('admin.teamStore');
Route::get('admin/our_team_id',[TeamController::class,'getTeamData'])->name('admin.teamData');
Route::put('admin/our_team/update',[TeamController::class,'update'])->name('admin.teamUpdate');
Route::delete('admin/our_team/delete',[TeamController::class,'delete'])->name('admin.teamDelete');

// Request

Route::get('admin/request',[RequestController::class,'index'])->name('admin.request');
Route::get('admin/request/preview',[RequestController::class,'preview'])->name('admin.request.preview');
Route::post('admin/approval_or_reject',[RequestController::class,'approvalOrReject'])->name('admin.request.approval');
Route::post('admin/reject_reason',[RequestController::class,'rejectReason'])->name('admin.request.reject-reason');
Route::delete('admin/request/delete',[RequestController::class,'delete'])->name('admin.request.delete');