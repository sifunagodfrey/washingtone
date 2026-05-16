<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// -------------------
// Admin 2FA Tokens
// -------------------

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('su_admin_2fa_tokens', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('su_users')
                ->cascadeOnDelete();

            $table->string('code');
            $table->timestamp('expires_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('su_admin_2fa_tokens');
    }
};