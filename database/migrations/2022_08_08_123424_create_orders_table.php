<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('user_name');
            $table->string('user_state')->nullable();
            $table->string('user_city')->nullable();
            $table->string('user_address');
            $table->enum('payment_type', ['Cash', 'Online'])->default('Cash');
            $table->double('total_price');
            $table->tinyInteger('status')->default(0)->comment("0->pending , 1->accepted , 2->processing , 3->delivered , 4->cancelled");

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
        Schema::dropIfExists('orders');
    }
}
