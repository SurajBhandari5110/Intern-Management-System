<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('intern_study_records', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('intern_id');
        $table->string('material_table'); // Store the table name or material title
        $table->json('topics'); // Store topics as a JSON array
        $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
        $table->text('comment')->nullable();
        $table->timestamps();

        $table->foreign('intern_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    
};
