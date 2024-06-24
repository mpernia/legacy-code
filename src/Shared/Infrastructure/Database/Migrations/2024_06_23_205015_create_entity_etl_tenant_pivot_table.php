<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entity_etl_tenant', function (Blueprint $table) {
            $table->unsignedBigInteger('entity_etl_id');
            $table->unsignedBigInteger('tenant_id');
            $table->dateTime('time')->nullable()->default(null);

            $table->foreign('entity_etl_id', 'entity_etl_id_fk_01205015')
                ->references('id')
                ->on('entity_etls')
                ->cascadeOnDelete();
            $table->foreign('tenant_id', 'tenant_id_fk_01205015')
                ->references('id')
                ->on('tenants')
                ->cascadeOnDelete();
        });
    }
};
