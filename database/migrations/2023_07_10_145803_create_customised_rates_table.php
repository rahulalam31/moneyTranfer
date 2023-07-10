<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customised_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sending_country_id')->constrained('sending_countries');
            $table->foreignId('receiving_country_id')->constrained('receiving_countries');
            $table->decimal('customised_rate');
            $table->string('rate_type');
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
        Schema::dropIfExists('customised_rates');
    }
};
