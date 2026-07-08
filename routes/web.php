<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignListController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\VolunteerManageController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
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


// create route for donor list crud
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('donorlist', DonorListController::class);
    Route::resource('campaignlist', CampaignListController::class);
    Route::resource('volunteerlist', VolunteerManageController::class);
    Route::resource('donations', DonationsController::class);
});

require __DIR__ . '/auth.php';
