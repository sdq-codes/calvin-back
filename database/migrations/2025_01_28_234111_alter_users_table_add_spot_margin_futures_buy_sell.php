<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddSpotMarginFuturesBuySell extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Spot values (USD and percentage)
            $table->decimal('spot_usd', 15, 2)->default(0)->after('email'); // USD value for Spot
            $table->decimal('spot_percentage', 5, 2)->default(0)->after('spot_usd'); // Percentage value for Spot

            // Margin values (USD and percentage)
            $table->decimal('margin_usd', 15, 2)->default(0)->after('spot_percentage'); // USD value for Margin
            $table->decimal('margin_percentage', 5, 2)->default(0)->after('margin_usd'); // Percentage value for Margin

            // Futures values (USD and percentage)
            $table->decimal('futures_usd', 15, 2)->default(0)->after('margin_percentage'); // USD value for Futures
            $table->decimal('futures_percentage', 5, 2)->default(0)->after('futures_usd'); // Percentage value for Futures

            // Buy & Sell values (USD and percentage)
            $table->decimal('buy_sell_usd', 15, 2)->default(0)->after('futures_percentage'); // USD value for Buy & Sell
            $table->decimal('buy_sell_percentage', 5, 2)->default(0)->after('buy_sell_usd'); // Percentage value for Buy & Sell
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the newly added columns
            $table->dropColumn([
                'spot_usd',
                'spot_percentage',
                'margin_usd',
                'margin_percentage',
                'futures_usd',
                'futures_percentage',
                'buy_sell_usd',
                'buy_sell_percentage',
            ]);
        });
    }
}
