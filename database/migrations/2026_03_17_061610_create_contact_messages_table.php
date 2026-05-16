<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {

            // -------------------
            // Primary Key
            // -------------------
            $table->id();

            // -------------------
            // Contact Fields
            // -------------------
            $table->string('name');
            $table->string('email');
            $table->text('message');

            // -------------------
            // Timestamps
            // -------------------
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};