<?php

use App\Models\Room;
use App\Enums\MaintenanceStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('image');
            $table->foreignIdFor(Room::class)->constrained()->onDelete('cascade');
            $table->string('status')->default(MaintenanceStatus::PENDING->value);
            $table->string('status_message')->nullable();
            $table->string('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
