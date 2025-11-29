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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade'); // The listing being offered on
            $table->foreignId('offerer_id')->constrained('users')->onDelete('cascade'); // The user making the offer
            $table->foreignId('offered_item_id')->nullable()->constrained('items')->onDelete('set null'); // The item being offered in exchange
            $table->decimal('cash_amount_offered', 10, 2)->nullable(); // Optional cash component
            $table->text('message')->nullable(); // Message from the offerer
            $table->enum('status', ['pending', 'accepted', 'rejected', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
