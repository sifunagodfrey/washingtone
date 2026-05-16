<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// -------------------
// Create SU User Logs Table
// -------------------

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('su_user_logs', function (Blueprint $table) {

            $table->id();

            // -------------------
            // User Reference (su_users)
            // -------------------
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('su_users')
                ->nullOnDelete();

            // -------------------
            // Log Type
            // -------------------
            $table->string('type'); 
            // email, login, 2fa, payment, registration

            // -------------------
            // Title
            // -------------------
            $table->string('title');

            // -------------------
            // Message
            // -------------------
            $table->text('message')->nullable();

            // -------------------
            // Extra JSON Data
            // -------------------
            $table->json('meta')->nullable();

            // -------------------
            // Request Info
            // -------------------
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            // -------------------
            // Status
            // -------------------
            $table->enum('status', ['success', 'failed', 'pending'])
                ->default('success');

            // -------------------
            // Timestamp
            // -------------------
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('su_user_logs');
    }
};