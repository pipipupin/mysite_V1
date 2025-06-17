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
            $table->unsignedBigInteger('client_id');  // Внешний ключ, связывающий заказ с клиентом
            $table->string('number');
            $table->string('product_id');
            $table->decimal('total_amount', 10, 2);  // Сумма заказа
            $table->timestamps();

            // Связь с таблицей клиентов
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
