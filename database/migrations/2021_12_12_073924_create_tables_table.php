<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{

    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('names');
            $table->string('model_name');
            $table->boolean('soft_delete')->default(false);
     $table->foreignId('project_id')->constrained("projects", "id")->onDelete(null);
            $table->unique(['name', 'project_id']);
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
