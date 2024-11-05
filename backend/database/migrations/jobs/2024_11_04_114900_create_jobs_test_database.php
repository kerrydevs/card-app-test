<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateJobsTestDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create database if not existed
        DB::statement("CREATE DATABASE IF NOT EXISTS jobs_test_db");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the database if it exists
        DB::statement('DROP DATABASE IF EXISTS jobs_test_db');
    }
}
