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
        Schema::create('categorys', function (Blueprint $table) {
            $table->id();
            $table->string("name_category");
            $table->string("icon");
            $table->timestamps();
        });

        Schema::table('categorys', function (Blueprint $table) {
            $table->unsignedBigInteger('typeCategory_id');
            $table->foreign('typeCategory_id')->references('id')->on('typecategorys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorys');
    }
};
