<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->string('title_bn');       // শিরোনাম (বাংলা)
            $table->string('title_en')->nullable();
            $table->date('start_date');       // শুরু তারিখ
            $table->date('end_date')->nullable(); // শেষ তারিখ (একদিন হলে null)
            $table->string('type')->default('public'); // public|academic|exam
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('holidays');
    }
}
