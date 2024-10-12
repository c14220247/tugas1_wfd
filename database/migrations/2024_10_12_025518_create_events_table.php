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
            $table->string('title');
            $table->string('venue');
            $table->date('date');
            $table->time('start_time');
            $table->text('description');
            $table->string('booking_url')->nullable();
            $table->json('tags');
            $table->foreignId('organizer_id')->constrained('organizers', 'id', 'event_organizer_id');
            $table->foreignId('event_category_id')->constrained('categories', 'id', 'event_category_id');
            $table->boolean('isActive')->default(1);
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
