<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Lead;
use App\Http\Controllers\Work\Task\TaskController;
use App\Models\Task;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Work\Milestone\MilestoneController;
use App\Http\Controllers\Lead\LeadController;
use Carbon\Carbon; // Import Carbon for date handling

class AdminController extends Controller
{
    protected $taskController;
    protected $milestoneController;
    protected $leadController;

    public function __construct(TaskController $taskController, MilestoneController $milestoneController, LeadController $leadController)
    {
        $this->taskController = $taskController;
        $this->milestoneController = $milestoneController;
        $this->leadController = $leadController;
    }

    public function index()
    {
        // Get the count of all projects, leads, tasks, etc.
        $projectCount = Project::count();
        $leadCount = Lead::count();
        $taskCount = Task::count();
        $expenseSum = Expense::sum('price');
        $incomeSum = Project::sum('price');
        $clientCount = Client::count();
        $employeeCount = Employee::count();
        $invoiceCount = Invoice::count();

        // Fetch pending tasks, milestones, and leads
        $pendingTasks = $this->taskController->adminPendingTaskList();
        $pendingMilestones = $this->milestoneController->adminPendingMilestoneList();
        $pendingLeads = $this->leadController->adminPendingLeadList();

        // Calculate monthly expenses and income for the chart (for each month of the current year)
        $monthlyExpenses = [];
        $monthlyIncome = [];

        for ($month = 1; $month <= 12; $month++) {
            // Fetch monthly expenses
            $monthlyExpenses[] = Expense::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $month)
                ->sum('price');

            // Fetch monthly income (using project price as income for this example)
            $monthlyIncome[] = Project::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $month)
                ->sum('price');
        }

        // Pass the data to the view
        return view('admin.dashboard', compact(
            'projectCount', 'leadCount', 'taskCount', 'expenseSum', 'clientCount', 'employeeCount', 'invoiceCount',
            'incomeSum', 'pendingTasks', 'pendingMilestones', 'pendingLeads', 'monthlyExpenses', 'monthlyIncome'
        ));
    }
}
