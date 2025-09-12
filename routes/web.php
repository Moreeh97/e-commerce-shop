<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Mail\WelcomeEmail;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','can:access-admin-panel'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/products', [AdminController::class,'products'])->name('products');
    Route::get('/categories', [AdminController::class,'categories'])->name('categories');
});

require __DIR__.'/auth.php';


Route::get('/test-mail', function () {
    $user = User::first(); 
    $data = ['name'=>$user->name,'email'=>$user->email];
    Mail::to($user->email)->send(new \App\Mail\WelcomeEmail($data));
    return 'Mail sent';
});

Route::get('/test-notify', function () {
    $admin = User::where('is_admin', true)->first();
    if (!$admin) return 'No admin user';
    $admin->notify(new \App\Notifications\NewOrderNotification(['id'=>123,'amount'=>99.99]));
    return 'Notification sent';
});