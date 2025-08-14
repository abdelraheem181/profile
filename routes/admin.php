<?php



use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\ContactsController;
use App\Models\Contact;
use App\Models\Education;                                         
use App\Models\Experience;
use Illuminate\Support\Facades\Route;


Route::middleware('auth.session')
    ->as('admin.')
    ->group(function () {

        Route::get('/' , [DashboardController::class,'index'])->name('dashboard');

        
      Route::controller(ProjectController::class)
      ->prefix('projects')
      ->as('projects.')
      ->group(function () {
            Route::get('/',  'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{project}/edit', 'edit')->name('edit');
            Route::post('/{project}', 'update')->name('update');
            Route::delete('/{project}', 'destroy')->name('destroy');
            Route::get('/{project}/show', 'show')->name('show');
            // Add other admin routes here
      });

     Route::controller(ExperienceController::class)
      ->prefix('experiences')
      ->as('experiences.')
      ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{experience}/edit', 'edit')->name('edit');
            Route::post('/{experience}', 'update')->name('update');
            Route::delete('/{experience}', 'destroy')->name('destroy');
            Route::get('/{experience}/show', 'show')->name('show');
      });

      Route::controller(EducationController::class)
      ->prefix('educations')
      ->as('educations.')
      ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{education}/edit', 'edit')->name('edit');
            Route::post('/{education}', 'update')->name('update');
            Route::delete('/{education}', 'destroy')->name('destroy');
            Route::get('/{education}/show', 'show')->name('show');
      });

      Route::controller(SkillController::class)
      ->prefix('skills')
      ->as('skills.')
      ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{skill}/edit', 'edit')->name('edit');
            Route::post('/{skill}', 'update')->name('update');
            Route::delete('/{skill}', 'destroy')->name('destroy');
            Route::get('/{skill}/show', 'show')->name('show');
            
      });

      Route::controller(LanguageController::class)
      ->prefix('languages')
      ->as('languages.')
      ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{language}/edit', 'edit')->name('edit');
            Route::post('/{language}', 'update')->name('update');
            Route::delete('/{language}', 'destroy')->name('destroy');
            Route::get('/{language}/show', 'show')->name('show'); 

      });

      Route::controller(ContactsController::class)
      ->prefix('contacts')
      ->as('contacts.')
      ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{contact}/show', 'show')->name('show');  
            Route::delete('/{contact}', 'destroy')->name('destroy');
            Route::get('/{contact}/edit', 'edit')->name('edit');

      });


    });


// ----------------------------------- Admin  ---------------------------------------

  
