<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DesignationsTableSeeder::class,
            DepartmentsTableSeeder::class,
            EmployeeSeeder::class,
            AppreciationsTableSeeder::class,
            ClientsTableSeeder::class,
            ProjectsTableSeeder::class,
            BanksTableSeeder::class,
            
            PackageSeeder::class,
            PortfolioSeeder::class,
            LeadsSeeder::class,

            MilestonesTableSeeder::class,
            TasksTableSeeder::class,
            LeavesTableSeeder::class,
            ExpensesTableSeeder::class,
            ProposalsTableSeeder::class,
            InvoicesTableSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
