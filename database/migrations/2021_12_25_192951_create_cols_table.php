<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('length');
            $table->string('sel');
            $table->string('if');
            $table->string('hidden');
            $table->string('index');
            $table->string('default');
            $table->string('parent');
            $table->string('rel_type');
            $table->foreignId('tbl_id')->constrained("tbls", "id")
            ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cols');
    }
}
