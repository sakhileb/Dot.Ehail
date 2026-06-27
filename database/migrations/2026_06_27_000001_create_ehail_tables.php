<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('driver_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('license_number')->unique();
            $table->string('id_number')->unique();
            $table->enum('status', ['pending', 'approved', 'suspended'])->default('pending');
            $table->boolean('is_online')->default(false);
            $table->decimal('rating', 3, 2)->default(0);
            $table->unsignedInteger('total_rides')->default(0);
            $table->timestamps();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_profile_id')->constrained()->cascadeOnDelete();
            $table->string('make');
            $table->string('model');
            $table->unsignedSmallInteger('year');
            $table->string('color');
            $table->string('plate_number')->unique();
            $table->enum('type', ['economy', 'standard', 'premium', 'suv'])->default('standard');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passenger_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('driver_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('vehicle_id')->nullable()->constrained()->nullOnDelete();
            $table->string('pickup_address');
            $table->decimal('pickup_lat', 10, 7)->nullable();
            $table->decimal('pickup_lng', 10, 7)->nullable();
            $table->string('dropoff_address');
            $table->decimal('dropoff_lat', 10, 7)->nullable();
            $table->decimal('dropoff_lng', 10, 7)->nullable();
            $table->enum('status', ['requested', 'accepted', 'en_route', 'arrived', 'in_progress', 'completed', 'cancelled'])->default('requested');
            $table->enum('vehicle_type', ['economy', 'standard', 'premium', 'suv'])->default('standard');
            $table->decimal('estimated_fare', 8, 2)->nullable();
            $table->decimal('final_fare', 8, 2)->nullable();
            $table->decimal('distance_km', 8, 2)->nullable();
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('ride_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->unique()->constrained()->cascadeOnDelete();
            $table->foreignId('rated_by')->constrained('users')->cascadeOnDelete();
            $table->unsignedTinyInteger('rating');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ride_ratings');
        Schema::dropIfExists('rides');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('driver_profiles');
    }
};
