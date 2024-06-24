<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('entity_etls', function (Blueprint $table) {
            $table->unsignedBigInteger('tenant_id')->nullable();

            $table->foreign('tenant_id', 'tenant_id_fk_01205000')
                ->references('id')
                ->on('tenants')
                ->cascadeOnDelete();
        });
    }
};
