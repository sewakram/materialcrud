<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInwardOutwardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inward-outward', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('mat_id');
            $table->date('entry_date')->nullable();
            $table->decimal('in_out_qty', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inward-outward');
    }
}
