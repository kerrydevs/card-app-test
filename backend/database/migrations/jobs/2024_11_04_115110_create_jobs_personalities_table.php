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
        Schema::connection('mysql_second')->create('jobs_personalities', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('type')->default(1);
            $table->foreignId('job_id')->index();
            $table->boolean('status')->default(1);
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
        Schema::connection('mysql_second')->dropIfExists('jobs_personalities');
    }
};
