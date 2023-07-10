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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->string('poste');
            $table->string('direction');
            $table->string('number');
            $table->string('pole')->nullable();
            $table->string('email')->unique();
            $table->string('superiority')->default('m5');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$10$mZMZddmsBmkI1f.NKO82H.weQf100V0seHtdCbJCJPik2idZOZw7u');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
