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
        Schema::create('toponyms_word_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('toponym_id');
            $table->unsignedInteger('set_word_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toponyms_word_classes');
    }
};
