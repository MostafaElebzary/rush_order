<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('location')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->foreignId('activity_id')->nullable()->constrained('activities')->onDelete('cascade');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('ceo_name');
            $table->string('ceo_phone');
            $table->string('commercial_file');
            $table->bigInteger('branches_count')->default(0);
            $table->string('maroof_id')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->date('expire_date')->nullable();
            $table->string('delivery_price');

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
        Schema::dropIfExists('companies');
    }
}
