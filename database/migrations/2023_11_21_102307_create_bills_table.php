<?php

use App\Models\Room;
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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('previous_reading')->nullable();
            $table->string('current_reading')->nullable();
            $table->string('metric_rate')->nullable();
            $table->string('metric_type')->nullable();
            $table->string('reading')->nullable();
            $table->string('amount');
            $table->string('status')->default('Unpaid');
            $table->string('balance');
            $table->string('due_date');
            $table->foreignIdFor(Room::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
