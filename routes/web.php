<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Route::get('/profile-form', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/discover', [PostController::class, 'view'])->name('discover');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profiles', [ProfileController::class, 'show'])->name('profiles');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/form', [PostController::class, 'index'])->name('form');
    Route::post('/form', [PostController::class, 'store'])->name('form.store');
});

Route::get('/user/{id}', [ProfileController::class, 'show'])->name('user.show');


require __DIR__.'/auth.php';


