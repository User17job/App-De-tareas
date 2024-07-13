<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtasksTable extends Migration
{
    public function up()
    {
        Schema::create('subtasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('todolist_id')->constrained('todolists')->onDelete('cascade');
            $table->string('subtarea');
            $table->boolean('complete')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subtasks');
    }
}
