<?php

use App\Http\Controllers\Client\ClientDashController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Finance\Sale\SaleController;
use App\Http\Controllers\HR\Appreciation\AppreciationController;
use App\Http\Controllers\HR\Designation\DesignationController;
use App\Http\Controllers\HR\Holiday\HolidayController;


use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\TeamController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ServiceController;


use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\FAQController;
use App\Http\Controllers\Public\TestimonialController;
use App\Http\Controllers\Public\PortfolioController;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Finance\Bank\BankController;
use App\Http\Controllers\Finance\Expense\ExpenseController;
use App\Http\Controllers\Finance\Invoice\InvoiceController;
use App\Http\Controllers\Finance\Proposal\ProposalController;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\ForgetController;

use App\Http\Controllers\Lead\LeadController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Package\PackageController;


use App\Http\Controllers\HR\Employee\EmployeeController;
use App\Http\Controllers\HR\Attendance\AttendanceController;
use App\Http\Controllers\HR\Leave\LeaveController;
use App\Http\Controllers\HR\Department\DepartmentController;

use App\Http\Controllers\Work\Task\TaskController;
use App\Http\Controllers\Work\Milestone\MilestoneController;
use App\Http\Controllers\Work\Project\ProjectController;

use App\Http\Controllers\Report\TaskReport\TaskReportController;
use App\Http\Controllers\Report\TimeLogReport\TimeLogReportController;
use App\Http\Controllers\Report\FinanceReport\FinanceReportController;
use App\Http\Controllers\Report\IncomeExpenseReport\IncomeExpenseReportController;
use App\Http\Controllers\Report\ExpenseReport\ExpenseReportController;
use App\Http\Controllers\Report\IncomeReport\IncomeReportController;
use App\Http\Controllers\Report\LeaveReport\LeaveReportController;
use App\Http\Controllers\Report\AttendenceReport\AttendenceReportController;
use App\Http\Controllers\Report\SaleReport\SaleReportController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\Quotation\QuotationController;



// main
Route::get('/', function () {
    return view('public.index');
})->name('home');

// contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// team
Route::get('/team', [TeamController::class, 'index'])->name('team');

// about
Route::get('/about', [AboutController::class, 'index'])->name('about');

// services
Route::get('/service', [ServiceController::class, 'index'])->name('services');
Route::get('/service-details', [ServiceController::class, 'serviceDetails'])->name('service_details');

// packages
Route::get('/packages', [PackageController::class, 'publicIndex'])->name('packages');
Route::get('/packages-details', [PackageController::class, 'packagesDetails'])->name('packages-details');

// Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio-details/{id}', [PortfolioController::class, 'portfolioDetails'])->name('portfolio_details');



