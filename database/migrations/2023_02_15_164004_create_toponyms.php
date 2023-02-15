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
            $table->unsignedBigInteger('element_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->string('element_name')->nullable();
            $table->string('category_name')->nullable();
            $table->string('class_name')->nullable();
            $table->string('map_number')->nullable();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('prev_name')->nullable();
            $table->double('primary_latitude')->nullable();
            $table->double('primary_longitude')->nullable();
            $table->double('secondary_latitude')->nullable();
            $table->double('secondary_longitude')->nullable();
            $table->string('meaning')->nullable();
            $table->string('language_origin')->nullable();
            $table->string('source')->nullable();
            $table->string('status')->nullable()->default('in-review');
            $table->string('subdistrict')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
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
