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
            $table->string('name')->comment('الاسم');
            $table->string('sel')->comment('محدد');
            $table->string('if')->comment('الشرط');
            $table->string('type')->comment('نوع');
            $table->string('count')->comment('الطول');
            $table->boolean('null')->default(0)->comment('فارغ');
            $table->string('index')->nullable()
                ->comment('القيد');
            $table->string('default')->nullable()
                ->comment('قيمة_مبدئية');
            $table->boolean('hidden')
                ->comment('مخفي')->nullable()->default(0);
            $table->string('table_parent')->nullable();
            $table->string('col_parent')->nullable();
            $table->unique(['name', 'table_id']);
            $table->foreignId('table_id')  ->constrained("tables","id")->onDelete(null);

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
