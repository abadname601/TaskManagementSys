<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Task title
            $table->date('deadline')->nullable(); // Task deadline (nullable)
            $table->string('category'); // Task category
            $table->boolean('completed')->default(false); // Task completion status
            $table->date('alert_date')->nullable(); // Optional alert date for task
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
