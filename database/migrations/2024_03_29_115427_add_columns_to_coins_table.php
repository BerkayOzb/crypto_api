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
            $table->string('price');
            $table->string('volume_24h');
            $table->string('percent_change_1h');
            $table->string('percent_change_24h');
            $table->string('percent_change_7d');
            $table->string('percent_change_30d');
            $table->string('percent_change_60d');
            $table->string('percent_change_90d');
            $table->string('market_cap');
            $table->string('market_cap_dominance');
            $table->string('max_supply');
            $table->string('circulating_supply');
            $table->string('total_supply');
            $table->integer('is_active');
            $table->integer('cmc_rank');
            $table->string('symbol');
            $table->string('slug');
        });
    }

    /**;
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coins', function (Blueprint $table) {
            //
        });
    }
};
