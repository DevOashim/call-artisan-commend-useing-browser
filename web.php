<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/cmd', 'cmd')
->name('cmd');
Route::post('custom', function (Request $request) {
    if (isset($request->name)) {
        Artisan::call($request->name);
    } elseif(isset($request->make)) {
        $make = 'make:'.$request->make;
        Artisan::call($make);
    }else{
        return redirect()->back()->with('status','Please enter commend');
    }
    return redirect()->back()->with('status',Artisan::output());
    
})->name('customCmd');
Route::get('/cmd/{commend}', function ($commend) {
    Artisan::call($commend);
    return redirect()->back()->with('status',Artisan::output());
})->name('cmd.call');
