<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
             $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete() ;
             $table->text('location');
             $table->text('destination');
             $table->string('seller_name');
             $table->text('customer_name');
             $table->text('customer_notes')->nullable();
             $table->enum('order_status', [
                'Pending',
                'Accepted',
                'Heading to destination',
                'Arrived at destination',
                'Received by courier',
                'Delivery in progress',
                'Arrived at customer',
                'Delivered',
            ])->default('Pending');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
