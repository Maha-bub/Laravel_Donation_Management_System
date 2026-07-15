<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignListController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorListController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\VolunteerManageController;
use Illuminate\Support\Facades\Route;



// NOTE: this used to also be registered on '/', which silently swallowed the
// public homepage route below (guests hitting '/' were redirected to /login).
// It's kept only because a few Breeze auth controllers redirect to
// route('dashboard') as a generic fallback.
Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// route for projects navigation
Route::prefix('projects')->name('projects.')->group(function () {

    Route::get('/school-bags', [FrontendController::class, 'schoolBags'])->name('school-bags');

    Route::get('/build-masjid', [FrontendController::class, 'buildMasjid'])->name('build-masjid');

    Route::get('/donate-house', [FrontendController::class, 'donateHouse'])->name('house');

    Route::get('/donate-quran', [FrontendController::class, 'donateQuran'])->name('quran');

    Route::get('/emergency-aid', [FrontendController::class, 'emergencyAid'])->name('emergency-aid');

    Route::get('/feed-daily', [FrontendController::class, 'feedDaily'])->name('feed-daily');

    Route::get('/tubewell', [FrontendController::class, 'tubewell'])->name('tubewell');

    Route::get('/healing-bangladesh', [FrontendController::class, 'healingBangladesh'])->name('healing');

    Route::get('/income-generating', [FrontendController::class, 'incomeGenerating'])->name('income-generating');

    Route::get('/sponsored-yateem', [FrontendController::class, 'sponsoredYateem'])->name('yateem');
});

Route::get('/our-campaigns', [FrontendController::class, 'campaigns'])->name('campaigns.index');
Route::get('/our-campaigns/{campaign}', [FrontendController::class, 'campaignShow'])->name('campaigns.show');

Route::get('/donation', [FrontendController::class, 'donation'])->name('donation');
Route::post('/donation', [FrontendController::class, 'storeDonation'])->name('donation.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// create route for admin Dashboard
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('donorlist', DonorListController::class);
    Route::post('donorlist/{donorlist}/donations', [DonorListController::class, 'storeDonation'])
        ->name('donorlist.donations.store');

    Route::resource('campaignlist', CampaignListController::class);
    Route::put('campaignlist/{id}/restore', [CampaignListController::class, 'restore'])
        ->name('campaignlist.restore')->withTrashed();
    Route::delete('campaignlist/{id}/force-delete', [CampaignListController::class, 'forceDelete'])
        ->name('campaignlist.forceDelete')->withTrashed();


        
    Route::resource('volunteerlist', VolunteerManageController::class);
    Route::resource('donations', DonationsController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('settings', SettingController::class)->except(['show']);
});


Route::middleware(['auth', 'role:donor'])->group(function () {
    Route::get('/donor/dashboard', [DonorController::class, 'dashboard'])->name('donor.dashboard');
});

Route::middleware(['auth', 'role:volunteer'])->group(function () {
    Route::get('/volunteer/dashboard', [VolunteerController::class, 'dashboard'])->name('volunteer.dashboard');

    // volunteer's own profile & password management
    Route::get('/volunteer/profile', [VolunteerController::class, 'profile'])->name('volunteer.profile');
    Route::get('/volunteer/profile/edit', [VolunteerController::class, 'editProfile'])->name('volunteer.profile.edit');
    Route::put('/volunteer/profile', [VolunteerController::class, 'updateProfile'])->name('volunteer.profile.update');
    Route::put('/volunteer/password', [VolunteerController::class, 'updatePassword'])->name('volunteer.password.update');
});





require __DIR__ . '/auth.php';
