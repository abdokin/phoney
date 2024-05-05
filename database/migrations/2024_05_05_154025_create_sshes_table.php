<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sshes', function (Blueprint $table) {
            $table->id();
            $table->string('remoteAddr')->nullable(false);
            $table->string('username')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('client_version')->nullable(false);
            $table->boolean('pwned')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sshes');
    }
};
