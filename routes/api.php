<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Package\PackageController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Finance\Invoice\InvoiceController;
use App\Http\Controllers\Work\Project\ProjectController;
use App\Http\Controllers\Work\Milestone\MilestoneController;
use App\Http\Controllers\Auth\SignInController;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//packages api
Route::get('/all-packages', [PackageController::class, 'apiIndex']);
// // Order api
// Route::post('/add-new-orders', [OrderController::class, 'apiStore']);
// // Invoice
// Route::get('/invoices', [InvoiceController::class, 'apiIndex']);
// //Project
// Route::get('/projects', [ProjectController::class, 'apiIndex']);
// //Milestone
// Route::get('/milestones', [MilestoneController::class, 'apiIndex']);
//clientProjects
Route::get('/client-projects', [ProjectController::class, 'apiClientProjects']);
//milestoneclient
Route::get('/client-milestones', [MilestoneController::class, 'apiClientMilestones']);
//invoiceClient
Route::get('/client-invoices', [InvoiceController::class, 'apiClientInvoices']);
//signIN
Route::post('/login', [SignInController::class, 'apiLogin']);
//admin
Route::post('/admin/logout', [SignInController::class, 'apiAdminLogout']);
//employee
Route::post('/employee/logout', [SignInController::class, 'apiEmployeeLogout']);
//client
Route::post('/client/logout', [SignInController::class, 'apiClientLogout']);
