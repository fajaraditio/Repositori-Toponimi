<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toponyms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subdistrict_id')->nullable();
            $table->string('map_number')->nullable();
            $table->string('element_name')->nullable();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('prev_name')->nullable();
            $table->float('primary_latitude')->nullable();
            $table->float('primary_longitude')->nullable();
            $table->float('secondary_latitude')->nullable();
            $table->float('secondary_longitude')->nullable();
            $table->string('meaning')->nullable();
            $table->string('language_origin')->nullable();
            $table->string('source')->nullable();
            $table->string('status')->nullable()->default('in-review');
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
        Schema::dropIfExists('toponyms');
    }
};
