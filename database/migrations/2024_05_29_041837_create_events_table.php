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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index()->nullable();
            $table->string('name')->index()->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('event_style')->nullable();
            $table->string('pax')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('guest_arrival_time')->nullable();
            $table->string('our_arrival_time')->nullable();
            $table->text('full_timing_list')->nullable();
            $table->text('location_instruction')->nullable();
            $table->text('loading_bay_address')->nullable();
            $table->text('prep_area_description')->nullable();
            $table->string('number_of_power')->nullable();
            $table->text('drinks_menu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
