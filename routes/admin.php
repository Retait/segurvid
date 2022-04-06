<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExportController;

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

Route::get('marketplace', function () {    return view('marketplace');})->name('marketplace');
Route::get('plugin', function () {    return view('plugin');})->name('plugin');
Route::get('report', function () {    return view('reports.show');})->name('report');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::post('profile/company', [ProfileController::class, 'company'])->name('profile.company');
Route::post('profile/photo', [ProfileController::class, 'photo'])->name('profile.photo');

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::put('contact/{id}/update', [ContactController::class, 'update'])->name('contact.update');
Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

Route::get('security', [SecurityController::class, 'index'])->name('security');
Route::post('pwd', [SecurityController::class, 'pwd'])->name('pwd');
Route::post('g2fa', [SecurityController::class, 'g2fa'])->name('g2fa');
Route::post('eg2fa', [SecurityController::class, 'eg2fa'])->name('eg2fa');
Route::post('dg2fa', [SecurityController::class, 'dg2fa'])->name('dg2fa');

Route::get('case', [CustomerController::class, 'index'])->name('case');
Route::post('case/store', [CustomerController::class, 'store'])->name('case.store');
Route::post('case/valid', [CustomerController::class, 'valid'])->name('case/valid');

Route::get('customer', [CustomerController::class, 'show'])->name('customer.show');
Route::post('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::put('customer/{id}/update', [CustomerController::class, 'update'])->name('customer.update');

Route::get('case/list', [OrderController::class, 'index'])->name('case.list');
Route::put('order/{id}/print', [OrderController::class, 'print'])->name('order.print');

Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice');
Route::post('invoice/store', [InvoiceController::class, 'store'])->name('invoice/store');
Route::post('invoice/test', [InvoiceController::class, 'test'])->name('invoice/test');
Route::post('invoice/{id}/sale', [InvoiceController::class, 'sale'])->name('invoice.sale');

Route::get('export/customer', [ExportController::class, 'ecustomer'])->name('export.customer');