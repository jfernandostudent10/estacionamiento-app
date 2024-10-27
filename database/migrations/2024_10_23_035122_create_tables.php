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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type', 255);
            $table->string('plate', 255);
            $table->boolean('disabled_person');
            $table->boolean('has_conadis_distinctive');
            $table->date('application_date');
            $table->boolean('is_approved')->default(false);
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('parking_sites', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('number');
            $table->date('date');
            $table->tinyInteger('status')->default(0)->comment('0: Disponible, 1: ocupado');
            $table->timestamps();
        });

        Schema::create('parking_reserved', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->foreignId('parking_site_id')->constrained();
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('parking_sites');
        Schema::dropIfExists('parking_reserved');
    }
};
