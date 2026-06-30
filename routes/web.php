<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignListController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
});


// create route for donor list crud
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::resource('donorlist', DonorListController::class);
    Route::resource('campaignlist', CampaignListController::class);
});

require __DIR__ . '/auth.php';
