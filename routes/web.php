<?php

use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\ContactsController;    
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\ContactsController as ControllersContactsController;
use App\Http\Controllers\ProjectsController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/', function () {
    return view('website.home');
})->name('home.index');   


Route::get('/resume', [ExperiencesController::class, 'index'])->name('resume.index');       

Route::get('/contact', function () {
    return view('website.contact');
})->name('contact.index');

Route::post('/contact', [ControllersContactsController::class, 'store'])->name('contact.store');


Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
    




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
