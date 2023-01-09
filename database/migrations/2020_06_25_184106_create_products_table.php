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
            $table->id();
            $table->string('productName', 250);
            $table->string('productSlugName', 250);
            $table->double('productPrice', 10, 2)->default(0.0);
            $table->text('productDescription')->nullable();
            $table->string('productFeaturedImage',250)->nullable();
            $table->text('productLongDescription')->nullable();
            $table->integer("productRelease");
            $table->string("productOwner", 250)->default("Pastor Choolwe");
            $table->integer('productIsUploaded')->default(0);
            $table->string("productUrl",250)->nullable();
            $table->text("productDownloadLink")->nullable();
            $table->text("productIframe")->nullable();
            $table->integer("productDownloadLimit")->default(3);
            $table->integer("productSource")->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('product_type_id')->references('id')->on('product_types');
            $table->softDeletes();
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
//        Schema::table("products",function (Blueprint $table){
//            $table->dropColumn('deleted_at');
//        });
        Schema::dropIfExists('products');


    }
}
