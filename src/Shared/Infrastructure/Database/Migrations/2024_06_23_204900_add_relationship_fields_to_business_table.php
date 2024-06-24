<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();

            $table->foreign('created_by_id', 'created_by_id_fk_00204900')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }
};
