<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name')->comment('产品名称');
            $table->string('slug')->unique();
            $table->text('description')->nullable()->comment('详细信息');
            $table->unsignedInteger('price')->default(100)->comment('价格');
            $table->unsignedInteger('category_id')->nullable()->comment('所属分类');
            $table->string('brand', 128)->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
