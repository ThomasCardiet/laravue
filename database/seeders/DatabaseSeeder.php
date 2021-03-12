<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('customers')->truncate();
        DB::table('projects')->truncate();
        Schema::enableForeignKeyConstraints();

        Customer::factory(10)->create();
        Project::factory(5)->create();
    }
}
