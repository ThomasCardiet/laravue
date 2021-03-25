<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Models\Customer;
use App\Models\Project;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'customers' => [
                'all' => Customer::all(),
                'current_month' => Customer::whereMonth('created_at', '=', (new DateTime())->format('m'))
                                    ->get(),
                'last_month' => Customer::whereMonth('created_at', '=', (new DateTime())->format('m')-1)
                    ->get(),
            ],
            'projects' => [
                'all' => Project::all(),
                'current_month' => Project::whereMonth('created_at', '=', (new DateTime())->format('m'))
                    ->get(),
                'last_month' => Project::whereMonth('created_at', '=', (new DateTime())->format('m')-1)
                    ->get(),
            ],
        ]);
    })->name('dashboard');

    // CUSTOMERS
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');

    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');

    Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');

    Route::put('/customer', [CustomerController::class, 'store'])->name('customer.store');

    Route::put('/customer/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

    //PROJECTS
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');

    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');

    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');

    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');

    Route::put('/project', [ProjectController::class, 'store'])->name('project.store');

    Route::put('/project/delete', [ProjectController::class, 'delete'])->name('project.delete');

});
