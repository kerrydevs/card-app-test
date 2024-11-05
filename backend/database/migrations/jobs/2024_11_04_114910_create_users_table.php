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
        Schema::connection('mysql_second')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
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
        Schema::connection('mysql_second')->dropIfExists('users');
    }
};
