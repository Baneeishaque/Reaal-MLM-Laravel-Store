<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductDetailsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('product_bv', 10, 2)->nullable();
            $table->decimal('product_tax', 10, 2)->nullable();
            $table->decimal('product_delivery_charge', 10, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_bv');
            $table->dropColumn('product_tax');
            $table->dropColumn('product_delivery_charge');
        });
    }
}
