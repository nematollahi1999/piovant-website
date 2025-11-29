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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->onDelete('cascade'); // The item being listed
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The user who created the listing
            $table->text('desired_items_description')->nullable(); // What the lister is looking for
            $table->decimal('desired_cash_amount', 10, 2)->nullable(); // If they're open to cash too
            $table->enum('status', ['active', 'closed', 'paused'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
