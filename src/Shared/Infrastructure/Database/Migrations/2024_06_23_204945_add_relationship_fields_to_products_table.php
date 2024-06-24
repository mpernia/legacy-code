<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('product_family_id')->nullable();

            $table->foreign('user_id', 'user_id_fk_00204945')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreign('tenant_id', 'tenant_id_fk_01204945')
                ->references('id')
                ->on('tenants')
                ->cascadeOnDelete();
            $table->foreign('product_family_id', 'product_family_id_fk_02204945')
                ->references('id')
                ->on('product_families')
                ->cascadeOnDelete();
        });
    }
};