Route::get('/portfolio/all-portfolio', [PortfolioController::class, 'showAdminAllPortfolio'])->name('portfolio.all-portfolio');
Route::get('/portfolio/add-portfolio', [PortfolioController::class, 'addAdminPortfolio'])->name('portfolio.add-portfolio');
Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/portfolio/edit-portfolio/{id}', [PortfolioController::class, 'editAdminPortfolio'])->name('portfolio.edit-portfolio');
Route::put('/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
Route::delete('/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
Route::get('/portfolio/export-pdf', [PortfolioController::class, 'exportPdf'])->name('portfolio.export-pdf');
Route::get('/portfolio/export-csv', [PortfolioController::class, 'exportExcel'])->name('portfolio.export-csv');

// blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog-details', [BlogController::class, 'blogDetails'])->name('blog_details');

// faq
Route::get('/faq', [FAQController::class, 'index'])->name('faq');

// testimonial
Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');


// Admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('admin')->name('admin.dashboard');

// Show sign-up form
Route::get('/sign-up', [SignUpController::class, 'index'])->name('auth.sign-up');

// Show sign-in form
Route::get('/sign-in', [SignInController::class, 'index'])->name('auth.sign-in');

// Forget password form
Route::get('/forget', [ForgetController::class, 'index'])->name('auth.forget');

// Process login
Route::post('/login', [SignInController::class, 'login'])->name('auth.login');

// Admin logout
Route::get('/logoutadmin', [SignInController::class, 'adminLogout'])->middleware('admin')->name('adminlogout');

// Client logout
Route::get('/logoutclient', [SignInController::class, 'clientLogout'])->middleware('client')->name('clientlogout');

// Employee logout
Route::get('/logoutemployee', [SignInController::class, 'employeeLogout'])->middleware('employee')->name('employeelogout');


// Lead routes
Route::get('/lead/all-lead', [LeadController::class, 'index'])->middleware('admin')->name('lead.all-lead');
Route::get('/lead/add-lead', [LeadController::class, 'add'])->middleware('admin')->name('lead.add-lead');
Route::get('/lead/edit-lead/{id}', [LeadController::class, 'edit'])->middleware('admin')->name('lead.edit-lead');
Route::post('/lead/store', [LeadController::class, 'store'])->middleware('admin')->name('lead.store');
Route::put('/lead/update/{id}', [LeadController::class, 'update'])->middleware('admin')->name('lead.update');
Route::delete('/lead/delete/{id}', [LeadController::class, 'destroy'])->middleware('admin')->name('lead.delete');
Route::get('/lead/view-lead/{id}', [LeadController::class, 'show'])->middleware('admin')->name('lead.view-lead');
Route::post('/lead/convert-to-client/{id}', [LeadController::class, 'convertToClient'])->middleware('admin')->name('lead.convert-to-client');
Route::patch('/leads/{id}/status', [LeadController::class, 'updateStatus'])->middleware('admin')->name('lead.update-status');
Route::get('/leads/export-csv', [LeadController::class, 'exportCsv'])->middleware('admin')->name('lead.export-csv');
Route::get('/leads/export-pdf', [LeadController::class, 'exportPdf'])->middleware('admin')->name('lead.export-pdf');


//Client
// Display all clients
Route::get('/client/all-client', [ClientController::class, 'index'])->middleware('admin')->name('client.all-client');
Route::get('/client/add-client', [ClientController::class, 'add'])->middleware('admin')->name('client.add-client');
Route::post('/client/store-client', [ClientController::class, 'store'])->middleware('admin')->name('client.store-client');
Route::get('/client/edit-client/{id}', [ClientController::class, 'edit'])->middleware('admin')->name('client.edit-client');
Route::put('/client/update-client/{id}', [ClientController::class, 'update'])->middleware('admin')->name('client.update-client');
Route::delete('/client/delete/{id}', [ClientController::class, 'destroy'])->middleware('admin')->name('client.delete-client');
Route::get('/clients/export-csv', [ClientController::class, 'exportCsv'])->middleware('admin')->name('client.export-csv');
Route::get('/clients/export-pdf', [ClientController::class, 'exportPdf'])->middleware('admin')->name('client.export-pdf');
Route::get('/client/contact/all-contact', [ClientController::class, 'showContact'])->middleware('admin')->name('client.contact.all-contact');

//Order
Route::get('/order/all-order', [OrderController::class, 'index'])->middleware('admin')->name('order.all-order');
Route::get('/order/add-order', [OrderController::class, 'add'])->middleware('admin')->name('order.add-order');
Route::get('/order/edit-order', [OrderController::class, 'edit'])->middleware('admin')->name('order.edit-order');
Route::post('/order/store', [OrderController::class, 'store'])->middleware('admin')->name('order.store');
Route::get('/orders/export-csv', [OrderController::class, 'exportCsv'])->middleware('admin')->name('order.export-csv');
Route::get('/orders/export-pdf', [OrderController::class, 'exportPdf'])->middleware('admin')->name('order.export-pdf');

//Package
Route::get('/package/all-package', [PackageController::class, 'index'])->middleware('admin')->name('package.all-package');
Route::get('/package/add-package', [PackageController::class, 'add'])->middleware('admin')->name('package.add-package');
Route::post('/package/store', [PackageController::class, 'store'])->middleware('admin')->name('package.store');
Route::get('/package/{id}/edit-package', [PackageController::class, 'edit'])->middleware('admin')->name('package.edit-package');
Route::put('/package/{id}/update', [PackageController::class, 'update'])->middleware('admin')->name('package.update');
Route::delete('/package/delete/{id}', [PackageController::class, 'destroy'])->middleware('admin')->name('package.delete-package');
Route::get('/packages/export-csv', [PackageController::class, 'exportCsv'])->middleware('admin')->name('package.export-csv');
Route::get('/packages/export-pdf', [PackageController::class, 'exportPdf'])->middleware('admin')->name('package.export-pdf');

//HR
//HR//Employee
Route::get('/employee/all-employee', [EmployeeController::class, 'index'])->middleware('admin')->name('employee.all-employee');
Route::get('/employee/add-employee', [EmployeeController::class, 'add'])->middleware('admin')->name('employee.add-employee');
Route::post('/employee/store', [EmployeeController::class, 'store'])->middleware('admin')->name('employee.store');
Route::get('/employee/edit-employee/{id}', [EmployeeController::class, 'edit'])->middleware('admin')->name('employee.edit-employee');
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->middleware('admin')->name('employee.update');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->middleware('admin')->name('employee.delete');
Route::get('/employees/export-csv', [EmployeeController::class, 'exportCsv'])->middleware('admin')->name('employee.export-csv');
Route::get('/employees/export-pdf', [EmployeeController::class, 'exportPdf'])->middleware('admin')->name('employee.export-pdf');

//HR//Attendance
Route::get('/attendance/all-attendance', [AttendanceController::class, 'index'])->name('attendance.all-attendance');
Route::get('/attendance/add-attendance', [AttendanceController::class, 'add'])->name('attendance.add-attendance');
Route::get('/attendance/edit-attendance', [AttendanceController::class, 'edit'])->name('attendance.edit-attendance');

//HR//Leave
Route::get('/leave/all-leave', [LeaveController::class, 'index'])->name('leave.all-leave');
Route::get('/leave/add-leave', [LeaveController::class, 'add'])->name('leave.add-leave');
Route::post('/leave/store', [LeaveController::class, 'store'])->name('leave.store');
Route::get('leave/edit/{id}', [LeaveController::class, 'edit'])->name('leave.edit-leave');
Route::put('leave/update/{id}', [LeaveController::class, 'update'])->name('leave.update');
Route::delete('/leave/{id}', [LeaveController::class, 'destroy'])->name('leave.destroy');


//HR//Department
// Department Routes
Route::get('/department/all-department', [DepartmentController::class, 'index'])->middleware('admin')->name('department.all-department');
Route::get('/department/add-department', [DepartmentController::class, 'add'])->middleware('admin')->name('department.add-department');
Route::post('/department/store', [DepartmentController::class, 'store'])->middleware('admin')->name('department.store');
Route::get('/department/edit-department/{id}', [DepartmentController::class, 'edit'])->middleware('admin')->name('department.edit-department');
Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->middleware('admin')->name('department.update');
Route::delete('/department/{id}', [DepartmentController::class, 'destroy'])->middleware('admin')->name('department.destroy');

//HR//Holiday
Route::get('/holiday/all-holiday', [HolidayController::class, 'index'])->name('holiday.all-holiday');
Route::get('/holiday/add-holiday', [HolidayController::class, 'add'])->name('holiday.add-holiday');
Route::get('/holiday/edit-holiday', [HolidayController::class, 'edit'])->name('holiday.edit-holiday');
//HR//Designation

Route::get('/designation/all-designation', [DesignationController::class, 'index'])->middleware('admin')->name('designation.all-designation');
Route::get('/designation/add-designation', [DesignationController::class, 'add'])->middleware('admin')->name('designation.add-designation');
Route::post('/designation/store', [DesignationController::class, 'store'])->middleware('admin')->name('designation.store');
Route::get('/designation/edit-designation/{id}', [DesignationController::class, 'edit'])->middleware('admin')->name('designation.edit-designation');
Route::put('/designation/update/{id}', [DesignationController::class, 'update'])->middleware('admin')->name('designation.update');
Route::delete('/designation/delete/{id}', [DesignationController::class, 'destroy'])->middleware('admin')->name('designation.destroy');


//HR//Appreciation
Route::get('/appreciation/all-appreciation', [AppreciationController::class, 'index'])->middleware('admin')->name('appreciation.all-appreciation');
Route::get('/appreciation/add-appreciation', [AppreciationController::class, 'add'])->middleware('admin')->name('appreciation.add-appreciation');
Route::get('/appreciation/edit-appreciation/{id}', [AppreciationController::class, 'edit'])->middleware('admin')->name('appreciation.edit-appreciation');
Route::post('/appreciation/store', [AppreciationController::class, 'store'])->middleware('admin')->name('appreciation.store');
Route::put('/appreciation/update/{id}', [AppreciationController::class, 'update'])->middleware('admin')->name('appreciation.update');
Route::delete('/appreciation/{id}', [AppreciationController::class, 'destroy'])->middleware('admin')->name('appreciation.destroy');
Route::get('/appreciation/export-csv', [AppreciationController::class, 'exportCsv'])->middleware('admin')->name('appreciation.export-csv');
Route::get('/appreciation/export-pdf', [AppreciationController::class, 'exportPdf'])->middleware('admin')->name('appreciation.export-pdf');

//@HR

//WORK//Project

Route::get('/work/project/all-project', [ProjectController::class, 'index'])->middleware('admin')->name('work.project.all-project');
Route::get('/work/project/add-project', [ProjectController::class, 'add'])->middleware('admin')->name('work.project.add-project');
Route::post('/work/project/store', [ProjectController::class, 'store'])->middleware('admin')->name('work.project.store');
Route::get('/work/project/edit-project/{id}', [ProjectController::class, 'edit'])->middleware('admin')->name('work.project.edit');
Route::put('/work/project/update/{id}', [ProjectController::class, 'update'])->middleware('admin')->name('work.project.update');
Route::delete('/work/project/delete/{id}', [ProjectController::class, 'destroy'])->middleware('admin')->name('work.project.delete');
Route::get('/work/project/export-pdf', [ProjectController::class, 'exportPdf'])->middleware('admin')->name('work.project.export-pdf');
Route::get('/work/project/export-excel', [ProjectController::class, 'exportExcel'])->middleware('admin')->name('work.project.export-excel');

//WORK//Task
Route::get('/work/task/all-task', [TaskController::class, 'index'])->middleware('admin')->name('work.task.all-task');
Route::get('/work/task/add-task', [TaskController::class, 'add'])->middleware('admin')->name('work.task.add-task');
Route::get('/work/task/edit-task/{id}', [TaskController::class, 'edit'])->middleware('admin')->name('work.task.edit-task');
Route::post('/work/task/add-task', [TaskController::class, 'store'])->middleware('admin')->name('work.task.store');
Route::put('/work/task/update-task/{id}', [TaskController::class, 'update'])->middleware('admin')->name('work.task.update');
Route::delete('/work/task/delete-task/{id}', [TaskController::class, 'destroy'])->middleware('admin')->name('work.task.destroy');
Route::patch('/work/task/update-status/{id}', [TaskController::class, 'updateStatus'])->middleware('admin')->name('work.task.update-status');
Route::get('/work/task/export-pdf', [TaskController::class, 'exportPdf'])->middleware('admin')->name('work.task.export-pdf');
Route::get('/work/task/export-excel', [TaskController::class, 'exportExcel'])->middleware('admin')->name('work.task.export-excel');

//WORK//Milestone
Route::get('/work/milestone/all-milestone', [MilestoneController::class, 'index'])->middleware('admin')->name('work.milestone.all-milestone');
Route::get('/work/milestone/add-milestone', [MilestoneController::class, 'add'])->middleware('admin')->name('work.milestone.add-milestone');
Route::post('/work/milestone/store-milestone', [MilestoneController::class, 'store'])->middleware('admin')->name('work.milestone.store-milestone');
Route::get('/work/milestone/edit-milestone/{id}', [MilestoneController::class, 'edit'])->middleware('admin')->name('work.milestone.edit-milestone');
Route::put('/work/milestone/update-milestone/{id}', [MilestoneController::class, 'update'])->middleware('admin')->name('work.milestone.update-milestone');
Route::delete('/work/milestone/delete-milestone/{id}', [MilestoneController::class, 'destroy'])->middleware('admin')->name('work.milestone.delete-milestone');
Route::put('/work/milestone/update-status/{id}', [MilestoneController::class, 'updateStatus'])->middleware('admin')->name('work.milestone.update-status');
Route::get('/work/milestone/export-csv', [MilestoneController::class, 'exportCsv'])->middleware('admin')->name('work.milestone.export-csv');
Route::get('/work/milestone/export-pdf', [MilestoneController::class, 'exportPdf'])->middleware('admin')->name('work.milestone.export-pdf');
//@WORK

// FINANCE
//FINANCE//Bank
Route::get('/finance/bank/all-bank', [BankController::class, 'index'])->middleware('admin')->name('finance.bank.all-bank');
Route::get('/finance/bank/add-bank', [BankController::class, 'add'])->middleware('admin')->name('finance.bank.add-bank');
Route::get('/finance/bank/edit-bank/{id}', [BankController::class, 'edit'])->middleware('admin')->name('finance.bank.edit-bank');
Route::post('/finance/bank/store', [BankController::class, 'store'])->middleware('admin')->name('finance.bank.store');
Route::put('/finance/bank/update/{id}', [BankController::class, 'update'])->middleware('admin')->name('finance.bank.update');
Route::delete('/finance/bank/delete/{id}', [BankController::class, 'destroy'])->middleware('admin')->name('finance.bank.delete');
Route::patch('/finance/bank/{id}/status', [BankController::class, 'updateStatus'])->middleware('admin')->name('finance.bank.update-status');
Route::get('/finance/bank/export-csv', [BankController::class, 'exportCsv'])->middleware('admin')->name('finance.bank.export-csv');
Route::get('/finance/bank/export-pdf', [BankController::class, 'exportPdf'])->middleware('admin')->name('finance.bank.export-pdf');
// FINANCE//Expense
Route::get('/finance/expense/all-expense', [ExpenseController::class, 'index'])->middleware('admin')->name('finance.expense.all-expense');
Route::get('/finance/expense/add-expense', [ExpenseController::class, 'add'])->middleware('admin')->name('finance.expense.add-expense');
Route::post('/finance/expense/store', [ExpenseController::class, 'store'])->middleware('admin')->name('finance.expense.store');
Route::get('/finance/expense/edit-expense/{id}', [ExpenseController::class, 'edit'])->middleware('admin')->name('finance.expense.edit-expense');
Route::put('/finance/expense/update/{id}', [ExpenseController::class, 'update'])->middleware('admin')->name('finance.expense.update');
Route::delete('/finance/expense/destroy/{id}', [ExpenseController::class, 'destroy'])->middleware('admin')->name('finance.expense.destroy');

Route::get('/finance/expense/export-pdf', [ExpenseController::class, 'exportPdf'])->middleware('admin')->name('finance.expense.export-pdf');
Route::get('/finance/expense/export-excel', [ExpenseController::class, 'exportExcel'])->middleware('admin')->name('finance.expense.export-excel');

// FINANCE//Invoice
Route::get('/finance/invoice/all-invoice', [InvoiceController::class, 'index'])->middleware('admin')->name('finance.invoice.all-invoice');
Route::get('/finance/invoice/pdf-invoice/{id}', [InvoiceController::class, 'viewInvoice'])->middleware('admin')->name('finance.invoice.pdf-invoice');
Route::get('/finance/invoice/add-invoice', [InvoiceController::class, 'add'])->middleware('admin')->name('finance.invoice.add-invoice');
Route::post('/finance/invoice/store', [InvoiceController::class, 'store'])->middleware('admin')->name('finance.invoice.store');
Route::get('/finance/invoice/edit-invoice/{id}', [InvoiceController::class, 'edit'])->middleware('admin')->name('finance.invoice.edit-invoice');
Route::put('/finance/invoice/update/{id}', [InvoiceController::class, 'update'])->middleware('admin')->name('finance.invoice.update');
Route::delete('/finance/invoice/delete/{id}', [InvoiceController::class, 'destroy'])->middleware('admin')->name('finance.invoice.delete');

Route::get('/finance/invoice/export-pdf', [InvoiceController::class, 'exportPdf'])->middleware('admin')->name('finance.invoice.export-pdf');
Route::get('/finance/invoice/export-excel', [InvoiceController::class, 'exportExcel'])->middleware('admin')->name('finance.invoice.export-excel');

// FINANCE//Proposal
Route::get('/finance/proposal/all-proposal', [ProposalController::class, 'index'])->middleware('admin')->name('finance.proposal.all-proposal');
Route::get('/finance/proposal/add-proposal', [ProposalController::class, 'add'])->middleware('admin')->name('finance.proposal.add-proposal');
Route::get('/finance/proposal/edit-proposal/{id}', [ProposalController::class, 'edit'])->middleware('admin')->name('finance.proposal.edit-proposal');
Route::post('/finance/proposal/store', [ProposalController::class, 'store'])->middleware('admin')->name('finance.proposal.store');
Route::delete('/finance/proposal/{id}', [ProposalController::class, 'destroy'])->middleware('admin')->name('finance.proposal.destroy');
Route::put('/finance/proposal/update/{id}', [ProposalController::class, 'update'])->middleware('admin')->name('finance.proposal.update');

Route::get('/finance/proposal/export-csv', [ProposalController::class, 'exportCsv'])->middleware('admin')->name('finance.proposal.export-csv');
Route::get('/finance/proposal/export-pdf', [ProposalController::class, 'exportPdf'])->middleware('admin')->name('finance.proposal.export-pdf');

// FINANCE//Sale
Route::get('/finance/sale/all-sale', [SaleController::class, 'index'])->name('finance.sale.all-sale');
Route::get('/finance/sale/add-sale', [SaleController::class, 'add'])->name('finance.sale.add-sale');
Route::get('/finance/sale/edit-sale', [SaleController::class, 'edit'])->name('finance.sale.edit-sale');

// Report

//Report//Task-Report
Route::get('/report/task-report/all-task-report', [TaskReportController::class, 'index'])->middleware('admin')->name('report.task-report.all-task-report');
Route::get('/report/task-report', [TaskReportController::class, 'index'])->middleware('admin')->name('report.task-report.filter');
Route::get('/report/task-report/export-pdf', [TaskReportController::class, 'exportPdf'])->middleware('admin')->name('report.task-report.export-pdf');
Route::get('/report/task-report/export-excel', [TaskReportController::class, 'exportExcel'])->middleware('admin')->name('report.task-report.export-excel');
//Report//Time-log-Report
Route::get('/report/time-log-report/all-time-log-report', [TimeLogReportController::class, 'index'])->name('report.time-log-report.all-time-log-report');

//Report//Finance-Report
Route::get('/report/finance-report/all-finance-report', [FinanceReportController::class, 'index'])->name('report.finance-report.all-finance-report');

//Report//Income-Report
Route::get('/report/income-report/all-income-report', [IncomeReportController::class, 'index'])->middleware('admin')->name('report.income-report.all-income-report');
Route::get('/report/income-report/export-pdf', [IncomeReportController::class, 'exportPdf'])->middleware('admin')->name('report.income-report.export-pdf');
Route::get('/report/income-report/export-excel', [IncomeReportController::class, 'exportExcel'])->middleware('admin')->name('report.income-report.export-excel');

//Report//Expense-Report
Route::get('/report/expense-report/all-expense-report', [ExpenseReportController::class, 'index'])->middleware('admin')->name('report-expense-report.all-expense-report');
Route::get('/report/expense-report', [ExpenseReportController::class, 'index'])->middleware('admin')->name('report.expense-report');
Route::get('/report/expense-report/export-pdf', [ExpenseReportController::class, 'exportPdf'])->middleware('admin')->name('report.expense-report.export-pdf');
Route::get('/report/expense-report/export-excel', [ExpenseReportController::class, 'exportExcel'])->middleware('admin')->name('report.expense-report.export-excel');
//Report//Leave-Report
Route::get('/report/leave-report/all-leave-report', [LeaveReportController::class, 'index'])->name('report.leave-report.all-leave-report');

//Report//Attendance-Report
Route::get('/report/attendance-report/all-attendance-report', [AttendenceReportController::class, 'index'])->name('report.attendance-report.all-attendance-report');

//Report//Sale-Report
Route::get('/report/sale-report/all-sale-report', [SaleReportController::class, 'index'])->name('report.sale-report.all-sale-report');




// Client dashboard
Route::get('/client-dash/dashboard', [ClientDashController::class, 'index'])->middleware('client')->name('client-dash.dashboard');

// Client project
Route::get('/client-dash/project/all-project', [ProjectController::class, 'view'])->middleware('client')->name('client-dash.project.all-project');

// Client milestone
Route::get('/client-dash/milestone/all-milestone', [MilestoneController::class, 'view'])->middleware('client')->name('client-dash.milestone.all-milestone');

// Client invoice
Route::get('/client-dash/invoice/all-invoice', [InvoiceController::class, 'view'])->middleware('client')->name('client-dash.invoice.all-invoice');
// Client qiotation

Route::get('/client-dash/quotation/all-quotation', [QuotationController::class, 'view'])->middleware('client')->name('client-dash.quotation.all-quotation');
Route::get('/client-dash/quotation/add-quotation', [QuotationController::class, 'create'])->middleware('client')->name('client-dash.quotation.add-quotation');
Route::post('/client-dash/quotation/store', [QuotationController::class, 'store'])->middleware('client')->name('client-dash.quotation.store');
Route::get('/client-dash/quotation/edit-quotation/{id}', [QuotationController::class, 'edit'])->middleware('client')->name('client-dash.quotation.edit-quotation');
Route::put('/client-dash/quotation/update/{id}', [QuotationController::class, 'update'])->middleware('client')->name('client-dash.quotation.update-quotation');
Route::delete('/client-dash/quotation/delete/{id}', [QuotationController::class, 'destroy'])->middleware('client')->name('client-dash.quotation.delete-quotation');
Route::get('/client-dash/quotation/export-pdf', [QuotationController::class, 'exportPdf'])->middleware('client')->name('client-dash.quotation.export-pdf');
Route::get('/client-dash/quotation/export-excel', [QuotationController::class, 'exportExcel'])->middleware('client')->name('client-dash.quotation.export-excel');

//admi
// Admin routes
Route::get('/message/admin/clients', [MessageController::class, 'adminClients'])->middleware('admin')->name('admin-clients');
Route::get('/message/admin/chat/{client}', [MessageController::class, 'adminShowChat'])->middleware('admin')->name('admin-view-client-chat');
Route::post('/message/admin/chat/{client}', [MessageController::class, 'adminStoreMessage'])->middleware('admin')->name('admin-store-message');

// Client routes
Route::get('/client-dash/message/{user}', [MessageController::class, 'clientChat'])->middleware('client')->name('client-dash.message.view-message');
Route::post('/client-dash/message', [MessageController::class, 'clientStoreMessage'])->middleware('client')->name('client-dash.message.message.store');
