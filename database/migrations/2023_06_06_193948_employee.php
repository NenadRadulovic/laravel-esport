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
        if (!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('first_name')->nullable(false);
                $table->string('last_name')->nullable(false);
                $table->string('contact_email')->unique()->nullable(false);
                $table->unsignedBigInteger('role_id')->nullable(false);
                $table->unsignedBigInteger('team_id')->nullable(false);
                $table->foreign('role_id')->references("id")->on('roles');
                $table->foreign('team_id')->references("id")->on('teams');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
