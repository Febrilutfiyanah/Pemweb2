<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function() {
    return view('web.homepage');
});


Route::get('/product', function() {
    return view('web.productpage');
});

Route::get('product/{slug}', function($slug){
    return "halaman single product - ".$slug;
   });
   

Route::get('/kategori', function() {
    return view('web.kategoripage');
});

Route::get('kategori/{slug}', function($slug) {
    return "halaman single kategori - ".$slug;
});
Route::get('cart', function() {
    return "halaman cart";
});

Route::get('checkout', function() {
    return "halaman checkout";
});
   
   

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
