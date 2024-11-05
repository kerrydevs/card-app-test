<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql_second')->create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('job_category_id')->nullable()->index();
            $table->foreignId('job_type_id')->nullable()->index();
            $table->text('description')->nullable();
            $table->longText('detail')->nullable();
            $table->text('business_skill')->nullable();
            $table->text('knowledge')->nullable();
            $table->text('location')->nullable();
            $table->text('activity')->nullable();
            $table->boolean('academic_degree_doctor')->default(0);
            $table->boolean('academic_degree_master')->default(0);
            $table->boolean('academic_degree_professional')->default(0);
            $table->boolean('academic_degree_bachelor')->default(0);
            $table->string('salary_statistic_group')->nullable();
            $table->string('salary_range_first_year')->nullable();
            $table->decimal('salary_range_average',10,2)->default(0);
            $table->text('salary_range_remarks')->nullable();
            $table->text('restriction')->nullable();
            $table->integer('estimated_total_workers')->default(0);
            $table->text('remarks')->nullable();
            $table->text('url')->nullable();
            $table->text('seo_description')->nullable();
            $table->longText('seo_keywords')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('publish_status')->default(0);
            $table->integer('version')->default(0);
            $table->timestamp('created');
            $table->timestamp('modified');
            $table->timestamp('deleted')->nullable();
            $table->bigInteger('created_by')->default(0);
            $table->bigInteger('modified_by')->default(0);
            $table->bigInteger('deleted_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql_second')->dropIfExists('jobs');
    }
};
