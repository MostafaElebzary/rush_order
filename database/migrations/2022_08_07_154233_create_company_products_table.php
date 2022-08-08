<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('company_category_id')->constrained('company_categories')->onDelete('cascade');
            $table->string('title_ar');
            $table->string('title_en');
            $table->longText('content_ar');
            $table->longText('content_en');
            $table->double('price');
            $table->string('image');
            $table->string('preparation_time')->nullable();
            $table->json('attributes')->nullable();
            $table->json('additions')->nullable();
            $table->json('drinks')->nullable();
            $table->enum('type', ['Normal', 'Bundle'])->default('Normal');



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
        Schema::dropIfExists('company_products');
    }
}
