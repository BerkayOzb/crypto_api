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
        Schema::table('coins', function (Blueprint $table) {
            $table->string('volume_24h')->nullable()->change();
            $table->string('percent_change_1h')->nullable()->change();
            $table->string('percent_change_24h')->nullable()->change();
            $table->string('percent_change_7d')->nullable()->change();
            $table->string('percent_change_30d')->nullable()->change();
            $table->string('percent_change_60d')->nullable()->change();
            $table->string('percent_change_90d')->nullable()->change();
            $table->string('market_cap')->nullable()->change();
            $table->string('market_cap_dominance')->nullable()->change();
            $table->string('max_supply')->nullable()->change();
            $table->string('circulating_supply')->nullable()->change();
            $table->string('total_supply')->nullable()->change();
            $table->integer('is_active')->nullable()->change();
            $table->integer('cmc_rank')->nullable()->change();
            $table->string('symbol')->nullable()->change();
            $table->string('slug')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coins', function (Blueprint $table) {
            //
        });
    }
};
