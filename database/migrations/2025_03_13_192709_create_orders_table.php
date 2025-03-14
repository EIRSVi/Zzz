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
            $table->id('order_id');
            $table->foreignId('customer_id')->constrained('customers', 'customer_id');
            $table->foreignId('employee_id')->constrained('employees', 'employee_id');
            $table->foreignId('shipper_id')->constrained('shippers', 'shipper_id');
            $table->date('order_date');
            $table->date('shipped_date')->nullable();
            $table->string('ship_address');
            $table->string('ship_city');
            $table->string('ship_postal_code');
            $table->string('ship_country');
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
