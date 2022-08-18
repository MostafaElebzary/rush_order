<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copouns', function (Blueprint $table) {
            $table->id();
            $table->string('code',6)->unique();
            $table->date('from_date');
            $table->date('to_date');
            $table->double('amount');
            $table->enum('discount_type',['Ratio','Amount'])->default('Amount');
            $table->integer('active')->default(1);
            $table->integer('usage_count')->default(0);
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
        Schema::dropIfExists('copouns');
    }
}
